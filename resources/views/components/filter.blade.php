<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Laravel App</title>
    @vite(['resources/js/filter.js'])
</head>
<div class="bg-white">
  <div x-data="{menu : false}">
    <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
      <div x-show="menu" 
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" 
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/25" aria-hidden="true"></div>

      <div class="fixed inset-0 z-40 flex" x-show="menu">
        <div x-show="menu" x-transition:enter="transition-opacity ease-linear duration-300"
          x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
          x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          class="relative ml-auto flex size-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
          <div class="flex items-center justify-between px-4">
            <h2 class="text-lg font-medium text-gray-900">Filters</h2>
            <button type="button"
              class="-mr-2 flex size-10 items-center justify-center rounded-md bg-white p-2 text-gray-400"
              @click="menu = !menu">
              <span class="sr-only">Close menu</span>
              <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- Filters -->
          <form class="mt-4 border-t border-gray-200">
            <h3 class="sr-only">Categories</h3>
            <ul role="list" class="px-2 py-3 font-medium text-gray-900">
              @foreach($categoriesGiven as $cat)
              <li>
                <a href="products?category={{$cat->nama}}" class="block px-2 py-3">{{$cat->nama}}</a>
              </li>
              @endforeach
              
            </ul>

            <div class="border-t border-gray-200 px-4 py-6" x-data="{colorState : false}">
              <h3 class="-mx-2 -my-3 flow-root">
                <!-- Expand/collapse section button -->
                <button type="button"
                  class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500"
                  aria-controls="filter-section-mobile-0" aria-expanded="false" @click="colorState = !colorState">
                  <span class="font-medium text-gray-900">Color</span>
                  <span class="ml-6 flex items-center">
                    <!-- Expand icon, show/hide based on section open state. -->
                    <svg x-show="!colorState" class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                      data-slot="icon">
                      <path
                        d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                    </svg>
                    <!-- Collapse icon, show/hide based on section open state. -->
                    <svg x-show="colorState" class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                      data-slot="icon">
                      <path fill-rule="evenodd"
                        d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                        clip-rule="evenodd" />
                    </svg>
                  </span>
                </button>
              </h3>
              <!-- Filter section, show/hide based on section state. -->
              
              <div class="pt-6" id="filter-section-mobile-0" x-show="colorState">
                <div class="space-y-6">
                  <div class="flex items-center">
                    <input id="filter-mobile-color-0" name="color[]" value="Putih" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">Putih</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-color-1" name="color[]" value="Merah" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-mobile-color-1" class="ml-3 min-w-0 flex-1 text-gray-500">Merah</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-color-2" name="color[]" value="Biru" type="checkbox" checked
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500">Biru</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-color-3" name="color[]" value="Coklat" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500">Coklat</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-color-4" name="color[]" value="Hijau" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-mobile-color-4" class="ml-3 min-w-0 flex-1 text-gray-500">Hijau</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-color-5" name="color[]" value="Hitam" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-mobile-color-5" class="ml-3 min-w-0 flex-1 text-gray-500">Hitam</label>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="border-t border-gray-200 px-4 py-6" x-data="{setSize : false}">
              <h3 class="-mx-2 -my-3 flow-root">
                <!-- Expand/collapse section button -->
                <button @click="setSize = !setSize" type="button"
                  class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500"
                  aria-controls="filter-section-mobile-2" aria-expanded="false">
                  <span class="font-medium text-gray-900">Size</span>
                  <span class="ml-6 flex items-center">
                    <!-- Expand icon, show/hide based on section open state. -->
                    <svg x-show="!setSize" class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                      data-slot="icon">
                      <path
                        d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                    </svg>
                    <!-- Collapse icon, show/hide based on section open state. -->
                    <svg x-show="setSize" class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                      data-slot="icon">
                      <path fill-rule="evenodd"
                        d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                        clip-rule="evenodd" />
                    </svg>
                  </span>
                </button>
              </h3>
              <!-- Filter section, show/hide based on section state. -->
              <div class="pt-6" id="filter-section-mobile-2" x-show="setSize">
                <div class="space-y-6">
                  <div class="flex items-center">
                    <input id="filter-mobile-size-0" name="size[]" value="XXL" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-mobile-size-0" class="ml-3 min-w-0 flex-1 text-gray-500">XXL</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-size-1" name="size[]" value="XL" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-mobile-size-1" class="ml-3 min-w-0 flex-1 text-gray-500">XL</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-size-2" name="size[]" value="L" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-mobile-size-2" class="ml-3 min-w-0 flex-1 text-gray-500">L</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-size-3" name="size[]" value="M" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-mobile-size-3" class="ml-3 min-w-0 flex-1 text-gray-500">M</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-mobile-size-4" name="size[]" value="S" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-mobile-size-4" class="ml-3 min-w-0 flex-1 text-gray-500">S</label>
                  </div>
                </div>
              </div>
            </div>
            @if(request('category'))
              <input type="hidden" name = "category" value="{{request('category')}}">
            @endif
            <div class="flex justify-center">
              <input type="submit" value="Apply" class=" rounded-md px-3 py-5 text-sm font-medium mt-6 bg-gray-700 text-gray-300 hover:cursor-pointer hover:text-white hover:bg-gray-300 w-2/4">
            </div>

          </form>
        </div>
      </div>
    </div>

    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900">All Products</h1>

        <div class="flex items-center" x-data="{sort : false}">
          <div class="relative inline-block text-left">
            <div>
              <button type="button"
                class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                id="menu-button" aria-expanded="false" aria-haspopup="true" @click="sort = !sort">
                Sort
                <svg class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20"
                  fill="currentColor" aria-hidden="true" data-slot="icon">
                  <path fill-rule="evenodd"
                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
                </svg>
              </button>
            </div>

            <div x-show="sort" x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="transform opacity-0 scale-95"
              x-transition:enter-end="transform opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75 "
              x-transition:leave-start="transform opacity-100 scale-100"
              x-transition:leave-end="transform opacity-0 scale-95"
              class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black/5 focus:outline-none"
              role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
              <div class="py-1" role="none">
                <a href="products?sort=Low" class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1"
                  id="menu-item-3">Price: Low to High</a>
                <a href="products?sort=High" class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1"
                  id="menu-item-4">Price: High to Low</a>
              </div>
            </div>
          </div>
          <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden"
            @click="menu = !menu">
            <span class="sr-only">Filters</span>
            <svg class="size-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor" data-slot="icon">
              <path fill-rule="evenodd"
                d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 0 1 .628.74v2.288a2.25 2.25 0 0 1-.659 1.59l-4.682 4.683a2.25 2.25 0 0 0-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 0 1 8 18.25v-5.757a2.25 2.25 0 0 0-.659-1.591L2.659 6.22A2.25 2.25 0 0 1 2 4.629V2.34a.75.75 0 0 1 .628-.74Z"
                clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>

      <section aria-labelledby="products-heading" class="pb-24 pt-6">
        <h2 id="products-heading" class="sr-only">Products</h2>

        <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
          <!-- Filters -->
          <form class="hidden lg:block">
            <h3 class="sr-only">Categories</h3>
            <ul role="list" class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
            @foreach($categoriesGiven as $cat)
              <li>
                <a href="products?category={{$cat->nama}}" class="font-bold">{{$cat->nama}}</a>
              </li>
              @endforeach
            </ul>

            <div class="border-b border-gray-200 py-6" x-data="{colorStated : false}">
              <h3 class="-my-3 flow-root">
                <!-- Expand/collapse section button -->
                <button @click="colorStated = !colorStated" type="button"
                  class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500"
                  aria-controls="filter-section-0" aria-expanded="false">
                  <span class="font-medium text-gray-900">Color</span>
                  <span class="ml-6 flex items-center">
                    <!-- Expand icon, show/hide based on section open state. -->
                    <svg x-show="!colorStated" class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                      data-slot="icon">
                      <path
                        d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                    </svg>
                    <!-- Collapse icon, show/hide based on section open state. -->
                    <svg x-show="colorStated" class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                      data-slot="icon">
                      <path fill-rule="evenodd"
                        d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                        clip-rule="evenodd" />
                    </svg>
                  </span>
                </button>
              </h3>
              <!-- Filter section, show/hide based on section state. -->
              <div x-show="colorStated" class="pt-6" id="filter-section-0">
                <div class="space-y-4">
                  <div class="flex items-center">
                    <input id="filter-color-0" name="color[]" value="Putih" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-color-0" class="ml-3 text-sm text-gray-600">Putih</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-color-1" name="color[]" value="Merah" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-color-1" class="ml-3 text-sm text-gray-600">Merah</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-color-2" name="color[]" value="Biru" type="checkbox" checked
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-color-2" class="ml-3 text-sm text-gray-600">Biru</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-color-3" name="color[]" value="Coklat" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-color-3" class="ml-3 text-sm text-gray-600">Coklat</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-color-4" name="color[]" value="Hijau" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-color-4" class="ml-3 text-sm text-gray-600">Hijau</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-color-5" name="color[]" value="Hitam" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-color-5" class="ml-3 text-sm text-gray-600">Hitam</label>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="border-b border-gray-200 py-6" x-data="{sizeStated : false}">
              <h3 class="-my-3 flow-root">
                <!-- Expand/collapse section button -->
                <button @click="sizeStated = !sizeStated" type="button"
                  class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500"
                  aria-controls="filter-section-2" aria-expanded="false">
                  <span class="font-medium text-gray-900">Size</span>
                  <span class="ml-6 flex items-center">
                    <!-- Expand icon, show/hide based on section open state. -->
                    <svg x-show="!sizeStated" class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                      data-slot="icon">
                      <path
                        d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                    </svg>
                    <!-- Collapse icon, show/hide based on section open state. -->
                    <svg x-show="sizeStated" class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                      data-slot="icon">
                      <path fill-rule="evenodd"
                        d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                        clip-rule="evenodd" />
                    </svg>
                  </span>
                </button>
              </h3>
              <!-- Filter section, show/hide based on section state. -->
              <div class="pt-6" id="filter-section-2" x-show="sizeStated">
                <div class="space-y-4">
                  <div class="flex items-center">
                    <input id="filter-size-0" name="size[]" value="XXL" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-size-0" class="ml-3 text-sm text-gray-600">XXL</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-size-1" name="size[]" value="XL" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-size-1" class="ml-3 text-sm text-gray-600">XL</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-size-2" name="size[]" value="L" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-size-2" class="ml-3 text-sm text-gray-600">L</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-size-3" name="size[]" value="M" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-size-3" class="ml-3 text-sm text-gray-600">M</label>
                  </div>
                  <div class="flex items-center">
                    <input id="filter-size-4" name="size[]" value="S" type="checkbox"
                      class="size-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="filter-size-4" class="ml-3 text-sm text-gray-600">S</label>
                  </div>
                </div>
              </div>
            </div>
            @if(request('category'))
              <input type="hidden" name = "category" value="{{request('category')}}">
            @endif

            <input type="submit" value="Apply" class="rounded-md px-3 py-2 text-sm font-medium mt-6 bg-gray-700 text-gray-300 hover:cursor-pointer hover:text-white hover:bg-gray-300 w-full">
          </form>
          

          <!-- Product grid -->
          <div class="lg:col-span-3">
            <main>
              <div class="mx-auto max-w-7xl px-4 py-0 sm:px-6 lg:px-8">
                <div class="bg-white">
                  <div class=" mx-auto max-w-2xl px-4 py-2 sm:px-6 sm:py-2 lg:max-w-7xl lg:px-8">
                    <div class="mb-6  mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8" x-data="{ Modal : false }">
                    @foreach ($productsGiven as $product)
                        <div class="group relative" x-data="{ Modal: false }">
                            <!-- Product Image -->
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                <img src="{{$product->image}}" alt="Product image" class="h-full w-full object-cover object-top lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a href="#">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            {{$product->nama}}
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">{{$product->warna}}</p>
                                </div>
                                <x-quickview :detail='$product' x-show="Modal" />

                                <p class="text-sm font-medium text-gray-900">Rp{{number_format($product->price,2,",",".")}}</p>
                            </div>
                            <div @click="Modal = !Modal" class="absolute inset-0 cursor-pointer"></div>
                        </div>
                    @endforeach
                    </div>
                    {{ $productsGiven->links() }}
                  </div>
                </div>

              </div>
            </main>
          </div>
        </div>
      </section>
    </main>
  </div>
</div>

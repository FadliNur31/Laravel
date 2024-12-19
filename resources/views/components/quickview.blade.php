<div class="relative z-10" role="dialog" aria-modal="true">
  <div 
  x-show = "Modal"
  x-transition:enter="ease-out duration-300"
  x-transition:enter-start="opacity-0" 
  x-transition:enter-end="opacity-100"
  x-transition:leave="ease-in duration-200" 
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  class="fixed inset-0 hidden bg-gray-500/75 transition-opacity md:block" aria-hidden="true"></div>

  <div class="fixed inset-0 z-10 w-screen overflow-y-auto" x-show = "Modal">
    <div class="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">
      <div 
      x-show = "Modal"
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0 translate-y-4 md:translate-y-0 md:scale-95" 
      x-transition:enter-end="opacity-100 translate-y-0 md:scale-100"
      x-transition:leave="ease-in duration-200" 
      x-transition:leave-start="opacity-100 translate-y-0 md:scale-100"
      x-transition:leave-end="opacity-0 translate-y-4 md:translate-y-0 md:scale-95"
      class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
        <div class="relative flex w-full items-center overflow-hidden bg-white px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
          <button type="button" class="absolute right-4 top-4 text-gray-400 hover:text-gray-500 sm:right-6 sm:top-8 md:right-6 md:top-6 lg:right-8 lg:top-8" @click = 'Modal = !Modal'>
            <span class="sr-only">Close</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>

          <div class="grid w-full grid-cols-1 items-start gap-x-6 gap-y-8 sm:grid-cols-12 lg:gap-x-8">
            <img src="{{$detail->image}}" alt="Two each of gray, white, and black shirts arranged on table." class="aspect-[2/3] w-full rounded-lg bg-gray-100 object-cover sm:col-span-4 lg:col-span-5">
            <div class="sm:col-span-8 lg:col-span-7">
              <h2 class="text-2xl font-bold text-gray-900 sm:pr-12">{{$detail->nama}}</h2>

              <section aria-labelledby="information-heading" class="mt-2">
                <h3 id="information-heading" class="sr-only">Product information</h3>

                <p class="text-2xl text-gray-900">Rp{{number_format($detail->price,2,",",".")}}</p>

                <!-- Reviews -->
                
              </section>

              <section aria-labelledby="options-heading" class="mt-10">
                <h3 id="options-heading" class="sr-only">Product options</h3>

                <form class="max-w-sm mx-auto" action="{{ route('cart.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <fieldset aria-label="Choose a color">
                    <legend class="text-sm font-medium text-gray-900">Color</legend>

                    <div class="mt-4 flex items-center space-x-3">
                      <!-- Active and Checked: "ring ring-offset-1" -->
                      <label aria-label="White" class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-400 focus:outline-none">
                        <span aria-hidden="true" class="size-8 rounded-full border border-black/10 bg-{{$detail->warna}}"></span>
                      </label>
                    </div>
                  </fieldset>

                  <!-- Sizes -->
                  <fieldset class="mt-10" aria-label="Choose a size">
                    <div class="flex items-center justify-between">
                      <div class="text-sm font-medium text-gray-900">Size</div>
                      <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size guide</a>
                    </div>

                    <div class="mt-4 grid grid-cols-4 gap-4">
                      <!-- Active: "ring-2 ring-indigo-500" -->
                      <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1">
                        <input type="radio" name="size-choice" value="XXS" class="sr-only">
                        <span>{{$detail->size}}</span>
                        <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                      </label>                      
                  </fieldset>
                    
                    <div class="mb-5">
                        <input type="hidden" name="product_id" value="{{$detail->id}}" class="block w-full p-4 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <button type="submit" class="mt-12 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add to bag</button>
                </form>

              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


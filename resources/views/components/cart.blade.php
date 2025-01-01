
<div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" >
  <div 
  x-show="slideOver"
  x-transition:enter="transition ease-out duration-500"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in duration-500"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

  <div 
  x-show="slideOver"
  class="fixed inset-0 overflow-hidden">
    <div 
    x-show="slideOver"
    class="absolute inset-0 overflow-hidden">
      <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
        <div
        x-show="slideOver"
        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full" 
        class="pointer-events-auto w-screen max-w-md">
          <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
              <div class="flex items-start justify-between">
                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                <div class="ml-3 flex h-7 items-center">
                  <button @click="slideOver = !slideOver" type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Close panel</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>

              <div class="mt-8">
                <div class="flow-root">
                  <ul role="list" class="-my-6 divide-y divide-gray-200">
                  @php($total_harga = 0) 
                    @foreach($cartItem as $c)
                    <li class="flex py-6">
                      <div class="size-24 shrink-0 overflow-hidden rounded-md border border-gray-200">
                        <img src="{{ filter_var($c->product->image, FILTER_VALIDATE_URL) ? $c->product->image : asset('storage/' . $c->product->image) }}" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="size-full object-cover object-top">
                      </div>
                      @php($total_harga += $c->product->price * $c->quantity)
                      <div class="ml-4 flex flex-1 flex-col">
                        <div>
                          <div class="flex justify-between text-base font-medium text-gray-900">
                            <h3>
                              <a href="#">{{ $c->product->nama }}</a>
                            </h3>
                            <p class="ml-4">Rp{{ number_format($c->product->price,2,",",".") }}</p>
                          </div>
                          <p class="mt-1 text-sm text-gray-500">{{ $c->product->warna }}</p>
                        </div>
                        <div class="flex flex-1 items-end justify-between text-sm">
                          <p class="text-gray-500">{{ $c->quantity }}</p>

                          <div class="flex">
                          <form action="{{route('cart.destroy', $c->id)}}" method="POST" >
                              @csrf
                              @method('DELETE')    
                              <button type="submit" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </li>
                   @endforeach
                  </ul>
                </div>
              </div>
            </div>

            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
              <div class="flex justify-between text-base font-medium text-gray-900">
                <p>Subtotal</p>
                <p>Rp{{number_format($total_harga,2,",",".")}}</p>
              </div>
              <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
              <div class="mt-6">
                <a href="{{route('cart.index')}}" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
              </div>
              <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                <p>
                  or
                  <button @click="slideOver = !slideOver" type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Continue Shopping
                    <span aria-hidden="true"> &rarr;</span>
                  </button>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

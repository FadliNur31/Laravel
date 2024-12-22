<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
<x-navbar-h></x-navbar-h>
<section class="py-24 relative">
        <div class="w-full max-w-7xl mx-auto px-4 md:px-8">
            <h2 class="font-manrope font-extrabold text-3xl lead-10 text-black mb-9">Order History</h2>

            <div class="flex sm:flex-col lg:flex-row sm:items-center justify-between">
                <ul class="flex max-sm:flex-col sm:items-center gap-x-14 gap-y-3">
                    <li
                        class="font-medium text-lg leading-8 cursor-pointer text-indigo-600 transition-all duration-500 hover:text-indigo-600">
                        All Order</li>
                </ul>
                
            </div>
            
            @foreach($checkouts as $c)
            <div class="mt-7 border border-gray-300 pt-9">
                <div class="flex max-md:flex-col items-center justify-between px-3 md:px-11">
                    <div class="data">
                        
                        <p class="font-medium text-lg leading-8 text-black whitespace-nowrap">Order : #{{$c->id}}</p>
                        <p class="font-medium text-lg leading-8 text-black mt-3 whitespace-nowrap">Order Payment : {{$c->created_at}} </p>
                    </div>
                    <div class="flex items-center gap-3 max-md:mt-5">
                        <a href="{{route('report.show', $c->id)}}">
                            <button
                                class="rounded-full px-7 py-3 bg-white text-gray-900 border border-gray-300 font-semibold text-sm shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:bg-gray-50 hover:border-gray-400">Show
                                Invoice</button>
                        </a>

                    </div>
                </div>
                
                @foreach($c->cart_details as $cs)
                <div class="flex max-lg:flex-col items-center gap-8 lg:gap-24 px-3 md:px-11 my-5">
                    <div class="grid grid-cols-4 w-full">
                        <div>
                            <h6 class="font-manrope font-semibold text-2xl leading-9 text-black mb-3 whitespace-nowrap">
                                {{$cs['nama']}}</h6>
                            <div class="flex items-center max-sm:flex-col gap-x-10 gap-y-3">
                                <span class="font-normal text-lg leading-8 text-gray-500 whitespace-nowrap">Size:
                                {{$cs['size']}}</span>
                                <span class="font-normal text-lg leading-8 text-gray-500 whitespace-nowrap">Qty:
                                {{$cs['quantity']}}</span>
                                <p class="font-semibold text-xl leading-8 text-black whitespace-nowrap">Price Rp{{number_format($cs['price'],2,",",".")}}</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="flex items-center justify-around w-full sm:pl-28 lg:pl-0">
                        <div class="flex flex-col justify-center items-start max-sm:items-center">
                            <p class="font-normal text-lg text-gray-500 leading-8 mb-2 text-left whitespace-nowrap">
                                Status</p>
                            <p class="font-semibold text-lg leading-8 {{$c->approval == 'approved' ? 'text-green-500' : 'text-yellow-500'}} text-left whitespace-nowrap">
                                {{ $c->approval == 'approved' ? 'Dikirim' : 'Pending' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <svg class="mt-9 w-full" xmlns="http://www.w3.org/2000/svg" width="1216" height="2" viewBox="0 0 1216 2"
                    fill="none">
                    <path d="M0 1H1216" stroke="#D1D5DB" />
                </svg>

                <div class="px-3 md:px-11 flex items-center justify-between max-sm:flex-col-reverse">
                    <div class="flex max-sm:flex-col-reverse items-center">
                        <button
                            class="flex items-center gap-3 py-10 pr-8 sm:border-r border-gray-300 font-normal text-xl leading-8 text-gray-500 group transition-all duration-500 hover:text-indigo-600">
                        </button>
                        <p class="font-normal text-xl leading-8 text-gray-500 sm:pl-8">Payment Is Succesfull</p>
                    </div>
                    <p class="font-medium text-xl leading-8 text-black max-sm:py-4"> <span class="text-gray-500">Total
                            Price: </span> &nbsp; Rp{{number_format($c->total_harga,2,",",".")}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
                                            
</body>
</html>
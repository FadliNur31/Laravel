<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
</head>
<body>
    
</body>
</html>
<div class="bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
    <h1 class="font-bold text-2xl my-4 text-center text-blue-600">Batik Boutique</h1>
    <hr class="mb-2">
    <div class="flex justify-between mb-6">
        <h1 class="text-lg font-bold">Invoice</h1>
        <div class="text-gray-700">
            <div>Date: {{$checkout->user->created_at}}</div>
            <div>Invoice #:{{$checkout->user->id}} 1 {{$checkout->id}} </div>
        </div>
    </div>
    <div class="mb-8">
        <h2 class="text-lg font-bold mb-4">Bill To:</h2>
        <div class="text-gray-700 mb-2">{{$checkout->user->name}}</div>
        <div class="text-gray-700 mb-2">{{$checkout->user->alamat}}</div>
        <div class="text-gray-700">{{$checkout->user->email}}</div>
    </div>
    <table class="w-full mb-8">
        <thead>
            <tr>
                <th class="text-left font-bold text-gray-700">Description</th>
                <th class="text-right font-bold text-gray-700">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($checkout->cart_details as $cs)
                <tr>
                    <td class="text-left text-gray-700">{{$cs['nama']}}</td>
                    <td class="text-right text-gray-700">Rp{{number_format($cs['price'],2,",",".")}}</td>
                </tr>    
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td class="text-left font-bold text-gray-700">Total</td>
                <td class="text-right font-bold text-gray-700">Rp{{number_format($checkout->total_harga,2,",",".")}}</td>
            </tr>
        </tfoot>
    </table>
    <div class="text-gray-700 mb-2">Thank you for your order!</div>
    <div class="text-gray-700 text-sm">Please remit payment within 30 days.</div>
</div>
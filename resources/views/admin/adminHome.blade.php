<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
</head>
<body>
    <x-sidebar></x-sidebar>
    <div class="p-4 sm:ml-64">
    <div class="p-4">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 mb-5">Products</h1>
        <a href="{{route('products.create')}}" type="button" class="text-white mb-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >+ Tambah produk</a>
        <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @foreach ($products as $product)
        <div class="group">
            <img src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : asset('storage/' . $product->image) }}" alt="{{ $product->nama }}" class="aspect-square w-full rounded-lg bg-gray-200 object-cover object-top hover:opacity-75 xl:aspect-[7/8] hover:cursor-pointer ">
            <h3 class="ms-3 mt-4 text-sm text-gray-700">{{ $product->nama }}</h3>
            <p class="ms-3 mt-1 text-lg font-medium text-gray-900">Rp{{number_format($product->price,2,",",".")}}</p>
            <div class="flex ms-3">
                <a href="{{route('products.edit', $product->id)}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                <form action="{{route('products.destroy', $product->id)}}" method="POST" >
                    @csrf
                    @method('DELETE')    
                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                </form>
            </div>
        </div>           
        @endforeach
    </div>
    </div>
</div>


</body>
</html>
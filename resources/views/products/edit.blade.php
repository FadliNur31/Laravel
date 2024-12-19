<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
</head>
<body> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h1 class="text-4xl font-bold tracking-tight text-white mb-5 mt-5">Edit Produk</h1>
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')                         
                        <div class="mb-5">
                            <label for="nama" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Nama Produk</label>
                            <input type="text" value="{{ old('title', $product->nama) }}" name="nama" id="nama" class="block w-full p-4 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('nama')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="stok" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Stok</label>
                            <input type="text" value="{{ old('title', $product->stock) }}" name="stok" id="stok" class="block w-full p-4 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('stok')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="price" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Harga</label>
                            <input type="text" value="{{ old('title', $product->price) }}" name="price" id="price" class="block w-full p-4 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('price')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="warna" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Warna</label>
                            <input type="text" value="{{ old('title', $product->warna) }}" name="warna" id="warna" class="block w-full p-4 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('warna')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="image" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Link Gambar</label>
                            <input type="text" value="{{ old('title', $product->image) }}" name="image" id="image" class="block w-full p-4 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('image')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="size" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Ukuran</label>
                            <input type="text" value="{{ old('title', $product->size) }}" name="size" id="size" class="block w-full p-4 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('size')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="category_id" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Kategori</label>
                            <select name="category_id" class="w-full form-select rounded-md shadow-sm @error('category_id') border border-red-500 @enderror">
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>                                    
                        <div>
                            <x-secondary-button type="submit">Save</x-secondary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 


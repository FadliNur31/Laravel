<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Categories</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
</head>
<body>
<div class="py-12 ">
        <div class="w-3/4 mx-auto sm:max-w-xl sm:px-6 lg:px-8 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h1 class="text-4xl font-bold tracking-tight text-white mb-5 mt-5">Edit Kategori</h1>
                <form class="max-w-sm mx-auto" action="{{ route('category.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        @method('PUT')                         
                        <div class="mb-5">
                            <label for="nama" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Nama Kategori</label>
                            <input type="text" value="{{ old('title', $categories->nama) }}" name="nama" id="nama" class="block w-full p-4 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('nama')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    <div>
                            <x-secondary-button class="mb-3 " type="submit">Save</x-secondary-button>
                    </div>
                </form>
            </div>
    </div>
</body>
</html>
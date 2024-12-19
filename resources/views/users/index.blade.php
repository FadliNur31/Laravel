<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
</head>
<body class="p-10">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $cat)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$cat->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$cat->email}}
                    </td>
                    <td class="px-6 py-4 text-right flex justify-end">
                        <form action="{{route('user.destroy', $cat->id)}}" method="POST" >
                            @csrf
                            @method('DELETE')    
                            <button type="submit" class="font-medium  dark:text-red-900 hover:underline ms-3" onclick="return confirm('Are you sure you want to delete this data?')">Hapus</button>
                        </form>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>


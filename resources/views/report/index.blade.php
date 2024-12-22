<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
</head>
<body class="p-10">
<h1 class="text-4xl font-bold tracking-tight text-gray-900 mb-5">Laporan Pemasukan</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID Checkout
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pembeli
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat Pengiriman
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Checkout
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Approval
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checkout as $c)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$c->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$c->user->name}}
                    </td>
                    <td class="px-6 py-4">
                        Rp{{number_format($c->total_harga,2,",",".")}}
                    </td>
                    <td class="px-6 py-4">
                        {{$c->user->alamat}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('report.show', $c->id)}}"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Detail</a>
                    </td>
                    <td class="px-6 py-4">
                        {{$c->user->created_at}}
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{route('report.update', $c->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="approval" class="form-select border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" onchange="this.form.submit()">
                                <option value="not_approved" {{ $c->approval === 'not_approved' ? 'selected' : '' }}>Not Approved</option>
                                <option value="approved" {{ $c->approval === 'approved' ? 'selected' : '' }} >Approved</option>
                            </select>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>


@extends('layouts.global')
@section('title')
    Data Pekerjaan - Admin
@endsection

@section('content')
    <div class="w-full h-full flex">
        @include('components.sidebar')
        <div class="w-full flex flex-col bg-slate-100">
            @include('components.header')

            <div class="h-full m-4 p-8 bg-white rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4">Data Pelamar</p>
                <hr><br>
                <div class="w-full h-auto flex justify-end">
                    {{-- <button class="px-4 py-2 bg-green-600 rounded-md text text-white">Tambah</button> --}}
                </div><br>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alamat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    No Telepon
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pengalaman Kerja
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pendidikan Terakhir
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Keterampilan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelamar as $index => $item)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ ++$index }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->nama_pelamar }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->alamat }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->nomor_telepon }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->pengalaman_kerja }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->pendidikan_terakhir }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->keterampilan }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-full h-auto">
                                            <button class="px-4 py-2 bg-yellow-300 rounded-md text">Edit</button>
                                            <button class="px-4 py-2 bg-red-600 rounded-md text text-white">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

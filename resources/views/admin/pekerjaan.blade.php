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
                <p class="text-4xl font-bold mb-4">Data Pekerjaan</p>
                <hr><br>
                <div class="w-full h-auto flex justify-end">
                    <a href="{{ route('admin.add') }}"class="px-4 py-2 bg-green-600 rounded-md text text-white">Tambah</a>
                </div>
                <br>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Id Pekerjaan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Posisi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Lokasi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    gaji
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Posting
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pekerjaan as $pkj)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $pkj->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $pkj ->id_pekerjaan }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pkj ->posisi }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pkj ->deskripsi }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pkj ->lokasi }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pkj ->gaji }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pkj ->tanggal_posting }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-full h-auto">
                                            <a href="{{ route('admin.edit', $pkj->id) }}" class="p-2 bg-yellow-300 rounded-md hover:bg-yellow-400">Edit</a>
                                            <form action="{{route('admin.delete', $pkj->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="px-6 py-2 bg-red-600 rounded-md text text-white" onclick="return confirm('Yakin Hapus Data')">Hapus</button>
                                            </form>
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

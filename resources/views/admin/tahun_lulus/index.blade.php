@extends('layouts.admin')

@section('title', 'Daftar Tahun Lulus')

@section('content')
<!-- @if(session('success'))
    <div class="alert alert-success fade show" role="alert" style="animation: fadeIn 0.5s;">
        {{ session('success') }}
    </div>
@endif -->

@if(session('error'))
    <div class="alert alert-danger fade show" role="alert" style="animation: fadeIn 0.5s; mt-5">
        {{ session('error') }}
    </div>
@endif
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<div class="container mx-auto mt-4">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Tahun Lulus</h1>
    <a href="{{ route('admin.tahun_lulus.create') }}" class="btn btn-primary mb-4 transition duration-300 ease-in-out transform hover:scale-105"><i class="fa fa-plus mr-2"></i>Tambah Tahun Lulus</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left text-gray-600">No</th>
                    <th class="py-3 px-4 text-left text-gray-600">Tahun Lulus</th>
                    <th class="py-3 px-4 text-left text-gray-600">Keterangan</th>
                    <th class="py-3 px-4 text-left text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tahun_lulus as $tahun)
                    <tr class="transition duration-300 ease-in-out transform hover:bg-gray-200 text-center">
                        <td>{{ $loop->iteration }}</td>
                        
                        <td class="py-3 px-4 border-b border-gray-200">{{ $tahun->tahun_lulus }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $tahun->keterangan }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">
                            <a href="{{ route('admin.tahun_lulus.edit', $tahun->id_tahun_lulus) }}" class="btn btn-warning transition duration-300 ease-in-out transform hover:scale-105"> <i class="fa fa-edit"></i>Edit</a>
                            <form action="{{ route('admin.tahun_lulus.destroy', $tahun->id_tahun_lulus) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger transition duration-300 ease-in-out transform hover:scale-105" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"> <i class="fa fa-trash"></i>Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
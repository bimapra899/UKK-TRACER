@extends('layouts.admin')

@section('title', 'Daftar Tahun Lulus')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Tahun Lulus</h1>

        <a href="{{ route('admin.tahun_lulus.create') }}" class="btn btn-primary mb-3">Tambah Tahun Lulus</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tahun_lulus as $tahun)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tahun->tahun_lulus }}</td>
                        <td>
                            <a href="{{ route('admin.tahun_lulus.edit', $tahun->id_tahun_lulus) }}" 
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.tahun_lulus.destroy', $tahun->id_tahun_lulus) }}" 
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Data tidak tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

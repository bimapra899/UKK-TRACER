@extends('layouts.admin')

@section('title', 'Daftar Program Keahlian')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Program Keahlian</h1>

        <!-- Success Message
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif -->

        <a href="{{ route('admin.program_keahlian.create') }}" class="btn btn-primary mb-3">Tambah Program Keahlian</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bidang Keahlian</th>
                    <th>Kode Program Keahlian</th>
                    <th>Nama Program Keahlian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($programKeahlian as $program)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $program->bidangKeahlian->bidang_keahlian ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $program->kode_program_keahlian }}</td>
                        <td>{{ $program->program_keahlian }}</td>
                        <td>
                            <a href="{{ route('admin.program_keahlian.edit', $program->id_program_keahlian) }}" 
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.program_keahlian.delete', $program->id_program_keahlian) }}" 
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
                        <td colspan="5" class="text-center">Data tidak tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

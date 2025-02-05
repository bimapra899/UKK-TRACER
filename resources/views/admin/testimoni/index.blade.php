@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mt-4">Daftar Testimoni</h2>
    <a href="{{ route('admin.home') }}" class="btn btn-secondary mb-3">
            <i class="fas fa-arrow-left mb-1"></i> Kembali
        </a>

    <!-- Flash message
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif -->

    <!-- <a href="{{ route('admin.testimoni.create') }}" class="btn btn-primary mb-3">Tambah Testimoni</a> -->

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Pesan</th>
                </tr>
        </thead>
        <tbody>
            @forelse($testimonis as $index => $testimoni)
            <tr>
                <td>{{ $loop->iteration + ($testimonis->currentPage() - 1) * $testimonis->perPage() }}</td>
                <td>{{ $testimoni->alumni->nama_depan }} {{ $testimoni->alumni->nama_belakang }}</td>
                <td>{{ $testimoni->testimoni }}</td>
             

                    <!-- <a href="{{ route('admin.testimoni.edit', $testimoni->id_alumni) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.testimoni.destroy', $testimoni->id_alumni) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus testimoni ini?')">Hapus</button>
                    </form> -->
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada testimoni.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $testimonis->links() }}
</div>
@endsection

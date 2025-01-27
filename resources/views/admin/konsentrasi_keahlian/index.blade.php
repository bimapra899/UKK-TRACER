@extends('layouts.admin')

@section('title', 'Daftar Konsentrasi Keahlian')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Konsentrasi Keahlian</h1>
 
        <!-- @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif -->

        <a href="{{ route('admin.konsentrasi_keahlian.create') }}" class="btn btn-primary mb-3">Tambah Konsentrasi Keahlian</a>
 
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Program Keahlian</th>
                    <th>Kode Konsentrasi Keahlian</th>
                    <th>Nama Konsentrasi Keahlian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($konsentrasiKeahlian as $konsentrasi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $konsentrasi->programKeahlian->program_keahlian ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $konsentrasi->kode_konsentrasi_keahlian }}</td>
                        <td>{{ $konsentrasi->konsentrasi_keahlian }}</td>
                        <td>
                            <a href="{{ route('admin.konsentrasi_keahlian.edit', $konsentrasi->id_konsentrasi_keahlian) }}" 
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.konsentrasi_keahlian.delete', $konsentrasi->id_konsentrasi_keahlian) }}" 
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

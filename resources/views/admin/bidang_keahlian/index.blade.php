@extends('layouts.admin')

@section('title', 'Daftar Bidang Keahlian')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Bidang Keahlian</h1>

        <!-- <p class="mb-3">Kode bidang keahlian: 
            <span>RPL : 098</span>,
            <span>TPM : 097</span>,
            <span>TKR : 096</span>
        </p> -->

        <a href="{{ route('admin.bidang_keahlian.create') }}" class="btn btn-primary mb-3">Tambah Bidang Keahlian</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Bidang Keahlian</th>
                    <th>Nama Bidang Keahlian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bidangKeahlians as $bidang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bidang->kode_bidang_keahlian }}</td>
                        <td>{{ $bidang->bidang_keahlian }}</td>
                        <td>
                            <a href="{{ route('admin.bidang_keahlian.edit', $bidang->id_bidang_keahlian) }}" 
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.bidang_keahlian.destroy', $bidang->id_bidang_keahlian) }}" 
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
                        <td colspan="4" class="text-center">Data tidak tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

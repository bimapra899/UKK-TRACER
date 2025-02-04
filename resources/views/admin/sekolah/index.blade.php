@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Data Profil Sekolah</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(!$sekolah)
                        <a href="{{ route('admin.sekolah.create') }}" class="btn btn-primary mb-3">Tambah Data Sekolah</a>
                    @endif

                    @if($sekolah)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>NPSN</th>
                                    <td>{{ $sekolah->npsn }}</td>
                                </tr>
                                <tr>
                                    <th>NSS</th>
                                    <td>{{ $sekolah->nss }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Sekolah</th>
                                    <td>{{ $sekolah->nama_sekolah }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $sekolah->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>No. Telepon</th>
                                    <td>{{ $sekolah->no_telp }}</td>
                                </tr>
                                <tr>
                                    <th>Website</th>
                                    <td>{{ $sekolah->website ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $sekolah->email }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('admin.sekolah.edit', $sekolah) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.sekolah.destroy', $sekolah) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    @else
                        <p>Belum ada data sekolah.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 150px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil Sekolah</div>

                <div class="card-body">
                    @if($sekolah)
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Nama Sekolah</th>
                                    <td>{{ $sekolah->nama_sekolah }}</td>
                                </tr>
                                <tr>
                                    <th>NPSN</th>
                                    <td>{{ $sekolah->npsn }}</td>
                                </tr>
                                <tr>
                                    <th>NSS</th>
                                    <td>{{ $sekolah->nss }}</td>
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
                    @else
                        <p>Data profil sekolah belum tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Alumni</h1>
        <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary mt-3">
            <i class="fas fa-arrow-left mb-2"></i> Kembali
        </a>
    </div>

    <div class="row">
        <!-- Data Pribadi -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pribadi</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="30%">Nama Lengkap</th>
                            <td>{{ $alumni->nama_depan }} {{ $alumni->nama_belakang }}</td>
                        </tr>
                        <tr>
                            <th>NISN</th>
                            <td>{{ $alumni->nisn }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>{{ $alumni->nik }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $alumni->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th>Tempat, Tgl Lahir</th>
                            <td>{{ $alumni->tempat_lahir }}, {{ $alumni->tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $alumni->alamat }}</td>
                        </tr>
                        <!-- <tr>
                            <th>Konsentrasi Keahlian</th>
                            <td>{{ $alumni->konsentrasiKeahlian->konsentrasi_keahlian ?? '-' }}</td>
                        </tr> -->
                        <tr>
                            <th>Tahun Lulus</th>
                            <td>{{ $alumni->tahunLulus->tahun_lulus ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>No hp</th>
                            <td>{{ $alumni->no_hp }}</td>
                        </tr>
                        <tr>
                            <th>Akun fb</th>
                            <td>{{ $alumni->akun_fb }}</td>
                        </tr>
                        <tr>
                            <th>Akun ig</th>
                            <td>{{ $alumni->akun_ig }}</td>
                        </tr>
                        <tr>
                            <th>Akun Tiktok</th>
                            <td>{{ $alumni->akun_tiktok }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Data Tracer -->
        <div class="col-xl-6 col-lg-6">
            @if($alumni->tracerKerja)
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Data Pekerjaan</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="30%">Pekerjaan</th>
                            <td>{{ $alumni->tracerKerja->tracer_kerja_pekerjaan }}</td>
                        </tr>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <td>{{ $alumni->tracerKerja->tracer_kerja_nama }}</td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td>{{ $alumni->tracerKerja->tracer_kerja_jabatan }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $alumni->tracerKerja->tracer_kerja_status }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $alumni->tracerKerja->tracer_kerja_lokasi }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Lengkap</th>
                            <td>{{ $alumni->tracerKerja->tracer_kerja_alamat }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Bekerja</th>
                            <td>{{ $alumni->tracerKerja->tracer_kerja_tgl_mulai }}</td>
                        </tr>
                        <tr>
                            <th>Gaji</th>
                            <td>{{ $alumni->tracerKerja->tracer_kerja_gaji }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            @endif

            @if($alumni->tracerKuliah)
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Data Kuliah</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="30%">Kampus</th>
                            <td>{{ $alumni->tracerKuliah->tracer_kuliah_kampus }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $alumni->tracerKuliah->tracer_kuliah_status }}</td>
                        </tr>
                        <tr>
                            <th>Jenjang</th>
                            <td>{{ $alumni->tracerKuliah->tracer_kuliah_jenjang }}</td>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <td>{{ $alumni->tracerKuliah->tracer_kuliah_jurusan }}</td>
                        </tr>
                        <tr>
                            <th>Linear</th>
                            <td>{{ $alumni->tracerKuliah->tracer_kuliah_linier }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $alumni->tracerKuliah->tracer_kuliah_alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Testimoni -->
    @if($alumni->testimoni->isNotEmpty())
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">Testimoni</h6>
                </div>
                <div class="card-body">
                    @foreach($alumni->testimoni as $testimoni)
                    <div class="border-bottom pb-3 mb-3">
                        <p class="mb-1">{{ $testimoni->testimoni }}</p>
                        <small class="text-muted">{{ $testimoni->tgl_testimoni->diffForHumans() }}</small>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection 
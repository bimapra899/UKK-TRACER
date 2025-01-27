@extends('layouts.user')

@section('content')
<section class="register-alumni" style="margin-top: 100px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Registrasi Alumni</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('alumni.store') }}">
                            @csrf
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">NISN</label>
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" required>
                                    @error('nisn')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required>
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nama Depan</label>
                                    <input type="text" class="form-control" name="nama_depan" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nama Belakang</label>
                                    <input type="text" class="form-control" name="nama_belakang" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" name="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tahun Lulus</label>
                                    <select class="form-select" name="id_tahun_lulus" required>
                                        <option value="">Pilih Tahun Lulus</option>
                                        @foreach($tahunLulus as $tahun)
                                            <option value="{{ $tahun->id_tahun_lulus }}">{{ $tahun->tahun_lulus }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Konsentrasi Keahlian</label>
                                <select class="form-select" name="id_konsentrasi_keahlian" required>
                                    <option value="">Pilih Konsentrasi Keahlian</option>
                                    @foreach($konsentrasiKeahlian as $konsentrasi)
                                        <option value="{{ $konsentrasi->id_konsentrasi_keahlian }}">{{ $konsentrasi->konsentrasi_keahlian }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status Alumni</label>
                                <select class="form-select" name="id_status_alumni" required>
                                    <option value="">Pilih Status Alumni</option>
                                    @foreach($statusAlumni as $status)
                                        <option value="{{ $status->id_status_alumni }}">{{ $status->status }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No. HP</label>
                                <input type="text" class="form-control" name="no_hp" required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Akun Facebook</label>
                                    <input type="text" class="form-control" name="akun_fb">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Akun Instagram</label>
                                    <input type="text" class="form-control" name="akun_ig">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Akun TikTok</label>
                                    <input type="text" class="form-control" name="akun_tiktok">
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 
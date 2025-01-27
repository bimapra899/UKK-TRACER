@extends('layouts.user')

@section('content')
<section class="section" style="margin-top: 100px;">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Kuesioner Alumni</h5>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('kuesioner.store') }}">
                            @csrf

                            <!-- Tracer Kerja Section -->
                            <div class="mb-4">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="is_kerja" name="is_kerja" onchange="toggleKerjaForm()">
                                    <label class="form-check-label" for="is_kerja">
                                        Saya sudah/sedang bekerja
                                    </label>
                                </div>

                                <div id="kerjaForm" style="display: none;">
                                    <h6 class="mb-3">Data Pekerjaan</h6>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Pekerjaan</label>
                                            <input type="text" class="form-control" name="tracer_kerja_pekerjaan">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Nama Perusahaan</label>
                                            <input type="text" class="form-control" name="tracer_kerja_nama">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Jabatan</label>
                                            <input type="text" class="form-control" name="tracer_kerja_jabatan">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Status Kepegawaian</label>
                                            <select class="form-select" name="tracer_kerja_status">
                                                <option value="Tetap">Tetap</option>
                                                <option value="Kontrak">Kontrak</option>
                                                <option value="Freelance">Freelance</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Lokasi</label>
                                            <input type="text" class="form-control" name="tracer_kerja_lokasi">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Alamat Lengkap</label>
                                            <input type="text" class="form-control" name="tracer_kerja_alamat">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Tanggal Mulai Bekerja</label>
                                            <input type="date" class="form-control" name="tracer_kerja_tgl_mulai">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Gaji/Bulan</label>
                                            <select class="form-select" name="tracer_kerja_gaji">
                                                <option value="< 1 Juta">< 1 Juta</option>
                                                <option value="1 - 3 Juta">1 - 3 Juta</option>
                                                <option value="3 - 5 Juta">3 - 5 Juta</option>
                                                <option value="> 5 Juta">> 5 Juta</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tracer Kuliah Section -->
                            <div class="mb-4">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="is_kuliah" name="is_kuliah" onchange="toggleKuliahForm()">
                                    <label class="form-check-label" for="is_kuliah">
                                        Saya sedang kuliah
                                    </label>
                                </div>

                                <div id="kuliahForm" style="display: none;">
                                    <h6 class="mb-3">Data Kuliah</h6>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Nama Kampus</label>
                                            <input type="text" class="form-control" name="tracer_kuliah_kampus">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Status Kampus</label>
                                            <select class="form-select" name="tracer_kuliah_status">
                                                <option value="Negeri">Negeri</option>
                                                <option value="Swasta">Swasta</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Jenjang</label>
                                            <select class="form-select" name="tracer_kuliah_jenjang">
                                                <option value="D3">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Jurusan</label>
                                            <input type="text" class="form-control" name="tracer_kuliah_jurusan">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Linearitas dengan SMK</label>
                                            <select class="form-select" name="tracer_kuliah_linier">
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Alamat Kampus</label>
                                            <input type="text" class="form-control" name="tracer_kuliah_alamat">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimoni Section -->
                            <div class="mb-4">
                                <h6 class="mb-3">Testimoni</h6>
                                <div class="form-group">
                                    <label class="form-label">Berikan testimoni Anda tentang pengalaman selama di SMK</label>
                                    <textarea class="form-control" name="testimoni" rows="4" required></textarea>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit Kuesioner</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function toggleKerjaForm() {
    const isChecked = document.getElementById('is_kerja').checked;
    document.getElementById('kerjaForm').style.display = isChecked ? 'block' : 'none';
}

function toggleKuliahForm() {
    const isChecked = document.getElementById('is_kuliah').checked;
    document.getElementById('kuliahForm').style.display = isChecked ? 'block' : 'none';
}
</script>
@endpush
@endsection
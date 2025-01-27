@extends('layouts.admin')

@section('title', 'Tambah Konsentrasi Keahlian')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Konsentrasi Keahlian</h1>
        <form action="{{ route('admin.konsentrasi_keahlian.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="program_keahlian">Program Keahlian</label>
                <select name="id_program_keahlian" id="program_keahlian" class="form-control">
                    <option value="" disabled selected>Pilih Program Keahlian</option>
                    @foreach($programKeahlian as $program)
                        <option value="{{ $program->id_program_keahlian }}">{{ $program->program_keahlian }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="kode">Kode Konsentrasi Keahlian</label>
                <input type="text" name="kode_konsentrasi_keahlian" id="kode" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="nama">Nama Konsentrasi Keahlian</label>
                <input type="text" name="konsentrasi_keahlian" id="nama" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.konsentrasi_keahlian.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

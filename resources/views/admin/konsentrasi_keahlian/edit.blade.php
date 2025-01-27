@extends('layouts.admin')

@section('title', 'Edit Konsentrasi Keahlian')

@section('content')
    <div class="container mt-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <h1 class="text-center mb-4">Edit Konsentrasi Keahlian</h1>
        <form action="{{ route('admin.konsentrasi_keahlian.update', $konsentrasi->id_konsentrasi_keahlian) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="program_keahlian">Program Keahlian</label>
                <select name="id_program_keahlian" id="program_keahlian" class="form-control">
                    @foreach($programKeahlian as $program)
                        <option value="{{ $program->id_program_keahlian }}" 
                            {{ $program->id_program_keahlian == $konsentrasi->id_program_keahlian ? 'selected' : '' }}>
                            {{ $program->program_keahlian }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="kode">Kode Konsentrasi Keahlian</label>
                <input type="text" name="kode_konsentrasi_keahlian" id="kode" class="form-control" value="{{ $konsentrasi->kode_konsentrasi_keahlian }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="nama">Nama Konsentrasi Keahlian</label>
                <input type="text" name="konsentrasi_keahlian" id="nama" class="form-control" value="{{ $konsentrasi->konsentrasi_keahlian }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.konsentrasi_keahlian.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

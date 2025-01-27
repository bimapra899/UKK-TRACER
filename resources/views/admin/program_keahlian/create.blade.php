@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Tambah Program Keahlian</h1>

        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Tambah Program Keahlian -->
        <form action="{{ route('admin.program_keahlian.store') }}" method="POST">
            @csrf
            
            <div class="form-group mb-3">
                <label>Bidang Keahlian</label>
                <select name="id_bidang_keahlian" class="form-control" required>
                    <option value="">Pilih Bidang Keahlian</option>
                    @foreach($bidangKeahlian as $bidang)
                        <option value="{{ $bidang->id_bidang_keahlian }}">
                            {{ $bidang->bidang_keahlian }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Kode Program Keahlian</label>
                <input type="text" name="kode_program_keahlian" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Nama Program Keahlian</label>
                <input type="text" name="program_keahlian" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.program_keahlian.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

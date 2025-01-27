@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Tambah Bidang Keahlian</h1>

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

        <!-- Form Tambah Bidang Keahlian -->
        <form action="{{ route('admin.bidang_keahlian.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kode_bidang_keahlian" class="form-label">Kode Bidang Keahlian</label>
                <input type="text" class="form-control" id="kode_bidang_keahlian" name="kode_bidang_keahlian" placeholder="Masukkan kode bidang keahlian" required>
            </div>
            <div class="mb-3">
                <label for="bidang_keahlian" class="form-label">Bidang Keahlian</label>
                <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" placeholder="Masukkan bidang keahlian" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.bidang_keahlian.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

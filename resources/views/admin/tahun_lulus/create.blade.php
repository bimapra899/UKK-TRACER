@extends('layouts.admin')

@section('title', 'Tambah Tahun Lulus')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Tahun Lulus</h1>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.tahun_lulus.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="text" class="form-control" id="tahun" 
                       name="tahun" value="{{ old('tahun') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.tahun_lulus.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

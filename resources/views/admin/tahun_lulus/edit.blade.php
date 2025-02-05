@extends('layouts.admin')

@section('title', 'Edit Tahun Lulus')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Tahun Lulus</h1>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.tahun_lulus.update', $tahun_lulus->id_tahun_lulus) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="tahun_lulus" class="form-label">Tahun</label>
                <input type="text" class="form-control" id="tahun_lulus" 
                       name="tahun_lulus" value="{{ $tahun_lulus->tahun_lulus }}" required>
            </div>
            <div class="form-group mb-3">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ $tahun_lulus->keterangan }}" required>
                    </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.tahun_lulus.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

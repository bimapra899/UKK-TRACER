@extends('layouts.admin')

@section('title', 'Tambah Tahun Lulus')

@section('content')
<style>
    .animated-button {
        transition: all 0.3s transform 0.3s;
    }

    .animated-button:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }
</style>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">Tambah Tahun Lulus</h1>
            <div class="d-flex flex-column">
                <form action="{{ route('admin.tahun_lulus.store') }}" method="POST" class="flex-grow-1">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary animated-button">Simpan</button>
                        <a href="{{ route('admin.tahun_lulus.index') }}" class="btn btn-secondary animated-button">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
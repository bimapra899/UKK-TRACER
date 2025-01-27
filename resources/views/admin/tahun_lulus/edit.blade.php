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

        <form action="{{ route('admin.tahun_lulus.update', $tahun_lulus->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="text" class="form-control" id="tahun" 
                       name="tahun" value="{{ $tahun_lulus->tahun }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.tahun_lulus.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

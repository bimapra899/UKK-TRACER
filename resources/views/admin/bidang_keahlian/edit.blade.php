@extends('layouts.admin')

@section('title', 'Edit Bidang Keahlian')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Bidang Keahlian</h1>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.bidang_keahlian.update', $bidangKeahlian->id_bidang_keahlian) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kode_bidang_keahlian" class="form-label">Kode Bidang Keahlian</label>
                <input type="text" class="form-control" id="kode_bidang_keahlian" 
                       name="kode_bidang_keahlian" value="{{ $bidangKeahlian->kode_bidang_keahlian }}" required>
            </div>
            <div class="mb-3">
                <label for="bidang_keahlian" class="form-label">Nama Bidang Keahlian</label>
                <input type="text" class="form-control" id="bidang_keahlian" 
                       name="bidang_keahlian" value="{{ $bidangKeahlian->bidang_keahlian }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.bidang_keahlian.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

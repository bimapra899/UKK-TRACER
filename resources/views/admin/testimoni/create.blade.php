@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    
                
                <h2>Tambah Testimoni</h2>
                <form action="{{ route('admin.testimoni.store') }}" method="POST" class="animated-form">
                    @csrf
                    <div class="mb-3">
                        <label for="id_alumni" class="form-label"><i class="fas fa-user"></i> Alumni</label>
                        <select class="form-control" id="id_alumni" name="id_alumni" required>
                            @foreach($alumni as $a)
                                <option value="{{ $a->id_alumni }}">{{ $a->nama_depan }} {{ $a->nama_belakang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="testimoni" class="form-label"><i class="fas fa-comment"></i> Testimoni</label>
                        <textarea class="form-control" id="testimoni" name="testimoni" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_testimoni" class="form-label"><i class="fas fa-calendar"></i> Tanggal Testimoni</label>
                        <input type="date" class="form-control" id="tgl_testimoni" name="tgl_testimoni" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.testimoni.index') }}" class="btn btn-secondary ">
                     <i class="fas fa-arrow-left mb-1"></i> Kembali
                    </a>
                </form>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
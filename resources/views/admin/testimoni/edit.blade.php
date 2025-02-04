@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Testimoni</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimoni.update', $testimoni->id_testimoni) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                value="{{ old('name', $testimoni->alumni->nama_depan . ' ' . $testimoni->alumni->nama_belakang) }}" readonly>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="testimoni">Testimoni</label>
                            <textarea name="testimoni" class="form-control @error('testimoni') is-invalid @enderror" 
                                rows="4">{{ old('testimoni', $testimoni->testimoni) }}</textarea>
                            @error('testimoni')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- <div class="form-group mb-3">
                            <label for="image">Image</label>
                            @if($testimoni->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $testimoni->image) }}" alt="Current Image" style="max-width: 200px">
                                </div>
                            @endif
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            <small class="text-muted">Leave empty to keep current image</small>
                            @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div> -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.testimoni.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
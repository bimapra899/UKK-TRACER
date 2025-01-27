@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Edit Program Keahlian</h1>

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

        <!-- Form Edit Program Keahlian -->
        <form action="{{ route('admin.program_keahlian.update', $program->id_program_keahlian) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id_bidang_keahlian" class="form-label">Bidang Keahlian</label>
                <select class="form-select" id="id_bidang_keahlian" name="id_bidang_keahlian" required>
                    @foreach($bidangKeahlian as $bidang)
                    <option value="{{ $bidang->id_bidang_keahlian }}" 
                            {{ $bidang->id_bidang_keahlian == $program->id_bidang_keahlian ? 'selected' : '' }}>
                        {{ $bidang->bidang_keahlian }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="kode_program_keahlian" class="form-label">Kode Program Keahlian</label>
                <input type="text" class="form-control" id="kode_program_keahlian" 
                       name="kode_program_keahlian" value="{{ $program->kode_program_keahlian }}" required>
            </div>
            <div class="mb-3">
                <label for="program_keahlian" class="form-label">Nama Program Keahlian</label>
                <input type="text" class="form-control" id="program_keahlian" 
                       name="program_keahlian" value="{{ $program->program_keahlian }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.program_keahlian.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
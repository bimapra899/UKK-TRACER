@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Alumni</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Alumni</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Tahun Lulus</th>
                            <th>Konsentrasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumni as $data)
                        <tr>
                            <td>{{ $data->nama_depan }} {{ $data->nama_belakang }}</td>
                            <td>{{ $data->nisn }}</td>
                            <td>{{ $data->tahunLulus->tahun_lulus ?? '-' }}</td>
                            <td>{{ $data->konsentrasiKeahlian->nama_konsentrasi ?? '-' }}</td>
                            <td>
                                @if($data->tracerKerja)
                                    <span class="badge bg-success">Bekerja</span>
                                @elseif($data->tracerKuliah)
                                    <span class="badge bg-info">Kuliah</span>
                                @else
                                    <span class="badge bg-secondary">Belum Update</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.alumni.show', $data->id_alumni) }}" 
                                   class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $alumni->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endpush 
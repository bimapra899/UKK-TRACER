@extends('layouts.admin')

@section('styles')
    <style>
        .dropdown-menu {
            background-color: #495057;
        }
        .dropdown-item {
            color: #fff;
        }
        .dropdown-item:hover, .dropdown-item:focus {
            background-color: #007bff;
            color: #fff;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
    </style>
@endsection

@section('content')
    <h1 class="text-center mb-4 mt-3">Selamat Datang, Admin!</h1>
    <p class="text-center text-muted">Berikut adalah menu yang tersedia untuk pengelolaan sistem.</p>
    <div class="row justify-content-center">
        <!-- Alumni Management Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Alumni</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Alumni::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tracer Kerja Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Alumni Bekerja</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\TracerKerja::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tracer Kuliah Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Alumni Kuliah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\TracerKuliah::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Testimonial Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Testimoni</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Testimoni::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Alumni Activities -->
    <div class="row mt-4">
        <!-- Latest Registered Alumni -->
        <div class="col-xl-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Alumni Terbaru</h6>
                    <a href="{{ route('admin.alumni.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tahun Lulus</th>
                                    <!-- <th>Status</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\Alumni::with(['konsentrasiKeahlian'])->latest()->take(5)->get() as $alumni)
                                    <tr>
                                        <td>{{ $alumni->nama_depan }} {{ $alumni->nama_belakang }}</td>
                                        <td>{{ $alumni->tahunLulus->tahun_lulus ?? '-' }}</td>
                                        <!-- <td>
                                            @if($alumni->tracerKerja()->exists())
                                                <span class="badge badge-success">Bekerja</span>
                                            @elseif($alumni->tracerKuliah()->exists())
                                                <span class="badge badge-info">Kuliah</span>
                                            @else
                                                <span class="badge badge-secondary">Belum Update</span>
                                            @endif
                                        </td> -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Testimonials -->
        <div class="col-xl-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <a href="{{ route('admin.testimoni.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                    <h6 class="m-0 font-weight-bold text-warning">Testimoni Terbaru</h6>
                </div>
                <div class="card-body">
                    @foreach(\App\Models\Testimoni::with('alumni')->latest()->take(3)->get() as $testimoni)
                        <div class="border-bottom pb-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-bold">{{ $testimoni->alumni->nama_depan }} {{ $testimoni->alumni->nama_belakang }}</h6>
                                <small class="text-muted">{{ $testimoni->tgl_testimoni->diffForHumans() }}</small>
                            </div>
                            <p class="mb-0">{{ Str::limit($testimoni->testimoni, 100) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
 
    <div class="container">
    <div style="width: 300px; height: 300px; margin: auto; align-content: center;">
        <canvas id="pieChart"></canvas> <!-- Diagram ukuran kecil -->
    </div>

</div>

<!-- Tambahkan Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('pieChart').getContext('2d');

        var pieChart = new Chart(ctx, {
            type: 'pie', // Jenis chart: Pie Chart
            data: {
                labels: ['Total Alumni','alumni bekerja', 'alumni kuliah',], // Label data
                datasets: [{
                    label: 'Data Alumni',
                    data: [3,2,1, ], // Contoh data
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(51, 54, 56, 0.6)',
                        'rgba(71, 182, 43, 0.6)',
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Mengatur agar ukuran bisa diatur bebas
                plugins: {
                    legend: {
                        position: 'bottom' // Posisi legenda
                    }
                }
            }
        });
    });
</script>
@endsection

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
    <h1 class="text-center mb-4">Selamat Datang, Admin!</h1>
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
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\Alumni::with(['konsentrasiKeahlian'])->latest()->take(5)->get() as $alumni)
                                    <tr>
                                        <td>{{ $alumni->nama_depan }} {{ $alumni->nama_belakang }}</td>
                                        <td>{{ $alumni->tahunLulus->tahun_lulus ?? '-' }}</td>
                                        <td>
                                            @if($alumni->tracerKerja()->exists())
                                                <span class="badge badge-success">Bekerja</span>
                                            @elseif($alumni->tracerKuliah()->exists())
                                                <span class="badge badge-info">Kuliah</span>
                                            @else
                                                <span class="badge badge-secondary">Belum Update</span>
                                            @endif
                                        </td>
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
                    <h6 class="m-0 font-weight-bold text-warning">Testimoni Terbaru</h6>
                    <a href="{{ route('admin.testimoni') }}" class="btn btn-sm btn-warning">Lihat Semua</a>
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

    <!-- Statistics Charts -->
    <div class="row mt-4">
        <!-- Alumni per Tahun Chart -->
        <div class="col-xl-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik Alumni per Tahun</h6>
                </div>
                <div class="card-body">
                    <canvas id="alumniPerYearChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Employment Status Chart -->
        <div class="col-xl-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Status Alumni</h6>
                </div>
                <div class="card-body">
                    <canvas id="employmentStatusChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Debug: Let's first check if we're getting the data
    console.log('Chart Data:', {
        alumniYearData: {!! json_encode(\App\Models\TahunLulus::orderBy('tahun_lulus')->pluck('tahun_lulus')) !!},
        alumniCounts: {!! json_encode(\App\Models\TahunLulus::orderBy('tahun_lulus')
            ->get()
            ->map(function($tahun) {
                return $tahun->alumni()->count();
            })) !!},
        statusLabels: {!! json_encode(\App\Models\StatusAlumni::pluck('status')) !!},
        statusCounts: {!! json_encode(\App\Models\StatusAlumni::all()->map(function($status) {
            return \App\Models\Alumni::where('id_status_alumni', $status->id_status_alumni)->count();
        })) !!}
    });

    // Wait for DOM to be ready
    window.addEventListener('load', function() {
        try {
            // Alumni per Year Chart
            const alumniYearCtx = document.getElementById('alumniPerYearChart');
            if (!alumniYearCtx) {
                console.error('Cannot find alumniPerYearChart canvas element');
                return;
            }

            new Chart(alumniYearCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode(\App\Models\TahunLulus::orderBy('tahun_lulus')->pluck('tahun_lulus')) !!},
                    datasets: [{
                        label: 'Jumlah Alumni',
                        data: {!! json_encode(\App\Models\TahunLulus::orderBy('tahun_lulus')
                            ->get()
                            ->map(function($tahun) {
                                return $tahun->alumni()->count();
                            })) !!},
                        backgroundColor: 'rgba(78, 115, 223, 0.5)',
                        borderColor: 'rgba(78, 115, 223, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Employment Status Chart
            const employmentCtx = document.getElementById('employmentStatusChart');
            if (!employmentCtx) {
                console.error('Cannot find employmentStatusChart canvas element');
                return;
            }

            new Chart(employmentCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode(\App\Models\StatusAlumni::pluck('status')) !!},
                    datasets: [{
                        data: {!! json_encode(\App\Models\StatusAlumni::all()->map(function($status) {
                            return \App\Models\Alumni::where('id_status_alumni', $status->id_status_alumni)->count();
                        })) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(40, 167, 69, 0.8)',
                            'rgba(255, 205, 86, 0.8)',
                            'rgba(23, 162, 184, 0.8)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        } catch (error) {
            console.error('Error creating charts:', error);
        }
    });
</script>
@endsection

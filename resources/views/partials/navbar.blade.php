<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="{{ route('home') }}">
      <!-- <img src="assets/img/logo.png" alt="Logo" height="40"> -->
      <h1 class="h4 mb-0">Tracer Study</h1>
    </a>

    <!-- Tombol Toggle untuk Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu Navigasi -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::routeIs('sekolah.profile') ? 'active' : '' }}" href="{{ route('sekolah.profile') }}">Profil Sekolah</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::routeIs('kuesioner.create') ? 'active' : '' }}" href="{{ route('kuesioner.create') }}">Isi Kuesioner</a>
        </li>

        @auth
          @if(!auth()->user()->alumni()->exists())
            <li class="nav-item">
              <a class="nav-link {{ Request::routeIs('alumni.register') ? 'active' : '' }}" href="{{ route('alumni.register') }}">Registrasi Alumni</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link text-success" href="{{ route('home') }}">
                <i class="bi bi-check-circle-fill me-1"></i>Anda Telah Registrasi
              </a>
            </li>
          @endif

          <!-- User Dropdown -->
          <li class="nav-item dropdown ms-lg-3">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
              <img class="rounded-circle me-2" 
                   src="{{ Auth::user()->avatar ? '/avatars/'.Auth::user()->avatar : asset('/img/default_profile.png') }}"
                   alt="Profile" width="32" height="32">
              <span>{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow">
              <li class="dropdown-header">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <small class="text-muted">{{ Auth::user()->email }}</small>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="{{ route('profileUser.edit') }}">
                  <i class="bi bi-person me-2"></i>Profile
                </a>
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item text-danger">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                  </button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item ms-lg-3">
            <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4">Login</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<!-- Spacer untuk Fixed Navbar -->
<div style="height: 70px;"></div>
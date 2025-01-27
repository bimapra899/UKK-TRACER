<section class="navbar">
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Tracer Study</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="active">Home</a></li>
          <li><a href="{{ route('sekolah.profile') }}">Profil Sekolah</a></li>
          <li><a href="{{ route('kuesioner.create') }}">Isi Kuesioner</a></li>
          @auth
            @if(!auth()->user()->alumni()->exists())
                <li><a href="{{ route('alumni.register') }}">Registrasi Alumni</a></li>
            @else
                <li><a href="#" class="text-success"><i class="bi bi-check-circle-fill me-1"></i>Anda Telah Registrasi</a></li>
            @endif
          <li class="nav-item dropdown no-arrow ml-3" style="margin-left: 235px;">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                  data-bs-toggle="dropdown">
                  <div class="d-flex align-items-center">
                      <span class="d-none d-lg-inline me-2 text-dark fw-medium">{{ Auth::user()->name }}</span>
                      <div class="avatar-wrapper">
                          <img class="rounded-circle border shadow-sm" 
                               src="{{ Auth::user()->avatar ? '/avatars/'.Auth::user()->avatar : asset('/img/default_profile.png') }}"
                               style="width: 42px; height: 42px; object-fit: cover; transition: transform 0.2s;">
                      </div>
                  </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end shadow-lg animated--fade-in-up"
                   style="min-width: 14rem; border-radius: 0.75rem; border: none; margin-top: 0.5rem;">
                  <div class="dropdown-header bg-light py-3 px-4 rounded-top">
                      <div class="d-flex flex-column">
                          <span class="text-primary fw-bold mb-1">{{ Auth::user()->name }}</span>
                          <small class="text-muted">{{ Auth::user()->email }}</small>
                      </div>
                  </div>
                  <a class="dropdown-item py-2 px-4 d-flex align-items-center" href="{{ route('profileUser.edit') }}">
                      <i class="bi bi-person me-2 text-gray-600"></i>
                      <span>Profile</span>
                  </a>
                  <a class="dropdown-item py-2 px-4 d-flex align-items-center" href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="bi bi-box-arrow-right me-2 text-gray-600"></i>
                      <span>{{ __('Logout') }}</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
          @else
          <li class="nav-item ml-3" style="margin-left: 330px;">
              <a href="{{ route('login') }}" 
                 class="btn btn-primary rounded-pill px-4 py-2 font-weight-bold">
                 Login
              </a>
          </li>
          @endauth
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
</section>
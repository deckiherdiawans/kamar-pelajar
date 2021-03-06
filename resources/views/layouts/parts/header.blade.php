<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('beranda') }}">Kamar Pelajar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'beranda' ? 'active' : '' }}" aria-current="page" href=" {{ route('beranda') }}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'kamar' || Route::currentRouteName() == 'kamar.kota' || Route::currentRouteName() == 'kamar.negara' || Route::currentRouteName() == 'kamar.detail' ? 'active' : '' }}" href="{{ route('kamar') }}">Cari kamar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'desa' ? 'active' : '' }}" href="{{ route('desa') }}">Desa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'negara' ? 'active' : '' }}" href="{{ route('negara') }}">Negara</a>
          </li>
          {{--
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('kamar.baru') ? 'active' : '' }}" href="{{ route('kamar.baru') }}">Daftar sebagai host</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('faq') ? 'active' : ''}}" href="{{ route('faq') }}">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
          </li>
          --}}
        </ul>
        {{--
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        --}}

        @auth
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="{{ route('profile') }}" class="nav-link {{ request()->is('profile') ? 'active' : '' }}">Profil</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Kelola kamar
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('kamar.saya') }}">Kamar saya</a></li>
                <li><a class="dropdown-item" href="{{ route('kamar.baru') }}">Daftarkan kamar baru</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
              </a>
            </li>
          </ul> 
        @else
          @php $route = Route::currentRouteName() @endphp
          @if ($route == 'login')
            <div class="d-flex">
              <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
          @elseif ($route == 'register')
            <div class="d-flex">
              <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
          @else
            <div class="d-flex">
              <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div> &nbsp;
            <div class="d-flex">
              <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
          @endif
        @endauth
      </div>
    </div>
  </nav>
</header>

<form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
  @csrf
</form>
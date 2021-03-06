<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  
  <a href="index3.html" class="brand-link">
    <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light text-sm">Pariwisata Pandeglang</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('img/user8-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth()->user()->nama }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Auth()->user()->hak_akses == 'regular')
        <li class="nav-item">
          <a href="{{ url('/wisata') }}" class="nav-link {{ (request()->is('wisata') || request()->is('/')) ? 'active' : ''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Wisata
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/pengelola') }}" class="nav-link {{ request()->is('pengelola') ? 'active' : ''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Pengelola
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/pengunjung') }}" class="nav-link {{ request()->is('pengunjung') ? 'active' : ''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Pengguna (Mobile)
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/kendaraan') }}" class="nav-link {{ request()->is('kendaraan') ? 'active' : ''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Kendaraan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/bbm') }}" class="nav-link {{ request()->is('bbm') ? 'active' : ''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              BBM
            </p>
          </a>
        </li>
        @endif
        @if(Auth()->user()->hak_akses == 'super')
        <li class="nav-item">
          <a href="{{ url('/administrator') }}" class="nav-link {{ request()->is('administrator') ? 'active' : ''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Administrator
            </p>
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a href="{{ url('/logout') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
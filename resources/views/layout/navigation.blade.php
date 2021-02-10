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
        <a href="#" class="d-block">Tb Sultan</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="../../index.html" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="../wisata/index.html" class="nav-link">
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
          <a href="../pengguna/index.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Pengguna
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../kendaraan/index.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Kendaraan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../bbm/index.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              BBM
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../tiket/index.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Tiket Terjual
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../administrator/index.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Administrator
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../login/index.html" class="nav-link">
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
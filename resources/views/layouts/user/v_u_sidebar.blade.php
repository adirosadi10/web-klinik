<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('dashboard')}}" class="brand-link">
    <img src="{{asset('gambar')}}/hospital.ico" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Klinik Sehat</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{route('dashboard')}}" class="d-block">{{auth()->user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
          <a href="{{route('dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item {{ request()->is('pendaftaran') ? 'active' : '' }}">
          <a href="{{route('pendaftaran')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Pendaftaran
            </p>
          </a>
        </li>
        <li class="nav-item {{ request()->is('periksa') ? 'active' : '' }}">
          <a href="{{route('periksa')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Pemeriksaan
            </p>
          </a>
        </li>
        <li class="nav-item {{ request()->is('transkasi') ? 'active' : '' }}">
          <a href="{{route('transaksi')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Transaksi
            </p>
          </a>
        </li>
        @if(auth()->user()->level == 0 )
        <li class="nav-header">LAPORAN</li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Laporan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('formHarian')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Harian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('formBulanan')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Bulanan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">MASTER</li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              MASTER
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('obat')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Obat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pasien</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('pegawai')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pegawai</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  User
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('dataUser')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('dataUserDelete')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Delete Data User</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{route('wilayah')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Wilayah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('tindakan')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Tindakan</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        <li class="nav-item">
          <a href="{{route('logOut')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Log Out</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
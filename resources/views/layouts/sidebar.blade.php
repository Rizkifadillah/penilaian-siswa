
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/dist/img/boxed-bg.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SISpesis</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset( Auth::user()->foto ?? 'assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image" style="height: 30px;  width:30px;">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
               {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Forms
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="pages/forms/general.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>General Elements</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/advanced.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Advanced Elements</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/editors.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Editors</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/validation.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Validation</p>
                    </a>
                  </li>
                </ul>
              </li>
          --}}
          {{-- <li class="nav-item ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a> --}}
            {{-- <ul class="nav nav-treeview"> --}}
              <li class="nav-item">
                <a href="{{ route('dashboard.index')}}" class="nav-link {{ set_active(['dashboard.index','dashboard.create','dashboard.edit','dashboard.show']) }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-header">MASTER DATA</li>

              <li class="nav-item">
                <a href="{{ route('staff.index')}}" class="nav-link {{ set_active(['staff.index','staff.create','staff.edit','staff.show']) }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('mapel.index')}}" class="nav-link {{ set_active(['mapel.index','mapel.create','mapel.edit','mapel.show']) }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Mapel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('guru.index')}}" class="nav-link {{ set_active(['guru.index','guru.create','guru.edit','guru.show']) }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kelas.index')}}" class="nav-link {{ set_active(['kelas.index','kelas.create','kelas.edit','kelas.show']) }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('siswa.index')}}" class="nav-link {{ set_active(['siswa.index','siswa.create','siswa.edit','siswa.show']) }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Nilai</p>
                </a>
              </li>

            <ul>
              <li class="nav-header">NILAI</li>
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Nilai Siswa</p>
                </a>
              </li>
            </ul>
  
            {{-- </ul> --}}
          {{-- </li> --}}
         
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
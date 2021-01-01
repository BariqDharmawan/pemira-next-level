<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ asset('img/pemira-sidebar-logo.png') }}" 
          class="navbar-brand-img">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
                @switch(Auth::user()->role)
                    @case('admin')
                        @php
                            $goTo = route('admin.dashboard');
                        @endphp
                        @break
                    @case('pemilih')
                        @php
                            $goTo = route('pemilih.dashboard');
                        @endphp
                        @break
                    @case('calon')
                        @php
                            $goTo = route('calon.dashboard');
                        @endphp
                        @break
                    @default
                        
                @endswitch
                <a class="nav-link active" 
                href="{{ $goTo }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            @switch(Auth::user()->role)
                @case('pemilih')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pemilih.pilih-calon') }}">
                        <i class="ni ni-planet text-orange"></i>
                        <span class="nav-link-text">Pilih calon</span>
                        </a>
                    </li>
                    @break
                @case('admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.lihat-calon') }}">
                        <i class="ni ni-planet text-orange"></i>
                        <span class="nav-link-text">Lihat calon</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.tambah-calon.index') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Tambah calon</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.manage-pemilih') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Lihat pemilih</span>
                        </a>
                    </li>
                    @break
                @case('calon')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('calon.lihat-profile') }}">
                        <i class="ni ni-planet text-orange"></i>
                        <span class="nav-link-text">Lengkapi profil</span>
                        </a>
                    </li>
                    @break
                    
            @endswitch
          </ul>
        </div>
      </div>
    </div>
  </nav>
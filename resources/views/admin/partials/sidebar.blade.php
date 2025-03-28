<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('tadmin/assets/img/icons/dashboard.svg') }}" alt="Dashboard Icon">
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="submenu">
                <a href="javascript:void(0);">
                    <i data-feather="grid"></i>
                    <span> Master </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul>
                    <li><a href="{{ route('user.index') }}" class="{{ Request::routeIs('user.*') ? 'active' : '' }}">Akun</a></li>
                    <li><a href="{{ route('jenis-layanan.index') }}" class="{{ Request::routeIs('jenis-layanan.*') ? 'active' : '' }}">Jenis Layanan</a></li>
                    <li><a href="{{ route('jenis-kekerasan.index') }}" class="{{ Request::routeIs('jenis-kekerasan.*') ? 'active' : '' }}">Jenis Kekerasan</a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="javascript:void(0);">
                    <i data-feather="alert-circle"></i>
                    <span> Pengaduan </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul>
                    <li><a href="{{ route('pengaduan.index') }}" class="{{ Request::routeIs('pengaduan.*') ? 'active' : '' }}">Pengaduan</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

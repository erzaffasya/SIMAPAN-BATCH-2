<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li>
                <a href="#"><img src="{{ asset('tadmin/assets/img/icons/dashboard.svg') }}" alt="img"><span>
                        Dashboard</span> </a>
            </li>

            <li class="submenu">
                <a href="javascript:void(0);"><i data-feather="columns"></i> <span> Master </span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{ route('jenis-layanan.index') }}"
                            class="{{ Request::routeIs('jenis-layanan.*') ? 'active' : '' }}">Jenis Layanan</a>
                    </li>
                    <li><a href="{{ route('jenis-kekerasan.index') }}"
                            class="{{ Request::routeIs('jenis-kekerasan.*') ? 'active' : '' }}">Jenis Kekerasan</a>
                    </li>
                </ul>
            </li>

            <li class="submenu">
                <a href="javascript:void(0);"><i data-feather="columns"></i> <span> USER </span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{ route('user.index') }}"
                            class="{{ Request::routeIs('user.*') ? 'active' : '' }}">User</a>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><i data-feather="columns"></i> <span> USER </span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{ route('user.index') }}"
                            class="{{ Request::routeIs('user.*') ? 'active' : '' }}">User</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

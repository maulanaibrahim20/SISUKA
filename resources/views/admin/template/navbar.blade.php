<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        @auth
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Makeup</span>
            </li>
            @if (auth()->user()->hasRole('Admin Aplikasi'))
                <li class="menu-item {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ url('/admin/dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div data-i18n="Dashboard">Dashboard</div>
                    </a>
                </li>
            @elseif(auth()->user()->hasRole('Pemilik Jasa Makeup'))
                <li class="menu-item {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ url('/owner/dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div data-i18n="Dashboard">Dashboard</div>
                    </a>
                </li>
            @elseif(auth()->user()->hasRole('Pengguna Aplikasi'))
                <li class="menu-item {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                    <a href="{{ url('/client/dashboard') }}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div data-i18n="Dashboard">Dashboard</div>
                    </a>
                </li>
            @endif
        @endauth


        @can('admin')
            {{-- Menu Item --}}
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Create &amp; Auth</span>
            </li>
            {{-- Menu Item --}}

            <!-- Layouts -->
            <li
                class="menu-item {{ request::segment(3) == 'client' || request::segment(3) == 'owner' ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-user"></i>
                    <div data-i18n="Create Account User">Create Account User</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request::segment(3) == 'client' ? 'active' : '' }}">
                        <a href="{{ url('/admin/create/client') }}" class="menu-link">
                            <div data-i18n="Create Client">Create Client</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request::segment(3) == 'owner' ? 'active' : '' }}">
                        <a href="{{ url('/admin/create/owner') }}" class="menu-link">
                            <div data-i18n="Create Owner">Create Owner</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        @can('mua')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Makeup</span>
            </li>
            <li class="menu-item {{ Request::segment(2) === 'katalog' ? 'active' : '' }}">
                <a href="{{ url('/owner/katalog') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Katalog Makeup">Katalog Makeup</div>
                </a>
            </li>
        @endcan

    </ul>
</aside>

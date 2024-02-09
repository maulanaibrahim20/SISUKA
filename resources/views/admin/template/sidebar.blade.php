<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ url('/assets') }}/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ url('/assets') }}/images/brand/logo-1.png" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ url('/assets') }}/images/brand/logo-2.png" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{ url('/assets') }}/images/brand/logo-3.png" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    @if (Auth::user()->hasRole('Admin Kabupaten'))
                        <a class="side-menu__item {{ Request::segment(3) == 'dashboard' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="{{ url('/admin/kab/dashboard') }}">
                        @elseif(Auth::user()->hasRole('Admin Kecamatan'))
                            <a class="side-menu__item {{ Request::segment(3) == 'dashboard' ? 'active' : '' }}"
                                data-bs-toggle="slide" href="{{ url('/admin/kec/dashboard') }}">
                            @elseif(Auth::user()->hasRole('Admin Desa'))
                                <a class="side-menu__item {{ Request::segment(3) == 'dashboard' ? 'active' : '' }}"
                                    data-bs-toggle="slide" href="{{ url('/admin/des/dashboard') }}">
                                @elseif(Auth::user()->hasRole('Staff Kabupaten'))
                                    <a class="side-menu__item {{ Request::segment(3) == 'dashboard' ? 'active' : '' }}"
                                        data-bs-toggle="slide" href="{{ url('/staff/kab/dashboard') }}">
                    @endif
                    <i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>

                @can('admin_kab')
                    <li class="sub-category">
                        <h3>Buat Akun</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(4) == 'admin-kec' || Request::segment(4) == 'staff' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="side-menu__icon fa fa-user-plus"></i>
                            <span class="side-menu__label">Buat Akun</span>
                            <i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ Request::segment(4) == 'admin-kec' || Request::segment(4) == 'staff' ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Admin Kecamatan</a></li>
                            <li>
                                <a href="{{ url('/admin/kab/create/admin-kec') }}"
                                    class="slide-item {{ Request::segment(4) == 'admin-kec' ? 'active' : '' }}">
                                    Admin Kecamatan
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/kab/create/staff') }}"
                                    class="slide-item {{ Request::segment(4) == 'staff' ? 'active' : '' }}">
                                    Staff Kabupaten
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-category">
                        <h3>Master</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(4) == 'jabatan' || Request::segment(4) == 'role' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="side-menu__icon fa fa-database"></i>
                            <span class="side-menu__label">Master</span>
                            <i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ Request::segment(4) == 'jabatan' || Request::segment(4) == 'role' ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                            <li>
                                <a href="{{ url('/admin/kab/master/jabatan') }}"
                                    class="slide-item {{ Request::segment(4) == 'jabatan' ? 'active' : '' }}">
                                    Jabatan Kabupaten
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/kab/master/role') }}"
                                    class="slide-item {{ Request::segment(4) == 'role' ? 'active' : '' }}">
                                    Role
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('admin_kec')
                    <li class="sub-category">
                        <h3>Buat Akun</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(4) == 'admin-des' || Request::segment(4) == 'staff' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="side-menu__icon fa fa-user-plus"></i>
                            <span class="side-menu__label">Buat Akun</span>
                            <i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ Request::segment(4) == 'admin-des' || Request::segment(4) == 'staff' ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Admin Desa</a></li>
                            <li>
                                <a href="{{ url('/admin/kec/create/admin-des') }}"
                                    class="slide-item {{ Request::segment(4) == 'admin-des' ? 'active' : '' }}">
                                    Admin Desa
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/kec/create/staff') }}"
                                    class="slide-item {{ Request::segment(4) == 'staff' ? 'active' : '' }}">
                                    Staff Kecamatan
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-category">
                        <h3>Master</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(4) == 'jabatan' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="side-menu__icon fa fa-database"></i>
                            <span class="side-menu__label">Master</span>
                            <i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ Request::segment(4) == 'jabatan' ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Jabatan</a></li>
                            <li>
                                <a href="{{ url('/admin/kec/master/jabatan') }}"
                                    class="slide-item {{ Request::segment(4) == 'jabatan' ? 'active' : '' }}">
                                    Jabatan
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('staff_kab')
                    <li class="sub-category">
                        <h3>Persuratan</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(3) == 'surat_masuk' || Request::segment(3) == 'undermaintanance' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="side-menu__icon fa fa-envelope"></i>
                            <span class="side-menu__label">Persuratan</span>
                            <i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ Request::segment(3) == 'surat_masuk' || Request::segment(3) == 'undermaintanance' ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Persuratan</a></li>
                            <li>
                                <a href="{{ url('/staff/kab/surat_masuk') }}"
                                    class="slide-item {{ Request::segment(3) == 'surat_masuk' ? 'active' : '' }}">
                                    Surat Masuk
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/staff/kab/undermaintanance') }}"
                                    class="slide-item {{ Request::segment(3) == 'undermaintanance' ? 'active' : '' }}">
                                    Surat Keluar
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>

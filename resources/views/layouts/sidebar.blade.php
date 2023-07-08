<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <span class="brand-logo">
                    {{-- @php($settings=App\Models\Setting::first()) --}}
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        <h2 class="brand-text">
                            <img src="{{asset(@$settings->white_favicon_icon)}}" width="100px" height="35px" alt="Einstro Academy"/>
                        </h2>
                    </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc">
                    </i>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-x d-block d-xl-none text-primary toggle-icon font-medium-4">
                    </svg>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span data-i18n="Dashboard">Dashboard</span>
                <i data-feather="more-horizontal"></i>
            <li class=" nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span>
                </a>
            </li>
            <li class="navigation-header">
                <span data-i18n="Courses">Courses</span>
                <i data-feather="more-horizontal"></i>
            </li>

        </ul>
    </div>
</div>

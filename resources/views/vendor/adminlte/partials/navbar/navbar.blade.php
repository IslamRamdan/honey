<nav
    class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')

        {{-- Configured left links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item')

        {{-- Custom left links --}}
        @yield('content_top_nav_left')
    </ul>

    {{-- Navbar right links --}}
    <ul class="navbar-nav ml-auto">
        {{-- Custom right links --}}
        @yield('content_top_nav_right')

        {{-- Configured right links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')

        {{-- User menu link --}}
        @if (Auth::user())
            @if (config('adminlte.usermenu_enabled'))
                @include('adminlte::partials.navbar.menu-item-dropdown-user-menu')
            @else
                @include('adminlte::partials.navbar.menu-item-logout-link')
            @endif
        @endif

        {{-- Right sidebar toggler link --}}
        @if (config('adminlte.right_sidebar'))
            @include('adminlte::partials.navbar.menu-item-right-sidebar-toggler')
        @endif
        <!-- Language Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="flag-icon flag-icon-{{ app()->getLocale() == 'ar' ? 'sa' : 'us' }}"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-0">
                <a href="{{ route('locale.switch', 'ar') }}"
                    class="dropdown-item {{ app()->getLocale() == 'ar' ? 'active' : '' }}">
                    <i class="flag-icon flag-icon-sa mr-2"></i> العربية
                </a>
                <a href="{{ route('locale.switch', 'en') }}"
                    class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}">
                    <i class="flag-icon flag-icon-us mr-2"></i> English
                </a>
            </div>
        </li>
    </ul>

</nav>

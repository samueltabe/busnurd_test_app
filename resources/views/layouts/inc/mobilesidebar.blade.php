<div class="scrollable">
    <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    <ul class="scrollable__content py-2">
        <li>
            <a href="{{ route('admindashboard') }}" class="menu class="menu {{ request()->routeIs('admindashboard') ? 'side-menu--active' : '' }}"">
                <div class="menu__icon"> <i data-lucide="layout-dashboard"></i> </div>
                <div class="menu__title"> Dashboard</div>
            </a>

            <li>
                <a href="{{ route('properties.index')}}" class="menu {{ request()->routeIs('properties.index') ? 'side-menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title"> Properties </div>
                </a>
            </li>
            <li>
                <a href="{{ route('properties.trashed')}}" class="menu {{ request()->routeIs('properties.trashed') ? 'side-menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title">Trashed Properties </div>
                </a>
            </li>
            <li>
                <a href="{{ route('countries.index') }}" class="menu {{ request()->routeIs('countries.index') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon"> <i data-lucide="flag"></i> </div>
                    <div class="side-menu__title"> Countries </div>
                </a>
            </li>
            <li>
                <a href="{{ route('states.index') }}" class="menu {{ request()->routeIs('states.index') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon"> <i data-lucide="flag-triangle-right"></i> </div>
                    <div class="side-menu__title"> States </div>
                </a>
            </li>
            <li>
                <a href="{{ route('status.index') }}" class="menu {{ request()->routeIs('status.index') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                    <div class="side-menu__title"> Status </div>
                </a>
            </li>
            <li>
                <a href="{{ route('type.index') }}" class="menu {{ request()->routeIs('type.index') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                    <div class="side-menu__title"> Type </div>
                </a>
            </li>
            <li>
                <a href="{{ route('amenity.index') }}" class="menu {{ request()->routeIs('amenity.index') ? 'side-menu--active' : ''}}">
                    <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
                    <div class="side-menu__title"> Amenities </div>
                </a>
            </li>

            <li>
                <a href="{{ route('allusers') }}" class="menu {{ request()->routeIs('allusers') ? 'side-menu--active' : '' }}">
                    <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                    <div class="side-menu__title"> All Users</div>
                </a>
            </li>


        </li>
        <li class="menu__devider my-6"></li>
    </ul>
</div>

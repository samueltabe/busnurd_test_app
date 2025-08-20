<nav class="side-nav">
    <ul>
        <li>
            <a wire:navigate href="{{route('admindashboard')}}" class="side-menu {{ request()->routeIs('admindashboard') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="layout-dashboard"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>

        <li>
            <a wire:navigate href="{{ route('properties.index') }}" class="side-menu {{ request()->routeIs('properties.index') ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title"> Properties </div>
            </a>
        </li>

        <li>
            <a wire:navigate href="{{ route('properties.trashed') }}" class="side-menu {{ request()->routeIs('properties.trashed') ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">Trashed Properties </div>
            </a>
        </li>

        <li>
            <a wire:navigate href="{{ route('countries.index') }}" class="side-menu {{ request()->routeIs('countries.index') ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="flag"></i> </div>
                <div class="side-menu__title"> Countries </div>
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('states.index') }}" class="side-menu {{ request()->routeIs('states.index') ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="flag-triangle-right"></i> </div>
                <div class="side-menu__title"> States </div>
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('status.index') }}" class="side-menu {{ request()->routeIs('status.index') ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title"> Status </div>
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('type.index') }}" class="side-menu {{ request()->routeIs('type.index') ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title"> Type </div>
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('amenity.index') }}" class="side-menu {{ request()->routeIs('amenity.index') ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
                <div class="side-menu__title"> Amenities </div>
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('allusers') }}" class="side-menu {{ request()->routeIs('allusers') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                <div class="side-menu__title"> All Users</div>
            </a>
        </li>

    </li>
    </ul>
</nav>

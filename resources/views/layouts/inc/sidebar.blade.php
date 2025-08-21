<nav class="side-nav">
    <ul>
        <li>
            <a wire:navigate href="{{route('dashboard')}}" class="side-menu {{ request()->routeIs('admindashboard') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="layout-dashboard"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a wire:navigate href="{{ route('products.index') }}" class="side-menu {{ request()->routeIs('products.index') ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title"> Products </div>
            </a>
        </li>

    </li>
    </ul>
</nav>

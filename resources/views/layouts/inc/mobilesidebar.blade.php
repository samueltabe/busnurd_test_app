<div class="scrollable">
    <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    <ul class="scrollable__content py-2">
        <li>
            <a href="{{ route('dashboard') }}" class="menu {{ request()->routeIs('dashboard') ? 'side-menu--active' : '' }}">
                <div class="menu__icon"> <i data-lucide="layout-dashboard"></i> </div>
                <div class="menu__title"> Dashboard</div>
            </a>

            <li>
                <a href="{{ route('products.index')}}" class="menu {{ request()->routeIs('products.index') ? 'side-menu--active' : '' }}">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title"> Products </div>
                </a>
            </li>
        </li>
        <li class="menu__devider my-6"></li>
    </ul>
</div>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="{{ asset('backend/img/profile_small.jpg') }}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">
                                    David Williams
                                </strong>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            @foreach (config('menus') as $menu)
                <li class="{{ str_contains(request()->route()->getName(),$menu['active'])? 'active': '' }}">
                    <a href="{{ route($menu['route']) }}">
                        <i class="{{ $menu['icon'] }}"></i>
                        <span class="nav-label">
                            {{ $menu['name'] }}
                        </span>
                        @if (isset($menu['child']))
                            <span class="fa arrow"></span>
                        @endif
                    </a>
                    @if (isset($menu['child']))
                        <ul class="nav nav-second-level">
                            @foreach ($menu['child'] as $child)
                                <li class="{{ request()->route()->getName() == $child['route']? 'active': '' }}">
                                    <a href="{{ route($child['route']) }}">
                                        {{ $child['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</nav>

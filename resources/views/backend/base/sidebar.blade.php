<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class='sidebar-brand' href='/'>
            <span class="align-middle">AdminCMS</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            @foreach (config('nav') as $item)
                <li class="sidebar-item">
                    <a class='sidebar-link' href='{{ route($item['nav_route']) }}'>
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">
                            {{ $item['nav_name'] }}
                        </span>
                    </a>
                </li>
            @endforeach
            {{-- <li class="sidebar-item active">
                <a class='sidebar-link' href='/'>
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

             --}}
        </ul>
    </div>
</nav>

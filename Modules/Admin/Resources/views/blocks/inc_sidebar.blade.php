@inject('listSidebar','Modules\Admin\Services\ListSidebarService')
@inject('permissionService', 'Modules\Admin\Services\PermissionService')
<div class="sidebar">
    <style>
        .sidebar .nav-link { font-size: 13px;}
    </style>
    <nav class="sidebar-nav">
        <ul class="nav">
            @php 
                $admin = \Auth::guard('admins')->user();
            // dd($listSidebar->getListSidebar());
            @endphp
            @foreach ($listSidebar->getListSidebar() as $sidebar)
                @if (!empty($sidebar['permissions']))
                    @if(Auth::user()->can($sidebar['permissions']))
                        <li class="nav-item {{ isset($sidebar['menu']) ? 'nav-dropdown' : '' }}">
                            <a class="nav-link {{ isset($sidebar['menu']) ? 'nav-dropdown-toggle' : '' }}" href="{{ isset($sidebar['route']) ? route($sidebar['route']) : '#' }}">
                                <i class="nav-icon {{ $sidebar['icon'] }}"></i> {{ $sidebar['name']}}
                            </a>
                            @if (isset($sidebar['menu']))

                                <ul class="nav-dropdown-items">
                                    @foreach ($sidebar['menu'] as $subMenu)
                                        @if (!empty($subMenu['permissions']))
                                            @if(Auth::user()->can($subMenu['permissions']))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route($subMenu['route']) }}">
                                                        <i class="nav-icon icons {{ $subMenu['icon'] }}"></i> {{ $subMenu['name'] }}
                                                    </a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route($subMenu['route']) }}">
                                                    <i class="nav-icon icons {{ $subMenu['icon'] }}"></i> {{ $subMenu['name'] }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @else
                    <li class="nav-item {{ isset($sidebar['menu']) ? 'nav-dropdown' : '' }}">
                        <a class="nav-link {{ isset($sidebar['menu']) ? 'nav-dropdown-toggle' : '' }}" href="{{ isset($sidebar['route']) ? route($sidebar['route']) : '#' }}">
                            <i class="nav-icon {{ $sidebar['icon'] }}"></i> {{ $sidebar['name'] }}
                        </a>
                        @if (isset($sidebar['menu']))
                            @if(Auth::user()->can(['full-quyen-quan-ly', 'truy-cap-he-thong']))
                                <ul class="nav-dropdown-items">
                                    @foreach ($sidebar['menu'] as $subMenu)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route($subMenu['route']) }}">
                                                <i class="nav-icon icons {{ $subMenu['icon'] }}"></i> {{ $subMenu['name'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        @endif
                    </li>
                @endif
            @endforeach
            <li class="nav-divider"></li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
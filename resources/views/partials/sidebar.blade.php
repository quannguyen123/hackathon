    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
              <a href="{{route("users.dashboard")}}" class="d-block">{{ auth()->user()->name }}</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                
                <li class="nav-item  ">
                    <a href="{{ route('users.dashboard') }}" class="nav-link @if( url()->current() == route('users.dashboard')) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @php 
                    $roleId = auth()->user()->role_id;
                @endphp 
                @foreach($navigations as $nav)
                    @php
                        $childPermissions = array_filter(!empty($nav['children']) ? array_column($nav['children'], 'permission') : [$nav['permission']]);
                        $childHasCurrentUrl = !empty($nav['children']) && in_array(url()->current(), array_column($nav['children'], 'link'));
                        $activeByInclude = in_array(Route::currentRouteName(), array_merge($nav['include'] ?? [], Arr::flatten(array_column($nav['children'] ?? [], 'include'))));
                    @endphp
                    <li class="nav-item {{ $childHasCurrentUrl || $activeByInclude ? 'menu-open' : '' }} {{ !empty($nav['children']) ? 'has-treeview' : '' }}">
                        <a href="{{ $nav['link'] }}" class="nav-link @if($childHasCurrentUrl || $activeByInclude || url()->current() == $nav['link']) active @endif">
                            <i class="nav-icon fas {{ $nav['icon'] }}"></i>
                            <p>
                                {{ $nav['name'] }}

                                @if (!empty($nav['children']))
                                    <i class="right fas fa-angle-left"></i>
                                @endif
                            </p>
                        </a>

                        @if (!empty($nav['children']))
                            <ul class="nav nav-treeview">
                                @foreach($nav['children'] as $child)
                                    
                                    <li class="nav-item">
                                        <a href="{{ $child['link'] }}" class="nav-link @if(url()->current() == $child['link'] || in_array(Route::currentRouteName(), $child['include'] ?? [])) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ $child['name'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
@php
$segment = request()->segment(1);
@endphp
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard.index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @foreach (config('apps.module.module') as $key =>$val)    
    <li class="nav-item {{in_array($segment,$val['name'])? 'active': ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{ $val['target']}}"
            aria-expanded="true" ">
            <i class="{{$val['icon']}}"></i>
            <span>{{$val['title']}}</span>
        </a>
        @if(isset($val['subModule']))
                
        <div id="{{ $val['target']}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            @foreach ($val['subModule'] as $module)
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ $module['route']}}">{{$module['title']}}</a>
            @endforeach
            </div>
        </div>
        @endif
    </li>
    @endforeach
 
    

    <!-- Nav Item - Utilities Collapse Menu -->


    <!-- Divider -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

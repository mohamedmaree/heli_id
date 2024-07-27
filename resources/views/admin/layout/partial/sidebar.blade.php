<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true" style="background-color: rgb(33,41,54);">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('admin/dashboard')}}">
                    <img class="brand-logo img-logo" src="{{$settings['logo']}}" alt="">
                </a></li>
            <li class="nav-item nav-toggle">
                {{-- <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a> --}}
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="background-color: rgb(33,41,54);">
            {{-- @foreach (\App\Traits\sidebar::sidebar2() as $parent)
            <li class="nav-item"><a href="{{$parent['childs'] == null ? route($parent['name']) : 'javascript:void(0);'}}"> {!! $parent['icon'] !!} <span class="menu-title" data-i18n="Dashboard">{{ __($parent['title']) }} </span></a>
                @if ($parent['childs'] != null)
                    @foreach ($parent['childs'] as $child)
                        <ul class="menu-content">
                            <li class="$active"><a href="{{route('admin.'.$child['name'])}}"><i class="feather icon-circle"></i>{{awsettingstTrans($child['title'])}}  </a></li>
                        </ul>
                    @endforeach
                @endif
            </li>
            @endforeach --}}
            {!! \App\Traits\SideBar::sidebar() !!}
        </ul>
    </div>
</div>
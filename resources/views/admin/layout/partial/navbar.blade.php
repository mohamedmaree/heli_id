<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <div class="breadcrumb-text" style="font-size:14px ; font-family:'cairo' ; color:black;">
                        <a  href="{{url('admin/dashboard')}}" style="color:black;"><span class="user-name"> <i class="feather icon-home"></i> {{__('site.home')}}</span></a>
                        @if (Route::currentRouteName() != 'admin.dashboard')
                            <span class="user-name hint-slash">/</span>
                            <a  href="javacsript:void(0)"style="color:black;"><span class="user-name">{{__('admin.'.\Request::route()->getAction()['title'])}}</span></a>
                        @endif
                    </div>
                </div>
                

                <ul class="nav navbar-nav float-right resp-wrap-icon">
                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @foreach(languages() as $key)
                            @if($key == lang())
                            <i class=""></i><span class="selected-language">{{ config('available-locales')[$key]['native']??'' }}</span></a>
                            @endif
                        @endforeach

                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            @foreach(languages() as $key)
                               <a class="dropdown-item" href="{{url('admin/lang/'.$key)}}" data-language="{{ $key }}"><i class=""></i> {{ config('available-locales')[$key]['native']??'' }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" id="layout-mode"><i class="ficon feather icon-moon" onclick="changeMode()"></i></a>
                    </li>

                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link position-relative" href="{{route('admin.admins.notifications')}}">
                            @if (auth('admin')->user()->unreadNotifications->count() > 0)
                                <span class="badge badge-pill badge-primary badge-up">{{auth('admin')->user()->unreadNotifications->count()}}</span>
                            @endif
                            <i class="ficon feather icon-bell"></i>
                        </a>
                    </li>
                   
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{auth('admin')->user()->name}}</span><span class="user-status">{{__('admin.available')}}</span></div><span><img class="round" src="{{auth('admin')->user()->avatar}}" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{url('admin/profile')}}"><i class="feather icon-settings"></i> {{__('site.profile')}}</a>
                            <a class="dropdown-item" href="{{url('admin/logout')}}"><i class="feather icon-power"></i> {{__('site.logout')}}</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
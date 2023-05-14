<header class="menu-area navbar-fixed-top">
        <div class="container">
            <div class="main-menu">
                <div class="logo">
                    <a href="{{route('w.home')}}">
                        <img src="{{asset('web/assets/img/logo_net5s.png')}}" alt="">
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <nav>
                        <ul class="nav navbar-nav">
                            <li class="{{request()->routeIs('w.home') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('w.home')}}">Trang chủ</a>
                            </li>
                            <li class="{{request()->routeIs('w.recruitment', 'w.recruitment.show') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('w.recruitment')}}">Tuyển dụng</a>
                            </li>
                        </ul>
                    </nav>
                </div>
    
                <div class="login">
                    @if (Auth::guard('user')->check())
                        <ul class="navbar-nav">
                            <li>
                                <a href="{{route('w.account.index')}}" class="info-link">Xin chào: {{Auth::guard('user')->user()->name}}</a>
                                <div class="dropdown info-menu">
                                    <div class="info-menu-list">
                                        <a href="{{route('w.account.index')}}"><i class="fa-solid fa-circle-info"></i> Thông tin tài khoản</a>
                                        <a href="{{route('w.account.list.recruitment')}}"><i class="fa-solid fa-list"></i> Danh sách tin đã ứng tuyển</a>
                                        <a href="{{ route('w.logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @else
                        <a href="{{ route('w.login') }}" class="btn btn-login {{request()->routeIs('w.login') ? 'btn-active' : ''}}" title="Đăng nhập">Đăng nhập</a>
                        <a href="{{ route('w.register') }}" class="btn btn-login {{request()->routeIs('w.register') ? 'btn-active' : ''}}" title="Đăng kí">Đăng kí</a>
                    @endif
                    
                </div>
            </div>
        </div>
    </header>
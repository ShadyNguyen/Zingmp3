<aside>
    <div class="aside-content">
        <div class="aside-logo">
            <div class="logo-img">
                <a href="#"><img src="{{url('public/site/img/logo-sidebar-zingmp3.png')}}" alt="" class="icon-show"></a>
                <a href="#" class="none"><img src="{{ url('public/site/img/logo-laravel-zingmp3.png') }}" alt="" class="icon-hide"></a>
            </div>
        </div>
        <nav class="aside-nav">
            <ul>
                <li class="active">
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="wrapper-icon icon-left-sidebar">
                            <i class="fa-solid fa-house"></i>
                        </div>
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li class="title">
                    <span>
                        Element
                    </span>
                </li>
                <li >
                    <a href="{{route('admin.user')}}">
                        <div class="wrapper-icon icon-left-sidebar">
                        <i class="fa-solid fa-people-roof"></i>
                        </div>
                        <span>User</span>
                    </a>
                </li>
                

            </ul>
        </nav>
    </div>
</aside>
<div class="header">

    <div class="header-left">
    <a href="<?php echo (Auth()->user()->type === 1) ? route('dashboard') : route('home'); ?>" class="logo">
    <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo">
        </a>

        <a href="<?php echo (Auth()->user()->type === 1) ? route('dashboard') : route('home'); ?>" class="logo logo-small">
            <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
        </a>
    </div>

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>
    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>


    <ul class="nav user-menu">
    @if(Auth()->user()->type !=1)
    <a href={{ route('cart') }} class="btn btn-outline-success btn-cart">Giỏ hàng của bạn <i class="fa-solid fa-cart-shopping"></i></a>
    @endif
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle"
                        src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" width="31"
                        alt="User image"></span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt="User Image') }}"
                            class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6>{{Auth()->user()->name}}</h6>
                        <p class="text-muted mb-0">{{Auth()->user()->role==1?'Administrator':'User'}}</p>
                    </div>
                </div>
                <a  class="dropdown-item" href="{{ route('user.show', ['user' => '4']) }}">
                My Profile
                                                    </a>
                <a class="dropdown-item" href="{{ route('change_password') }}">Thay đổi mật khẩu</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">
                    Logout
                    </button>
                </form>

            </div>
        </li>

    </ul>

</div>

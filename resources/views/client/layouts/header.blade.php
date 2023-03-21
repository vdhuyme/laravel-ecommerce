<header class="main-header-area">
    <!-- Header Top Area Start Here -->
    <div class="header-top-area">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-12 col-custom header-top-wrapper text-center">
                    <div class="short-desc text-white">
                        <p>Chúng tôi luôn cam kết chất lượng</p>
                    </div>
                    <div class="header-top-button">
                        <a href="{{route('listOfProducts')}}">Mua sắm ngay</a>
                    </div>
                    <span class="top-close-button text-white">X</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Main Header Area Start -->
    <div class="main-header">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                            <div class="header-logo d-flex align-items-center">
                                <a href="/">
                                    <img class="img-full" src="client/assets/images/logo/logo.png" alt="Header Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xl-7 position-static d-none d-lg-block col-custom">
                            <nav class="main-nav d-flex justify-content-center">
                                <ul class="nav">
                                    <li>
                                        <a href="/">
                                            <span class="menu-text"> Trang chủ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('listOfProducts')}}">
                                            <span class="menu-text"> Cừa hàng</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('listOfArticles')}}">
                                            <span class="menu-text">Bài viết</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('contactUs')}}">
                                            <span class="menu-text">Liên hệ</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-2 col-xl-3 col-sm-6 col-6 col-custom">
                            <div class="header-right-area main-nav">
                                <ul class="nav">
                                    @if (Auth::user())
                                    <li class="sidemenu-wrap d-none d-lg-flex">
                                        <a href="{{route('myAccount')}}">Tài khoản</a>
                                    </li>
                                    @else
                                    <li class="sidemenu-wrap d-none d-lg-flex">
                                        <a href="{{route('login')}}">Đăng nhập</a>
                                    </li>
                                    @endif

                                    <livewire:client.cart.mini-cart>

                                        <li class="mobile-menu-btn d-lg-none">
                                            <a class="off-canvas-btn">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header Area End -->

    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper" id="mobileMenu">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="off-canvas-inner">
                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li><a href="/">Trang chủ</a></li>
                            <li><a href="{{route('listOfProducts')}}">Cửa hàng</a></li>
                            <li><a href="{{route('listOfArticles')}}">Bài viết</a></li>
                            <li><a href="{{route('contactUs')}}">Liên hệ</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->
                <div class="header-top-settings offcanvas-curreny-lang-support">
                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            @if (Auth::user())
                            <li class="menu-item-has-children">
                                <a href="{{route('myAccount')}}">Tài khoản</a>
                            </li>
                            @else
                            <li class="menu-item-has-children">
                                <a href="{{route('login')}}">Đăng nhập</a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="top-info-wrap text-left text-black">
                        <ul>
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="tel:0962785101">0962785101</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:voduchuy2001@gmail.com">voduchuy2001@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-widget-social">
                        <a title="Facebook-f" href="https://www.facebook.com/VDH.me" target="_blank"><i
                                class="fa fa-facebook-f"></i></a>
                        <a title="Youtube" href="https://www.facebook.com/VDH.me" target="_blank"><i
                                class="fa fa-youtube"></i></a>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
</header>
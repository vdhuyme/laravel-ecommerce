<header class="header-area header-padding-1 sticky-bar header-res-padding clearfix">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-6 col-4">
                <div class="logo">
                    <x-link
                            :to="route('/')">
                        <img alt="" src="{{ asset('assets/client/img/logo/logo.png') }}">
                    </x-link>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                <div class="main-menu">
                    <nav>
                        <ul>
                            <li><x-link :to="route('/')">{{ __('Trang chủ') }}</x-link></li>
                            <li><x-link :to="route('product-list')">{{ __('Sản phẩm') }}</x-link></li>
                            <li><x-link href="shop.html">{{ __('Bài viết') }}</x-link></li>
                            <li><x-link href="shop.html">{{ __('Liên hệ') }}</x-link></li>
                            <li><x-link href="shop.html">{{ __('Tuyển dụng') }}</x-link></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-6 col-8">
                <div class="header-right-wrap">
                    <div class="same-style header-search">
                        <a class="search-active" href="#"><i class="pe-7s-search"></i></a>
                        <div class="search-content">
                            <form action="#">
                                <input type="text" placeholder="{{ __('Nhập từ khóa') }}" />
                                <button class="button-search"><i class="pe-7s-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="same-style account-satting">
                        <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                        @if(! Auth::user())
                            <div class="account-dropdown">
                                <ul>
                                    <li><x-link
                                                :to="route('login')">{{ __('Đăng nhập') }}</x-link></li>
                                    <li><x-link
                                                :to="route('register')">{{ __('Đăng kí') }}</x-link></li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="same-style header-wishlist">
                        <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                    </div>

                    <div>
                        <livewire:client.cart.mini-cart wire:key="miniCart" />
                    </div>
                </div>
            </div>
        </div>

        <div class="mobile-menu-area">
            <div class="mobile-menu">
                <nav id="mobile-menu-active">
                    <ul class="menu-overflow">
                        <li><x-link :to="route('/')">{{ __('Trang chủ') }}</x-link></li>
                        <li><x-link :to="route('product-list')">{{ __('Sản phẩm') }}</x-link></li>
                        <li><x-link href="shop.html">{{ __('Bài viết') }}</x-link></li>
                        <li><x-link href="shop.html">{{ __('Liên hệ') }}</x-link></li>
                        <li><x-link href="shop.html">{{ __('Tuyển dụng') }}</x-link></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="{{ route('dashboard') }}" class="logo logo-light">
             <span class="logo-sm">
                 <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
             </span>

            <span class="logo-lg">
                <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="Logo" height="17">
            </span>
        </a>

        <button
                type="button"
                class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>

            <ul class="navbar-nav" id="navbar-nav">
                <x-admin.left-sidebar.item
                        :route="route('dashboard')"
                        name="Thống kê"
                        icon="bx bx-tachometer"/>

                <x-admin.left-sidebar.item
                        :route="route('categories')"
                        name="Danh mục"
                        icon="bx bx-category-alt"/>

                <x-admin.left-sidebar.item
                        :route="route('products')"
                        name="Sản phẩm"
                        icon="bx bx-cookie"/>

                <x-admin.left-sidebar.item
                        :route="route('posts')"
                        name="Bài viết"
                        icon="bx bx-news"/>

                <x-admin.left-sidebar.item
                        :route="route('banners')"
                        name="Banner"
                        icon="bx bx-slider-alt"/>

                <x-admin.left-sidebar.item
                        :route="route('users')"
                        name="Người dùng"
                        icon="bx bx-user-circle"/>

                <x-admin.left-sidebar.item
                        :route="route('orders')"
                        name="Đơn hàng"
                        icon="bx bx-list-ol"/>

                <x-admin.left-sidebar.item
                        :route="route('contacts')"
                        name="Liên hệ"
                        icon="bx bx-mail-send"/>
            </ul>
        </div>
    </div>
</div>
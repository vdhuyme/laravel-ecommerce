<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="" height="45">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link menu-link">
                        <i class="bx bx-tachometer"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('categories') }}" class="nav-link menu-link">
                        <i class="bx bx-category-alt"></i> <span>Categories</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('products') }}" class="nav-link menu-link">
                        <i class="bx bx-cookie"></i> <span>Products</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('articles') }}" class="nav-link menu-link">
                        <i class="bx bx-news"></i> <span>Articles</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('banners') }}" class="nav-link menu-link">
                        <i class="bx bx-slider-alt"></i> <span>Banners</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users') }}" class="nav-link menu-link">
                        <i class="bx bx-user-circle"></i> <span>Users</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('orders') }}" class="nav-link menu-link">
                        <i class="bx bx-list-ol"></i> <span>Orders <livewire:admin.order.count-component></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contacts') }}" class="nav-link menu-link">
                        <i class="bx bx-mail-send"></i> <span>Contacts <livewire:admin.contact.count-component></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
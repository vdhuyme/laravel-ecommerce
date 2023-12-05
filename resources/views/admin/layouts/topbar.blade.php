<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <div class="navbar-brand-box horizontal-logo">
                    <a href="#" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                        id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>

            <div class="d-flex align-items-center">
                <livewire:admin.dashboard.contact-notify-component></livewire:admin.dashboard.contact-notify-component>

                <livewire:admin.dashboard.order-notify-component></livewire:admin.dashboard.order-notify-component>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded header-profile-user" src="{{ asset('admin/assets/images/avatar.png') }}"
                                 alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span
                                        class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->firstName }}
                                    {{ Auth::user()->lastName }}</span>
                                <span
                                        class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ Auth::user()->isAdmin }}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <h6 class="dropdown-header">Welcome {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}
                        </h6>
                        <a class="dropdown-item" href="{{ route('user-profile') }}"><i
                                    class="ri-user-settings-line text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle">Your Profile</span></a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                                    class="ri-login-circle-line fs-16 align-middle me-1 text-danger"></i> <span
                                    class="align-middle text-danger" data-key="t-logout">Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="{{ asset('assets/web/images/logo.jpg') }}" height="50" alt="Munagasatcom" loading="lazy" />
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">حول البوابة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الشروط والاحكام</a>
                </li>
                <!-- Navbar dropdown -->
                <li class="nav-item dropdown">
                    <a data-mdb-toggle="dropdown" class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                        role="button" aria-expanded="false">خدماتنا
                    </a>
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="#">مناقصات حكومية</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">مراكز اعمال</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">فرص استثمارية</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">الاشتراكات</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">المدونة</a>
                </li>

            </ul>
            <!-- Left links -->

        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">

            @auth
                <!-- Notifications -->
                <div class="dropdown">
                    <a data-mdb-toggle="dropdown" class="text-reset me-3 fa-lg dropdown-toggle hidden-arrow" href="#"
                        id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </div>

                <!-- Avatar -->
                <div class="dropdown">
                    <a data-mdb-toggle="dropdown" class="dropdown-toggle d-flex align-items-center hidden-arrow"
                        href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="30"
                            alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" target="_blank" href="{{ route('admin.index') }}">لوحة التحكم</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('web.logout') }}">تسجيل الخروج</a>
                        </li>
                    </ul>
                </div>
            @endauth




            @guest
                <button data-mdb-ripple-init type="button" class="btn me-3 text-white bg-color-login-form">
                    <i class="fas fa-right-to-bracket me-2"></i>
                    <span style="font-size: 15px;">
                        تسجيل الدخول
                    </span>
                </button>
            @endguest


        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->

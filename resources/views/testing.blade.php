o<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing MDB</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />

    <link rel="stylesheet" href="{{ asset('assets/admin/mdb-pro/css/core.rtl.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('RMDB/mdb.min.css') }}" /> --}}


</head>

<body>

    <!-- Sidenav -->


    <nav data-mdb-sidenav-init data-mdb-hidden="false" data-mdb-accordion="true" data-mdb-mode="side"
        class="sidenav sidenav-toggler-element ps ps--active-y" role="navigation" id="sidenav-1"
        data-mdb-color="secondary">

        <a class="ripple d-flex justify-content-center py-5" style="padding-top: 5rem !important;"
            href="{{ route('admin.index') }}" data-ripple-color="primary">

            <img id="MDB-logo" width="200" src="{{ asset('assets/admin/images/munagasatcom-brand.png') }}"
                alt="MDB Logo" draggable="false" />
        </a>

        <ul class="sidenav-menu">
            <li class="sidenav-item">
                <a class="sidenav-link" href="{{ route('admin.index') }}">
                    <i class="fas fa-chart-area pr-4 me-2 "></i><span>الصفحة الرئيسية</span></a>
            </li>
            <li class="sidenav-item">
                <a class="sidenav-link"><i class="far fa-list-alt pr-3 me-3"></i><span>Examples</span></a>
                <ul class="sidenav-collapse">
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-basic-example">Basic</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-positioning">Positioning</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-colors">Colors</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-dark">Dark</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-fixed-header">Fixed header</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-slim">Slim</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-accordion">Accordion</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-groups">Groups</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-right">Right</a>
                    </li>

                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-positioning">Positioning</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-colors">Colors</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-dark">Dark</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-fixed-header">Fixed header</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-slim">Slim</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-accordion">Accordion</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-groups">Groups</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-right">Right</a>
                    </li>


                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-positioning">Positioning</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-colors">Colors</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-dark">Dark</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-fixed-header">Fixed header</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-slim">Slim</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-accordion">Accordion</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-groups">Groups</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-right">Right</a>
                    </li>

                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-positioning">Positioning</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-colors">Colors</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-dark">Dark</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-fixed-header">Fixed header</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-slim">Slim</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-accordion">Accordion</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-groups">Groups</a>
                    </li>
                    <li class="sidenav-item">
                        <a class="sidenav-link" href="#section-sidenav-right">Right</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- Sidenav -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sidenav-light bg-body-tertiary" style="background-color: #303030; ">
        <!-- Container wrapper -->
        <div class="container">



            <button id="sidenav-toggler" data-mdb-toggle="sidenav" data-mdb-target="#sidenav-1" type="button"
                class="btn shadow-0 p-2 me-3 sidenav-toggler-button" aria-expanded="false">
                <i class="fas fa-bars fa-lg fs-5"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">

                    <img src="{{ asset('assets/admin/images/munagasatcom-logo.png') }}" height="30"
                        alt="Munagasatcom" loading="lazy" />
                </a>

                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 20px;" href="#">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 20px;" href="#">فريق العمل</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 20px;" href="#">المدونة</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <a class="text-reset me-3" href="#">
                    <i class="fas fa-shopping-cart"></i>
                </a>

                <!-- Notifications -->
                <div class="dropdown">
                    <a data-mdb-dropdown-init class="text-reset me-3 dropdown-toggle hidden-arrow" href="#"
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
                    <a data-mdb-dropdown-init class="dropdown-toggle d-flex align-items-center hidden-arrow"
                        href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="#">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->



    <script type="text/javascript" src="{{ asset('assets/admin/mdb-pro/js/core.min.js') }}"></script>

    <script>
        const instance = mdb.Sidenav.getInstance(document.getElementById('sidenav-1'));
        instance.show();
    </script>

</body>

</html>

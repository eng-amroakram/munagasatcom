<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/new-prism.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/web/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/mdb.rtl.min.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/images/munagasatcom-logo.png') }}">

    @livewireStyles()
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

</head>

<body>

    <header>
        <div class="overlay">
            <div class="header-content">

                <nav class="navbar navbar-expand-lg navbar">
                    <!-- Container wrapper -->
                    <div class="container">

                        <!-- Toggle button -->
                        <button data-mdb-collapse-init class="navbar-toggler" type="button"
                            data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>


                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('assets/web/images/header-logo.png') }}" alt="مناقصاتكم">
                        </a>

                        <!-- Collapsible wrapper -->
                        <div class="collapse navbar-collapse" id="navbarCenteredExample">
                            <!-- Left links -->
                            <ul class="navbar-nav m-auto">

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">من نحن</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">خدماتنا</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">شركاؤنا</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">احصائيات</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">اتصل بنا</a>
                                </li>

                            </ul>
                            <!-- Left links -->
                        </div>
                        <!-- Collapsible wrapper -->
                    </div>
                    <!-- Container wrapper -->
                </nav>

                <div class="text">
                    <h1>الموقع الأول في المملكة العربية السعودية</h1>
                    <p>
                        أعلى مستويات الجودة في مجال خدمات إدارة المناقصات بين القطاع الحكومي
                        والقطاع الخاص من خلال الثقه المتبادلة لإنجاح المشاريع
                    </p>
                </div>

                <div class="col-md-12 header-btn">
                    @if (!auth()->check())
                        <a href="{{ route('web.login') }}">
                            <button type="button" class="btn login-btn"> تسجيل الدخول</button>
                        </a>
                    @else
                        <a href="/tenders">
                            <button type="button" class="btn login-btn"> الدخول للمنصة </button>
                        </a>
                    @endif
                </div>



            </div>
        </div>
    </header>


    {{-- Start of About Us Section  --}}
    <section class="about-us" id="about-us">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <div class="text">
                        <h2 class="sub-title">
                            من نحن
                        </h2>
                        <p>
                            إننا في مناقصاتكم نعمل على المشاركة في إثراء التبادل التجاري بين الجهات الحكومية وقطاع
                            الأعمال من خلال
                            تنوع مجال الخدمات التي يقدمها موقع مناقصاتكم لمساعدة عملاءنا في تحقيق أهدافهم بأفضل
                            المواصفات والاسعار.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="images">
                        <img src="{{ asset('assets/web/images/man.png') }}" alt="Man Image">
                        <div class="text">
                            <p>
                                مناقصاتكم وجدت لتحقق أهدافكم بأفضل المواصفات والأسعار
                            </p>
                        </div>
                        <img src="{{ asset('assets/web/images/Component41.png') }}" alt="Hat Image">
                        <div class="overlay-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End of About Us Section  --}}


    {{-- Start of Our Misssion Section  --}}
    <section class="our-mission">
        <div class="container">
            <h2 class="sub-title">
                مهمتنا
            </h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="icon">
                        <i class="far fa-lightbulb"></i>
                    </div>
                    <h5 class="list-text">
                        توفير الحلول
                    </h5>
                </div>
                <div class="col-md-3">
                    <div class="icon">
                        <i class="far fa-check-circle"></i>
                    </div>
                    <h5 class="list-text">
                        الشفافية
                    </h5>
                </div>
                <div class="col-md-3">
                    <div class="icon">
                        <i class="fas fa-hotel"></i>
                    </div>
                    <h5 class="list-text">
                        البيئة المناسبة
                    </h5>
                </div>
                <div class="col-md-3">
                    <div class="icon">
                        <i class="far fa-bell"></i>
                    </div>
                    <h5 class="list-text">
                        الابتكار والتجدد
                    </h5>
                </div>
            </div>
        </div>

    </section>
    {{-- End of Our Misssion Section  --}}

    {{-- Start of Our partners section  --}}
    <section class="our-partners" id="our-partners">
        <div class="container">
            <h2 class="sub-title">
                شركاؤنا
            </h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="image">
                        <img src="{{ asset('assets/web/images/372d5d4d3124b.jpg') }}" alt="شعار بادر">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="image">
                        <img src="{{ asset('assets/web/images/contractors-logo-transperent1.png') }}"
                            alt="وزارة الشؤون الادارية ">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="image">
                        <img src="{{ asset('assets/web/images/11.png') }}" alt="الهيئة السعودية للمقاولين ">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="image">
                        <img src="{{ asset('assets/web/images/719Logo.jpg') }}" alt=" الهيئة السعودية للمهندسين">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End of Our partners section  --}}

    {{-- Start of more info section  --}}
    <section class="more-info">
        <div class="container">
            <div class="content">
                <img src="{{ asset('assets/web/images/header-logo.png') }}" alt="logo">
            </div>
            <div class="social-media">
                <div class="social-icon">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="social-icon">
                    <a href="https://twitter.com/munagasatcom"><i class="fab fa-twitter"></i></a>
                </div>
                <div class="social-icon">
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
                <div class="social-icon">
                    <a href="https://www.youtube.com/channel/UCtd4FZec2L8KA4NHHOR7gvw"><i
                            class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </section>
    {{-- End of more info section  --}}


    {{-- Start of Contact us section  --}}
    <section class="contact-us" id="contact-us">
        <div class="overlay">
            <div class="container">
                <h2 class="sub-title">اتصل بنا</h2>
                <h3>فريق متخصص للرد على استفساراتكم واقتراحاتكم</h3>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="fullname"></label>
                            <input type="text" class="form-control" id="fullname" placeholder="الاسم كامل"
                                required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phonenum"></label>
                            <input type="number" class="form-control" id="phonenum" placeholder="رقم الموبايل"
                                required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Email"></label>
                            <input type="email" class="form-control" id="Email"
                                placeholder="البريد الالكتروني" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="message"></label>
                            <textarea name="message" id="message" class="form-control" rows="7" required>كيف يمكننا مساعدتك</textarea>
                        </div>
                        <button type="submit" class="btn send-btn">ارسال</button>
                </form>
            </div>
        </div>
    </section>
    {{-- End of Contact us section  --}}



    <footer>
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-lg">
                        <div class="contact-info">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-map-marker-alt"></i>
                                    المملكة العربية السعودية
                                </li>
                                <li>
                                    <i class="far fa-envelope"></i>
                                    info@munagasatcom.com
                                </li>
                                <li>
                                    <i class="fas fa-headset"></i>
                                    support@munagasatcom.com
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    920008769
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="contact-form">
                            <p>
                                اشترك في النشرة ليصلك كل جديد
                            </p>


                            <form method="POST" action="/free_letter">
                                {{ csrf_field() }}

                                <input type="text" name="email" class="form-control " placeholder="البريد الالكتروني">
                                <button class="btn" type="submit">إرسال</button>

                            </form>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="image">
                            <img src="{{ asset('assets/web/images/1334-layers.png') }}" alt="map">
                        </div>
                    </div>
                </div>


            </div>

            <div class="footer-bottom">
                <img src="{{ asset('assets/web/images/1200px-Saudi_Vision_2030_logo.svg.png') }}" alt="image">

            </div>
        </div>

    </footer>


    <div id="top">
        <i class="fas fa-arrow-up"></i>
    </div>







    <script type="text/javascript" src="{{ asset('assets/admin/js/new-prism.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/main.js') }}"></script>

    @livewireScripts()

</body>

</html>

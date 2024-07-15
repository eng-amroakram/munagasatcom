<header>
    <div class="overlay">
        <div class="header-content">
            {{-- Start NavBar --}}
            <nav class="navbar navbar-expand-lg navbar">
                <div class="container">

                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('assets/web/images/header-logo.png') }}" alt="مناقصاتكم">
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fas fa-bars"></i>
                        </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">الرئيسية
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about-us">من نحن</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#our-services">خدماتنا</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#our-partners">شركاؤنا</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#statistics">احصائيات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact-us">اتصل بنا</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- End NavBar --}}

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

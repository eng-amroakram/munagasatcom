@extends('layouts.web.landing-page')
@section('content')
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
                        <div class="text-box">
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


    {{-- Start of Our Services Section  --}}
    <section class="our-services" id="our-services">
        <div class="container">
            <h2 class="sub-title">
                خدماتنا
            </h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="image">
                        <div class="overlay-1">
                            <h3>خدماتنا</h3>
                        </div>
                        <img src="{{ asset('assets/web/images/architecture-2256489_1920.png') }}" alt="architecture">

                        <div class="overlay">
                            <h4>خدماتنا</h4>
                            <p>
                                إننا في مناقصاتكم نعمل على المشاركة في إثراء التبادل التجاري بين الجهات الحكومية وقطاع
                                الأعمال من خلال
                            </p>
                            <a href="" class="btn">اعرف المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="image">
                        <div class="overlay-1">
                            <h3>مراكز الأعمال</h3>
                        </div>
                        <img src="{{ asset('assets/web/images/office-1209640_1920.png') }}" alt="office">
                        <div class="overlay">
                            <h4>مراكز الأعمال</h4>
                            <p>
                                إننا في مناقصاتكم نعمل على المشاركة في إثراء التبادل التجاري بين الجهات الحكومية وقطاع
                                الأعمال من خلال
                            </p>
                            <a href="" class="btn">اعرف المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="image">
                        <div class="overlay-1">
                            <h3>الفرص الاستثمارية</h3>
                        </div>
                        <img src="{{ asset('assets/web/images/calculator-1044173_1920.png') }}" alt="calculator">
                        <div class="overlay">
                            <h4>الفرص الاستثمارية</h4>
                            <p>
                                إننا في مناقصاتكم نعمل على المشاركة في إثراء التبادل التجاري بين الجهات الحكومية وقطاع
                                الأعمال من خلال
                            </p>
                            <a href="" class="btn">اعرف المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="image">
                        <div class="overlay-1">
                            <h3>الخدمة البريدية المخصصة</h3>
                        </div>
                        <img src="{{ asset('assets/web/images/download.png') }}" alt="posts">
                        <div class="overlay">
                            <h4>خدماتنا</h4>
                            <p>
                                إننا في مناقصاتكم نعمل على المشاركة في إثراء التبادل التجاري بين الجهات الحكومية وقطاع
                                الأعمال من خلال
                            </p>
                            <a href="" class="btn">اعرف المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    {{-- End of Our Services Section  --}}


    {{-- Start of Figures and Statistics Section --}}

    {{-- <section class="statistics" id="statistics">
        <div class="container">
            <h2 class="sub-title">
                أرقام وإحصائيات
            </h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <span class="counter">{{ 546 }} </span>
                    <img src="{{ asset('assets3/img/Path_12088.png') }}" alt="عدد الكراسات" class="icon-pic">
                    <h5 class="list-text">عدد الكراسات</h5>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <span class="counter">{{ 45 }} </span>
                    <img src="{{ asset('assets3/img/Path_12082.png') }}" alt="مراكز الأعمال " class="icon-pic">
                    <h5 class="list-text">عدد الأعضاء والمنشآت </h5>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <span class="counter">{{ 563 }}</span>
                    <img src="{{ asset('assets3/img/Path_12083.png') }}" alt="عروض الأسعار " class="icon-pic">
                    <h5 class="list-text">عروض الأسعار</h5>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <span class="counter">{{ 345 }} </span>
                    <img src="{{ asset('assets3/img/Path_12085.png') }}" alt="الفرص الاستثمارية " class="icon-pic">
                    <h5 class="list-text"> الفرص الاستثمارية</h5>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- End of Figures and Statistics Section --}}

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
                    <a href="https://www.youtube.com/channel/UCtd4FZec2L8KA4NHHOR7gvw"><i class="fab fa-youtube"></i></a>
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
                            <input type="text" class="form-control" id="fullname" placeholder="الاسم كامل" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phonenum"></label>
                            <input type="number" class="form-control" id="phonenum" placeholder="رقم الموبايل"
                                required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Email"></label>
                            <input type="email" class="form-control" id="Email" placeholder="البريد الالكتروني"
                                required>
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
@endsection

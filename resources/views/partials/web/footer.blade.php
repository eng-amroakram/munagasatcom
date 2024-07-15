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

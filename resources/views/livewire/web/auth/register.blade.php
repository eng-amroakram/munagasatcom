<div class="container login-form" wire:ignore>
    <div class="text-center mb-3 fs-4">
        <p class="fw-bold color-register-form">فتح حساب جديد</p>
    </div>
    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active bg-color-register-form" id="tab-register" data-mdb-toggle="pill"
                href="#pills-person" role="tab" aria-controls="pills-person" aria-selected="true"
                style="font-size: 15px;">فرد</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-company" role="tab"
                aria-controls="pills-company" aria-selected="false" style="font-size: 15px;">منشأة</a>
        </li>
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-person" role="tabpanel" aria-labelledby="tab-register">

            <!-- Name input -->
            <div class="form-outline mb-4">
                <i class="fas fa-user trailing"></i>
                <input type="text" id="form1" wire:model.defer="name"
                    class="form-control form-control-lg form-icon-trailing web-name-register-input" />
                <label class="form-label" for="form1">الاسم</label>
                <div class="form-helper text-danger web-name-register-validation"></div>
            </div>


            <!-- Email input -->
            <div class="form-outline mb-4">
                <i class="fas fa-envelope trailing"></i>
                <input type="text" id="form1" wire:model.defer="email"
                    class="form-control form-control-lg form-icon-trailing web-email-register-input" />
                <label class="form-label" for="form1">البريد الالكتروني</label>
                <div class="form-helper text-danger web-email-register-validation"></div>
            </div>

            <!-- phone input -->
            <div class="form-outline mb-4">
                <i class="fas fa-phone trailing"></i>
                <input type="text" id="form1" wire:model.defer="phone"
                    class="form-control form-control-lg form-icon-trailing web-phone-register-input" />
                <label class="form-label" for="form1">رقم الهاتف</label>
                <div class="form-helper text-danger web-phone-register-validation"></div>
            </div>


            <!-- password input -->
            <div class="form-outline mb-4">
                <i class="fas fa-lock trailing"></i>
                <input type="password" id="form1" wire:model.defer="password" maxlength="30"
                    class="form-control form-control-lg form-icon-trailing web-password-register-input" />
                <label class="form-label" for="form1">كلمة السر</label>
                <div class="form-helper text-danger web-password-register-validation"></div>
            </div>

            <!-- confirm password input -->
            <div class="form-outline mb-4">
                <i class="fas fa-lock trailing"></i>
                <input type="password" id="form1" wire:model.defer="password_confirmation" maxlength="30"
                    class="form-control form-control-lg form-icon-trailing web-password-confirmationcon-register-input" />
                <label class="form-label" for="form1">تأكيد كلمة المرور</label>
                <div class="form-helper text-danger web-password-confirmationcon-register-validation"></div>
            </div>


            <!-- Submit button -->
            <button type="submit"
                class="btn btn-block mb-4 fs-6 text-white bg-color-login-form web-submit-register-person-button">تسجيل</button>


            <h2 class="or"><span>او</span></h2>
            <!-- Register buttons -->
            <div class="text-center">
                <p>لديك حساب؟ <a href="{{ route('web.login') }}" class="color-login-form">قم بتسجيل الدخول</a></p>
            </div>


        </div>


        <div class="tab-pane fade" id="pills-company" role="tabpanel" aria-labelledby="tab-register">
            <!-- Name input -->
            <div class="form-outline mb-4">
                <i class="fas fa-user trailing"></i>
                <input type="text" id="form1" wire:model.defer="name"
                    class="form-control form-control-lg form-icon-trailing web-name-register-input" />
                <label class="form-label" for="form1">الاسم</label>
                <div class="form-helper text-danger web-name-register-validation"></div>
            </div>


            <!-- Email input -->
            <div class="form-outline mb-4">
                <i class="fas fa-envelope trailing"></i>
                <input type="text" id="form1" wire:model.defer="email"
                    class="form-control form-control-lg form-icon-trailing web-email-register-input" />
                <label class="form-label" for="form1">البريد الالكتروني</label>
                <div class="form-helper text-danger web-email-register-validation"></div>
            </div>

            <!-- phone input -->
            <div class="form-outline mb-4">
                <i class="fas fa-phone trailing"></i>
                <input type="text" id="form1" wire:model.defer="phone"
                    class="form-control form-control-lg form-icon-trailing web-phone-register-input" />
                <label class="form-label" for="form1">رقم الهاتف</label>
                <div class="form-helper text-danger web-phone-register-validation"></div>
            </div>


            <!-- password input -->
            <div class="form-outline mb-4">
                <i class="fas fa-lock trailing"></i>
                <input type="password" id="form1" wire:model.defer="password" maxlength="30"
                    class="form-control form-control-lg form-icon-trailing web-password-register-input" />
                <label class="form-label" for="form1">كلمة السر</label>
                <div class="form-helper text-danger web-password-register-validation"></div>
            </div>

            <!-- confirm password input -->
            <div class="form-outline mb-4">
                <i class="fas fa-envelope trailing"></i>
                <input type="password" id="form1" wire:model.defer="password_confirmation" maxlength="30"
                    class="form-control form-control-lg form-icon-trailing web-password-confirmationcon-register-input" />
                <label class="form-label" for="form1">تأكيد كلمة المرور</label>
                <div class="form-helper text-danger web-password-confirmationcon-register-validation"></div>
            </div>


            <!-- Submit button -->
            <button type="submit"
                class="btn btn-block mb-4 fs-6 text-white bg-color-login-form web-submit-register-company-button">تسجيل</button>


            <h2 class="or"><span>او</span></h2>
            <!-- Register buttons -->
            <div class="text-center">
                <p>لديك حساب؟ <a href="{{ route('web.login') }}" class="color-login-form">قم بتسجيل الدخول</a></p>
            </div>

        </div>

    </div>
</div>


@push('web-register-script')
    <script>
        $(document).ready(function() {

            // Values
            var $web_name_register_value = "";
            var $web_email_register_value = "";
            var $web_phone_register_value = "";
            var $web_password_register_value = "";
            var $web_password_confirmation_register_value = "";

            // Inputs
            var $web_name_register_validation = $(".web-name-register-validation");
            var $web_email_register_validation = $(".web-email-register-validation");
            var $web_phone_register_validation = $(".web-phone-register-validation");
            var $web_password_register_validation = $(".web-password-register-validation");
            var $web_password_confirmation_register_validation = $(
                ".web-password-confirmationcon-register-validation");

            // Validations
            var $web_name_register_input = $(".web-name-register-input");
            var $web_email_register_input = $(".web-email-register-input");
            var $web_phone_register_input = $(".web-phone-register-input");
            var $web_password_register_input = $(".web-password-register-input");
            var $web_password_confirmation_register_input = $(".web-password-confirmationcon-register-input");

            // Buttons
            var $web_submit_register_person_button = $(".web-submit-register-person-button");
            var $web_submit_register_company_button = $(".web-submit-register-company-button");

            $web_name_register_input.on('input', function() {
                $web_name_register_validation.text("");
                $web_name_register_value = $(this).val();
            });

            $web_email_register_input.on('input', function() {
                $web_email_register_validation.text("");
                $web_email_register_value = $(this).val();
            });

            $web_phone_register_input.on('input', function() {
                $web_phone_register_validation.text("");
                $web_phone_register_value = $(this).val();
            });

            $web_password_register_input.on('input', function() {
                $web_password_register_validation.text("");
                $web_password_register_value = $(this).val();
            });


            $web_password_confirmation_register_input.on('input', function() {
                $web_password_confirmation_register_validation.text("");
                $web_password_confirmation_register_value = $(this).val();
            });

            $web_submit_register_person_button.on('click', function() {
                let $result = web_register_validation();

                if ($result) {
                    @this.set('name', $web_name_register_value);
                    @this.set('email', $web_email_register_value);
                    @this.set('phone', $web_phone_register_value);
                    @this.set('password', $web_password_register_value);
                    @this.set('password_confirmation', $web_password_confirmation_register_value);
                    @this.set('form_type', "person");
                    Livewire.dispatch('submitting-web-register-data');
                }

            });

            $web_submit_register_company_button.on('click', function() {
                let $result = web_register_validation();

                if ($result) {
                    @this.set('name', $web_name_register_value);
                    @this.set('email', $web_email_register_value);
                    @this.set('phone', $web_phone_register_value);
                    @this.set('password', $web_password_register_value);
                    @this.set('password_confirmation', $web_password_confirmation_register_value);
                    @this.set('form_type', "company");
                    Livewire.dispatch('submitting-web-register-data');
                }

            });


            function web_register_validation() {
                $web_name_register_validation.text("");
                $web_email_register_validation.text("");
                $web_phone_register_validation.text("");
                $web_password_register_validation.text("");
                $web_password_confirmation_register_validation.text("");

                if (!$web_email_register_value && !$web_password_register_value && !$web_phone_register_value && !
                    $web_name_register_value) {
                    $web_name_register_validation.text("تأكد من الاسم !");
                    $web_email_register_validation.text("تأكد من الايميل !");
                    $web_phone_register_validation.text("تأكد من رقم الهاتف !");
                    $web_password_register_validation.text("تأكد من كلمة المرور!");
                    return false;
                }

                if (!$web_email_register_value) {
                    $web_email_register_validation.text("تأكد من الايميل !");
                    return false;
                }
                if (!$web_password_register_value) {
                    $web_password_register_validation.text("تأكد من كلمة المرور!");
                    return false;
                }

                if (!$web_name_register_value) {
                    $web_name_register_validation.text("تأكد من الاسم !");
                    return false;
                }
                if (!$web_phone_register_value) {
                    $web_phone_register_validation.text("تأكد من رقم الهاتف !");
                    return false;
                }

                if ($web_password_register_value != $web_password_confirmation_register_value) {
                    $web_password_confirmation_register_validation.text("كلمة السر غير متطابقة !");
                    return false;
                }

                return true;
            }


            //Validation From DB
            Livewire.on('web-registration-form-errors', function(value) {
                let message = value[0];

                if (message.password) {
                    $web_password_register_validation.text(message.password);
                }

                if (message.email) {
                    $web_email_register_validation.text(message.email);
                }

                if (message.name) {
                    $web_name_register_validation.text(message.name);
                }

                if (message.phone) {
                    $web_phone_register_validation.text(message.phone);
                }

            });

        });
    </script>
@endpush

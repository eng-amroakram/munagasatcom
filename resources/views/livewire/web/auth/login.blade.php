<div class="container login-form" wire:ignore>
    <div class="text-center mb-5 fs-3">
        <p class="fw-bold color-login-form">تسجيل الدخول</p>
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
        <i class="fas fa-envelope trailing"></i>
        <input type="text" id="form1" wire:model.defer="email"
            class="form-control form-control-lg form-icon-trailing web-email-login-input" />
        <label class="form-label" for="form1">البريد الالكتروني</label>
        <div class="form-helper text-danger web-email-login-validation"></div>
    </div>


    <!-- Password input -->
    <div class="form-outline mb-4">
        <i class="fas fa-lock trailing"></i>
        <input type="password" id="form1" wire:model.defer="password"
            class="form-control form-control-lg form-icon-trailing web-password-login-input" />
        <label class="form-label" for="form1">كلمة المرور</label>
        <div class="form-helper text-danger web-password-login-validation"></div>
    </div>

    <!-- 2 column grid layout -->
    <div class="row mb-4">
        <div class="col-md-6 d-flex">
            <!-- Checkbox -->
            <div class="form-check mb-3 mb-md-0">
                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                <label class="form-check-label" for="loginCheck">تذكرني</label>
            </div>
        </div>
    </div>


    <!-- Submit button -->
    <button type="submit" class="btn btn-block mb-4 fs-6 text-white bg-color-login-form web-submit-login-button">تسجيل
        الدخول</button>


    <div class="text-center">
        <a href="/admin/forgot" class="color-login-form">نسيت كلمة المرور؟</a>
    </div>
    <h2 class="or"><span>او</span></h2>
    <!-- Register buttons -->
    <div class="text-center">
        <p>ليس لديك حساب؟<a href="{{ route('web.register') }}" class="color-login-form">سجل</a></p>
    </div>

</div>

@push('web-login-script')
    <script>
        $(document).ready(function() {

            // Values
            var $web_email_login_value = "";
            var $web_password_login_value = "";

            // Inputs
            var $web_email_login_validation = $(".web-email-login-validation");
            var $web_password_login_validation = $(".web-password-login-validation");

            // Validations
            var $web_email_login_input = $(".web-email-login-input");
            var $web_password_login_input = $(".web-password-login-input");

            // Buttons
            var $web_submit_login_button = $(".web-submit-login-button");

            $web_email_login_input.on('input', function() {
                $web_email_login_validation.text("");
                $web_email_login_value = $(this).val();
            });

            $web_password_login_input.on('input', function() {
                $web_password_login_validation.text("");
                $web_password_login_value = $(this).val();
            });


            $web_submit_login_button.on('click', function() {
                let $result = web_login_validation();
                console.log($result);

                if ($result) {
                    @this.set('email', $web_email_login_value);
                    @this.set('password', $web_password_login_value);
                    Livewire.dispatch('submitting-web-login-data');
                }

            });


            function web_login_validation() {
                $web_email_login_validation.text("");
                $web_password_login_validation.text("");


                if (!$web_email_login_value && !$web_password_login_value) {
                    $web_email_login_validation.text("تأكد من الايميل !");
                    $web_password_login_validation.text("تأكد من كلمة المرور!");
                    return false;
                }

                if (!$web_email_login_value) {
                    $web_email_login_validation.text("تأكد من الايميل !");
                    return false;
                }
                if (!$web_password_login_value) {
                    $web_password_login_validation.text("تأكد من كلمة المرور!");
                    return false;
                }

                return true;
            }


            //Validation From DB
            Livewire.on('web-db-login-validation', function(value) {
                let message = value[0];

                if (message.password) {
                    $web_password_login_validation.text(message.password);
                }

                if (message.email) {
                    $web_email_login_validation.text(message.email);
                }
            });

        });
    </script>
@endpush

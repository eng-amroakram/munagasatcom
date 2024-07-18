<div class="container-fluid">
    <div class="p-4 mb-4" wire:ignore>


        <!-- Page Header-->
        <div class="row mb-4">

            <!-- Page Title  -->
            <h2 style="font-weight: bold;">تعديل المستخدم: {{ $user->name }}</h2>
            <!-- Page Title  -->

            <!-- Breadcrumb -->
            <nav data-mdb-navbar-init class="d-flex navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="font-weight: bold;">
                            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                            @can('company', auth()->user())
                                <li class="breadcrumb-item"><a href="#">إدارة الموظفين</a></li>
                            @endcan

                            @can('superadmin', auth()->user())
                                <li class="breadcrumb-item"><a href="#">إدارة العملاء</a></li>
                            @endcan
                            <li class="breadcrumb-item active"><a href="#">تعديل المستخدم: {{ $user->name }}</a>
                            </li>
                        </ol>
                    </nav>

                    {{-- <div class="d-flex align-items-center pe-3">
                        <!-- Notifications -->
                        <div class="dropdown">
                            <a data-mdb-dropdown-init class="link-secondary me-3 dropdown-toggle hidden-arrow"
                                href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                <i class="fas fa-gear"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" data-mdb-modal-init
                                        data-mdb-target="#create-new-user-modal" href="#create-new-user-modal">
                                        <i class="far fa-square-plus me-2"></i>
                                        <span>إضافة عميل</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#export-data" wire:click="exportUsers">
                                        <i class="fas fa-file-export me-2"></i>
                                        <span>تصدير البيانات</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div> --}}
                </div>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <!-- Page Header-->


        <div class="row">

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <div class="lightbox">
                            <img src="{{ $user->photo ? $user->photo : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' }}"
                                data-mdb-img="{{ $user->photo }}" alt="avatar" class="rounded-circle" width="200"
                                height="200">
                        </div>

                        <h5 class="my-3">{{ $user->name }}</h5>
                        <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary">Follow</button>
                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-outline-primary ms-1">Message</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        {{-- <div class="mask mask-color" wire:loading
                            style="z-index: 1; background-color: #303030; opacity: 50%;">
                            <div
                                class="position-absolute w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only text-primary">Loading...</span>
                                </div>
                                <h4 class="text-white">جاري التحميل يرجى الانتظار ...</h4>
                            </div>
                        </div>

                        <div class="mask mask-color" wire:loading wire:target="photo"
                            style="z-index: 1; background-color: #303030; opacity: 50%;">
                            <div
                                class="position-absolute w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only text-primary">Loading...</span>
                                </div>
                                <h4 class="text-white">جاري التحميل يرجى الانتظار ...</h4>
                            </div>
                        </div> --}}

                        <div class="row mb-3">
                            <div class="col-md-6">

                                <label class="form-label" for="forName"><strong>اسم
                                        المستخدم</strong></label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="far fa-user"></i>
                                    </span>

                                    <input type="name" wire:model.defer="name" maxlength="15" class="form-control"
                                        placeholder="ادخل اسم المستخدم" />

                                </div>
                                <div class="form-helper text-danger name-edit-user-validation reset-validation">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="forPhone"><strong>رقم الهاتف</strong></label>
                                <div class="input-group">

                                    <input type="phone" wire:model.defer="phone" maxlength="10" class="form-control"
                                        placeholder="ادخل رقم الهاتف" />
                                    <span class="input-group-text">966+</span>
                                </div>
                                <div class="form-helper text-danger phone-edit-user-validation reset-validation">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="forEmail"><strong>البريد
                                        الالكتروني</strong></label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-at"></i>
                                    </span>

                                    <input type="email" wire:model.defer="email" maxlength="60" class="form-control"
                                        placeholder="ادخل البريد الالكتروني" />

                                </div>
                                <div class="form-helper text-danger email-edit-user-validation reset-validation">
                                </div>
                            </div>

                            @can('company', auth()->user())
                                <div class="col-md-6">
                                    <x-file-input name="photo" label="صورة المستخدم" model="user"></x-file-input>
                                </div>
                            @endcan

                            @can('superadmin', auth()->user())
                                <div class="col-md-6">
                                    <label class="form-label" for="forAccountType"><strong>نوع
                                            الحساب</strong></label>
                                    <select class="select" id="edit-user-account-type" wire:model.defer="account_type">
                                        <option value="employee">موظف</option>
                                        <option value="company">شركة</option>
                                        <option value="person">فرد</option>
                                        <option value="admin">أدمن فرعي</option>
                                        <option value="superadmin">أدمن رئيسي</option>
                                    </select>
                                    <div
                                        class="form-helper text-danger account_type-create-new-user-validation reset-validation">
                                    </div>
                                </div>
                            @endcan

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="forAccountType"><strong>حالة
                                        الحساب</strong></label>
                                <select class="select" id="edit-user-account-status" wire:model.defer="account_status">
                                    <option value="active">نشط</option>
                                    <option value="inactive">غير نشط</option>
                                </select>
                                <div
                                    class="form-helper text-danger account_status-edit-user-validation reset-validation">
                                </div>
                            </div>

                            <div class="col-md-6">

                                <label class="form-label" for="forPassword"><strong>كلمة
                                        المرور</strong></label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>

                                    <input type="password" wire:model.defer="password" maxlength="25"
                                        class="form-control" placeholder="ادخل كلمة المرور" />

                                </div>
                                <div class="form-helper text-danger password-edit-user-validation reset-validation">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            @can('superadmin', auth()->user())
                                <div class="col-md-6">
                                    <x-file-input name="photo" label="صورة المستخدم" model="user"></x-file-input>
                                </div>
                            @endcan
                        </div>

                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color"
                            wire:click='editUser()'>تحديث</button>
                    </div>

                </div>

            </div>
        </div>

        @can('superadmin', auth()->user())
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">

                        <div class="card-header">
                            <h5 class="card-title fw-bold m-0 mt-2">الصلاحيات</h5>
                        </div>


                        <div class="card-body" id="permissions-1" style="overflow-y: auto; height: 500px;">

                            <a href="#section-2" data-mdb-smooth-scroll="smooth-scroll"
                                data-mdb-container="#permissions-1"></a>

                            {{--
                            <div class="mask mask-color" wire:loading
                                style="z-index: 1; background-color: #303030; opacity: 50%;">
                                <div
                                    class="position-absolute w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only text-primary">Loading...</span>
                                    </div>
                                    <h4 class="text-white">جاري التحميل يرجى الانتظار ...</h4>
                                </div>
                            </div>

                            <div class="mask mask-color" wire:loading wire:target="photo"
                                style="z-index: 1; background-color: #303030; opacity: 50%;">
                                <div
                                    class="position-absolute w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only text-primary">Loading...</span>
                                    </div>
                                    <h4 class="text-white">جاري التحميل يرجى الانتظار ...</h4>
                                </div>
                            </div> --}}


                            @foreach (config('users.permissions.permissions_names') as $permission_type => $permissions)
                                <h5 class="card-title mb-3">{{ __($permission_type) }}</h5>
                                <div class="row mb-3">

                                    @foreach ($permissions as $permission)
                                        <div class="col-md-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model.defer="permissions" value="{{ $permission }}" />
                                                <label class="form-check-label"
                                                    for="inlineCheckbox1">{{ __($permission) }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @endforeach



                        </div>

                        <div class="card-footer" dir="ltr">
                            <button type="button" class="btn text-white blue-color" wire:click='editUser()'>تحديث
                                الصلاحيات</button>
                        </div>


                    </div>

                </div>
            </div>
        @endcan


    </div>

    @push('edit-user-script')
        <script>
            $(document).ready(function() {
                var $account_type = "{{ $user->account_type }}";
                var $account_status = "{{ $user->account_status }}";
                var $user_type = "{{ auth()->user()->account_type }}";

                if ($account_type && $user_type == "superadmin") {
                    console.log($account_type);
                    const singleSelect = document.querySelector("#edit-user-account-type");
                    const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                    singleSelectInstance.setValue($account_type);
                }

                if ($account_status) {
                    console.log($account_status);
                    const singleSelect = document.querySelector("#edit-user-account-status");
                    const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                    singleSelectInstance.setValue($account_status);
                }


                Livewire.on("edit-new-user-errors", function(errors) {
                    $(".reset-validation").text("");
                    for (let key in errors[0]) {
                        if (errors[0].hasOwnProperty(key)) {
                            $("." + key + "-edit-user-validation").text(errors[0][key]);
                        }
                    }
                });

            });
        </script>
    @endpush



</div>

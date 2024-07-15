<div class="container-fluid">
    <div class="p-4 mb-4" wire:ignore>

        <!-- Page Header-->
        <div class="row mb-4">

            <!-- Page Title  -->
            <h2 style="font-weight: bold;">تعديل المركز: {{ $center->name }}</h2>
            <!-- Page Title  -->

            <!-- Breadcrumb -->
            <nav data-mdb-navbar-init class="d-flex navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="font-weight: bold;">
                            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="#">إدارة العملاء</a></li>
                            <li class="breadcrumb-item active"><a href="#">تعديل المركز: {{ $center->name }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <!-- Page Header-->

        <div class="row">

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>شعار المركز</h5>
                    </div>
                    <div class="card-body text-center">

                        <div class="lightbox">
                            <img src="{{ $center->logo_image }}" data-mdb-img="{{ $center->logo_image }}" alt="avatar"
                                class="rounded-circle" width="200" height="200">
                        </div>

                        {{-- <p class="text-muted mb-1">Full Stack Developer</p>
                        <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary">Follow</button>
                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-outline-primary ms-1">Message</button>
                        </div> --}}
                    </div>
                </div>

                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-linkedin fa-lg" style="color: #55acee;"></i>
                                <p class="mb-0">{{ $center->linkedin }}</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                <p class="mb-0">{{ $center->twitter }}</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                <p class="mb-0">{{ $center->facebook }}</p>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-phone fa-lg" style="color: #3b5998;"></i>
                                <p class="mb-0">{{ $center->telephone }}</p>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-mobile fa-lg" style="color: #3b5998;"></i>
                                <p class="mb-0">{{ $center->mobile }}</p>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>


            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>بروفايل الشركة</h5>
                    </div>
                    <div class="card-body" id="profile-1" style="overflow-y: auto; height: 550px;">

                        <a href="#section-2" data-mdb-smooth-scroll="smooth-scroll" data-mdb-container="#profile-1"></a>

                        <div class="row mb-5">
                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}" data-mdb-img="{{ $center->profile_image }}"
                                        alt="avatar" width="200" height="200">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="lightbox">
                                    <img src="{{ $center->profile_image }}"
                                        data-mdb-img="{{ $center->profile_image }}" alt="avatar" width="200"
                                        height="200">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-header pb-0">
                        <h5 class="card-title">بيانات المركز الاساسية</h5>
                    </div>


                    <div class="card-body" id="basic-data-center">

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

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <x-text-input label="اسم المركز" name="name" model="center"></x-text-input>
                            </div>

                            <div class="col-md-6">
                                <x-select-input id="city_id-center" label="اختيار المدينة" name="city_id"
                                    model="center" modelid="#basic-data-center" :options="cities(true)"></x-select-input>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <x-select-input id="sector_id-center" label="اختيار القطاع" name="sector_id"
                                    model="center" modelid="#basic-data-center" :options="sectors(true)"></x-select-input>
                            </div>

                            <div class="col-md-6">
                                <x-mult-select-input label="خدمات القطاع" modelid="#basic-data-center"
                                    id="services-center" name="services" model="center"
                                    :options="sector_services($center->sector_id)"></x-mult-select-input>
                            </div>

                        </div>

                        <div class="row">
                            <x-text-input label="العنوان" name="address" model="center"></x-text-input>
                        </div>

                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color"
                            wire:click='editCenter()'>تحديث</button>
                    </div>

                </div>

            </div>

            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-header pb-0">
                        <h5 class="card-title">بيانات التواصل</h5>
                    </div>


                    <div class="card-body">

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

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <x-text-input label="رقم الهاتف" name="telephone" model="center"></x-text-input>
                            </div>

                            <div class="col-md-6">
                                <x-text-input label="رقم الجوال" name="mobile" model="center"></x-text-input>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <x-text-input label="البريد الالكتروني" name="email" model="center"></x-text-input>
                            </div>
                            <div class="col-md-6">
                                <x-text-input label="رابط الفيسبوك" name="facebook" model="center"></x-text-input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <x-text-input label="رابط اللينكد ان" name="linkedin" model="center"></x-text-input>
                            </div>
                            <div class="col-md-6">
                                <x-text-input label="رابط منصة اكس" name="twitter" model="center"></x-text-input>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color"
                            wire:click='editCenter()'>تحديث</button>
                    </div>

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-header pb-0">
                        <h5 class="card-title">شعار المركز والبروفايل</h5>
                    </div>


                    <div class="card-body">

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

                        <div class="row">
                            <div class="col-md-6">
                                <x-file-input label="شعار المركز" name="logo" model="center"></x-file-input>
                            </div>

                            <div class="col-md-6">
                                <x-file-input label="بروفايل المركز" name="profile" model="center"></x-file-input>
                            </div>

                        </div>

                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color"
                            wire:click='editCenter()'>تحديث</button>
                    </div>

                </div>

            </div>

        </div>



    </div>
</div>



@push('edit-center-script')
    <script>
        $(document).ready(function() {
            var $center = @json($center);
            var $city_id = "{{ $center->city_id }}";
            var $sector_id = "{{ $center->sector_id }}";
            var $sector_services = @json(sector_services($center->sector_id));


            if ($city_id) {
                const singleSelect = document.querySelector("#city_id-center");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue($city_id);
            }

            if ($sector_id) {
                const singleSelect = document.querySelector("#sector_id-center");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue($sector_id);
            }

            if ($center.services.length > 0) {
                var $input = $("#services-center");
                const serviceCenterSelector = document.querySelector("#services-center");
                const ServiceCenterMultSelectInstance = mdb.Select.getInstance(serviceCenterSelector);
                $input.empty();


                $.each($sector_services, function(id, name) {
                    let $remove = false;

                    $.each($center.services, function(index, service_id) {

                        if (service_id == id) {
                            $input.append('<option value="' + id + '" selected >' + name +
                                '</option>');
                            $remove = true;
                        }

                    });

                    if (!$remove) {
                        $input.append('<option value="' + id + '">' + name + '</option>');
                        $remove = false;
                    }

                });

                // ServiceCenterMultSelectInstance.setValue([1]);
            }


            Livewire.on("edit-center-errors", function(errors) {
                console.log(errors);
                $(".reset-validation").text("");
                for (let key in errors[0]) {
                    if (errors[0].hasOwnProperty(key)) {
                        $("." + key + "-center-validation").text(errors[0][key]);
                    }
                }
            });

            Livewire.on('setSelectServices', function(data) {
                var $input = $("#services-center");
                var singleSelect = document.querySelector("#services-center");
                var singleSelectInstance = mdb.Select.getInstance(singleSelect);
                $input.empty();

                $.each(data[0], function(index, value) {
                    $input.append('<option value="' + index + '">' + value + '</option>');
                    // singleSelectInstance.setValue('');
                });
            });


        });
    </script>
@endpush

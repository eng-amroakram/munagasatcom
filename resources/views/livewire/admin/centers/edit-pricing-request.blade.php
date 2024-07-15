<div class="container-fluid">
    <div class="p-4 mb-4" wire:ignore>

        <!-- Page Header-->
        <div class="row mb-4">

            <!-- Page Title  -->
            <h2 style="font-weight: bold;">تعديل التسعيرة: {{ $pricing_request->name }}</h2>
            <!-- Page Title  -->

            <!-- Breadcrumb -->
            <nav data-mdb-navbar-init class="d-flex navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="font-weight: bold;">
                            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="#">طلبات التسعير</a></li>
                            <li class="breadcrumb-item active"><a href="#">تعديل التسعيرة:
                                    {{ $pricing_request->name }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <!-- Page Header-->

        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-header pb-0">
                        <h5 class="card-title">بيانات الطلب الاساسية</h5>
                    </div>


                    <div class="card-body" id="basic-data-pricing-request">

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
                                <x-text-input label="مسمى الطلب" name="name" model="pricing-request"></x-text-input>
                            </div>

                            <div class="col-md-6">
                                <x-file-input label="ملف الطلب" name="file_pricing_request"
                                    model="pricing-request"></x-file-input>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <x-select-input id="sector_id-pricing-request" label="اختيار القطاع" name="sector_id"
                                    model="pricing-request" modelid="#basic-data-pricing-request"
                                    :options="sectors(true)"></x-select-input>
                            </div>

                            <div class="col-md-6">
                                <x-mult-select-input label="خدمات القطاع" modelid="#basic-data-pricing-request"
                                    id="services-pricing-request" name="services" model="pricing-request"
                                    :options="sector_services($pricing_request->sector_id)"></x-mult-select-input>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <x-select-input id="is_visit-pricing-request" label="هل تحتاج لزياة ؟" name="is_visit"
                                    model="pricing-request" modelid="#basic-data-pricing-request"
                                    :options="['yes' => 'Yes', 'no' => 'No']"></x-select-input>
                            </div>

                            <div class="col-md-6">
                                <x-select-input id="is_sample-pricing-request" label="هل تحتاج لعينة ؟" name="is_sample"
                                    model="pricing-request" modelid="#basic-data-pricing-request"
                                    :options="['yes' => 'Yes', 'no' => 'No']"></x-select-input>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <x-textarea label="تفاصيل الطلب" name="info" model="pricing-request"></x-textarea>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color"
                            wire:click='editPricingRequest()'>تحديث</button>
                    </div>

                </div>

            </div>

            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-header pb-0">
                        <h5 class="card-title">التواريخ</h5>
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
                                <x-number-input label="مدة التنفيذ بالايام" name="duration"
                                    model="pricing-request"></x-number-input>
                            </div>

                            <div class="col-md-6">
                                <x-datepicker name="deadline_submitting_offers" label="اخر موعد لاستلام العروض"
                                    model="pricing-request"
                                    control="deadline-submitting-offers-datepicker-class"></x-datepicker>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <x-textarea label="استفسار الموردين" name="question"
                                    model="pricing-request"></x-textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <x-datepicker name="closing_date" label="تاريخ الاغلاق" model="pricing-request"
                                    control="closing-date-datepicker-class"></x-datepicker>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color"
                            wire:click='editPricingRequest()'>تحديث</button>
                    </div>

                </div>

            </div>
        </div>

        <div class="row">
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

                        <div class="row">
                            <div class="col-md-6">
                                <x-text-input label="البريد الالكتروني" name="email"
                                    model="pricing-request"></x-text-input>
                            </div>

                            <div class="col-md-6">
                                <x-text-input label="رقم الجوال" name="phone"
                                    model="pricing-request"></x-text-input>
                            </div>

                        </div>

                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color"
                            wire:click='editPricingRequest()'>تحديث</button>
                    </div>

                </div>

            </div>

        </div>



    </div>
</div>



@push('edit-center-script')
    <script>
        $(document).ready(function() {
            var $pricing_request = @json($pricing_request);
            var $sector_id = "{{ $pricing_request->sector_id }}";
            var $is_visit = "{{ $pricing_request->is_visit }}";
            var $is_sample = "{{ $pricing_request->is_sample }}";
            var $sector_services = @json(sector_services($pricing_request->sector_id));

            if ($is_visit) {
                const singleSelect = document.querySelector("#is_visit-pricing-request");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue($is_visit);
            }

            if ($is_sample) {
                const singleSelect = document.querySelector("#is_sample-pricing-request");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue($is_sample);
            }

            if ($sector_id) {
                const singleSelect = document.querySelector("#sector_id-pricing-request");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue($sector_id);
            }

            if ($pricing_request.services.length > 0) {
                var $input = $("#services-pricing-request");
                const servicePricingRequestSelector = document.querySelector("#services-pricing-request");
                const ServiceCenterMultSelectInstance = mdb.Select.getInstance(servicePricingRequestSelector);
                $input.empty();

                $.each($sector_services, function(id, name) {
                    let $remove = false;

                    console.log($pricing_request.services);
                    $.each($pricing_request.services, function(index, service_id) {


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


            Livewire.on("edit-pricing-request-errors", function(errors) {
                console.log(errors);
                $(".reset-validation").text("");
                for (let key in errors[0]) {
                    if (errors[0].hasOwnProperty(key)) {
                        $("." + key + "-pricing-request-validation").text(errors[0][key]);
                    }
                }
            });

            Livewire.on('setSelectServices', function(data) {
                var $input = $("#services-pricing-request");
                var singleSelect = document.querySelector("#services-pricing-request");
                var singleSelectInstance = mdb.Select.getInstance(singleSelect);
                $input.empty();

                $.each(data[0], function(index, value) {
                    $input.append('<option value="' + index + '">' + value + '</option>');
                    // singleSelectInstance.setValue('');
                });
            });


            var dateFromInput = document.querySelector('.deadline-submitting-offers-datepicker-class');
            dateFromInput.addEventListener('dateChange.mdb.datepicker', function(e) {
                let input = e.target.childNodes[1];
                let value = input.value;
                @this.set("deadline_submitting_offers", value);
            });


            var dateFromInput = document.querySelector('.closing-date-datepicker-class');
            dateFromInput.addEventListener('dateChange.mdb.datepicker', function(e) {
                let input = e.target.childNodes[1];
                let value = input.value;
                @this.set("closing_date", value);
            });

        });
    </script>
@endpush

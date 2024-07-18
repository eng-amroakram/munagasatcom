<div class="container-fluid">
    <div class="p-4 mb-4" wire:ignore>

        <!-- Page Header-->
        <div class="row mb-4">

            <!-- Page Title  -->
            <h2 style="font-weight: bold;">تعديل المناقصة: {{ $tender->name }}</h2>
            <!-- Page Title  -->

            <!-- Breadcrumb -->
            <nav data-mdb-navbar-init class="d-flex navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="font-weight: bold;">
                            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="#">إدارة المناقصات</a></li>
                            <li class="breadcrumb-item active"><a href="#">تعديل المناقصة: {{ $tender->name }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <!-- Page Header-->


        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="card" id="edit-tender-section">
                    <h5 class="card-header card-title p-3 fw-bold">بيانات المناقصة الاساسية</h5>

                    <div class="card-body">

                        {{-- <div class="mask mask-color" wire:loading wire:target="additional_instructions_file"
                            style="z-index: 1; background-color: #303030; opacity: 50%;">
                            <div
                                class="position-absolute w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only text-primary">Loading...</span>
                                </div>
                                <h4 class="text-white">جاري التحميل يرجى الانتظار ...</h4>
                            </div>
                        </div>

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

                        <div class="mask mask-color" wire:loading wire:target="bid_book"
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

                            <div class="col-md-4">
                                <x-text-input label="اسم المناقصة" name="name" model="tender"></x-text-input>
                            </div>

                            <div class="col-md-4">
                                <x-select-input modelid="#edit-tender-section" name="tender_type_id" model="tender"
                                    id="tender-type-id" label="نوع المناقصة" :options="tender_types(true)"></x-select-input>
                            </div>

                            <div class="col-md-4">
                                <x-number-input label="رقم المناقصة" name="code" model="tender"></x-number-input>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <x-mult-select-input modelid="#edit-tender-section" name="cities" model="tender"
                                    id="tender-cities" label="مدن المناقصة" :options="cities(true)"></x-mult-select-input>
                            </div>

                            <div class="col-md-4">
                                <x-mult-select-input modelid="#edit-tender-section" name="activities" model="tender"
                                    id="tender-activities" label="أنشطة المناقصة"
                                    :options="activities(true)"></x-mult-select-input>
                            </div>

                            <div class="col-md-4">
                                <x-mult-select-input modelid="#edit-tender-section" name="tags" model="tender"
                                    id="tender-tags" label="وسوم المناقصة" :options="tags(true)"></x-mult-select-input>
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <x-number-input label="الرقم المرجعي" name="reference_code"
                                    model="tender"></x-number-input>
                            </div>

                            <div class="col-md-4">
                                <x-select-input modelid="#edit-tender-section" name="government_broker_id"
                                    model="tender" id="tender-government-broker-id" label="الجهة الحكومية"
                                    :options="government_brokers(true)"></x-select-input>
                            </div>

                            <div class="col-md-4">
                                <x-file-input label="كراسة الشروط" name="bid_book" model="tender"></x-file-input>
                            </div>

                        </div>

                        <div class="row mb-5">

                            <div class="col-md-4">
                                <x-number-input label="قيمة كراسة الشروط الحقيقية" name="actual_bid_book_price"
                                    model="tender"></x-number-input>
                            </div>

                            <div class="col-md-4">
                                <x-number-input label="قيمة تحميل كراسة الشروط" name="bid_book_download_price"
                                    model="tender"></x-number-input>
                            </div>

                            <div class="col-md-4">
                                <x-file-input label="ملف البيانات الاضافية" name="additional_instructions_file"
                                    model="tender"></x-file-input>
                            </div>

                        </div>



                        <h5 class="card-title fw-bold mt-3">بيانات موقع المناقصة</h5>
                        <hr class="hr mb-3" />

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <x-datepicker name="adding_date" label="تاريخ الاضافة" model="tender"
                                    control="adding-date-datepicker-class"></x-datepicker>
                            </div>

                            <div class="col-md-3">
                                <x-datepicker name="last_inquiry_date" label="اخر موعد لاستلام استفسارات الموردين"
                                    model="tender" control="last-inquiry-date-datepicker-class"></x-datepicker>
                            </div>

                            <div class="col-md-3">
                                <x-datepicker name="last_submission_date" label="اخر موعد لاستلام العروض"
                                    model="tender" control="last-submission-date-datepicker-class"></x-datepicker>
                            </div>

                            <div class="col-md-3">
                                <x-datepicker name="envelope_opening_date_time" label="تاريخ ووقت فتح المظاريف"
                                    model="tender"
                                    control="envelope-opening-date-time-datepicker-class"></x-datepicker>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <x-text-input label="مكان تقديم العروض" name="submission_location"
                                    model="tender"></x-text-input>
                            </div>

                            <div class="col-md-4">
                                <x-text-input label="مكان فتح المظاريف" name="envelope_opening_location"
                                    model="tender"></x-text-input>
                            </div>

                            <div class="col-md-4">
                                <x-text-input label="مكان التنفيذ" name="execution_location"
                                    model="tender"></x-text-input>
                            </div>

                        </div>


                        <div class="row mb-5">
                            <div class="col-md-6">
                                <x-textarea label="الهدف من المناقصة" name="purpose" model="tender"></x-textarea>
                            </div>

                            <div class="col-md-6">
                                <x-textarea label="اخبار المناقصة" name="news" model="tender"></x-textarea>
                            </div>
                        </div>


                        <h5 class="card-title fw-bold mt-3">بيانات الصيانة والتشغيل</h5>
                        <hr class="hr mb-3" />

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <x-text-input label="الضمان الاجتماعي" name="bid_bond" model="tender"></x-text-input>
                            </div>

                            <div class="col-md-6">
                                <x-text-input label="عنوان الضمان الاجتماعي" name="bid_bond_address"
                                    model="tender"></x-text-input>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <x-text-input label="اعمال الانشاء" name="construction_work"
                                    model="tender"></x-text-input>
                            </div>

                            <div class="col-md-6">
                                <x-text-input label="اعمال الصيانة" name="maintenance_work"
                                    model="tender"></x-text-input>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <x-select-input modelid="#edit-tender-section" label="حالة المناقصة" name="status"
                                    model="tender" id="tender-status" :options="status_select()"></x-select-input>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn text-white blue-color"
                            wire:click='editTender()'>تعديل</button>
                    </div>


                </div>
            </div>
        </div>
    </div>

    @push('edit-user-script')
        <script>
            $(document).ready(function() {
                var $tender = @json($tender);
                var $tender_type_id = "{{ $tender->tender_type_id }}";
                var $government_broker_id = "{{ $tender->government_broker_id }}";


                if ($tender_type_id) {
                    const singleSelect = document.querySelector("#tender-type-id");
                    const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                    singleSelectInstance.setValue($tender_type_id);
                }

                if ($government_broker_id) {
                    const singleSelect = document.querySelector("#tender-government-broker-id");
                    const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                    singleSelectInstance.setValue($government_broker_id);
                }

                if ($tender.status) {
                    const singleSelect = document.querySelector("#tender-status");
                    const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                    singleSelectInstance.setValue($tender.status);
                }

                if ($tender.cities.length > 0) {
                    const singleSelect = document.querySelector("#tender-cities");
                    const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                    singleSelectInstance.setValue($tender.cities);
                }

                if ($tender.activities.length > 0) {
                    const singleSelect = document.querySelector("#tender-activities");
                    const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                    singleSelectInstance.setValue($tender.activities);
                }

                if ($tender.tags.length > 0) {
                    const singleSelect = document.querySelector("#tender-tags");
                    const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                    singleSelectInstance.setValue($tender.tags);
                }

                Livewire.on("edit-new-tender-errors", function(errors) {
                    $(".reset-validation").text("");
                    for (let key in errors[0]) {
                        if (errors[0].hasOwnProperty(key)) {
                            $("." + key + "-tender-validation").text(errors[0][key]);
                        }
                    }
                });

                var dateFromInput = document.querySelector('.adding-date-datepicker-class');
                dateFromInput.addEventListener('dateChange.mdb.datepicker', function(e) {
                    let input = e.target.childNodes[1];
                    let value = input.value;
                    @this.set("adding_date", value);
                });

                var dateFromInput = document.querySelector('.last-inquiry-date-datepicker-class');
                dateFromInput.addEventListener('dateChange.mdb.datepicker', function(e) {
                    let input = e.target.childNodes[1];
                    let value = input.value;
                    @this.set("last_inquiry_date", value);
                });

                var dateFromInput = document.querySelector('.last-submission-date-datepicker-class');
                dateFromInput.addEventListener('dateChange.mdb.datepicker', function(e) {
                    let input = e.target.childNodes[1];
                    let value = input.value;
                    @this.set("last_submission_date", value);
                });


                var dateFromInput = document.querySelector('.envelope-opening-date-time-datepicker-class');
                dateFromInput.addEventListener('dateChange.mdb.datepicker', function(e) {
                    let input = e.target.childNodes[1];
                    let value = input.value;
                    @this.set("envelope_opening_date_time", value);
                });






            });
        </script>
    @endpush



</div>

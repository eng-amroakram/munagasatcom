<div class="container-fluid">
    <div class="p-4 mb-4" wire:ignore>

        <!-- Page Header-->
        <div class="row mb-4">

            <!-- Page Title  -->
            <h2 style="font-weight: bold;">تعديل الفرصة: {{ $opportunity->name }}</h2>
            <!-- Page Title  -->

            <!-- Breadcrumb -->
            <nav data-mdb-navbar-init class="d-flex navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="font-weight: bold;">
                            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="#">إدارة الفرص الاستثمارية</a></li>
                            <li class="breadcrumb-item active"><a href="#">تعديل الفرصة:
                                    {{ $opportunity->name }}</a>
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
                        <h5 class="card-title">بيانات الفرصة الاساسية</h5>
                    </div>


                    <div class="card-body" id="basic-data-opportunity">

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

                        <div class="mask mask-color" wire:loading wire:target="file_opportunity"
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
                                <x-text-input label="اسم الفرصة" name="name" model="opportunity"></x-text-input>
                            </div>

                            <div class="col-md-6">
                                <x-datepicker name="closing_date" label="تاريخ الاغلاق" model="opportunity"
                                    control="closing-date-time-datepicker-class"></x-datepicker>
                            </div>

                        </div>

                        <div class="row mb-3">


                            <div class="col-md-6">
                                <x-select-input id="sector_id-opportunity" label="اختيار القطاع" name="sector_id"
                                    model="opportunity" modelid="#basic-data-opportunity"
                                    :options="sectors(true)"></x-select-input>
                            </div>

                            <div class="col-md-6">
                                <x-mult-select-input modelid="#basic-data-opportunity" name="cities"
                                    model="opportunity" id="opportunity-cities" label="اختيار المناطق"
                                    :options="cities(true)"></x-mult-select-input>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <x-mult-select-input modelid="#basic-data-opportunity" id="opportunity-notes"
                                    label="اختيار الملاحظات" name="notes" model="opportunity"
                                    :options="opportunity_notes(true)"></x-mult-select-input>
                            </div>

                            <div class="col-md-6">
                                <x-text-input name="address" model="opportunity" label="عنوان الاستلام">
                                </x-text-input>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color"
                            wire:click='editOpportunity()'>تحديث</button>
                    </div>

                </div>

            </div>

            <div class="col-lg-6">
                <div class="card mb-4">

                    <div class="card-header pb-0">
                        <h5 class="card-title">بيانات التواصل</h5>
                    </div>


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

                        <div class="mask mask-color" wire:loading wire:target="file_opportunity"
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

                            <div class="col-md-12">
                                <x-select-input id="method-opportunity" label="طريقة طرح الفرصة" name="method"
                                    model="opportunity" :options="[
                                        'pdf_file' => 'ملف PDF',
                                        'amounts_table' => 'جدول كميات',
                                    ]"
                                    modelid="#basic-data-opportunity"></x-select-input>
                            </div>

                        </div>

                        <div class="row mb-3 file-opportunity-div">
                            <div class="col-md-12">
                                <x-file-input model="opportunity" label="ملف الكميات"
                                    name="file_opportunity"></x-file-input>
                            </div>
                        </div>

                        <div class="row mb-3 units-opportunity-div">
                            <div class="col-md-12">
                                <x-mult-select-input id="units-opportunity" label="اختيار وحدات القياس"
                                    name="units" model="opportunity" :options="units(true)"
                                    modelid="#basic-data-opportunity"></x-mult-select-input>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color"
                            wire:click='editOpportunity()'>تحديث</button>
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

                        <div class="mask mask-color" wire:loading wire:target="file_opportunity"
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
                                <x-text-input label="مسئول التواصل" name="manager"
                                    model="opportunity"></x-text-input>
                            </div>

                            <div class="col-md-6">
                                <x-text-input label="رقم الجوال" name="phone" model="opportunity"></x-text-input>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <x-text-input label="البريد الالكتروني" name="email"
                                    model="opportunity"></x-text-input>
                            </div>

                        </div>



                    </div>

                    <div class="card-footer" dir="ltr">
                        <button type="button" class="btn text-white blue-color"
                            wire:click='editOpportunity()'>تحديث</button>
                    </div>

                </div>

            </div>

        </div>



    </div>
</div>



@push('edit-opportunity-script')
    <script>
        $(document).ready(function() {
            var $opportunity = @json($opportunity);
            var $sector_id = "{{ $opportunity->sector_id }}";
            var $method_opportunity = "{{ $opportunity->method }}";

            $method_selection = $("#method-opportunity");
            $file_opportunity_div = $(".file-opportunity-div");
            $units_opportunity_div = $(".units-opportunity-div");


            $method_selection.on('change', function() {
                $value = $(this).val();
                if ($value == "pdf_file") {
                    $file_opportunity_div.show();
                    $units_opportunity_div.hide();
                }

                if ($value == "amounts_table") {
                    $file_opportunity_div.hide();
                    $units_opportunity_div.show();
                }

            });


            if ($sector_id) {
                const singleSelect = document.querySelector("#sector_id-opportunity");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue($sector_id);
            }

            if ($method_opportunity) {
                const singleSelectMethodOpportunity = document.querySelector("#method-opportunity");
                const singleSelectInstanceMethodOpportunity = mdb.Select.getInstance(singleSelectMethodOpportunity);
                singleSelectInstanceMethodOpportunity.setValue($method_opportunity);

                if ($method_opportunity == "pdf_file") {
                    $file_opportunity_div.show();
                    $units_opportunity_div.hide();
                }

                if ($method_opportunity == "amounts_table") {
                    $file_opportunity_div.hide();
                    $units_opportunity_div.show();
                }
            }

            if ($opportunity.cities.length > 0) {
                const multSelectOpportunityCities = document.querySelector("#opportunity-cities");
                const multSelectInstanceOpportunityCities = mdb.Select.getInstance(multSelectOpportunityCities);
                multSelectInstanceOpportunityCities.setValue($opportunity.cities);
            }

            if ($opportunity.notes.length > 0) {
                const multSelectOpportunityNotes = document.querySelector("#opportunity-notes");
                const multSelectInstanceOpportunityNotes = mdb.Select.getInstance(multSelectOpportunityNotes);
                multSelectInstanceOpportunityNotes.setValue($opportunity.notes);
            }

            if ($opportunity.notes.length > 0) {
                const multSelectOpportunityUnits = document.querySelector("#units-opportunity");
                const multSelectInstanceOpportunityUnits = mdb.Select.getInstance(multSelectOpportunityUnits);
                multSelectInstanceOpportunityUnits.setValue($opportunity.units);
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


            var dateFromInput = document.querySelector('.closing-date-time-datepicker-class');
            dateFromInput.addEventListener('dateChange.mdb.datepicker', function(e) {
                let input = e.target.childNodes[1];
                let value = input.value;
                @this.set("closing_date", value);
            });

        });
    </script>
@endpush

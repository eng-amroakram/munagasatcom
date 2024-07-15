<div class="container-fluid">
    <div class="p-4 mb-4">


        <!-- Page Header-->
        <div class="row mb-4" wire:ignore>

            <!-- Page Title  -->
            <h2 style="font-weight: bold;">المناقصات</h2>
            <!-- Page Title  -->

            <!-- Breadcrumb -->
            <nav data-mdb-navbar-init class="d-flex navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="font-weight: bold;">
                            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="#">إدارة المناقصات</a></li>
                            <li class="breadcrumb-item active"><a href="#">المناقصات</a>
                            </li>
                        </ol>
                    </nav>

                    <div class="d-flex align-items-center pe-3">
                        <!-- Notifications -->
                        <div class="dropdown">
                            <a data-mdb-toggle="dropdown" class="link-secondary me-3 dropdown-toggle" href="#"
                                id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                <i class="fas fa-gear"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                @can('create_tender', auth()->user())
                                    <li>
                                        <a class="dropdown-item" data-mdb-toggle="modal"
                                            data-mdb-target="#create-new-tender-modal" href="#create-new-tender-modal">
                                            <i class="far fa-square-plus me-2"></i>
                                            <span>إضافة مناقصة</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('export_tenders', auth()->user())
                                    <li>
                                        <a class="dropdown-item" href="#export-data" wire:click="exportUsers">
                                            <i class="fas fa-file-export me-2"></i>
                                            <span>تصدير البيانات</span>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>

                    </div>
                </div>
            </nav>
            <!-- Breadcrumb -->
        </div>
        <!-- Page Header-->

        <!-- Data Tables -->
        <div class="row" wire:ignore>
            <div class="row p-2 mb-3">

                <div class="col-md-3">
                    <div class="form-outline">
                        <i class="fab fa-searchengin trailing text-primary"></i>
                        <input type="search" id="search" wire:model.live="search"
                            class="form-control form-icon-trailing" aria-describedby="textExample1" />
                        <label class="form-label" for="search">البحث</label>
                    </div>
                </div>

                @can('status_tender', auth()->user())
                    <div class="col-md-3">
                        <select class="select" multiple wire:model.live="search_status">
                            <option value="active">نشط</option>
                            <option value="inactive">غير نشط</option>
                        </select>
                    </div>
                @endcan

            </div>
        </div>

        <div class="table-responsive-md">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="th-sm"><strong>ID</strong></th>
                        <th data-mdb-sort="true" class="th-sm"><strong>الاسم</strong></th>
                        <th data-mdb-sort="true" class="th-sm"><strong>رقم المناقصة</strong></th>
                        <th data-mdb-sort="true" class="th-sm"><strong>عدد المشاهدات</strong></th>
                        <th data-mdb-sort="true" class="th-sm"><strong>عقد المناقصة</strong></th>
                        @can('status_tender', auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>الحالة</strong></th>
                        @endcan

                        <th data-mdb-sort="false" class="th-sm"><strong>التحكم</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenders as $tender)
                        <tr>
                            <td>{{ $tender->id }}</td>
                            <td>{{ $tender->name }}</td>
                            <td>{{ $tender->code }}</td>
                            <td>{{ 0 }}</td>

                            <td>
                                <div class="d-flex justify-content-center">

                                    <a type="button" class="text-primary fa-lg me-2 ms-2" title="Delete">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </div>
                            </td>

                            @can('status_tender', auth()->user())
                                <td class="switch">
                                    <label>
                                        نشط
                                        <input wire:click="changeStatus({{ $tender->id }})" type="checkbox"
                                            {{ $tender->status == 'active' ? 'checked' : '' }}>
                                        <span class="lever"></span>
                                        غير نشط
                                    </label>
                                </td>
                            @endcan

                            @canany(['edit_tender', 'delete_tender'], auth()->user())
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @can('delete_tender', auth()->user())
                                            <a type="button" class="text-danger fa-lg me-2 ms-2"
                                                wire:click='delete({{ $tender->id }})' title="Delete">
                                                <i class="fas fa-trash-can"></i>
                                            </a>
                                        @endcan
                                        @can('edit_tender', auth()->user())
                                            <a type="button" class="text-dark fa-lg me-2 ms-2"
                                                href="{{ route('admin.tenders.edit', ['tender' => $tender->id]) }}"
                                                title="EditTender">
                                                <i class="far fa-pen-to-square"></i>
                                            </a>
                                        @endcan

                                    </div>
                                </td>
                            @endcanany

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <!-- Table Pagination -->
        <div class="d-flex justify-content-between">

            <nav aria-label="...">
                <ul class="pagination">
                    {{ $tenders->withQueryString()->onEachSide(0)->links() }}
                </ul>
            </nav>

            <div class="col-md-1" wire:ignore>
                <select class="select" wire:model.live="pagination">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

        </div>
        <!-- Table Pagination -->

    </div>
    @canany(['edit_tender', 'delete_tender'], auth()->user())
        <div class="modal top fade" id="create-new-tender-modal" tabindex="-1" data-mdb-backdrop="static"
            aria-labelledby="Creator" aria-hidden="true" wire:ignore>
            <div class="modal-dialog modal-xl cascading-modal" style="margin-top: 4%">
                <div class="modal-content">
                    <div class="modal-c-tabs">

                        <!-- Tabs navs -->
                        <ul class="nav md-tabs nav-tabs" id="create-new-tender" role="tablist"
                            style="background-color: #303030;">
                            <li class="nav-item" role="presentation">
                                <a data-mdb-toggle="pill" class="nav-link active" id="create-new-tender-tab-1"
                                    href="#create-new-tender-tabs-1" role="tab"
                                    aria-controls="create-new-tender-tabs-1" aria-selected="true">
                                    <i class="fas fa-circle-info me-1"></i>
                                    <strong>
                                        البيانات الاساسية للمناقصة
                                    </strong>
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a data-mdb-toggle="pill" class="nav-link " id="create-new-tender-tab-2"
                                    href="#create-new-tender-tabs-2" role="tab"
                                    aria-controls="create-new-tender-tabs-2" aria-selected="true">
                                    <i class="fas fa-circle-info me-1"></i>
                                    <strong>
                                        بيانات موقع المناقصة
                                    </strong>
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a data-mdb-toggle="pill" class="nav-link " id="create-new-tender-tab-3"
                                    href="#create-new-tender-tabs-3" role="tab"
                                    aria-controls="create-new-tender-tabs-3" aria-selected="true">
                                    <i class="fas fa-circle-info me-1"></i>
                                    <strong>
                                        بيانات الصيانة والتشغيل
                                    </strong>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="ex1-content">

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

                            <div class="tab-pane fade show active" id="create-new-tender-tabs-1" role="tabpanel"
                                aria-labelledby="create-new-tender-tab-1">

                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <x-text-input label="اسم المناقصة" name="name"
                                                model="tender"></x-text-input>
                                        </div>

                                        <div class="col-md-4">
                                            <x-select-input modelid="#create-new-tender-modal" name="tender_type_id"
                                                model="tender" id="tender-type-id" label="نوع المناقصة"
                                                :options="tender_types(true)"></x-select-input>
                                        </div>

                                        <div class="col-md-4">
                                            <x-number-input label="رقم المناقصة" name="code"
                                                model="tender"></x-number-input>
                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-4">
                                            <x-mult-select-input modelid="#create-new-tender-modal" name="cities"
                                                model="tender" id="tender-cities" label="مدن المناقصة"
                                                :options="cities(true)"></x-mult-select-input>
                                        </div>

                                        <div class="col-md-4">
                                            <x-mult-select-input modelid="#create-new-tender-modal" name="activities"
                                                model="tender" id="tender-activities" label="أنشطة المناقصة"
                                                :options="activities(true)"></x-mult-select-input>
                                        </div>

                                        <div class="col-md-4">
                                            <x-mult-select-input modelid="#create-new-tender-modal" name="tags"
                                                model="tender" id="tender-tags" label="وسوم المناقصة"
                                                :options="tags(true)"></x-mult-select-input>
                                        </div>


                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-4">
                                            <x-number-input label="الرقم المرجعي" name="reference_code"
                                                model="tender"></x-number-input>
                                        </div>

                                        <div class="col-md-4">
                                            <x-select-input modelid="#create-new-tender-modal" name="government_broker_id"
                                                model="tender" id="tender-government-broker-id" label="الجهة الحكومية"
                                                :options="government_brokers(true)"></x-select-input>
                                        </div>

                                        <div class="col-md-4">
                                            <x-file-input label="كراسة الشروط" name="bid_book"
                                                model="tender"></x-file-input>
                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-4">
                                            <x-number-input label="قيمة كراسة الشروط الحقيقية"
                                                name="actual_bid_book_price" model="tender"></x-number-input>
                                        </div>

                                        <div class="col-md-4">
                                            <x-number-input label="قيمة تحميل كراسة الشروط" name="bid_book_download_price"
                                                model="tender"></x-number-input>
                                        </div>

                                        <div class="col-md-4">
                                            <x-file-input label="ملف البيانات الاضافية"
                                                name="additional_instructions_file" model="tender"></x-file-input>
                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn bg-blue-color close-modal-button"
                                        data-mdb-dismiss="modal">
                                        إغلاق
                                    </button>

                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                    <button type="button" class="btn text-white blue-color"
                                        wire:click='addTender()'>حفظ</button>
                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">التالي</button> --}}

                                </div>
                            </div>

                            <div class="tab-pane fade" id="create-new-tender-tabs-2" role="tabpanel"
                                aria-labelledby="create-new-tender-tab-2">
                                <div class="modal-body">
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

                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <x-datepicker name="adding_date" label="تاريخ الاضافة" model="tender"
                                                control="adding-date-datepicker-class"></x-datepicker>
                                        </div>

                                        <div class="col-md-3">
                                            <x-datepicker name="last_inquiry_date"
                                                label="اخر موعد لاستلام استفسارات الموردين" model="tender"
                                                control="last-inquiry-date-datepicker-class"></x-datepicker>
                                        </div>

                                        <div class="col-md-3">
                                            <x-datepicker name="last_submission_date" label="اخر موعد لاستلام العروض"
                                                model="tender"
                                                control="last-submission-date-datepicker-class"></x-datepicker>
                                        </div>

                                        <div class="col-md-3">
                                            <x-datepicker name="envelope_opening_date_time"
                                                label="تاريخ ووقت فتح المظاريف" model="tender"
                                                control="envelope-opening-date-time-datepicker-class"></x-datepicker>
                                        </div>


                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <x-textarea label="الهدف من المناقصة" name="purpose"
                                                model="tender"></x-textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <x-textarea label="اخبار المناقصة" name="news"
                                                model="tender"></x-textarea>
                                        </div>
                                    </div>


                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn bg-blue-color close-modal-button"
                                        data-mdb-dismiss="modal">
                                        إغلاق
                                    </button>

                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                    <button type="button" class="btn text-white blue-color"
                                        wire:click='addTender()'>حفظ</button>
                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">التالي</button> --}}

                                </div>
                            </div>

                            <div class="tab-pane fade" id="create-new-tender-tabs-3" role="tabpanel"
                                aria-labelledby="create-new-tender-tab-3">
                                <div class="modal-body">


                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <x-text-input label="الضمان الاجتماعي" name="bid_bond"
                                                model="tender"></x-text-input>
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
                                            <x-select-input modelid="#create-new-tender-modal" label="حالة المناقصة"
                                                name="status" model="tender" id="tender-status"
                                                :options="status_select()"></x-select-input>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn bg-blue-color close-modal-button"
                                        data-mdb-dismiss="modal">
                                        إغلاق
                                    </button>

                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                    <button type="button" class="btn text-white blue-color"
                                        wire:click='addTender()'>حفظ</button>
                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">التالي</button> --}}

                                </div>
                            </div>

                        </div>
                        <!-- Tabs content -->
                    </div>
                </div>
            </div>
        </div>
    @endcanany


</div>


@push('create-new-user-script')
    <script>
        $(document).ready(function() {

            Livewire.on("process-has-been-done", function() {
                $(".reset-validation").text("");
                $("#create-new-tender-modal").modal('hide');
            });

            Livewire.on("create-new-tender-errors", function(errors) {
                $(".reset-validation").text("");
                for (let key in errors[0]) {
                    if (errors[0].hasOwnProperty(key)) {
                        $("." + key + "-create-new-tender-validation").text(errors[0][key]);
                    }
                }
            });

            Livewire.on("set-tender-status", function(data) {
                const singleSelect = document.querySelector("#add-tender-status");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue(data[0]['status']);
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

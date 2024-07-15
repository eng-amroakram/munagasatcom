<div class="container-fluid">
    <div class="p-4 mb-4">

        <!-- Page Header-->
        <div class="row mb-4" wire:ignore>

            <!-- Page Title  -->
            <h2 style="font-weight: bold;">طلبات التسعير</h2>
            <!-- Page Title  -->

            <!-- Breadcrumb -->
            <nav data-mdb-navbar-init class="d-flex navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="font-weight: bold;">
                            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="#">إدارة طلبات التسعير</a></li>
                            <li class="breadcrumb-item active"><a href="#">طلبات التسعير</a>
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
                                @can('create_pricing_request', auth()->user())
                                    <li>
                                        <a class="dropdown-item" data-mdb-toggle="modal"
                                            data-mdb-target="#create-new-pricing-request-modal"
                                            href="#create-new-pricing-request-modal">
                                            <i class="far fa-square-plus me-2"></i>
                                            <span>إضافة طلب</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('export_pricing_requests', auth()->user())
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
                    <div class="form-outline" data-mdb-input-init>
                        <i class="fab fa-searchengin trailing text-primary"></i>
                        <input type="search" id="search" wire:model.live="search"
                            class="form-control form-icon-trailing" aria-describedby="textExample1" />
                        <label class="form-label" for="search">البحث</label>
                    </div>
                </div>

                @can('status_pricing_request', auth()->user())
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
                        <th data-mdb-sort="true" class="th-sm"><strong>اسم التسعيرة</strong></th>
                        @can('superadmin', auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>صاحب الطلب</strong></th>
                        @endcan
                        <th data-mdb-sort="false" class="th-sm"><strong>البريد الالكتروني</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>رقم الهاتف</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>القطاع</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>اخر موعد لاستلام العروض</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>تاريخ الاغلاق</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>هل يحتاج لزياة ؟</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>هل يحتاج لعينة ؟</strong></th>
                        @can('status_pricing_request', auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>حالة التسعيرة</strong></th>
                        @endcan
                        @canany(['edit_pricing_request', 'delete_pricing_request'], auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>التحكم</strong></th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pricing_requests as $pricing_request)
                        <tr>
                            <td>{{ $pricing_request->id }}</td>
                            <td>{{ $pricing_request->name }}</td>
                            @can('superadmin', auth()->user())
                                <td><a target="_blank"
                                        href="{{ route('admin.users.edit', ['user' => $pricing_request->user_id]) }}">{{ $pricing_request->user?->name }}</a>
                                </td>
                            @endcan

                            <td>{{ $pricing_request->email }}</td>
                            <td>{{ $pricing_request->phone }}</td>
                            <td>{{ $pricing_request->sector?->name }}</td>
                            <td>{{ $pricing_request->deadline_submitting_offers?->format('Y-m-d') }}</td>
                            <td>{{ $pricing_request->closing_date?->format('Y-m-d') }}</td>

                            <td>
                                @if ($pricing_request->is_visit == 'no')
                                    <span style="font-size: 12px;" class="badge rounded-pill badge-danger">No</span>
                                @endif

                                @if ($pricing_request->is_visit == 'yes')
                                    <span style="font-size: 12px;" class="badge rounded-pill badge-success">Yes</span>
                                @endif
                            </td>

                            <td>
                                @if ($pricing_request->is_sample == 'no')
                                    <span style="font-size: 12px;" class="badge rounded-pill badge-danger">No</span>
                                @endif

                                @if ($pricing_request->is_sample == 'yes')
                                    <span style="font-size: 12px;" class="badge rounded-pill badge-success">Yes</span>
                                @endif
                            </td>


                            <td>
                                @can('superadmin', auth()->user())
                                    <div class="switch">
                                        <label>
                                            نشط
                                            <input wire:click="changeStatus({{ $pricing_request->id }})" type="checkbox"
                                                {{ $pricing_request->status == 'active' ? 'checked' : '' }}>
                                            <span class="lever"></span>
                                            غير نشط
                                        </label>
                                    </div>
                                @endcan
                                @can('company', auth()->user())
                                    @if ($pricing_request->status == 'active')
                                        <span style="font-size: 12px;" class="badge rounded-pill badge-success">نشط</span>
                                    @else
                                        <span style="font-size: 12px;" class="badge rounded-pill badge-danger">غير
                                            نشط</span>
                                    @endif
                                @endcan

                            </td>
                            @canany(['edit_pricing_request', 'delete_pricing_request'], auth()->user())
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @can('delete_pricing_request', auth()->user())
                                            <a type="button" class="text-danger fa-lg me-2 ms-2"
                                                wire:click='delete({{ $pricing_request->id }})' title="Delete">
                                                <i class="fas fa-trash-can"></i>
                                            </a>
                                        @endcan
                                        @can('edit_pricing_request', auth()->user())
                                            <a type="button" class="text-dark fa-lg me-2 ms-2 set-button-update"
                                                href="{{ route('admin.centers.edit-pricing-request', $pricing_request->id) }}"
                                                title="EditCenter">
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
                <ul class="pagination pagination-circle">
                    {{ $pricing_requests->withQueryString()->onEachSide(0)->links() }}
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


    <div class="modal fade" id="create-new-pricing-request-modal" tabindex="-1" data-mdb-backdrop="static"
        data-mdb-keyboard="false" aria-labelledby="Creator" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-lg cascading-modal" style="margin-top: 5%">
            <div class="modal-content">
                <div class="modal-c-tabs">


                    <!-- Tabs navs -->
                    <ul class="nav md-tabs nav-tabs" id="create-new-user" role="tablist"
                        style="background-color: #303030;">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="create-new-pricing-request-tab-1"
                                href="#create-new-pricing-request-tabs-1" role="tab"
                                aria-controls="create-new-pricing-request-tabs-1" aria-selected="true"
                                data-mdb-toggle="pill">
                                <i class="fas fa-circle-info me-1"></i>
                                <strong>
                                    البيانات الطلب الاساسية
                                </strong>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="create-new-pricing-request-tab-2"
                                href="#create-new-pricing-request-tabs-2" role="tab"
                                aria-controls="create-new-pricing-request-tabs-2" aria-selected="false"
                                data-mdb-toggle="pill">
                                <i class="fas fa-circle-info me-1"></i>
                                <strong>
                                    التواريخ
                                </strong>
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="create-new-pricing-request-tab-3"
                                href="#create-new-pricing-request-tabs-3" role="tab"
                                aria-controls="create-new-pricing-request-tabs-3" aria-selected="false"
                                data-mdb-toggle="pill">
                                <i class="fas fa-circle-info me-1"></i>
                                <strong>
                                    بيانات التواصل
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


                        <div class="tab-pane fade show active" id="create-new-pricing-request-tabs-1" role="tabpanel"
                            aria-labelledby="create-new-pricing-request-tab-1">

                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <x-text-input label="مسمى الطلب" model="pricing-request"
                                            name="name"></x-text-input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-file-input label="ملف الطلب" model="pricing-request"
                                            name="file_pricing_request"></x-file-input>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <x-select-input id="sector_id-pricing-request" label="اختيار القطاع"
                                            name="sector_id" model="pricing-request" :options="sectors(true)"
                                            modelid="#create-new-pricing-request-modal"></x-mult-select-input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-mult-select-input id="services-pricing-request" label="اختيار خدمات القطاع"
                                            name="services" model="pricing-request" :options="sector_services($sector_id)"
                                            modelid="#create-new-pricing-request-modal"></x-mult-select-input>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <x-select-input id="is_visit-pricing-request" label="هل يحتاج لزيارة ؟"
                                            name="is_visit" model="pricing-request" :options="['yes' => 'Yes', 'no' => 'No']"
                                            modelid="#create-new-pricing-request-modal"></x-mult-select-input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-select-input id="is_sample-pricing-request" label="هل يحتاج لعينة ؟"
                                            name="is_sample" model="pricing-request" :options="['yes' => 'Yes', 'no' => 'No']"
                                            modelid="#create-new-pricing-request-modal"></x-mult-select-input>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <x-textarea name="info" label="تفاصيل الطلب"
                                            model="pricing-request"></x-textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn bg-blue-color" data-mdb-dismiss="modal">
                                    إغلاق
                                </button>

                                {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                <button type="button" class="btn text-white blue-color"
                                    wire:click='addPricingRequest()'>حفظ</button>
                                {{-- <button type="button" class="btn bg-blue-color nextCreator">التالي</button> --}}

                            </div>
                        </div>

                        <div class="tab-pane fade" id="create-new-pricing-request-tabs-2" role="tabpanel"
                            aria-labelledby="create-new-pricing-request-tab-2">
                            <div class="modal-body">
                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <x-number-input label="مدة التنفيذ بالايام" model="pricing-request"
                                            name="duration"></x-number-input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-datepicker name="deadline_submitting_offers"
                                            label="اخر موعد لاستلام العروض" model="pricing-request"
                                            control="deadline-submitting-offers-datepicker-class"></x-datepicker>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <x-textarea name="question" label="استفسار الموردين"
                                            model="pricing-request"></x-textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <x-datepicker name="closing_date" label="تاريخ الاغلاق"
                                            model="pricing-request"
                                            control="closing-date-datepicker-class"></x-datepicker>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn bg-blue-color" data-mdb-dismiss="modal">
                                    إغلاق
                                </button>

                                {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                <button type="button" class="btn text-white blue-color"
                                    wire:click='addPricingRequest()'>حفظ</button>
                                {{-- <button type="button" class="btn bg-blue-color nextCreator">التالي</button> --}}

                            </div>
                        </div>


                        <div class="tab-pane fade" id="create-new-pricing-request-tabs-3" role="tabpanel"
                            aria-labelledby="create-new-pricing-request-tab-3">
                            <div class="modal-body">

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <x-text-input name="email" label="البريد الالكتروني"
                                            model="pricing-request"></x-text-input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-text-input name="phone" label="رقم الجوال"
                                            model="pricing-request"></x-text-input>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn bg-blue-color" data-mdb-dismiss="modal">
                                    إغلاق
                                </button>

                                {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                <button type="button" class="btn text-white blue-color"
                                    wire:click='addPricingRequest()'>حفظ</button>
                                {{-- <button type="button" class="btn bg-blue-color nextCreator">التالي</button> --}}

                            </div>

                        </div>
                    </div>
                    <!-- Tabs content -->
                </div>
            </div>
        </div>
    </div>






</div>


@push('create-new-pricing-request-script')
    <script>
        $(document).ready(function() {

            Livewire.on("process-has-been-done", function() {
                $(".reset-validation").text("");
                $("#create-new-pricing-request-modal").modal('hide');
            });

            Livewire.on("create-new-pricing-request-errors", function(errors) {
                $(".reset-validation").text("");
                for (let key in errors[0]) {
                    if (errors[0].hasOwnProperty(key)) {
                        $("." + key + "-pricing-request-validation").text(errors[0][key]);
                    }
                }
            });

            Livewire.on("set-pricing-request-status", function(data) {
                const singleSelect = document.querySelector("#add-pricing-request-status");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue(data[0]['status']);
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


            //

            var deadlinedateFromInput = document.querySelector('.deadline-submitting-offers-datepicker-class');
            deadlinedateFromInput.addEventListener('dateChange.mdb.datepicker', function(e) {
                let input = e.target.childNodes[1];
                let value = input.value;
                @this.set("deadline_submitting_offers", value);
            });

            var closingdateFromInput = document.querySelector('.closing-date-datepicker-class');
            closingdateFromInput.addEventListener('dateChange.mdb.datepicker', function(e) {
                let input = e.target.childNodes[1];
                let value = input.value;
                @this.set("closing_date", value);
            });

        });
    </script>
@endpush

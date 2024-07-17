<div class="container-fluid">
    <div class="p-4 mb-4">

        <div class="row mb-4" wire:ignore>
            @livewire('page-header', ['title' => 'الفرص الاستثمارية', 'label' => 'فرصة', 'model' => 'opportunity', 'perm' => 'opportunity'])
        </div>

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

                @can('status_opportunity', auth()->user())
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
                        <th data-mdb-sort="true" class="th-sm"><strong>اسم الفرصة</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>القطاع</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>تاريخ الاغلاق</strong></th>
                        <th data-mdb-sort="false" class="th-sm"><strong>حالة المركز</strong></th>
                        @canany(['edit_opportunity', 'delete_opportunity'], auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>التحكم</strong></th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($opportunities as $opportunity)
                        <tr>
                            <td>{{ $opportunity->id }}</td>
                            <td>{{ $opportunity->name }}</td>
                            <td>{{ $opportunity->sector?->name }}</td>
                            <td>{{ $opportunity->closing_date->format('Y-m-d') }}</td>
                            <td>
                                <div class="switch">
                                    <label>
                                        نشط
                                        <input wire:click="changeStatus({{ $opportunity->id }})" type="checkbox"
                                            {{ $opportunity->status == 'active' ? 'checked' : '' }}>
                                        <span class="lever"></span>
                                        غير نشط
                                    </label>
                                </div>
                            </td>
                            @canany(['edit_opportunity', 'delete_opportunity'], auth()->user())
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @can('delete_opportunity', auth()->user())
                                            <a type="button" class="text-danger fa-lg me-2 ms-2"
                                                wire:click='delete({{ $opportunity->id }})' title="Delete">
                                                <i class="fas fa-trash-can"></i>
                                            </a>
                                        @endcan
                                        @can('edit_opportunity', auth()->user())
                                            <a type="button" class="text-dark fa-lg me-2 ms-2 set-button-update"
                                                href="{{ route('admin.opportunities.edit', ['opportunity' => $opportunity->id]) }}"
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
                    {{ $opportunities->withQueryString()->onEachSide(0)->links() }}
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

    @canany(['edit_opportunity', 'create_opportunity'], auth()->user())
        <div class="modal fade" id="create-new-opportunity-modal" tabindex="-1" data-mdb-backdrop="static"
            data-mdb-keyboard="false" aria-labelledby="Creator" aria-hidden="true" wire:ignore>
            <div class="modal-dialog modal-lg cascading-modal" style="margin-top: 5%">
                <div class="modal-content">
                    <div class="modal-c-tabs">


                        <!-- Tabs navs -->
                        <ul class="nav md-tabs nav-tabs" id="create-new-user" role="tablist"
                            style="background-color: #303030;">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="create-new-opportunity-tab-1"
                                    href="#create-new-opportunity-tabs-1" role="tab"
                                    aria-controls="create-new-opportunity-tabs-1" aria-selected="true"
                                    data-mdb-toggle="pill">
                                    <i class="fas fa-circle-info me-1"></i>
                                    <strong>
                                        بيانات الفرصة الاساسية
                                    </strong>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="create-new-opportunity-tab-2" href="#create-new-opportunity-tabs-2"
                                    role="tab" aria-controls="create-new-opportunity-tabs-2" aria-selected="false"
                                    data-mdb-toggle="pill">
                                    <i class="fas fa-circle-info me-1"></i>
                                    <strong>
                                        تحديد طريقة طرح الفرصة
                                    </strong>
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="create-new-opportunity-tab-3" href="#create-new-opportunity-tabs-3"
                                    role="tab" aria-controls="create-new-opportunity-tabs-3" aria-selected="false"
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

                            <div class="mask mask-color" wire:loading wire:target="file_opportunity"
                                style="z-index: 1; background-color: #303030; opacity: 50%;">
                                <div
                                    class="position-absolute w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only text-primary">Loading...</span>
                                    </div>
                                    <h4 class="text-white">جاري التحميل يرجى الانتظار ...</h4>
                                </div>
                            </div>




                            <div class="tab-pane fade show active" id="create-new-opportunity-tabs-1" role="tabpanel"
                                aria-labelledby="create-new-opportunity-tab-1">

                                <div class="modal-body">


                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <x-text-input name="name" model="opportunity" label="اسم الفرصة">
                                            </x-text-input>
                                        </div>

                                        <div class="col-md-6">
                                            <x-datepicker name="closing_date" label="تاريخ الاغلاق" model="opportunity"
                                                control="closing-date-time-datepicker-class"></x-datepicker>
                                        </div>
                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <x-select-input id="sector_id-opportunity" label="اختيار القطاع"
                                                name="sector_id" model="opportunity" :options="sectors(true)"
                                                modelid="#create-new-opportunity-modal"></x-mult-select-input>
                                        </div>

                                        <div class="col-md-6">
                                            <x-mult-select-input id="notes-opportunity" label="اختيار الملاحظات"
                                                name="notes" model="opportunity" :options="opportunity_notes(true)"
                                                modelid="#create-new-opportunity-modal"></x-mult-select-input>
                                        </div>

                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <x-mult-select-input id="cities-opportunity" label="اختيار المناطق"
                                                name="cities" model="opportunity" :options="cities(true)"
                                                modelid="#create-new-opportunity-modal"></x-mult-select-input>
                                        </div>

                                        <div class="col-md-6">
                                            <x-text-input name="address" model="opportunity" label="عنوان الاستلام">
                                            </x-text-input>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn bg-blue-color" data-mdb-dismiss="modal">
                                        إغلاق
                                    </button>

                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                    <button type="button" class="btn text-white blue-color"
                                        wire:click='addOpportunity()'>حفظ</button>
                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">التالي</button> --}}

                                </div>
                            </div>

                            <div class="tab-pane fade" id="create-new-opportunity-tabs-2" role="tabpanel"
                                aria-labelledby="create-new-opportunity-tab-2">
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <x-select-input id="method-opportunity" label="طريقة طرح الفرصة"
                                                name="method" model="opportunity" :options="[
                                                    'pdf_file' => 'ملف PDF',
                                                    'amounts_table' => 'جدول كميات',
                                                ]"
                                                modelid="#create-new-opportunity-modal"></x-select-input>
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
                                                modelid="#create-new-opportunity-modal"></x-mult-select-input>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn bg-blue-color" data-mdb-dismiss="modal">
                                        إغلاق
                                    </button>

                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                    <button type="button" class="btn text-white blue-color"
                                        wire:click='addOpportunity()'>حفظ</button>
                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">التالي</button> --}}

                                </div>
                            </div>

                            <div class="tab-pane fade" id="create-new-opportunity-tabs-3" role="tabpanel"
                                aria-labelledby="create-new-opportunity-tab-3">
                                <div class="modal-body" id="permissions-1">
                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <x-text-input label="مسئول التواصل" name="manager"
                                                model="opportunity"></x-text-input>
                                        </div>

                                        <div class="col-md-6">
                                            <x-text-input label="رقم الجوال" name="phone"
                                                model="opportunity"></x-text-input>
                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <x-text-input label="البريد الالكتروني" name="email"
                                                model="opportunity"></x-text-input>
                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn bg-blue-color" data-mdb-dismiss="modal">
                                        إغلاق
                                    </button>

                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                    <button type="button" class="btn text-white blue-color"
                                        wire:click='addOpportunity()'>حفظ</button>
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


@push('create-new-opportunity-script')
    <script>
        $(document).ready(function() {

            $method_selection = $("#method-opportunity");
            $file_opportunity_div = $(".file-opportunity-div");
            $units_opportunity_div = $(".units-opportunity-div");

            $file_opportunity_div.show();
            $units_opportunity_div.hide();

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

            Livewire.on("process-has-been-done", function() {
                $(".reset-validation").text("");
                $("#create-new-opportunity-modal").modal('hide');
            });

            Livewire.on("create-new-opportunity-errors", function(errors) {

                $(".reset-validation").text("");
                for (let key in errors[0]) {
                    if (errors[0].hasOwnProperty(key)) {
                        $("." + key + "-opportunity-validation").text(errors[0][key]);
                    }
                }
            });

            Livewire.on("set-opportunity-status", function(data) {
                const singleSelect = document.querySelector("#add-opportunity-status");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue(data[0]['status']);
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

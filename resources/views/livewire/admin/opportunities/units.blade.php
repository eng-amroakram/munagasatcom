<div class="container-fluid">
    <div class="p-4 mb-4">


        <!-- Page Header-->
        <div class="row mb-4" wire:ignore>

            <!-- Page Title  -->
            <h2 style="font-weight: bold;">وحدات القياس</h2>
            <!-- Page Title  -->

            <!-- Breadcrumb -->
            <nav data-mdb-navbar-init class="d-flex navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="font-weight: bold;">
                            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="#">إدارة الفرص</a></li>
                            <li class="breadcrumb-item active"><a href="#">وحدات القياس</a>
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
                                @can('create_unit', auth()->user())
                                    <li>
                                        <a class="dropdown-item" data-mdb-toggle="modal"
                                            data-mdb-target="#create-new-unit-modal" href="#create-new-unit-modal">
                                            <i class="far fa-square-plus me-2"></i>
                                            <span>إضافة وحدة قياس</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('export_activities', auth()->user())
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

                @can('status_unit', auth()->user())
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
                        <th data-mdb-sort="true" class="th-sm"><strong>نوع الوحدة</strong></th>
                        <th data-mdb-sort="true" class="th-sm"><strong>الكمية</strong></th>
                        @can('status_unit', auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>الحالة</strong></th>
                        @endcan

                        @canany(['edit_unit', 'delete_unit'], auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>التحكم</strong></th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($units as $unit)
                        <tr>
                            <td>{{ $unit->id }}</td>
                            <td>{{ $unit->name }}</td>
                            <td>{{ __($unit->unit) }}</td>
                            <td>{{ $unit->amount }}</td>
                            @can('status_unit', auth()->user())
                                <td>
                                    <div class="switch">
                                        <label>
                                            نشط
                                            <input wire:click="changeStatus({{ $unit->id }})" type="checkbox"
                                                {{ $unit->status == 'active' ? 'checked' : '' }}>
                                            <span class="lever"></span>
                                            غير نشط
                                        </label>
                                    </div>

                                </td>
                            @endcan

                            @canany(['edit_unit', 'delete_unit'], auth()->user())
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @can('delete_unit', auth()->user())
                                            <a type="button" class="text-danger fa-lg me-2 ms-2"
                                                wire:click='delete({{ $unit->id }})' title="Delete">
                                                <i class="fas fa-trash-can"></i>
                                            </a>
                                        @endcan
                                        @can('edit_unit', auth()->user())
                                            <a type="button" class="text-dark fa-lg me-2 ms-2 set-button-update"
                                                data-mdb-toggle="modal" data-mdb-target="#create-new-unit-modal"
                                                href="#create-new-unit-modal" title="Editunit"
                                                wire:click="edit({{ $unit->id }})">
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
                    {{ $units->withQueryString()->onEachSide(0)->links() }}
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

    @canany(['edit_unit', 'create_unit'], auth()->user())
        <div class="modal top fade" id="create-new-unit-modal" tabindex="-1" data-mdb-backdrop="static"
            aria-labelledby="Creator" aria-hidden="true" wire:ignore>
            <div class="modal-dialog cascading-modal" style="margin-top: 4%">
                <div class="modal-content">
                    <div class="modal-c-tabs">

                        <!-- Tabs navs -->
                        <ul class="nav md-tabs nav-tabs" id="create-new-unit" role="tablist"
                            style="background-color: #303030;">
                            <li class="nav-item" role="presentation">
                                <a data-mdb-tab-init class="nav-link active" id="create-new-unit-tab-1"
                                    href="#create-new-unit-tabs-1" role="tab" aria-controls="create-new-unit-tabs-1"
                                    aria-selected="true">
                                    <i class="fas fa-circle-info me-1"></i>
                                    <strong>
                                        بيانات وحدة القياس
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


                            <div class="tab-pane fade show active" id="create-new-unit-tabs-1" role="tabpanel"
                                aria-labelledby="create-new-unit-tab-1">

                                <div class="modal-body">

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <x-text-input label="اسم وحدة القياس" name="name"
                                                model="unit"></x-text-input>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <x-select-input modelid="#create-new-unit-modal" label="الوحدة"
                                                name="unit" model="unit" id="add-unit-unit"
                                                :options="units_select()"></x-select-input>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <x-number-input label="الكمية" name="amount"
                                                model="unit"></x-number-input>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn bg-blue-color close-modal-button"
                                        data-mdb-dismiss="modal" x-on:click="$wire.resetting()">
                                        إغلاق
                                    </button>

                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                    <button type="button" class="btn text-white blue-color create-button"
                                        wire:click='addUnit()'>حفظ</button>

                                    <button type="button" class="btn text-white blue-color update-button"
                                        wire:click='updateUnit()'>تحديث</button>
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


@push('create-new-unit-script')
    <script>
        $(document).ready(function() {

            $(".update-button").hide();

            Livewire.on("process-has-been-done", function() {
                $(".reset-validation").text("");
                $("#create-new-unit-modal").modal('hide');
                $(".create-button").show();
                $(".update-button").hide();
            });

            Livewire.on("create-new-unit-errors", function(errors) {
                $(".reset-validation").text("");
                for (let key in errors[0]) {
                    if (errors[0].hasOwnProperty(key)) {
                        $("." + key + "-unit-validation").text(errors[0][key]);
                    }
                }
            });

            Livewire.on("set-unit-unit", function(data) {
                const singleSelect = document.querySelector("#add-unit-unit");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue(data[0]['unit']);
                $(".create-button").hide();
                $(".update-button").show();
            });

            $(".set-button-update").on('click', function() {
                $(".create-button").hide();
                $(".update-button").show();
            });

            $(".close-modal-button").on("click", function() {
                $(".create-button").show();
                $(".update-button").hide();
            });

        });
    </script>
@endpush

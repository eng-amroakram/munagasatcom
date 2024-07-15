<div class="container-fluid">
    <div class="p-4 mb-4">


        <!-- Page Header-->
        <div class="row mb-4" wire:ignore>

            <!-- Page Title  -->
            <h2 style="font-weight: bold;">أنواع المناقصات</h2>
            <!-- Page Title  -->

            <!-- Breadcrumb -->
            <nav data-mdb-navbar-init class="d-flex navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="font-weight: bold;">
                            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="#">إدارة المناقصات</a></li>
                            <li class="breadcrumb-item active"><a href="#">أنواع المناقصات</a>
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
                                @can('create_tender_type', auth()->user())
                                    <li>
                                        <a class="dropdown-item" data-mdb-toggle="modal"
                                            data-mdb-target="#create-new-tender-type-modal"
                                            href="#create-new-tender-type-modal">
                                            <i class="far fa-square-plus me-2"></i>
                                            <span>إضافة نوع مناقصة</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('export_tender_types', auth()->user())
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

                @can('status_tender_type', auth()->user())
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
                        @can('status_tender_type', auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>الحالة</strong></th>
                        @endcan
                        @canany(['edit_tender_type', 'delete_tender_type'], auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>التحكم</strong></th>
                        @endcanany

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tender_types as $tender_type)
                        <tr>
                            <td>{{ $tender_type->id }}</td>
                            <td>{{ $tender_type->name }}</td>
                            @can('status_tender_type', auth()->user())
                                <td class="switch">
                                    <label>
                                        نشط
                                        <input wire:click="changeStatus({{ $tender_type->id }})" type="checkbox"
                                            {{ $tender_type->status == 'active' ? 'checked' : '' }}>
                                        <span class="lever"></span>
                                        غير نشط
                                    </label>
                                </td>
                            @endcan

                            @canany(['edit_tender_type', 'delete_tender_type'], auth()->user())
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @can('delete_tender_type', auth()->user())
                                            <a type="button" class="text-danger fa-lg me-2 ms-2"
                                                wire:click='delete({{ $tender_type->id }})' title="Delete">
                                                <i class="fas fa-trash-can"></i>
                                            </a>
                                        @endcan

                                        @can('edit_tender_type', auth()->user())
                                            <a type="button" class="text-dark fa-lg me-2 ms-2 set-button-update"
                                                data-mdb-toggle="modal" data-mdb-target="#create-new-tender-type-modal"
                                                href="#create-new-tender-type-modal" title="EditTenderType"
                                                wire:click="edit({{ $tender_type->id }})">
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
                    {{ $tender_types->withQueryString()->onEachSide(0)->links() }}
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

    @canany(['edit_tender_type', 'delete_tender_type'], auth()->user())
        <div class="modal top fade" id="create-new-tender-type-modal" tabindex="-1" data-mdb-backdrop="static"
            aria-labelledby="Creator" aria-hidden="true" wire:ignore>
            <div class="modal-dialog cascading-modal" style="margin-top: 4%">
                <div class="modal-content">
                    <div class="modal-c-tabs">


                        <!-- Tabs navs -->
                        <ul class="nav md-tabs nav-tabs" id="create-new-tender-type" role="tablist"
                            style="background-color: #303030;">
                            <li class="nav-item" role="presentation">
                                <a data-mdb-tab-init class="nav-link active" id="create-new-tender-type-tab-1"
                                    href="#create-new-tender-type-tabs-1" role="tab"
                                    aria-controls="create-new-tender-type-tabs-1" aria-selected="true">
                                    <i class="fas fa-circle-info me-1"></i>
                                    <strong>
                                        بيانات نوع المناقصة
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


                            <div class="tab-pane fade show active" id="create-new-tender-type-tabs-1" role="tabpanel"
                                aria-labelledby="create-new-tender-type-tab-1">

                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-md-12">

                                            <label class="form-label" for="forName"><strong>اسم نوع
                                                    المناقصة</strong></label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="far fa-user"></i>
                                                </span>

                                                <input type="name" wire:model.defer="name" maxlength="15"
                                                    class="form-control tender-type-name"
                                                    placeholder="ادخل اسم نوع المناقصة" />

                                            </div>
                                            <div
                                                class="form-helper text-danger name-create-new-tender-type-validation reset-validation">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label"
                                                for="forTenderTypeStatus"><strong>الحالة</strong></label>
                                            <select class="select" id="add-tender-type-status" wire:model="status">
                                                <option value="active">نشط</option>
                                                <option value="inactive">غير نشط</option>
                                            </select>
                                            <div
                                                class="form-helper text-danger status-create-new-tender-type-validation reset-validation">
                                            </div>
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
                                        wire:click='addTenderType()'>حفظ</button>

                                    <button type="button" class="btn text-white blue-color update-button"
                                        wire:click='updateTenderType()'>تحديث</button>
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

            $(".update-button").hide();

            Livewire.on("process-has-been-done", function() {
                $(".reset-validation").text("");
                $("#create-new-tender-type-modal").modal('hide');
                $(".create-button").show();
                $(".update-button").hide();
            });

            Livewire.on("create-new-tender-type-errors", function(errors) {
                $(".reset-validation").text("");
                for (let key in errors[0]) {
                    if (errors[0].hasOwnProperty(key)) {
                        $("." + key + "-create-new-tender-type-validation").text(errors[0][key]);
                    }
                }
            });

            Livewire.on("set-tender-type-status", function(data) {
                const singleSelect = document.querySelector("#add-tender-type-status");
                const singleSelectInstance = mdb.Select.getInstance(singleSelect);
                singleSelectInstance.setValue(data[0]['status']);
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

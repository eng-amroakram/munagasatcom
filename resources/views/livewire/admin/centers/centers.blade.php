<div class="container-fluid">
    <div class="p-4 mb-4">

        <div class="row mb-4" wire:ignore>
            @livewire('page-header', ['title' => 'مراكز الاعمال', 'label' => 'مركز', 'model' => 'center', 'perm' => 'center'])
        </div>


        <!-- Search -->
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

                @can('status_center', auth()->user())
                    <div class="col-md-3">
                        <select class="select" multiple wire:model.live="search_status">
                            <option value="active">نشط</option>
                            <option value="inactive">غير نشط</option>
                        </select>
                    </div>
                @endcan

            </div>
        </div>
        <!-- Search -->


        <!-- Table -->
        <div class="table-responsive-md text-center">
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead>
                    <tr>
                        <th class="th-sm"><strong>ID</strong></th>
                        <th data-mdb-sort="true" class="th-sm"><strong>الاسم</strong></th>
                        @can('superadmin', auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>صاحب المركز</strong></th>
                        @endcan
                        <th data-mdb-sort="false" class="th-sm"><strong>القطاع</strong></th>
                        @can('status_center', auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>حالة المركز</strong></th>
                        @endcan
                        @canany(['edit_center', 'delete_center'], auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>التحكم</strong></th>
                        @endcanany
                    </tr>
                </thead>
                <tbody wire:loading.remove>
                    @foreach ($centers as $center)
                        <tr>
                            <td>{{ $center->id }}</td>
                            <td>{{ $center->name }}</td>
                            @can('superadmin', auth()->user())
                                <td><a target="_blank"
                                        href="{{ route('admin.users.edit', ['user' => $center->user_id]) }}">{{ $center->user?->name }}</a>
                                </td>
                            @endcan

                            <td>{{ $center->sector->name }}</td>
                            <td>
                                @can('superadmin', auth()->user())
                                    <div class="switch">
                                        <label>
                                            نشط
                                            <input wire:click="changeStatus({{ $center->id }})" type="checkbox"
                                                {{ $center->status == 'active' ? 'checked' : '' }}>
                                            <span class="lever"></span>
                                            غير نشط
                                        </label>
                                    </div>
                                @endcan
                                @can('company', auth()->user())
                                    @if ($center->status == 'active')
                                        <span style="font-size: 12px;" class="badge rounded-pill badge-success">نشط</span>
                                    @else
                                        <span style="font-size: 12px;" class="badge rounded-pill badge-danger">غير
                                            نشط</span>
                                    @endif
                                @endcan

                            </td>
                            @canany(['edit_center', 'delete_center'], auth()->user())
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @can('delete_center', auth()->user())
                                            <a type="button" class="text-danger fa-lg me-2 ms-2"
                                                wire:click='delete({{ $center->id }})' title="Delete">
                                                <i class="fas fa-trash-can"></i>
                                            </a>
                                        @endcan
                                        @can('edit_center', auth()->user())
                                            <a type="button" class="text-dark fa-lg me-2 ms-2 set-button-update"
                                                href="{{ route('admin.centers.edit', ['center' => $center->id]) }}"
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
            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>
            <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p>

        </div>
        <!-- Table -->


        <!-- Table Pagination -->
        <div class="d-flex justify-content-between">

            <nav aria-label="...">
                <ul class="pagination pagination-circle">
                    {{ $centers->withQueryString()->onEachSide(0)->links() }}
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

    @canany(['edit_center', 'create_center'], auth()->user())
        <div class="modal fade" id="create-new-center-modal" tabindex="-1" data-mdb-backdrop="static"
            data-mdb-keyboard="false" aria-labelledby="Creator" aria-hidden="true" wire:ignore>
            <div class="modal-dialog modal-lg cascading-modal" style="margin-top: 5%">
                <div class="modal-content">
                    <div class="modal-c-tabs">


                        <!-- Tabs navs -->
                        <ul class="nav md-tabs nav-tabs" id="create-new-user" role="tablist"
                            style="background-color: #303030;">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="create-new-center-tab-1" href="#create-new-center-tabs-1"
                                    role="tab" aria-controls="create-new-center-tabs-1" aria-selected="true"
                                    data-mdb-toggle="pill">
                                    <i class="fas fa-circle-info me-1"></i>
                                    <strong>
                                        بيانات المركز الاساسية
                                    </strong>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="create-new-center-tab-2" href="#create-new-center-tabs-2"
                                    role="tab" aria-controls="create-new-center-tabs-2" aria-selected="false"
                                    data-mdb-toggle="pill">
                                    <i class="fas fa-circle-info me-1"></i>
                                    <strong>
                                        شعار المركز
                                    </strong>
                                </a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="create-new-center-tab-3" href="#create-new-center-tabs-3"
                                    role="tab" aria-controls="create-new-center-tabs-3" aria-selected="false"
                                    data-mdb-toggle="pill">
                                    <i class="fas fa-circle-info me-1"></i>
                                    <strong>
                                        بيانات التواصل
                                    </strong>
                                </a>
                            </li>

                        </ul>


                        <div class="tab-content" id="ex1-content">

                            <div class="mask mask-color" wire:loading wire:target="logo"
                                style="z-index: 1; background-color: #303030; opacity: 50%;">
                                <div
                                    class="position-absolute w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only text-primary">Loading...</span>
                                    </div>
                                    <h4 class="text-white">جاري التحميل يرجى الانتظار ...</h4>
                                </div>
                            </div>

                            <div class="mask mask-color" wire:loading wire:target="profile"
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


                            <div class="tab-pane fade show active" id="create-new-center-tabs-1" role="tabpanel"
                                aria-labelledby="create-new-center-tab-1">

                                <div class="modal-body">


                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <x-text-input name="name" model="center" label="اسم المركز">
                                            </x-text-input>
                                        </div>

                                        <div class="col-md-6">
                                            <x-select-input id="city_id-center" label="اختيار المدينة" name="city_id"
                                                model="center" :options="cities(true)"
                                                modelid="#create-new-center-modal"></x-mult-select-input>
                                        </div>
                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <x-select-input id="sector_id-center" label="اختيار القطاع" name="sector_id"
                                                model="center" :options="sectors(true)"
                                                modelid="#create-new-center-modal"></x-mult-select-input>
                                        </div>

                                        <div class="col-md-6">
                                            <x-mult-select-input id="services-center" label="اختيار خدمات القطاع"
                                                name="services" model="center" :options="sector_services($sector_id)"
                                                modelid="#create-new-center-modal"></x-mult-select-input>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-text-input name="address" model="center" label="العنوان">
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
                                        wire:click='addCenter()'>حفظ</button>
                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">التالي</button> --}}

                                </div>
                            </div>

                            <div class="tab-pane fade" id="create-new-center-tabs-2" role="tabpanel"
                                aria-labelledby="create-new-center-tab-2">
                                <div class="modal-body">
                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <x-file-input label="شعار المركز" name="logo"
                                                model="center"></x-file-input>
                                        </div>

                                        <div class="col-md-6">
                                            <x-file-input label="بروفايل المركز" name="profile"
                                                model="center"></x-file-input>
                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn bg-blue-color" data-mdb-dismiss="modal">
                                        إغلاق
                                    </button>

                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                    <button type="button" class="btn text-white blue-color"
                                        wire:click='addCenter()'>حفظ</button>
                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">التالي</button> --}}

                                </div>
                            </div>

                            <div class="tab-pane fade" id="create-new-center-tabs-3" role="tabpanel"
                                aria-labelledby="create-new-center-tab-3">
                                <div class="modal-body" id="permissions-1">
                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <x-text-input label="رقم الهاتف" name="telephone"
                                                model="center"></x-text-input>
                                        </div>

                                        <div class="col-md-6">
                                            <x-text-input label="رقم الجوال" name="mobile"
                                                model="center"></x-text-input>
                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <x-text-input label="البريد الالكتروني" name="email"
                                                model="center"></x-text-input>
                                        </div>

                                        <div class="col-md-6">
                                            <x-text-input label="رابط الفيسبوك" name="facebook"
                                                model="center"></x-text-input>
                                        </div>

                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <x-text-input label="رابط اللينكد ان" name="linkedin"
                                                model="center"></x-text-input>
                                        </div>

                                        <div class="col-md-6">
                                            <x-text-input label="رابط منصة اكس" name="twitter"
                                                model="center"></x-text-input>
                                        </div>

                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn bg-blue-color" data-mdb-dismiss="modal">
                                        إغلاق
                                    </button>

                                    {{-- <button type="button" class="btn bg-blue-color nextCreator">السابق</button> --}}
                                    <button type="button" class="btn text-white blue-color"
                                        wire:click='addCenter()'>حفظ</button>
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


@push('create-new-center-script')
    <script>
        $(document).ready(function() {

            Livewire.on("process-has-been-done", function() {
                $(".reset-validation").text("");
                $("#create-new-center-modal").modal('hide');
            });

            Livewire.on("create-new-center-errors", function(errors) {
                $(".reset-validation").text("");
                for (let key in errors[0]) {
                    if (errors[0].hasOwnProperty(key)) {
                        $("." + key + "-center-validation").text(errors[0][key]);
                    }
                }
            });

            Livewire.on("set-center-status", function(data) {
                const singleSelect = document.querySelector("#add-center-status");
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

        });
    </script>
@endpush

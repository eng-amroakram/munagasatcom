<div class="container-fluid">
    <div class="p-4 mb-4">
        <div class="row mb-4" wire:ignore>
            @livewire('page-header', ['title' => 'ملاحظات الفرص', 'label' => 'ملاحظة', 'model' => 'opportunity-note', 'perm' => 'opportunity_note'])
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

                @can('status_opportunity_note', auth()->user())
                    <div class="col-md-3">
                        <select class="select" multiple wire:model.live="search_status">
                            <option value="active">نشط</option>
                            <option value="inactive">غير نشط</option>
                        </select>
                    </div>
                @endcan

            </div>
        </div>

        <div class="table-responsive-md text-center">
            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead>
                    <tr>
                        <th class="th-sm"><strong>ID</strong></th>
                        <th data-mdb-sort="true" class="th-sm"><strong>الاسم</strong></th>
                        @can('status_opportunity_note', auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>حالة الملاحظة</strong></th>
                        @endcan
                        @canany(['edit_opportunity_note', 'delete_opportunity_note'], auth()->user())
                            <th data-mdb-sort="false" class="th-sm"><strong>التحكم</strong></th>
                        @endcanany
                    </tr>
                </thead>
                <tbody wire:loading.remove>
                    @foreach ($opportunity_notes as $opportunity_note)
                        <tr>
                            <td>{{ $opportunity_note->id }}</td>
                            <td>{{ $opportunity_note->name }}</td>
                            <td>
                                @can('superadmin', auth()->user())
                                    <div class="switch">
                                        <label>
                                            نشط
                                            <input wire:click="changeStatus({{ $opportunity_note->id }})" type="checkbox"
                                                {{ $opportunity_note->status == 'active' ? 'checked' : '' }}>
                                            <span class="lever"></span>
                                            غير نشط
                                        </label>
                                    </div>
                                @endcan
                                @can('company', auth()->user())
                                    @if ($opportunity_note->status == 'active')
                                        <span style="font-size: 12px;" class="badge rounded-pill badge-success">نشط</span>
                                    @else
                                        <span style="font-size: 12px;" class="badge rounded-pill badge-danger">غير
                                            نشط</span>
                                    @endif
                                @endcan

                            </td>
                            @canany(['edit_opportunity_note', 'delete_opportunity_note'], auth()->user())
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @can('delete_opportunity_note', auth()->user())
                                            <a type="button" class="text-danger fa-lg me-2 ms-2"
                                                wire:click='delete({{ $opportunity_note->id }})' title="Delete">
                                                <i class="fas fa-trash-can"></i>
                                            </a>
                                        @endcan

                                        @can('edit_opportunity_note', auth()->user())
                                            <a type="button" class="text-dark fa-lg me-2 ms-2 set-button-update"
                                                data-mdb-toggle="modal" data-mdb-target="#create-new-opportunity-note-modal"
                                                href="#create-new-opportunity-note-modal" title="EditOpportunityNote"
                                                wire:click="edit({{ $opportunity_note->id }})">
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

        <!-- Table Pagination -->
        <div class="d-flex justify-content-between">

            <nav aria-label="...">
                <ul class="pagination pagination-circle">
                    {{ $opportunity_notes->withQueryString()->onEachSide(0)->links() }}
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

    @canany(['edit_opportunity_note', 'create_opportunity_note'], auth()->user())
        <div class="modal fade" id="create-new-opportunity-note-modal" tabindex="-1" data-mdb-backdrop="static"
            data-mdb-keyboard="false" aria-labelledby="Creator" aria-hidden="true" wire:ignore>
            <div class="modal-dialog cascading-modal" style="margin-top: 5%">
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
                                        بيانات الملاحظة
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


                            <div class="tab-pane fade show active" id="create-new-center-tabs-1" role="tabpanel"
                                aria-labelledby="create-new-center-tab-1">

                                <div class="modal-body">


                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <x-text-input name="name" model="opportunity-note" label="الملاحظة">
                                            </x-text-input>
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
                                        wire:click='addOpportunityNote()'>حفظ</button>

                                    <button type="button" class="btn text-white blue-color update-button"
                                        wire:click='updateOpportunityNote()'>تحديث</button>
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



@push('create-new-opportunity-note-script')
    <script>
        $(document).ready(function() {

            $(".update-button").hide();

            Livewire.on("process-has-been-done", function() {
                $(".reset-validation").text("");
                $("#create-new-opportunity-note-modal").modal('hide');
                $(".create-button").show();
                $(".update-button").hide();
            });

            Livewire.on("create-new-opportunity-note-errors", function(errors) {
                $(".reset-validation").text("");
                for (let key in errors[0]) {
                    if (errors[0].hasOwnProperty(key)) {
                        $("." + key + "-opportunity-note-validation").text(errors[0][key]);
                    }
                }
            });

            Livewire.on("set-opportunity-note-status", function(data) {
                const singleSelect = document.querySelector("#add-opportunity-note-status");
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

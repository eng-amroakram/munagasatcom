<div class="container mt-5">
    <div class="row mb-4">
        <h2 style="font-weight: bold;">المناقصات الحكومية</h2>
    </div>

    <style>
        .test-button {
            text-decoration: none;
            font-weight: 700;
            border-right: 5px solid;
            border-right-color: #315d90;
            border-radius: 0%;
        }

        .image-test {
            max-height: 245px;
            max-width: 100%;
        }
    </style>



    <div class="d-flex">

        <div class="col-md-2 m-2" wire:ignore>
            <a type="button" href="{{ route('web.tenders.index') }}"
                class="btn me-3 text-start test-button text-dark  w-100 mb-2">
                <span style="font-size: 15px;">
                    المناقصات
                </span>
            </a>

            <a type="button" href="{{ route('web.centers.index') }}"
                class="btn me-3 test-button text-start text-dark  w-100 mb-2">
                <span style="font-size: 15px;">
                    مراكز الاعمال
                </span>
            </a>

            <a type="button" href="{{ route('web.opportunities') }}"
                class="btn me-3 test-button text-start text-dark  w-100 mb-2">
                <span style="font-size: 15px;">
                    الفرص الاستثمارية
                </span>
            </a>
        </div>

        <div class="col-md-9 m-2">

            <div class="form-outline" wire:ignore>
                <i class="fab fa-searchengin trailing text-primary"></i>
                <input type="search" id="search" wire:model.live="search" class="form-control form-icon-trailing"
                    aria-describedby="textExample1" />
                <label class="form-label" for="search">البحث</label>
            </div>

            <div class="mt-5 mb-5">

                @foreach ($tenders as $tender)
                    <div class="card mb-3 w-100">
                        <div class="row g-0">

                            <div class="col-md-3">
                                <img src="{{ asset('assets/admin/images/login.jpg') }}" alt="Trendy Pants and Shoes"
                                    class="img-fluid rounded-start" height="245" width="245" />
                            </div>

                            <div class="col-md-9">
                                <div class="card-body">

                                    <div class="d-flex justify-content-between">
                                        <div class="card-title fw-bold">
                                        </div>
                                        <div class="d-flex">
                                            <a class="nav-link" href="#">
                                                <span class="badge rounded-pill badge-notification bg-danger">1</span>
                                                <i class="fas fa-user fs-4 text-dark"></i>
                                            </a>
                                            <a class="nav-link" href="#">
                                                <i class="far fa-heart fs-4 text-danger"></i>
                                                {{-- <i class="fas fa-heart fs-4"></i> --}}
                                            </a>
                                            <a class="nav-link" href="#">
                                                <i class="fas fa-share-nodes fs-4"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-3">
                                        <div class="col-md-2 fw-bold">اسم المناقصة</div>
                                        <div class="col-sm-5">{{ $tender->name }}</div>
                                    </div>

                                    <div class="d-flex mb-3">
                                        <div class="col-md-2 fw-bold">رقم المناقصة</div>
                                        <div class="col-sm-5">{{ $tender->code }}</div>
                                    </div>

                                    <div class="d-flex mb-3">
                                        <div class="col-md-2 fw-bold">نوع المناقصة</div>
                                        <div class="col-sm-5">{{ $tender->tender_type->name }}</div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <div class="card-title fw-bold">
                                        </div>
                                        <p class="card-text">
                                            <a href="#">
                                                <small class="text-muted">مزيد من التفاصيل >></small>
                                            </a>
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

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


        </div>
    </div>











</div>

<section class="mt-md-4 pt-md-2 mb-5 p-5">

    <div class="row">

        {{-- @can('tenders', auth()->user())
            <div class="col-xl-3 col-md-6 mb-5">
                <div class="card card-cascade cascading-admin-card">
                    <div class="admin-up">
                        <i class="fas fa-city blue-color mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase fs-6 fw-bold">المناقصات</p>
                            <h4 class="font-weight-bold dark-grey-text">45</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endcan --}}

        @can('company', auth()->user())
            <div class="col-xl-3 col-md-6 mb-5">
                <div class="card card-cascade cascading-admin-card">
                    <div class="admin-up">
                        {{-- <i class="fas fa-city blue-color mr-3 z-depth-2"></i> --}}
                        <i class="fas fa-users blue-color pr-3 mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase fs-6 fw-bold">الموظفين</p>
                            <h4 class="font-weight-bold dark-grey-text">{{ count_employees() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        {{-- @can('centers', auth()->user())
            <div class="col-xl-3 col-md-6 mb-5">
                <div class="card card-cascade cascading-admin-card">
                    <div class="admin-up">
                        <i class="fas fa-city blue-color mr-3 z-depth-2"></i>
                        <i class="fas fa-users blue-color pr-3 mr-3 z-depth-2"></i>
                        <div class="data">
                            <p class="text-uppercase fs-6 fw-bold">مراكز الاعمال</p>
                            <h4 class="font-weight-bold dark-grey-text">45</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endcan --}}


    </div>
</section>

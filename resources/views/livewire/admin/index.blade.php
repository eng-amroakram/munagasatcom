<section class="mt-md-4 pt-md-2 mb-5 p-5">

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-briefcase blue-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">المناقصات</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('Tender') }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-city blue-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">مراكز الاعمال</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('Center') }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-city blue-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">الفرص الاستثمارية</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('Opportunity') }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-city blue-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">طلبات التسعير</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('PricingRequest') }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-city blue-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">القطاعات</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('Sector') }}</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-city blue-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">الخدمات</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('Service') }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-city blue-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">الجهات الحكومية</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('GovernmentBroker') }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-city blue-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">المدن</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('City') }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-city blue-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">الانشطة</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('Activity') }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-city blue-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">انواع المناقصات</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('TenderType') }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-city blue-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">وسوم المناقصات</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ models_count('Tag') }}</h4>
                    </div>
                </div>
            </div>
        </div>


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

        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    {{-- <i class="fas fa-city blue-color mr-3 z-depth-2"></i> --}}
                    <i class="fas fa-users blue-color pr-3 mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">الافراد</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ count_person() }}</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-5">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    {{-- <i class="fas fa-city blue-color mr-3 z-depth-2"></i> --}}
                    <i class="fas fa-users blue-color pr-3 mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">الشركات</p>
                        <h4 class="font-weight-bold dark-grey-text">{{ count_company() }}</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<nav id="sidenav-1" class="sidenav ps ps--active-y" data-mdb-color="light" style="background-color: #2d2c2c"
    role="navigation" data-mdb-mode="side" data-mdb-right="false" data-mdb-hidden="false" data-mdb-accordion="true">

    <a class="ripple d-flex justify-content-center py-5" style="padding-top: 5rem !important;"
        href="{{ route('admin.index') }}" data-ripple-color="primary">

        <img id="MDB-logo" width="200" src="{{ asset('assets/admin/images/munagasatcom-brand.png') }}"
            alt="MDB Logo" draggable="false" />
    </a>

    <ul class="sidenav-menu">

        <li class="sidenav-item">
            <a class="sidenav-link" href="{{ route('admin.index') }}">
                <i class="fas fa-chart-area pr-4 me-2 "></i><span>الصفحة الرئيسية</span></a>
        </li>

        @can('tenders', auth()->user())
            <li class="sidenav-item">
                <a class="sidenav-link"><i class="fas fa-briefcase pr-3 me-2"></i><span>المناقصات الحكومية</span></a>

                <ul class="sidenav-collapse">

                    @can('tenders', auth()->user())
                        <li class="sidenav-item ">
                            <a class="sidenav-link" href="{{ route('admin.tenders.index') }}">
                                <i class="fas fa-briefcase pr-3 me-2"></i>
                                <span>
                                    إدارة المناقصات
                                </span>
                            </a>
                        </li>
                    @endcan

                    @can('government_brokers', auth()->user())
                        <li class="sidenav-item">
                            <a class="sidenav-link" href="{{ route('admin.tenders.government-brokers') }}">
                                <i class="fas fa-building-columns pr-3 me-2"></i>
                                الجهات الحكومية</a>
                        </li>
                    @endcan

                    @can('activities', auth()->user())
                        <li class="sidenav-item">
                            <a class="sidenav-link" href="{{ route('admin.tenders.activities') }}">
                                <i class="fas fa-chart-line pr-3 me-2"></i>
                                الانشطة</a>
                        </li>
                    @endcan

                    @can('cities', auth()->user())
                        <li class="sidenav-item ">
                            <a class="sidenav-link" href="{{ route('admin.tenders.cities') }}">
                                <i class="fas fa-city pr-3 me-2"></i>
                                <span>المدن</span>
                            </a>
                        </li>
                    @endcan

                    @can('tags', auth()->user())
                        <li class="sidenav-item ">
                            <a class="sidenav-link" href="{{ route('admin.tenders.tags') }}">
                                <i class="fas fa-tags pr-3 me-2"></i>
                                وسوم المناقصات</a>
                        </li>
                    @endcan

                    @can('tender_types', auth()->user())
                        <li class="sidenav-item">
                            <a class="sidenav-link" href="{{ route('admin.tenders.tender-types') }}">
                                <i class="fas fa-bars pr-3 me-2"></i>
                                أنواع المناقصات</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan


        @can('superadmin', auth()->user())
            @can('users', auth()->user())
                <li class="sidenav-item">
                    <a class="sidenav-link">
                        <i class="fas fa-users-gear pr-3 me-2"></i>
                        <span>إدارة العملاء</span>
                    </a>

                    <ul class="sidenav-collapse">
                        <li class="sidenav-item">
                            <a class="sidenav-link" href="{{ route('admin.users.users') }}">
                                <i class="fas fa-users pr-3 me-2"></i>
                                <span>الأعضاء</span>
                            </a>
                        </li>
                        <li class="sidenav-item ">
                            <a class="sidenav-link">
                                <i class="fas fa-comment-dots pr-3 me-2"></i>
                                <span>استفسار العملاء</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
        @endcan

        @can('company', auth()->user())
            <li class="sidenav-item">
                <a class="sidenav-link">
                    <i class="fas fa-users-gear pr-3 me-2"></i>
                    <span>إدارة الموظفين</span>
                </a>

                <ul class="sidenav-collapse">
                    <li class="sidenav-item ">
                        <a class="sidenav-link" href="{{ route('admin.users.users') }}">
                            <i class="fas fa-comment-dots pr-3 me-2"></i>
                            <span>الموظفين</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan


        @canany(['centers', 'sectors', 'services'], auth()->user())
            <li class="sidenav-item">
                <a class="sidenav-link">
                    <i class="fas fa-building pr-3 me-2"></i>
                    <span>إدارة مراكز الاعمال</span>
                </a>


                <ul class="sidenav-collapse">

                    @can('centers', auth()->user())
                        <li class="sidenav-item">
                            <a class="sidenav-link" href="{{ route('admin.centers.index') }}">
                                <i class="fas fa-building pr-3 me-2"></i>
                                <span>مراكز الاعمال</span>
                            </a>
                        </li>

                        <li class="sidenav-item ">
                            <a class="sidenav-link" href="{{ route('admin.centers.pricing-requests') }}">
                                <i class="fas fa-comment-dots pr-3 me-2"></i>
                                <span>طلبات التسعير</span>
                            </a>
                        </li>
                    @endcan

                    @can('sectors', auth()->user())
                        <li class="sidenav-item ">
                            <a class="sidenav-link" href="{{ route('admin.centers.sectors') }}">
                                <i class="fab fa-codiepie pr-3 me-2"></i>
                                <span>القطاعات</span>
                            </a>
                        </li>
                    @endcan

                    @can('services', auth()->user())
                        <li class="sidenav-item ">
                            <a class="sidenav-link" href="{{ route('admin.centers.services') }}">
                                <i class="fab fa-servicestack pr-3 me-2"></i>
                                <span>الخدمات</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcanany


        @can('opportunities', auth()->user())
            <li class="sidenav-item">
                <a class="sidenav-link">
                    <i class="fas fa-dice-d20 pr-3 me-2"></i>
                    <span>إدارة الفرص الاستثمارية</span>
                </a>


                <ul class="sidenav-collapse">

                    @can('opportunities', auth()->user())
                        <li class="sidenav-item ">
                            <a class="sidenav-link" href="{{ route('admin.opportunities.index') }}">
                                <i class="fas fa-dice-d20 pr-3 me-2"></i>
                                <span>الفرص الاستثمارية</span>
                            </a>
                        </li>
                    @endcan

                    @can('opportunity_notes', auth()->user())
                        <li class="sidenav-item ">
                            <a class="sidenav-link" href="{{ route('admin.opportunities.opportunity-notes') }}">
                                <i class="far fa-clipboard pr-3 me-2"></i>
                                <span>ملاحظات الفرص الاستثمارية</span>
                            </a>
                        </li>
                    @endcan

                    @can('superadmin', auth()->user())
                        <li class="sidenav-item ">
                            <a class="sidenav-link" href="{{ route('admin.opportunities.units') }}">
                                <i class="fas fa-screwdriver-wrench pr-3 me-2"></i>
                                <span>وحدات القياس</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcan

    </ul>

</nav>

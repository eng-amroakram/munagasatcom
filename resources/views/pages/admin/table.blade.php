@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid">

        <!-- Notifictions Alers-->

        {{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ 'خطأ جديد يرجى متابعة الامر من اللوحة' }}</strong>
                <button type="button" class="btn-close"   data-mdb-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ 'خطأ جديد يرجى متابعة الامر من اللوحة' }}</strong>
                <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ 'خطأ جديد يرجى متابعة الامر من اللوحة' }}</strong>
                <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ 'خطأ جديد يرجى متابعة الامر من اللوحة' }}</strong>
                <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
            </div> --}}

        <!-- Notifictions Alers-->


        <!-- Heading -->
        <div class="p-4 mb-4">


            <!-- Page Header-->
            <div class="row mb-4">

                <!-- Page Title  -->
                <h2 style="font-weight: bold;">إدارة المناقصات</h2>
                <!-- Page Title  -->

                <!-- Breadcrumb -->
                <nav data-mdb-navbar-init class="d-flex navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" style="font-weight: bold;">
                                <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                                <li class="breadcrumb-item"><a href="#">المناقصات</a></li>
                                <li class="breadcrumb-item active"><a href="#">انواع المناقصات</a>
                                </li>
                            </ol>
                        </nav>

                        <div class="d-flex align-items-center pe-3">
                            <!-- Notifications -->
                            <div class="dropdown">
                                <a data-mdb-dropdown-init class="link-secondary me-3 dropdown-toggle hidden-arrow"
                                    href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                    <i class="fas fa-gear"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="far fa-square-plus me-2"></i>
                                            <span>إضافة مناقصة</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-file-export me-2"></i>
                                            <span>تصدير البيانات</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </nav>
                <!-- Breadcrumb -->
            </div>
            <!-- Page Header-->

            <!-- Data Tables -->
            <div class="row">

                <div class="row p-2 mb-3">

                    <div class="col-md-3">
                        <div class="form-outline" data-mdb-input-init>
                            <i class="fab fa-searchengin trailing text-primary"></i>
                            <input type="search" id="search" class="form-control form-icon-trailing"
                                aria-describedby="textExample1" />
                            <label class="form-label" for="search">البحث</label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <select data-mdb-select-init multiple>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
                            <option value="7">Seven</option>
                            <option value="8">Eight</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select data-mdb-select-init multiple>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
                            <option value="7">Seven</option>
                            <option value="8">Eight</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select data-mdb-select-init multiple>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
                            <option value="7">Seven</option>
                            <option value="8">Eight</option>
                        </select>
                    </div>



                </div>


            </div>

            <div class="datatable table-responsive-md">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="th-sm"><strong> Name</strong></th>
                            <th data-mdb-sort="true" class="th-sm"><strong> Position</strong></th>
                            <th data-mdb-sort="false" class="th-sm"><strong> Office</strong></th>
                            <th data-mdb-sort="false" class="th-sm"><strong> Age</strong></th>
                            <th data-mdb-sort="false" class="th-sm"><strong> Start date</strong></th>
                            <th data-mdb-sort="false" class="th-sm"><strong> Salary</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>

                        <tr>
                            <td>Sonya Frost</td>
                            <td>Software Engineer</td>
                            <td>Edinburgh</td>
                            <td>23</td>
                            <td>2008/12/13</td>
                            <td>$103,600</td>
                        </tr>
                        <tr>
                            <td>Jena Gaines</td>
                            <td>Office Manager</td>
                            <td>London</td>
                            <td>30</td>
                            <td>2008/12/19</td>
                            <td>$90,560</td>
                        </tr>
                        <tr>
                            <td>Quinn Flynn</td>
                            <td>Support Lead</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2013/03/03</td>
                            <td>$342,000</td>
                        </tr>
                        <tr>
                            <td>Charde Marshall</td>
                            <td>Regional Director</td>
                            <td>San Francisco</td>
                            <td>36</td>
                            <td>2008/10/16</td>
                            <td>$470,600</td>
                        </tr>
                        <tr>
                            <td>Haley Kennedy</td>
                            <td>Senior Marketing Designer</td>
                            <td>London</td>
                            <td>43</td>
                            <td>2012/12/18</td>
                            <td>$313,500</td>
                        </tr>
                        <tr>
                            <td>Tatyana Fitzpatrick</td>
                            <td>Regional Director</td>
                            <td>London</td>
                            <td>19</td>
                            <td>2010/03/17</td>
                            <td>$385,750</td>
                        </tr>
                        <tr>
                            <td>Michael Silva</td>
                            <td>Marketing Designer</td>
                            <td>London</td>
                            <td>66</td>
                            <td>2012/11/27</td>
                            <td>$198,500</td>
                        </tr>
                        <tr>
                            <td>Paul Byrd</td>
                            <td>Chief Financial Officer (CFO)</td>
                            <td>New York</td>
                            <td>64</td>
                            <td>2010/06/09</td>
                            <td>$725,000</td>
                        </tr>
                        <tr>
                            <td>Gloria Little</td>
                            <td>Systems Administrator</td>
                            <td>New York</td>
                            <td>59</td>
                            <td>2009/04/10</td>
                            <td>$237,500</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Pagination -->
            <div class="d-flex justify-content-between">

                <nav aria-label="...">
                    <ul class="pagination pagination-circle">
                        <li class="page-item">
                            <a class="page-link">السابق</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2 <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">التالي</a>
                        </li>
                    </ul>
                </nav>

                <div class="col-md-1">
                    <select data-mdb-select-init>
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>



            </div>
            <!-- Table Pagination -->

        </div>
        <!-- Data Tables -->

    </div>
    <!-- Heading -->





    </div>
@endsection

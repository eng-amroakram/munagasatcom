<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="../../img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('date/mdb.min.css') }}" />
    <!-- PRISM -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/new-prism.css') }}" />
    <!-- Custom styles -->
    <style></style>
</head>

<body>
    <div class="container my-5">
        <!-- Navs -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <!-- Overview tab -->
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-overview-tab" data-mdb-toggle="pill" href="#pills-overview"
                    role="tab" aria-controls="pills-overview" aria-selected="true">Overview</a>
            </li>
            <!-- Overview tab -->

            <!-- Api tab -->
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-api-tab" data-mdb-toggle="pill" href="#pills-api" role="tab"
                    aria-controls="pills-api" aria-selected="false">API</a>
            </li>
            <!-- Api tab -->
        </ul>
        <!-- Navs -->

        <!-- Panels -->
        <div class="tab-content mt-4" id="pills-tabContent">
            <!-- Overview panel -->
            <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                aria-labelledby="pills-overview-tab">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-10 mb-4">
                        <!--Section: Docs content-->
                        <section>
                            <!--Section: Introduction-->
                            <section id="section-introduction">
                                <!-- Main title -->
                                <h2 class="h1 fw-bold">Datepicker</h2>

                                <!-- Seo title -->
                                <h1 class="h5">Datepicker - Bootstrap 5 & Material Design 2.0</h1>

                                <!-- Description -->
                                <p>
                                    Bootstrap date picker is a plugin that adds the function of selecting time
                                    without the necessity of using custom JavaScript code.
                                </p>

                                <p class="note note-light">
                                    <strong>Note:</strong> Read the <strong>API</strong> tab to find all available
                                    options and advanced customization
                                </p>
                            </section>
                            <!--Section: Introduction-->

                            <hr class="my-5" />

                            <!--Section: Basic example-->
                            <section id="section-basic-example">
                                <!-- Section title -->
                                <h2 class="mb-4">Basic example</h2>

                                <!--Section: Demo-->
                                <section class="border p-4 d-flex justify-content-center mb-4">
                                    <div class="form-outline datepicker">
                                        <input type="text" class="form-control" id="exampleDatepicker1" />
                                        <label for="exampleDatepicker1" class="form-label">Example label</label>
                                    </div>
                                </section>
                                <!--Section: Demo-->

                                <!--Section: Code-->
                                <section>
                                    <!--prettier-ignore-->
                    <mdbsnippet>
                                    <code data-lang="html" data-name="HTML">
                                        <div class="form-outline datepicker">
                                            <input type="text" class="form-control" id="exampleDatepicker1" />
                                            <label for="exampleDatepicker1" class="form-label">Example label</label>
                                        </div>
                                    </code>
                                    </mdbsnippet>
                                </section>
                                <!--Section: Code-->
                            </section>
                            <!--Section: Basic example-->

                            <hr class="my-5" />

                            <!--Section: Inline version-->
                            <section id="section-inline-version">
                                <!-- Section title -->
                                <h2 class="mb-4">Inline version</h2>

                                <!--Section: Demo-->
                                <section class="border p-4 d-flex justify-content-center mb-4">
                                    <div class="form-outline datepicker" data-mdb-inline="true">
                                        <input type="text" class="form-control" id="exampleDatepicker2" />
                                        <label for="exampleDatepicker2" class="form-label">Example label</label>
                                    </div>
                                </section>
                                <!--Section: Demo-->

                                <!--Section: Code-->
                                <section>
                                    <mdbsnippet>
                                        <code data-lang="html" data-name="HTML">
                                            <div class="form-outline datepicker" data-mdb-inline="true">
                                                <input type="text" class="form-control" id="exampleDatepicker2" />
                                                <label for="exampleDatepicker2" class="form-label">Example label</label>
                                            </div>
                                        </code>
                                    </mdbsnippet>
                                </section>
                                <!--Section: Code-->
                            </section>
                            <!--Section: Inline version-->

                            <hr class="my-5" />

                            <!--Section: Translations-->
                            <section id="section-translations">
                                <!-- Section title -->
                                <h2 class="mb-4">Translations</h2>
                                <p>
                                    The picker can be customized to add support for internationalization. Modify the
                                    component options to add translations.
                                </p>

                                <!--Section: Demo-->
                                <section class="border p-4 d-flex justify-content-center mb-4">
                                    <div class="form-outline datepicker-translated">
                                        <input type="text" class="form-control" id="exampleDatepicker3" />
                                        <label for="exampleDatepicker3" class="form-label">Example label</label>
                                    </div>
                                </section>
                                <!--Section: Demo-->

                                <!--Section: Code-->
                                <section>
                                    <!--prettier-ignore-->
                    <mdbsnippet>
                                    <code data-lang="html" data-name="HTML">
                                        <div class="form-outline datepicker-translated">
                                            <input type="text" class="form-control" id="exampleDatepicker3" />
                                            <label for="exampleDatepicker3" class="form-label">Example label</label>
                                        </div>
                                    </code>

                                    <code data-lang="javascript" data-name="Javascript">
                                        var datepickerTranslated = document.querySelector('.datepicker-translated');
                                        new mdb.Datepicker(datepickerTranslated, {
                                        title: 'Datum auswählen',
                                        monthsFull: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli',
                                        'August', 'September',
                                        'Oktober', 'November', 'Dezember'],
                                        monthsShort: ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep',
                                        'Okt', 'Nov','Dez'],
                                        weekdaysFull: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag',
                                        'Freitag', 'Samstag'],
                                        weekdaysShort: ['Son', 'Mon', 'Die', 'Mit', 'Don', 'Fre', 'Sam'],
                                        weekdaysNarrow: ['S', 'M', 'D', 'M', 'D', 'F', 'S'],
                                        okBtnText: 'Ok',
                                        clearBtnText: 'Klar',
                                        cancelBtnText: 'Schließen',
                                        });
                                    </code>
                                    </mdbsnippet>
                                </section>
                                <!--Section: Code-->
                            </section>
                            <!--Section: Translations-->

                            <hr class="my-5" />

                            <!--Section: Formats-->
                            <section id="section-formats">
                                <!-- Section title -->
                                <h2 class="mb-4">Formats</h2>

                                <p>Use <code>format</code> option to display date in a human-friendly format.</p>

                                <!--Section: Demo-->
                                <section class="border p-4 d-flex justify-content-center mb-4">
                                    <div class="form-outline datepicker" data-mdb-format="dd, mmm, yyyy">
                                        <input type="text" class="form-control" id="exampleDatepicker4"
                                            placeholder="dd, mmm, yyyy" />
                                        <label for="exampleDatepicker4" class="form-label">Example label</label>
                                    </div>
                                </section>
                                <!--Section: Demo-->

                                <!--Section: Code-->
                                <section>
                                    <mdbsnippet>
                                        <code data-lang="html" data-name="HTML">
                                            <div class="form-outline datepicker" data-mdb-format="dd, mmm, yyyy">
                                                <input type="text" class="form-control" id="exampleDatepicker4"
                                                    placeholder="dd, mmm, yyyy" />
                                                <label for="exampleDatepicker4" class="form-label">Example
                                                    label</label>
                                            </div>
                                        </code>
                                    </mdbsnippet>
                                </section>
                                <!--Section: Code-->

                                <h4 class="mt-5"><strong>Formatting rules</strong></h4>

                                <p>The following rules can be used to format any date:</p>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Rule</th>
                                            <th>Description</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><code>d</code></td>
                                            <td>Date of the month</td>
                                            <td>1 &ndash; 31</td>
                                        </tr>
                                        <tr>
                                            <td><code>dd</code></td>
                                            <td>Date of the month with a leading zero</td>
                                            <td>01 &ndash; 31</td>
                                        </tr>
                                        <tr>
                                            <td><code>ddd</code></td>
                                            <td>Day of the week in short form</td>
                                            <td>Sun &ndash; Sat</td>
                                        </tr>
                                        <tr>
                                            <td><code>dddd</code></td>
                                            <td>Day of the week in full form</td>
                                            <td>Sunday &ndash; Saturday</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td><code>m</code></td>
                                            <td>Month of the year</td>
                                            <td>1 &ndash; 12</td>
                                        </tr>
                                        <tr>
                                            <td><code>mm</code></td>
                                            <td>Month of the year with a leading zero</td>
                                            <td>01 &ndash; 12</td>
                                        </tr>
                                        <tr>
                                            <td><code>mmm</code></td>
                                            <td>Month name in short form</td>
                                            <td>Jan &ndash; Dec</td>
                                        </tr>
                                        <tr>
                                            <td><code>mmmm</code></td>
                                            <td>Month name in full form</td>
                                            <td>January &ndash; December</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td><code>yy</code></td>
                                            <td>Year in short form <b>*</b></td>
                                            <td>00 &ndash; 99</td>
                                        </tr>
                                        <tr>
                                            <td><code>yyyy</code></td>
                                            <td>Year in full form</td>
                                            <td>2000 &ndash; 2999</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>
                            <!--Section: Formats-->

                            <hr class="my-5" />

                            <!--Section: Date limits-->
                            <section id="section-date-limits">
                                <!-- Section title -->
                                <h2 class="mb-4">Date limits</h2>

                                <p>
                                    Set the minimum and maximum selectable dates with the <code>min</code> and
                                    <code>max</code> options.
                                </p>

                                <!--Section: Demo-->
                                <section class="border p-4 d-flex justify-content-center mb-4">
                                    <div class="form-outline datepicker-with-limits">
                                        <input type="text" class="form-control" id="exampleDatepicker5" />
                                        <label for="exampleDatepicker5" class="form-label">Example label</label>
                                    </div>
                                </section>
                                <!--Section: Demo-->

                                <!--Section: Code-->
                                <section>
                                    <!--prettier-ingore-->
                                    <mdbsnippet>
                                        <code data-lang="html" data-name="HTML">
                                            <div class="form-outline datepicker-with-limits">
                                                <input type="text" class="form-control" id="exampleDatepicker5" />
                                                <label for="exampleDatepicker5" class="form-label">Example
                                                    label</label>
                                            </div>
                                        </code>

                                        <!--prettier-ignore-->
                      <code data-lang="javascript" data-name="Javascript">
                                        var datepickerWithLimits = document.querySelector('.datepicker-with-limits');
                                        new
                                        mdb.Datepicker(datepickerWithLimits, {
                                        min: new Date(2020, 5, 10),
                                        max: new Date(2022, 5, 20)
                                        });
                                        </code>
                                    </mdbsnippet>
                                </section>
                                <!--Section: Code-->
                            </section>
                            <!--Section: Date limits-->

                            <hr class="my-5" />

                            <!--Section: Disabled dates-->
                            <section id="section-disabled-dates">
                                <!-- Section title -->
                                <h2 class="mb-4">Disabled dates</h2>

                                <p>
                                    The <code>fitler</code> option accept function in which you can specify
                                    conditions for date filtering. A result of true indicates that the date should
                                    be valid and a result of false indicates that it should be disabled. In the
                                    following example all saturdays and sundays will be disabled.
                                </p>

                                <!--Section: Demo-->
                                <section class="border p-4 d-flex justify-content-center mb-4">
                                    <div class="form-outline datepicker-with-filter">
                                        <input type="text" class="form-control" id="exampleDatepicker6" />
                                        <label for="exampleDatepicker6" class="form-label">Example label</label>
                                    </div>
                                </section>
                                <!--Section: Demo-->

                                <!--Section: Code-->
                                <section>
                                    <!--prettier-ignore-->
                    <mdbsnippet>
                                    <code data-lang="html" data-name="HTML">
                                        <div class="form-outline datepicker-with-filter">
                                            <input type="text" class="form-control" id="exampleDatepicker6" />
                                            <label for="exampleDatepicker6" class="form-label">Example label</label>
                                        </div>
                                    </code>

                                    <!--prettier-ignore-->
                    <code data-lang="javascript" data-name="Javascript">
                                    var datepickerWithFilter = document.querySelector('.datepicker-with-filter');

                                    function filterFunction(date) {
                                    var isSaturday = date.getDay() === 6;
                                    var isSunday = date.getDay() === 0;
                                    var isBeforeToday = date < new Date(); return isSaturday || isSunday ||
                                        isBeforeToday; } new mdb.Datepicker(datepickerWithFilter, { filter:
                                        filterFunction }); </code>
                                        </mdbsnippet>
                                </section>
                                <!--Section: Code-->
                            </section>
                            <!--Section: Disabled dates-->

                            <hr class="my-5" />

                            <!--Section: Basic example-->
                            <section id="section-input-toggle">
                                <!-- Section title -->
                                <h2 class="mb-4">Input toggle</h2>

                                <p>
                                    Add <code>data-mdb-toggle="datepicker"</code> to the input element to enable
                                    toggling on input click. It is also possible to set
                                    <code>toggleButton</code> option to <code>false</code> to remove the toggle
                                    button.
                                </p>

                                <!--Section: Demo-->
                                <section class="border p-4 d-flex justify-content-center mb-4">
                                    <div class="form-outline datepicker" data-mdb-toggle-button="false">
                                        <input type="text" class="form-control" id="exampleDatepicker1"
                                            data-mdb-toggle="datepicker" />
                                        <label for="exampleDatepicker1" class="form-label">Example label</label>
                                    </div>
                                </section>
                                <!--Section: Demo-->

                                <!--Section: Code-->
                                <section>
                                    <!--prettier-ignore-->
                    <mdbsnippet>
                                    <code data-lang="html" data-name="HTML">
                                        <div class="form-outline datepicker" data-mdb-toggle-button="false">
                                            <input type="text" class="form-control" id="exampleDatepicker1"
                                                data-mdb-toggle="datepicker" />
                                            <label for="exampleDatepicker1" class="form-label">Example label</label>
                                        </div>
                                    </code>
                                    </mdbsnippet>
                                </section>
                                <!--Section: Code-->
                            </section>
                            <!--Section: Input toggle-->

                            <hr class="my-5" />

                            <!--Section: Custom toggle-->
                            <section id="section-custom-toggle">
                                <!-- Section title -->
                                <h2 class="mb-4">Custom toggle icon</h2>

                                <p>
                                    You can customize the toggle icon by adding a toggle button template to the
                                    component HTML.
                                </p>

                                <!--Section: Demo-->
                                <section class="border p-4 d-flex justify-content-center mb-4">
                                    <div class="form-outline datepicker">
                                        <input type="text" class="form-control" id="exampleDatepicker1" />
                                        <label for="exampleDatepicker1" class="form-label">Example label</label>
                                        <button type="button" class="datepicker-toggle-button"
                                            data-mdb-toggle="datepicker">
                                            <i class="fas fa-calendar datepicker-toggle-icon"></i>
                                        </button>
                                    </div>
                                </section>
                                <!--Section: Demo-->

                                <!--Section: Code-->
                                <section>
                                    <!--prettier-ignore-->
                    <mdbsnippet>
                                    <code data-lang="html" data-name="HTML">
                                        <div class="form-outline datepicker" data-mdb-toggle-button="false">
                                            <input type="text" class="form-control" id="exampleDatepicker1" />
                                            <label for="exampleDatepicker1" class="form-label">Example label</label>
                                            <button type="button" class="datepicker-toggle-button"
                                                data-mdb-toggle="datepicker">
                                                <i class="fas fa-calendar datepicker-toggle-icon"></i>
                                            </button>
                                        </div>
                                    </code>
                                    </mdbsnippet>
                                </section>
                                <!--Section: Code-->
                            </section>
                            <!--Section: Input toggle-->

                            <hr class="my-5" />

                            <!--Section: Accessibility-->
                            <section id="section-accessibility">
                                <!-- Section title -->
                                <h2 class="mb-4">Accessibility</h2>

                                <p>
                                    We added proper aria attributes to the datepicker controls to make the component
                                    accessible. It's possible to change the values of those attributes by modyfing
                                    the component options:
                                </p>

                                <!--Section: Code-->
                                <section>
                                    <!--prettier-ignore-->
                    <mdbsnippet>
                                    <code data-lang="javascript" data-name="Javascript">
                                        okBtnLabel: 'Confirm selection',
                                        clearBtnLabel: 'Clear selection',
                                        cancelBtnLabel: 'Cancel selection',
                                        nextMonthLabel: 'Next month',
                                        prevMonthLabel: 'Previous month',
                                        nextYearLabel: 'Next year',
                                        prevYearLabel: 'Previous year',
                                        nextMultiYearLabel: 'Next 24 years',
                                        prevMultiYearLabel: 'Previous 24 years',
                                        selectMonthLabel: 'Select a month',
                                        selectYearLabel: 'Select a year',
                                        switchToMultiYearViewLabel: 'Choose year and month',
                                        switchToMonthViewLabel: 'Choose date',
                                        switchToDayViewLabel: 'Choose date',
                                    </code>
                                    </mdbsnippet>
                                </section>
                                <!--Section: Code-->
                            </section>
                            <!--Section: Accessibility-->
                        </section>
                        <!--Section: Docs content-->
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-2 mb-4">
                        <!-- Table of content -->
                        <nav id="table-of-content">
                            <ul>
                                <li><a href="#section-introduction">Introduction</a></li>
                                <li><a href="#section-basic-example">Basic example</a></li>
                                <li><a href="#section-inline-version">Inline version</a></li>
                                <li><a href="#section-translations">Translations</a></li>
                                <li><a href="#section-formats">Formats</a></li>
                                <li><a href="#section-date-limits">Date limits</a></li>
                                <li><a href="#section-disabled-dates">Disabled dates</a></li>
                                <li><a href="#section-input-toggle">Input toggle</a></li>
                                <li><a href="#section-custom-toggle">Custom toggle icon</a></li>
                                <li><a href="#section-accessibility">Accessibility</a></li>
                            </ul>
                        </nav>
                        <!-- Table of content -->
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Overview panel -->

            <!-- API panel -->
            <div class="tab-pane fade" id="pills-api" role="tabpanel" aria-labelledby="pills-api-tab">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-10 mb-4">
                        <!--Section: API content-->
                        <section>
                            <!--Section: Introduction-->
                            <section id="section-introduction">
                                <!-- Main title -->
                                <h2 class="h1 fw-bold">Datepicker - API</h2>
                            </section>
                            <!--Section: Introduction-->

                            <hr class="my-5" />

                            <!--Section: Usage-->
                            <section id="api-section-usage">
                                <!-- Section title -->
                                <h2 class="mb-4">Usage</h2>

                                <h4 class="mb-4">Via class</h4>

                                <!--prettier-ignore-->
                  <mdbsnippet>
                                <code data-lang="html" data-name="HTML">
                                    <div class="form-outline datepicker">
                                        <input type="text" class="form-control" id="exampleDatepicker1" />
                                        <label for="exampleDatepicker1" class="form-label">Example label</label>
                                    </div>
                                </code>
                                </mdbsnippet>

                                <h4 class="my-4">Via JavaScript</h4>

                                <!--prettier-ignore-->
                  <mdbsnippet>
                                <code data-lang="js" data-name="JavaScript">
                                    var options = {
                                    format: 'dd-mm-yyyy'
                                    }
                                    var myDatepicker = new mdb.Datepicker(document.getElementById('myDatepicker'),
                                    options)
                                </code>
                                </mdbsnippet>
                            </section>
                            <!--Section: Usage-->

                            <hr class="my-5" />

                            <!--Section: Options-->
                            <section id="api-section-options">
                                <!-- Section title -->
                                <h2 class="mb-4">Options</h2>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="th-sm">Name</th>
                                                <th class="th-sm">Type</th>
                                                <th class="th-sm">Default</th>
                                                <th class="th-sm">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">cancelBtnLabel</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Cancel selection'</code></td>
                                                <td>Changes cancel button aria label</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">cancelBtnText</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Cancel'</code></td>
                                                <td>Changes cancel button text</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">clearBtnLabel</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Clear selection'</code></td>
                                                <td>Changes clear button aria label</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">clearBtnText</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Clear'</code></td>
                                                <td>Changes clear button text</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap"><code class="highlighter-rouge">format</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'dd/mm/yyyy'</code></td>
                                                <td>Changes date format displayed in input</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap"><code class="highlighter-rouge">inline</code>
                                                </td>
                                                <td><i>Boolean</i></td>
                                                <td><code>false</code></td>
                                                <td>Changes datepicker display mode to inline (dropdown)</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap"><code class="highlighter-rouge">max</code>
                                                </td>
                                                <td><i>Date</i></td>
                                                <td><code>-</code></td>
                                                <td>Changes max available date</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap"><code class="highlighter-rouge">min</code>
                                                </td>
                                                <td><i>Date</i></td>
                                                <td><code>-</code></td>
                                                <td>Changes min available date</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">monthsFull</code>
                                                </td>
                                                <td><i>Array</i></td>
                                                <td>
                                                    <code>[ 'January', 'February', 'March', 'April', 'May', 'June',
                                                        'July',
                                                        'August', 'September', 'October', 'November', 'December',
                                                        ]</code>
                                                </td>
                                                <td>Changes array of months full names</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">monthsShort</code>
                                                </td>
                                                <td><i>Array</i></td>
                                                <td>
                                                    <code>['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug',
                                                        'Sep',
                                                        'Oct', 'Nov', 'Dec']</code>
                                                </td>
                                                <td>Changes array of months short names</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">okBtnLabel</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Confirm selection'</code></td>
                                                <td>Changes ok button aria label</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">nextMonthLabel</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Next month'</code></td>
                                                <td>Changes next button aria label in days view</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">nextMultiYearLabel</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Next 24 years'</code></td>
                                                <td>Changes next button aria label in years view</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">nextYearLabel</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Next year'</code></td>
                                                <td>Changes next button aria label in months view</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">okBtnText</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Ok'</code></td>
                                                <td>Changes ok button text</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">prevMonthLabel</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Previous month'</code></td>
                                                <td>Changes previous button aria label in days view</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">prevMultiYearLabel</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Previous 24 years'</code></td>
                                                <td>Changes previous button aria label in years view</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">prevYearLabel</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Previous year'</code></td>
                                                <td>Changes previous button aria label in months view</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">switchToDayViewLabel</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Choose date'</code></td>
                                                <td>Changes view change button aria label in years view</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">switchToMonthViewLabel</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Choose date'</code></td>
                                                <td>Changes view change button aria label in months view</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">switchToMultiYearViewLabel</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Choose year and month'</code></td>
                                                <td>Changes view change button aria label in days view</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">startDate</code>
                                                </td>
                                                <td><i>Date</i></td>
                                                <td><code>-</code></td>
                                                <td>Changes default date to which datepicker will navigate</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap"><code class="highlighter-rouge">title</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'Select date'</code></td>
                                                <td>Changes datepicker title</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">weekdaysFull</code>
                                                </td>
                                                <td><i>Array</i></td>
                                                <td>
                                                    <code>['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday',
                                                        'Friday',
                                                        'Saturday']</code>
                                                </td>
                                                <td>Changes array of weekdays full names</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">weekdaysNarrow</code>
                                                </td>
                                                <td><i>Array</i></td>
                                                <td><code>['S', 'M', 'T', 'W', 'T', 'F', 'S']</code></td>
                                                <td>Changes array of weekdays narrow names</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">weekdaysShort</code>
                                                </td>
                                                <td><i>Array</i></td>
                                                <td><code>['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']</code></td>
                                                <td>Changes array of weekdays short names</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap"><code class="highlighter-rouge">view</code>
                                                </td>
                                                <td><i>String</i></td>
                                                <td><code>'days'</code></td>
                                                <td>Changes default datepicker view (days/years/months)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                            <!--Section: Options-->

                            <hr class="my-5" />

                            <!--Section: Methods-->
                            <section id="api-section-methods">
                                <!-- Section title -->
                                <h2 class="mb-4">Methods</h2>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="th-sm">Name</th>
                                                <th class="th-sm">Description</th>
                                                <th class="th-sm">Example</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap"><code class="highlighter-rouge">open</code>
                                                </td>
                                                <td>Manually opens a datepicker</td>
                                                <td>
                                                    <code
                                                        class="language-markup text-nowrap">myDatepicker.open()</code>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap"><code class="highlighter-rouge">close</code>
                                                </td>
                                                <td>Manually closes a datepicker</td>
                                                <td>
                                                    <code
                                                        class="language-markup text-nowrap">myDatepicker.close()</code>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">dispose</code>
                                                </td>
                                                <td>Disposes a datepicker instance</td>
                                                <td>
                                                    <code
                                                        class="language-markup text-nowrap">myDatepicker.dispose()</code>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!--Section: Code-->
                                    <section class="mb-4">
                                        <!-- prettier-ignore -->
                      <mdbsnippet>
                                        <code data-lang="js" data-name="javascript">
                                            var datepickerEl = document.getElementById('myDatepicker')
                                            var datepicker = new mdb.Datepicker(myModalEl)
                                            datepicker.open()
                                        </code>
                                        </mdbsnippet>
                                    </section>
                                    <!--Section: Code-->
                                </div>
                            </section>
                            <!--Section: Methods-->

                            <hr class="my-5" />

                            <!--Section: Events-->
                            <section id="api-section-events">
                                <!-- Section title -->
                                <h2 class="mb-4">Events</h2>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="th-sm">Name</th>
                                                <th class="th-sm">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">open.mdb.datepicker</code>
                                                </td>
                                                <td>This event fires immediately when the datepicker is opened.</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">close.mdb.datepicker</code>
                                                </td>
                                                <td>This event fires immediately when the datepicker is closed.</td>
                                            </tr>

                                            <tr>
                                                <td class="text-nowrap">
                                                    <code class="highlighter-rouge">dateChange.mdb.datepicker</code>
                                                </td>
                                                <td>This event fires immediately when the new date is selected.</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!--Section: Code-->
                                    <section class="mb-4">
                                        <!-- prettier-ignore -->
                      <mdbsnippet>
                                        <code data-lang="js" data-name="javascript">
                                            var myDatepicker = document.getElementById('myDatepicker')
                                            myDatepicker.addEventListener('open.mdb.datepicker', function (e) {
                                            // do something...
                                            })
                                        </code>
                                        </mdbsnippet>
                                    </section>
                                    <!--Section: Code-->
                                </div>
                            </section>
                            <!--Section: Events-->

                            <hr class="my-5" />

                            <!--Section: Import-->
                            <section id="api-section-import">
                                <!-- Section title -->
                                <h2 class="mb-4">Import</h2>

                                <!-- Description -->
                                <p>
                                    <strong>MDB UI KIT</strong> also works with module bundlers. Use the following
                                    code to import this component:
                                </p>

                                <!-- prettier-ignore -->
                  <mdbsnippet>
                                <code data-lang="js" data-name="JavaScript">
                                    import { Datepicker } from 'mdb-ui-kit';
                                </code>
                                </mdbsnippet>
                            </section>
                            <!--Section: Import-->
                        </section>
                        <!--Section: API content-->
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-2 mb-4">
                        <!-- Table of content -->
                        <nav id="table-of-content">
                            <ul>
                                <li><a href="#api-section-usage">Usage</a></li>
                                <li><a href="#api-section-options">Options</a></li>
                                <li><a href="#api-section-methods">Methods</a></li>
                                <li><a href="#api-section-events">Events</a></li>
                                <li><a href="#api-section-import">Import</a></li>
                            </ul>
                        </nav>
                        <!-- Table of content -->
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- API panel -->
        </div>
        <!-- Panels -->
    </div>

    <!-- PRISM -->
    <script type="text/javascript" src="{{ asset('assets/admin/js/new-prism.js') }}"></script>
    <!-- MDB SNIPPET -->
    <script type="text/javascript" src="{{ asset('assets/admin/js/mdbsnippet.min.js') }}"></script>
    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('assets/admin/js/mdb.min.js') }}"></script>
    <!-- Custom scripts -->
    <script type="text/javascript">
        var datepickerTranslated = document.querySelector('.datepicker-translated');
        new mdb.Datepicker(datepickerTranslated, {
            title: 'Datum auswählen',
            monthsFull: [
                'Januar',
                'Februar',
                'März',
                'April',
                'Mai',
                'Juni',
                'Juli',
                'August',
                'September',
                'Oktober',
                'November',
                'Dezember',
            ],
            monthsShort: [
                'Jan',
                'Feb',
                'Mär',
                'Apr',
                'Mai',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Okt',
                'Nov',
                'Dez',
            ],
            weekdaysFull: [
                'Sonntag',
                'Montag',
                'Dienstag',
                'Mittwoch',
                'Donnerstag',
                'Freitag',
                'Samstag',
            ],
            weekdaysShort: ['Son', 'Mon', 'Die', 'Mit', 'Don', 'Fre', 'Sam'],
            weekdaysNarrow: ['S', 'M', 'D', 'M', 'D', 'F', 'S'],
            okBtnText: 'Ok',
            clearBtnText: 'Klar',
            cancelBtnText: 'Schließen',
        });

        var datepickerWithLimits = document.querySelector('.datepicker-with-limits');
        new mdb.Datepicker(datepickerWithLimits, {
            min: new Date(2020, 5, 10),
            max: new Date(2022, 5, 20),
        });

        var datepickerWithFilter = document.querySelector('.datepicker-with-filter');

        function filterFunction(date) {
            var isSaturday = date.getDay() === 6;
            var isSunday = date.getDay() === 0;

            if (isSaturday || isSunday) {
                return false;
            }
        }
        new mdb.Datepicker(datepickerWithFilter, {
            filter: filterFunction,
        });
    </script>
</body>

</html>

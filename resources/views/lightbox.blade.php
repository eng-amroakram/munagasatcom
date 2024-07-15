<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lightbox Section</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/mdb.rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/all.css') }}" />

</head>

<body>
    <!-- Start your project here-->
    <div class="container mt-5">
        <section id="demo" class="">
            <h3 class="text-center"><strong>MDB RTL Demo Pro</strong></h3>

            <hr class="my-5" />

            <!--Section: Lightbox-->
            <section>
                <div class="text-center">
                    <h4><strong>Lightbox</strong></h4>
                    <a class="btn btn-primary mb-5" href="{{asset('assets/web/images/man.png')}}"
                        role="button">Docs &amp; more examples</a>
                </div>

                <div class="lightbox">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{asset('assets/web/images/11.png')}}"
                                data-mdb-img="{{asset('assets/web/images/11.png')}}" alt="Lightbox image 1"
                                class="w-100 shadow-1-strong rounded" />
                        </div>
                        <div class="col-lg-4">
                            <img src="{{asset('assets/web/images/11.png')}}"
                                data-mdb-img="{{asset('assets/web/images/11.png')}}" alt="Lightbox image 2"
                                class="w-100 shadow-1-strong rounded" />
                        </div>
                        <div class="col-lg-4">
                            <img src="{{asset('assets/web/images/11.png')}}"
                                data-mdb-img="{{asset('assets/web/images/11.png')}}" alt="Lightbox image 3"
                                class="w-100 shadow-1-strong rounded" />
                        </div>
                    </div>
                </div>
            </section>
            <!--Section: Lightbox-->


        </section>

    </div>
    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('assets/admin/js/mdb.min.js') }}"></script>
</body>

</html>

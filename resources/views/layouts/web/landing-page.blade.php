<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/web/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
    <link rel="icon" type="image/png" href="{{ asset('assets/dashboard/images/munagasatcom-logo.png') }}">

    <meta name="copyright" content="munagasatcom">
    <meta name="title" content="site title">
    <meta name="description" content="site description">
    <meta name="keywords" content="site keywords">
    <meta name="author" content="site author">
    <meta property="og:title" content="site title" />
    <meta property="og:site_name" content="مناقصاتكم المحدودة" />
    <meta property="og:description" content="مناقصاتكم المحدودة">
    <meta property="og:image" content="{{ asset('assets/admin/images/munagasatcom-logo.png') }}">
    <meta name="twitter:title" content="site title">
    <meta name="twitter:description" content="site description">
    <meta name="twitter:image" content="{{ asset('assets/admin/images/munagasatcom-logo.png') }}">
    <meta name="twitter:url" content="../../assetsnew/">

    <meta property="og:type" content="article" />
    <meta property="og:description"
        content="تفخر مناقصاتكم بكونها الموقع الاول في السعودية الذي يقدم خدمة فريدة من نوعها من خلال طرح  كراسات الشروط والمناقصات للمشاريع الحكومية وفق اعلى معايير الشفافية">
    <meta name="twitter:description"
        content="تفخر مناقصاتكم بكونها الموقع الاول في السعودية الذي يقدم خدمة فريدة من نوعها من خلال طرح  كراسات الشروط والمناقصات للمشاريع الحكومية وفق اعلى معايير الشفافية">
    <meta name="twitter:url" content="">
    <meta property="og:type" content="article" />
    <meta property="og:description"
        content="تفخر مناقصاتكم بكونها الموقع الاول في السعودية الذي يقدم خدمة فريدة من نوعها من خلال طرح  كراسات الشروط والمناقصات للمشاريع الحكومية وفق اعلى معايير الشفافية">
    <meta name="twitter:description"
        content="تفخر مناقصاتكم بكونها الموقع الاول في السعودية الذي يقدم خدمة فريدة من نوعها من خلال طرح  كراسات الشروط والمناقصات للمشاريع الحكومية وفق اعلى معايير الشفافية">
    <meta name="twitter:url" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/web/images/fav_icon.jpg') }}">

    {{-- Global site tag (gtag.js) - Google Analytics --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144999649-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-144999649-1');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144999649-1"></script>

    <title>مناقصاتكم</title>
</head>

<body>

    @include('partials.web.haeder')
    @yield('content')
    @include('partials.web.footer')


    <script src="{{ asset('assets/web/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/main.js') }}"></script>
</body>

</html>

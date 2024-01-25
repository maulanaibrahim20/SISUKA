<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Zanex – Bootstrap  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin, dashboard, dashboard ui, admin dashboard template, admin panel dashboard, admin panel html, admin panel html template, admin panel template, admin ui templates, administrative templates, best admin dashboard, best admin templates, bootstrap 4 admin template, bootstrap admin dashboard, bootstrap admin panel, html css admin templates, html5 admin template, premium bootstrap templates, responsive admin template, template admin bootstrap 4, themeforest html">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/assets') }}/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>@yield('title')</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ url('/assets') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ url('/assets') }}/css/style.css" rel="stylesheet" />
    <link href="{{ url('/assets') }}/css/plugins.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ url('/assets') }}/css/icons.css" rel="stylesheet" />

</head>

<body class="login-img">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ url('/assets') }}/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- End GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page login-page error-bg">

        <!-- PAGE-CONTENT OPEN -->
        <div class="page-content error-page error2">
            <div class="container text-center">
                <div class="error-template">
                    <h1 class="display-1 mb-2">@yield('code')<span class="fs-20">error</span></h1>
                    <h5 class="error-details">
                        @yield('message')
                    </h5>
                    <div class="text-center">
                        <a class="btn btn-primary mt-5 mb-5" href="javascript:history.back()"> <i
                                class="fa fa-long-arrow-left"></i> Back to Previous Page </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- PAGE-CONTENT OPEN CLOSED -->
    </div>
    <!-- End PAGE -->

    <!-- JQUERY JS -->
    <script src="{{ url('/assets') }}/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ url('/assets') }}/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ url('/assets') }}/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SPARKLINE -->
    <script src="{{ url('/assets') }}/js/jquery.sparkline.min.js"></script>

    <!-- CHART-CIRCLE -->
    <script src="{{ url('/assets') }}/js/circle-progress.min.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ url('/assets') }}/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- INPUT MASK PLUGIN-->
    <script src="{{ url('/assets') }}/plugins/input-mask/jquery.mask.min.js"></script>

    <!-- Color Theme js -->
    <script src="{{ url('/assets') }}/js/themeColors.js"></script>

    <!-- swither styles js -->
    <script src="{{ url('/assets') }}/js/swither-styles.js"></script>

    <!-- CUSTOM JS -->
    <script src="{{ url('/assets') }}/js/custom.js"></script>

</body>

</html>

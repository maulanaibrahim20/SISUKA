<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('/assets') }}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ url('/assets') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ url('/assets') }}/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ url('/assets') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('/assets') }}/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="{{ url('/assets') }}/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="{{ url('/assets') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('/assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ url('/assets') }}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{ url('/assets') }}/vendor/libs/typeahead-js/typeahead.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ url('/assets') }}/vendor/css/pages/page-misc.css" />
    <!-- Helpers -->
    <script src="{{ url('/assets') }}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('/assets') }}/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <!-- Not Authorized -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h2 class="mb-1 mx-2">@yield('code')</h2>
            <p class="mb-4 mx-2">
                @yield('message')
                <br />
                Kontak Admin Untuk Informasi Lebih Lanjut.
            </p>
            <a href="{{ url()->previous() }}" class="btn btn-primary mb-4">Back to home</a>
            <div class="mt-4">
                <img src="{{ url('/assets') }}/img/illustrations/page-misc-you-are-not-authorized.png"
                    alt="page-misc-not-authorized" width="170" class="img-fluid" />
            </div>
        </div>
    </div>
    <div class="container-fluid misc-bg-wrapper">
        <img src="{{ url('/assets') }}/img/illustrations/bg-shape-image-light.png" alt="page-misc-not-authorized"
            data-app-light-img="illustrations/bg-shape-image-light.png"
            data-app-dark-img="illustrations/bg-shape-image-dark.png" />
    </div>
    <!-- /Not Authorized -->

    <!-- / Content -->

    <!-- Core JS -->
    <!-- bui{{ url('/assets') }}/vendor/js/core.js -->
    <script src="{{ url('/assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ url('/assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ url('/assets') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ url('/assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ url('/assets') }}/vendor/libs/node-waves/node-waves.js"></script>

    <script src="{{ url('/assets') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ url('/assets') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ url('/assets') }}/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ url('/assets') }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ url('/assets') }}/js/main.js"></script>

    <!-- Page JS -->
</body>

</html>

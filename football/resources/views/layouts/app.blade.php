<!DOCTYPE html>
<html class="loading" lang="pt-BR" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Football</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/soccer_ball.png">
    <!-- Icone da tab-->
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/soccer_ball.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-dark-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-dark-menu-template/style.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!-- END: Head-->

<body class="vertical-layout page-header-light vertical-menu-collapsible 2-columns" data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">
    <!-- BEGIN: Header-->

    <header class="page-topbar" id="header">
        <div class="navbar navbar-fixed">
            <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light">
                <div class="nav-wrapper">
                    <a href="/home" class="brand-logo">
                        <img src="../../../app-assets/images/soccer_ball.png" style="width: 55px; height: 55px; padding-left: 5px; padding-top:5px;" />
                    </a>
                    <ul class="navbar-list right">
                        @yield('paths')
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- END: Header-->

    <!-- BEGIN: Page Main-->
    <divc class="center-align">
        <div class="row">
            <div class="col s12">
                <div class="container">
                    <div class="section">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </divc>

    <script src="../../../app-assets/js/vendors.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/js/plugins.js" type="text/javascript"></script>
    <script src="../../../app-assets/js/custom/custom-script.js" type="text/javascript"></script>
    <script type="text/javascript" src="/../../../app-assets/js/custom/custom-script.js"></script>
    <script type="text/javascript" src="/../../../app-assets/js/scripts/jquery.mask.js"></script>
    <script type="text/javascript" src="/../../../app-assets/js/scripts/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>
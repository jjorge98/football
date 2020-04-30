<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords"
        content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Football system</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/soccer_ball.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/soccer_ball.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="../../../app-assets/css/themes/vertical-dark-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/vertical-dark-menu-template/style.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!-- END: Head-->

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 2-columns  "
    data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <header class="page-topbar" id="header">
        <div class="navbar navbar-fixed">
            <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light">
            </nav>
        </div>
    </header>
    <!-- END: Header-->



    <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
        <div class="brand-sidebar">
            <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{ route('homeUser') }}"><img
                        src="../../../app-assets/images/soccer_ball.png" alt="materialize logo" /><span
                        class=" hide-on-med-and-down">Football</span></a><a class="navbar-toggler" href="#"><i
                        class="material-icons">radio_button_checked</i></a></h1>
        </div>
        <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
            data-menu="menu-navigation" data-collapsible="accordion">
            <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i
                        class="material-icons">import_contacts</i><span class="menu-title"
                        data-i18n="">Alunos</span></a>
                <div class="collapsible-body">
                    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                        <li><a class="collapsible-body" href="{{ route('studentRegister') }}" data-i18n=""><i
                                    class="material-icons">radio_button_unchecked</i><span>Cadastrar</span></a>
                        </li>
                        <li><a class="collapsible-body" href="{{ route('studentList') }}" data-i18n=""><i
                                    class="material-icons">radio_button_unchecked</i><span>Listar todos os
                                    alunos</span></a>
                        </li>
                        <li><a class="collapsible-body" href="#" data-i18n=""><i
                                    class="material-icons">radio_button_unchecked</i><span>Pagamentos</span></a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i
                        class="material-icons">settings_input_svideo</i><span class="menu-title"
                        data-i18n="">Treinos</span></a>
                <div class="collapsible-body">
                    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                        <li><a class="collapsible-body" href="#" data-i18n=""><i
                                    class="material-icons">radio_button_unchecked</i><span>Horários</span></a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a class="collapsible-body" id="logout" href="#" data-i18n=""><i class="material-icons">person</i>
                    <span>Sair</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        <div class="navigation-background"></div><a
            class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
            href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div class="col s12 m12 16">
                <div class="card">
                    <div class="card-content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->

    <!-- BEGIN: Footer-->

    <footer class="page-footer footer footer-static footer-light navbar-border navbar-shadow">
        <div class="footer-copyright">
            <div class="container"><span>&copy; 2019 <a
                        href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
                        target="_blank">PIXINVENT</a> All rights reserved.</span><span
                    class="right hide-on-small-only">Design and Developed by <a
                        href="https://pixinvent.com/">PIXINVENT</a></span></div>
        </div>
    </footer>

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="../../../app-assets/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="../../../app-assets/js/plugins.js" type="text/javascript"></script>
    <script src="../../../app-assets/js/custom/custom-script.js" type="text/javascript"></script>
    <script type="text/javascript" src="/../../../app-assets/js/custom/custom-script.js"></script>
    <script type="text/javascript" src="/../../../app-assets/js/scripts/jquery.mask.js"></script>
    <script type="text/javascript" src="/../../../app-assets/js/scripts/jquery.validate.js"></script>
    <script type="text/javascript" src="/../../../app-assets/vendors/data-tables/js/jquery.datatables.min.js"></script>
    <script type="text/javascript" src="/../../../app-assets/vendors/data-tables/js/datatables.bootstrap4.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- END THEME  JS-->
</body>

</html>
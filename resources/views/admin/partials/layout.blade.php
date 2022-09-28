<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('user/walletassets/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/walletassets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/walletassets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/walletassets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('user/walletassets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('user/walletassets/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/walletassets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/walletassets/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/walletassets/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/walletassets/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/walletassets/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('user/walletassets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('user/walletassets/css/theme.css') }}" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                    
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                    <a href="#">Home</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="{{route('adminusers')}}">
                                Users</a>
                        </li>
                        <li>
                            <a href="{{route('alltransactions')}}">
                                View Transactions</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                          
                        </li>
                        <li>
                            <a href="#">
                                Home</a>
                        </li>
                        <li>
                            <a href="{{route('adminusers')}}">
                                Users</a>
                        </li>
                    
                        <li>
                            <a href="{{route('alltransactions')}}">
                                View Transactions</a>
                        </li>
             

                       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" value="DASHBOARD" readonly/>
                            
                            </form>
                            <div class="header-button">
                            <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                       <a href="/wallet/settings"><i class="fas fa-user"></i> </a>  
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <a href="/wallet/settings"> <i class="fas fa-gear"></i></a>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <a href="/wallet/support"><i class="fas fa-phone"></i></a>
                                    </div>
                                </div>
                   
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="walletassets/images/userdp.png"/>
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">izuu</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="walletassets/images/userdp.png" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">izuu</a>
                                                    </h5>
                                                    <span class="email">eloji@gmail.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="/wallet/settings">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="/wallet/settings">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                              
                                            </div>
                                            <div class="account-dropdown__footer">
                                            <form action="{{route('logout')}}" method="post">
                                                @csrf
                                    <button class="zmdi zmdi-power btn"  type="submit">Log Out</button>
                                </form>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">


                        @yield('admincontent')

                        <link href="{{ asset('user/css/sb-admin-2.min.css') }}" rel="stylesheet">
        
<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>Copyright © 2022. All rights reserved.</p>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>

</div>

<!-- Jquery JS-->

<script src="{{ asset('user/walletassets/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('user/walletassets/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('user/walletassets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ asset('user/walletassets/vendor/slick/slick.min.js') }}">
</script>
<script src="{{ asset('user/walletassets/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('user/walletassets/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('user/walletassets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
</script>
<script src="{{ asset('user/walletassets/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('user/walletassets/vendor/counter-up/jquery.counterup.min.js') }}">
</script>
<script src="{{ asset('user/walletassets/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('user/walletassets/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('user/walletassets/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('user/walletassets/vendor/select2/select2.min.js') }}">
</script>


<!-- Main JS-->
<script src="{{ asset('user/walletassets/js/main.js') }}"></script>
</body>

</html>
<!-- end document-->


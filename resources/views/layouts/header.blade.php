<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('thema/') }}/assets/demo/favicon.png">
    <link rel="stylesheet" href="{{ asset('thema/') }}/assets/css/pace.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title', 'default')</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600|Roboto:400" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('thema/') }}/assets/vendors/material-icons/material-icons.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('thema/') }}/assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('thema/') }}/assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css"
        rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.css"
        rel="stylesheet" type="text/css">

    <link href="{{ asset('thema/') }}/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- Head Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}'
        src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('includesCSS')

    <style>
        @yield('css')
    </style>
</head>

<body class="header-dark sidebar-light sidebar-expand">
    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <nav class="navbar">
            <!-- Logo Area -->
            <div class="navbar-header">
                <a href="{{ route('index') }}" class="navbar-brand">
                    <img class="logo-expand" alt="" src="{{ asset('thema/') }}/assets/demo/logo-expand.png">
                    <img class="logo-collapse" alt="" src="{{ asset('thema/') }}/assets/demo/logo-collapse.png">
                    <!-- <p>BonVue</p> -->
                </a>
            </div>
            <!-- /.navbar-header -->
            <!-- Left Menu & Sidebar Toggle -->
            <ul class="nav navbar-nav">
                <li class="sidebar-toggle"><a href="javascript:void(0)" class="ripple"><i
                            class="feather feather-menu list-icon fs-20"></i></a>
                </li>
            </ul>
            <!-- /.navbar-left -->

            <!-- /.navbar-search -->
            <div class="spacer"></div>

            <!-- /.btn-list -->
            <!-- User Image with Dropdown -->
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple"
                        data-toggle="dropdown"><span class="avatar thumb-xs2"><img
                                src="{{Storage::url(auth()->user()->photo)}}" class="rounded-circle"
                                alt=""> <i class="feather feather-chevron-down list-icon"></i></span></a>
                    <div class="dropdown-menu dropdown-left dropdown-card dropdown-card-profile animated flipInY">
                        <div class="card">
                            <header class="card-header d-flex mb-0"><a href="javascript:void(0);"
                                    class="col-md-4 text-center"><i
                                        class="feather feather-user-plus align-middle"></i> </a><a
                                    href="javascript:void(0);" class="col-md-4 text-center"><i
                                        class="feather feather-settings align-middle"></i> </a>
                                <a href="javascript:void(0);" class="col-md-4 text-center"><i
                                        class="feather feather-power align-middle"></i>
                                </a>
                            </header>
                            <ul class="list-unstyled card-body">
                                <li><a href="{{ route('profile.edit') }}"><span><span class="align-middle">Profil Düzenle</span></span></a>
                                </li>


                                <li><span><span class="align-middle">
                                            <form method="POST" action="{{ route('logout') }}">@csrf<button>Sign
                                                    Out</button></form>
                                        </span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- /.navbar-right -->
            <!-- Right Menu -->
            <ul class="nav navbar-nav d-none d-lg-flex ml-2 ml-0-rtl">
                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple"
                        data-toggle="dropdown"><i class="feather feather-hash list-icon"></i></a>
                    <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
                        <div class="card">
                            <header class="card-header d-flex align-items-center mb-0"><a
                                    href="javascript:void(0);"><i class="feather feather-bell color-color-scheme"
                                        aria-hidden="true"></i></a> <span
                                    class="heading-font-family flex-1 text-center fw-400">Bildirimler</span> <a
                                    href="javascript:void(0);"><i
                                        class="feather feather-settings color-content"></i></a>
                            </header>
                            @php
                                use App\Classes\Notification;
                                $notifications = new Notification();
                            @endphp
                            <ul class="card-body list-unstyled dropdown-list-group">
                                @foreach ($notifications->notCollect() as $notification)
                                    <li>
                                        <a href="{{ route('payment.create',['id'=>$notification->invoice_id]) }}" class="media"><span class="d-flex thumb-xs">
                                                <span class="media-body"><span
                                                        class="heading-font-family media-heading">{{ $notification->customer_name.' '.$notification->customer_surname }}
                                                    </span><span class="media-content">{{ $notification->invoice_id }} idli fatura tahsilat bedeli {{ $notification->total }}</span>
                                                    <span class="user--online float-right my-auto"></span></span></a>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- /.dropdown-list-group -->
                            <footer class="card-footer text-center"><a href="javascript:void(0);"
                                    class="heading-font-family text-uppercase fs-13">See all activity</a>
                            </footer>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.dropdown-menu -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown"><a href="#" class="dropdown-toggle ripple" data-toggle="dropdown"><i
                            class="feather feather-settings list-icon"></i></a>
                    <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
                        <div class="card">
                            <header class="card-header d-flex justify-content-between mb-0"><a
                                    href="javascript:void(0);"><i class="feather feather-bell color-color-scheme"
                                        aria-hidden="true"></i></a> <span
                                    class="heading-font-family flex-1 text-center fw-400">Notifications</span> <a
                                    href="javascript:void(0);"><i
                                        class="feather feather-settings color-content"></i></a>
                            </header>
                            <ul class="card-body list-unstyled dropdown-list-group">
                                <li><a href="#" class="media"><span class="d-flex"><i
                                                class="material-icons list-icon">check</i> </span><span
                                            class="media-body"><span
                                                class="heading-font-family media-heading">Invitation accepted</span>
                                            <span class="media-content">Your have been Invited ...</span></span></a>
                                </li>
                                <li><a href="#" class="media"><span class="d-flex thumb-xs"><img
                                                src="{{ asset('thema/') }}/assets/demo/users/user3.jpg"
                                                class="rounded-circle" alt=""> </span><span
                                            class="media-body"><span class="heading-font-family media-heading">Steve
                                                Smith</span> <span class="media-content">I slowly updated
                                                projects</span> <span
                                                class="user--online float-right"></span></span></a>
                                </li>
                                <li><a href="#" class="media"><span class="d-flex"><i
                                                class="material-icons list-icon">event_available</i> </span><span
                                            class="media-body"><span class="-heading-font-family media-heading">To
                                                Do</span> <span class="media-content">Meeting with Nathan on Friday 8
                                                AM ...</span></span></a>
                                </li>
                            </ul>
                            <!-- /.dropdown-list-group -->
                            <footer class="card-footer text-center"><a href="javascript:void(0);"
                                    class="headings-font-family text-uppercase fs-13">See all activity</a>
                            </footer>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.dropdown-menu -->
                </li>
                <!-- /.dropdown -->
                <li><a href="javascript:void(0);" class="right-sidebar-toggle active ripple ml-3 ml-0-rtl"><i
                            class="feather feather-grid list-icon"></i></a>
                </li>
            </ul>
            <!-- /.navbar-right -->
        </nav>
        <div class="content-wrapper">

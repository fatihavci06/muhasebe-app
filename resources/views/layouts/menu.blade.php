<aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
    <!-- User Details -->
    <div class="side-user">
        <div class="col-sm-12 text-center p-0 clearfix">
            <div class="d-inline-block pos-relative mr-b-10">
                <figure class="thumb-sm mr-b-0 user--online">
                    <img src="{{ asset('thema/') }}/assets/demo/users/user1.jpg" class="rounded-circle" alt="">
                </figure><a href="page-profile.html" class="text-muted side-user-link"><i class="feather feather-settings list-icon"></i></a>
            </div>
            <!-- /.d-inline-block -->
            <div class="lh-14 mr-t-5"><a href="page-profile.html" class="hide-menu mt-3 mb-0 side-user-heading fw-500">{{ Auth::user()->name }}</a>
                <br><small class="hide-menu">Developer</small>
            </div>
        </div>
        <!-- /.col-sm-12 -->
    </div>
    <!-- /.side-user -->
    <!-- Sidebar Menu -->
    <nav class="sidebar-nav">
        <ul class="nav in side-menu">
            <li class="current-page menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon feather feather-command"></i> <span class="hide-menu">Müşteriler</span></a>
                <ul class="list-unstyled sub-menu">
                    <li><a href="{{ route('customer.index') }}">Müşteri Listesi</a>
                    </li>
                    <li><a href="{{ route('customer.create') }}">Müşteri Ekle</a>
                    </li>

                </ul>
            </li>
            <li class="menu-item-has-children "><a href="javascript:void(0);"><i class="list-icon feather feather-briefcase"></i> <span class="hide-menu">Gelir Gider Kalemi</span></a>
                <ul class="list-unstyled sub-menu">
                    <li><a href="{{ route('financial.index') }} ">Liste</a>
                    </li>
                    <li><a href="{{ route('financial.create') }}">Gelir/Gider Ekle</a>
                    </li>

                </ul>
            </li>
            <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon feather feather-user"></i> <span class="hide-menu">Faturalar</span></a>
                <ul class="list-unstyled sub-menu">
                    <li><a href="{{ route('invoice.list') }}">Fatura Listesi</a>
                    </li>
                    <li><a href="{{route('invoice',['type'=>0])}}"> Fatura Ekle</a>
                    </li>


                </ul>
            </li>
            <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon feather feather-feather"></i> <span class="hide-menu">Banka</span></a>
                <ul class="list-unstyled sub-menu">
                    <li><a href="{{ route('bank.index') }}">Banka Listesi</a>
                    </li>
                    <li><a href="{{ route('bank.create') }}">Yeni Banka Ekle</a>
                    </li>

                </ul>
            </li>
            <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon feather feather-feather"></i> <span class="hide-menu">İşlemler</span></a>
                <ul class="list-unstyled sub-menu">
                    <li><a href="{{ route('payment.create') }}">Ödeme/Tahsilat Yap</a>
                    </li>
                    <li><a href="{{ route('payment.index') }}">Liste</a>
                    </li>

                </ul>
            </li>

        </ul>
        <!-- /.side-menu -->
    </nav>
    <!-- /.sidebar-nav -->

    <!-- /.nav-contact-info -->
</aside>
<main class="main-wrapper clearfix">

            <!-- Page Title Area -->
            <div class="row page-title clearfix">

                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">@yield('module1','Default')</a>
                        </li>
                        <li class="breadcrumb-item active">@yield('module2','Default')</li>
                    </ol>


                </div>
                <!-- /.page-title-right -->
            </div>

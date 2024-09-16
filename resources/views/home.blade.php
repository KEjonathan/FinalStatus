@extends('layouts.home')

@section('content')
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>



            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-blue elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="{{ asset('/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">PESAVEN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
{{--                        <a href="#" class="d-block">Status: {{session('status')}}</a>--}}
{{--                        @dd(session('status'))--}}
                        <a class="d-block">Balance:{{ auth()->user()->wallet->balance }} </a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                {{--                <div class="form-inline">--}}
                {{--                    <div class="input-group" data-widget="sidebar-search">--}}
                {{--                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
                {{--                        <div class="input-group-append">--}}
                {{--                            <button class="btn btn-sidebar">--}}
                {{--                                <i class="fas fa-search fa-fw"></i>--}}
                {{--                            </button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <!-- Sidebar Menu -->
                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post" class="nav-link">
                                @csrf
                                <i class="nav-icon fas fa-power-off"></i>
                                <button type="submit" class="btn btn-link">Logout</button>
                            </form>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pay methods') }}" class="nav-link">
                                <i class="nav-icon fas fa-ad"></i>
                                <p>
                                    Pay for Client
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('pay methods') }}" class="nav-link">
                                <i class="nav-icon fas fa-ad"></i>
                                <p>
                                    Deposits
                                </p>
                            </a>
                        </li>


                                <li class="nav-item">
                                    <a href="{{ route('packages.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-gift"></i>
                                        <p>Subscription Packages</p>
                                    </a>
                                </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Withdraws
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('withdrawals history') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Withdraw History</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Withdraw Balance</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Withdraw Whatsapp</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Withdraw Tiktok</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Withdraw Travia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Withdraw Math</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.view whatsapp ads') }}" class="nav-link">
                                <i class="nav-icon fas fa-ad"></i>
                                <p>
                                    Whatsapp Ads Earn
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-plane"></i>
                                <p>
                                    Aviator Bots
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bots') }}" class="nav-link">
                                <i class="nav-icon fas fa-robot"></i>
                                <p>
                                    Forex Bots
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>
                                    Forex Trading
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-table-tennis"></i>
                                <p>
                                    Table Tennis
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-coins"></i>
                                <p>
                                    Coin Flips
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-spinner"></i>
                                <p>
                                    Spin Earns
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-award"></i>
                                <p>
                                    Grant Awards
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('affiliates') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Affiliates
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Downlines</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Summary</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <button class="btn btn-link">
                                    Copy Affiliate Link
                                </button>
                            </a>
                        </li>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class=" dark-mode content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
            <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
                <div class="nav-item dropdown">
                    <a class="nav-link bg-danger dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Close</a>
                    <div class="dropdown-menu mt-0">
                        <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all">Close All</a>
                        <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all-other">Close All Other</a>
                    </div>
                </div>
                <a class="nav-link bg-light" href="#" data-widget="iframe-scrollleft"><i class="fas fa-angle-double-left"></i></a>
                <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
                <a class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i class="fas fa-angle-double-right"></i></a>
                <a class="nav-link bg-light" href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a>
            </div>
            <div class="tab-content">
                <div class="tab-empty">
{{--                    <h2 class="display-4">No tab selected!</h2>--}}
                    <section class="content">

                        <div class="container-fluid">
                            <!-- Info boxes -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Affiliate Earning</span>
                                            <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Tasks Completed</span>
                                            <span class="info-box-number">0</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                                <!-- fix for small devices only -->
                                <div class="clearfix hidden-md-up"></div>

                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Active Packages</span>
                                            <span class="info-box-number">0</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Affiliates</span>
                                            <span class="info-box-number">0</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-sm-3 col-6">
                                                    <div class="description-block border-right">
                                                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 10%</span>
                                                        <h5 class="description-header">UGX 41,000.00</h5>
                                                        <span class="description-text">BASIC PACKAGES</span>
                                                    </div>
                                                    <!-- /.description-block -->
                                                    <p class="description-block">
                                                        Receive a cashback 73,000 UGX instantly
                                                        Advertise once a week.
                                                    </p>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-3 col-6">
                                                    <div class="description-block border-right">
                                                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 10%</span>
                                                        <h5 class="description-header">UGX 87,000.00</h5>
                                                        <span class="description-text">STANDARD PACKAGES</span>
                                                    </div>
                                                    <!-- /.description-block -->
                                                    <p class="description-block">
                                                        Receive a Cashback of 147,000 UGX instantly
                                                        Advertise Thrice a week.
                                                    </p>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-3 col-6">
                                                    <div class="description-block border-right">
                                                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 10%</span>
                                                        <h5 class="description-header">UGX 185,00.00</h5>
                                                        <span class="description-text">PREMIUM PACKAGES</span>
                                                    </div>
                                                    <!-- /.description-block -->
                                                    <p class="description-block">
                                                        Receive a cashback of 300,000 UGX instantly
                                                        Advertise Daily.
                                                    </p>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-3 col-6">
                                                    <div class="description-block">
                                                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 10%</span>
                                                        <h5 class="description-header">UGX 200,000.00</h5>
                                                        <span class="description-text">GOLD PACKAGES</span>
                                                    </div>
                                                    <!-- /.description-block -->
                                                    <p class="description-block">
                                                        Receive a cashback of 350,000 UGX instantly
                                                        Advertise Daily.
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-sm-3 col-6">
                                                    <div class="description-block border-right">
                                                        <h5 class="description-header">1 VIEW</h5>
                                                        <span class="description-text">UGX 4,600</span>
                                                    </div>
                                                    <!-- /.description-block -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-3 col-6">
                                                    <div class="description-block border-right">
                                                        <h5 class="description-header">10 VIEWS</h5>
                                                        <span class="description-text">UGX 46,000</span>
                                                    </div>
                                                    <!-- /.description-block -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-3 col-6">
                                                    <div class="description-block border-right">
                                                        <h5 class="description-header">50 VIEWS</h5>
                                                        <span class="description-text">UGX 230,000</span>
                                                    </div>
                                                    <!-- /.description-block -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-3 col-6">
                                                    <div class="description-block">

                                                        <h5 class="description-header">100 VIEWS</h5>
                                                        <span class="description-text">UGX 460,000</span>
                                                    </div>
                                                    <!-- /.description-block -->
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-sm-3 col-6">
                                                    <div class="description-block border-right">
                                                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                                                        <h5 class="description-header">$35,210.43</h5>
                                                        <span class="description-text">TOTAL REVENUE</span>
                                                    </div>
                                                    <!-- /.description-block -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-3 col-6">
                                                    <div class="description-block border-right">
                                                        <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                                                        <h5 class="description-header">$10,390.90</h5>
                                                        <span class="description-text">TOTAL COST</span>
                                                    </div>
                                                    <!-- /.description-block -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-3 col-6">
                                                    <div class="description-block border-right">
                                                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                                                        <h5 class="description-header">$24,813.53</h5>
                                                        <span class="description-text">TOTAL PROFIT</span>
                                                    </div>
                                                    <!-- /.description-block -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-3 col-6">
                                                    <div class="description-block">
                                                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                                                        <h5 class="description-header">1200</h5>
                                                        <span class="description-text">GOAL COMPLETIONS</span>
                                                    </div>
                                                    <!-- /.description-block -->
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>

                        </div><!--/. container-fluid -->
                    </section>
                </div>
                <div class="tab-loading">
                    <div>
                        <h2 class="display-4">Tab is loading <i class="fa fa-sync fa-spin"></i></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022-2024 <a href="https://adminlte.io">pasaven</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->










    {{--<div class="container">--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

    {{--                <div class="card-body">--}}
    {{--                    @if (session('status'))--}}
    {{--                        <div class="alert alert-success" role="alert">--}}
    {{--                            {{ session('status') }}--}}
    {{--                        </div>--}}
    {{--                    @endif--}}

    {{--                    {{ __('You are logged in!') }}--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
@endsection

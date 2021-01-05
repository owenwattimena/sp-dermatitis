<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    
    <title>Welcome Pakar | Sistem Pakar Diagnosa Dermatitis</title>
    
    <!-- Bootstrap -->
    <link href="{{asset('assets/pakar/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/pakar/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('assets/pakar/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('assets/pakar/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    
    <!-- bootstrap-progressbar -->
    <link href="{{asset('assets/pakar/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="{{asset('assets/pakar/build/css/custom.min.css')}}" rel="stylesheet">
    
    @yield('style')
    
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url('') }}" target="_blank" class="site_title"><img width="35" src="{{asset('assets/pakar/images/skin-icon.webp')}}" alt=""> <span>SP Dermatitis</span></a>
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{asset('assets/pakar/images/stetoskop-icon.webp')}}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{\Auth::guard('expert')->user()->nama}}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    
                    <br />
                    
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Menu</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
                                <li><a href="{{route('disease')}}"><i class="fa fa-list"></i> Data Penyakit</a></li>
                                <li><a href="{{route('symptoms')}}"><i class="fa fa-list"></i> Data Gejala</a></li>
                                <li><a href="{{route('rule')}}"><i class="fa fa-cog"></i> Aturan</a></li>
                                <li><a href="{{route('user')}}"><i class="fa fa-users"></i> Data Pengguna</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                    
                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        {{-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a> --}}
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{url('auth/logout')}}">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
            
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('assets/pakar/images/stetoskop-icon.webp')}}" alt="">{{\Auth::guard('expert')->user()->nama}}
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right"
                            aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('pakar/profile')}}"> Profile</a>
                            
                            <a class="dropdown-item" href="{{url('auth/logout')}}"><i class="fa fa-sign-out pull-right"></i>
                                Log Out</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        
        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            <div class="col-md-12 col-sm-12 ">
                @if (session('msg'))
                <div class="alert {!! session('type') !!} alert-dismissible fade show" role="alert">
                    {!! session('msg') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="m-0">
                        <li>{{ $error }}</li>
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endforeach
                @endif

                @yield('content')
                <!-- /top tiles -->
                
            </div>
            <!-- /page content -->
            
            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="{{asset('assets/pakar/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets/pakar/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('assets/pakar/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('assets/pakar/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('assets/pakar/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('assets/pakar/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('assets/pakar/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('assets/pakar/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('assets/pakar/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('assets/pakar/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/pakar/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/pakar/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('assets/pakar/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('assets/pakar/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('assets/pakar/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('assets/pakar/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('assets/pakar/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('assets/pakar/vendors/DateJS/build/date.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('assets/pakar/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('assets/pakar/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{asset('assets/pakar/build/js/custom.min.js')}}"></script>
    
    @yield('script')
</body>

</html>
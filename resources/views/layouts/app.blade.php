<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

        <!--template Link-->
        <link rel="shortcut icon" href="images/favicon_1.ico">
        <title>Inventory</title>
 <!--Toaster cdn-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" />
 <!-- Sweetable alert -->
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- Base Css Files -->
        <link href="{{ URL::asset('/admin/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{ URL::asset('/admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('/admin/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('/admin/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{ URL::asset('/admin/css/animate.cs') }}s" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{ URL::asset('/admin/css/waves-effect.css') }}" rel="stylesheet">

        <!-- sweet alerts -->
        {{-- <link href="{{ URL::asset('/admin/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet"> --}}
 <!-- DataTables -->
<link href="{{ URL::asset('admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />


        <!-- Custom Files -->
        <link href="{{ URL::asset('/admin/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('/admin/css/style.css') }}" rel="stylesheet" type="text/css" />

        <script src="{{ URL::asset('/admin/js/modernizr.min.js') }}"></script>

        <!--template link end-->

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


</head>
<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">
                        <!-- Authentication Links -->
                        @guest


                        @else
                             <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{ route('home') }}" class="logo"><i class="md md-terrain"></i> <span>Inventory </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                       <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                       <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                       <small>There are
                                                          <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ URL::to('admin/images/avatar-1.jpg') }}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                        <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                            <i class="md md-settings-power"></i>  {{ __('Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{ URL::to('admin/images/users/avatar-1.jpg') }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">John Doe <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                            <i class="md md-settings-power"> {{ __('Logout') }}</i> </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                    </li>
                                </ul>
                            </div>

                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <li>
                                <a href="{{ route('home') }}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li>
                                <a href="{{ route('pos') }}" class="waves-effect"><i class="fa fa-cart-arrow-down"></i><span> Pos </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-calculator  "></i><span> Orders </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('pending.order') }}">pending orders</a></li>
                                    {{-- <li><a href="{{ route('all.supplier') }}">All supplier</a></li> --}}

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-users"></i><span> Employee </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.employee') }}">Add employee</a></li>
                                    <li><a href="{{ route('all.employee') }}">All employee</a></li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-shopping-cart"></i><span> Customer </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.customer') }}">New customer</a></li>
                                    <li><a href="{{ route('all.customer') }}">All customer</a></li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-truck "></i><span> Supplier </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.supplier') }}">New supplier</a></li>
                                    <li><a href="{{ route('all.supplier') }}">All supplier</a></li>

                                </ul>
                            </li>


                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-money"></i><span> Salary (emp) </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.salary') }}">Add salary</a></li>
                                    <li><a href="{{ route('all.salary') }}">All salary</a></li>
                                    <li><a href="{{ route('advanced.salary') }}">Advanced salary</a></li>
                                    <li><a href="{{ route('all.advanced.salary') }}">All Advanced salary</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('all.catagory') }}" class="waves-effect"><i class="fa fa-th-list "></i><span> Catagories </span></a>
                            </li>

                            <li>
                                <a href="#" class="waves-effect"> <i class="fa fa-barcode "></i><span>  Products </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.product') }}"> Products </span></a></li>
                                    <li><a href="{{ route('import.product') }}">Import products</a></li>


                                </ul>

                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-cart-plus"></i><span> Purchase products </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.purchase') }}">New purchase</a></li>
                                    <li><a href="{{ route('all.purchase') }}">All products</a></li>


                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-podcast "></i><span> Expenses </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.expense') }}">New expenses</a></li>
                                    <li><a href="{{ route('all.expense') }}">All expenses</a></li>

                                </ul>
                            </li>


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!--Template js-->
    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ URL::asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/waves.js') }}"></script>
    <script src="{{ URL::asset('admin/js/wow.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/chat/moment-2.2.1.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/jquery-detectmobile/detect.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/fastclick/fastclick.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/jquery-blockui/jquery.blockUI.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--toaster javascript  cdn link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous"></script>
    <!-- sweet alerts -->
    {{-- <script src="{{ URL::asset('admin/assets/sweet-alert/sweet-alert.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/sweet-alert/sweet-alert.init.js') }}"></script> --}}

    <!-- flot Chart -->
    <script src="{{ URL::asset('admin/assets/flot-chart/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/flot-chart/jquery.flot.time.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/flot-chart/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/flot-chart/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/flot-chart/jquery.flot.selection.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/flot-chart/jquery.flot.stack.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/flot-chart/jquery.flot.crosshair.js') }}"></script>

    <!-- Counter-up -->
    <script src="{{ URL::asset('admin/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>

    <!-- CUSTOM JS -->
    <script src="{{ URL::asset('admin/js/jquery.app.js') }}"></script>
  <!-- Table JS -->

  <script src="{{ URL::asset('admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('admin/assets/datatables/dataTables.bootstrap.js') }}"></script>

    <!-- Dashboard -->
    <script src="{{ URL::asset('admin/js/jquery.dashboard.js') }}"></script>

    <!-- Chat -->
    <script src="{{ URL::asset('admin/js/jquery.chat.js') }}"></script>

    <!-- Todo -->
    <script src="{{ URL::asset('admin/js/jquery.todo.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
     <script>
        var resizefunc = [];
    </script>


    <script type="text/javascript">
        /* ==============================================
        Counter Up
        =============================================== */
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
        });

    @if(Session::has('message'))
    var type="{{ Session::get('alet-type','info') }}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
    $(document).on("click","#delete",function(e){
        e.preventDefault();
        var link=$(this).attr("href");
        swal({
            title:"Are you want to delete?",
            text:"Once Delete,This will be permanently delete!",
            icon:"warning",
            buttons:true,
            dangerMode:true,
        })
        .then((willDelete) =>{
            if(willDelete){
                window.location.href= link;
            }else{
                swal("Safe Data!");
            }
        });
    });
</script>
@stack('script')
</body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Ratibani') }}</title>
<link rel="icon" type="image/png" href="{{ asset('global_assets/images/favicon.png')}}" />
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>

    <script src="{{ asset('assets/js/app.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/dashboard.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/sparklines.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/lines.js')}}"></script> 
    <script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/areas.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/donuts.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/bars.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/progress.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/pies.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/bullets.js')}}"></script>
    <!-- /theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_validation.js')}}"></script>

    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>

    <script src="{{ asset('global_assets/js/demo_pages/datatables_api.js')}}"></script>
   

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand1">
            <a href="{{ route('dashboard') }}" class="d-inline-block">
                <img src="{{ asset('global_assets/images/favicon.png')}}" alt="">  Ratibni
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">

            <span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

            <ul class="navbar-nav">
               

                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('global_assets/images/demo/users/face11.jpg')}}" class="rounded-circle mr-2" height="34" alt="">
                        <span>{{ Auth::user()->first_name }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('update-profile') }}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                        <!-- <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a> -->
                        <!-- <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a> -->
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('update-profile') }}" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-switch2"></i>Logout </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>

            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                Navigation
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="card-body">
                        <div class="media">
                            <div class="mr-3">
                                <a href="#"><img src="{{ asset('global_assets/images/demo/users/face11.jpg')}}" width="38" height="38" class="rounded-circle" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div class="media-title font-weight-semibold">{{ Auth::user()->last_name }} {{ Auth::user()->last_name }}</div>
                                 <div class="font-size-xs opacity-50">
                                    <i class="icon-pin font-size-sm"></i> {{ Auth::user()->email }}
                                </div>
                            </div>

                            <!-- <div class="ml-3 align-self-center">
                                <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">

                       
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
                                <i class="icon-home4"></i>
                                <span>
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <!-- /main -->

                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-cube3"></i> <span>Bookings</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Data tables extensions">
                                <li class="nav-item"><a href="{{ route('booking-complete-users') }}" class="nav-link {{ (request()->is('providers')) ? 'active' : '' }}">Booking complete</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link {{ (request()->is('companies')) ? 'active' : '' }}"><i class="icon-table2"></i> <span>Companies</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Basic tables">
                                <li class="nav-item"><a href="{{ route('companies') }}" class="nav-link {{ (request()->is('companies')) ? 'active' : '' }}">Company</a></li>

                                <li class="nav-item"><a href="{{ route('service-provider-company') }}" class="nav-link {{ (request()->is('companies')) ? 'active' : '' }}">Service provider under the company</a></li>

                                <li class="nav-item"><a href="{{ route('booking-complete-company') }}" class="nav-link {{ (request()->is('providers')) ? 'active' : '' }}">Booking complete</a></li>

                                <li class="nav-item"><a href="{{ route('on-the-way-company') }}" class="nav-link {{ (request()->is('providers')) ? 'active' : '' }}">On the way</a></li>
                                <li class="nav-item"><a href="{{ route('cancel-service-company') }}" class="nav-link {{ (request()->is('providers')) ? 'active' : '' }}">Cancel service</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link {{ (request()->is('providers')) ? 'active' : '' }}"><i class="icon-grid7"></i> <span>Service Provider</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Data tables">
                                <li class="nav-item"><a href="{{ route('providers') }}" class="nav-link {{ (request()->is('providers')) ? 'active' : '' }}">Providers</a></li>

                                <li class="nav-item"><a href="{{ route('booking-complete') }}" class="nav-link {{ (request()->is('providers')) ? 'active' : '' }}">Booking complete</a></li>

                                <li class="nav-item"><a href="{{ route('on-the-way') }}" class="nav-link {{ (request()->is('providers')) ? 'active' : '' }}">On the way</a></li>
                                <li class="nav-item"><a href="{{ route('cancel-service') }}" class="nav-link {{ (request()->is('providers')) ? 'active' : '' }}">Cancel service</a></li>

                               
                            </ul>
                        </li>
                       
                        <!-- <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-versions"></i> <span>Responsive tables</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Responsive tables">
                                <li class="nav-item"><a href="table_responsive.html" class="nav-link">Responsive basic tables</a></li>
                                <li class="nav-item"><a href="datatable_responsive.html" class="nav-link">Responsive data tables</a></li>
                            </ul>
                        </li> -->
                       
                        
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link {{ (request()->is('get_users')) ? 'active' : '' }}"><i class="icon-people"></i> <span>Users</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Service pages">
                            <a href="{{ route('get_users') }}" class="nav-link {{ (request()->is('get_users')) ? 'active' : '' }}"> <span>Users</span></a>
                            </ul>
                        </li>
                        
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link {{ (request()->is('services')) ? 'active' : '' }}"><i class="icon-wrench3"></i> <span>Services</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Service pages">
                                <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link {{ (request()->is('categories')) ? 'active' : '' }}">Category</a></li>
                                <li class="nav-item"><a href="{{ route('services.index') }}" class="nav-link {{ (request()->is('services')) ? 'active' : '' }}">Service</a></li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link {{ (request()->is('roles')) ? 'active' : '' }}"><i class="icon-grid6"></i> <span>Basic Setings</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="User Groups">
								<li class="nav-item"><a href="{{ route('roles.index') }}" class="nav-link {{ (request()->is('roles')) ? 'active' : '' }}">Roles</a></li>
								<li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link {{ (request()->is('users')) ? 'active' : '' }}">Users</a></li>
								<li class="nav-item"><a href="{{ route('term-and-condition-list') }}" class="nav-link {{ (request()->is('term-and-condition-list')) ? 'active' : '' }}">Terms and Conditions</a></li>
								<li class="nav-item"><a href="{{ route('privacy-policy-list') }}" class="nav-link {{ (request()->is('privacy-policy-list')) ? 'active' : '' }}">Privacy Policy</a></li>
                                
								<li class="nav-item"><a href="{{ route('about-list') }}" class="nav-link {{ (request()->is('about-list')) ? 'active' : '' }}">About us </a></li>

								<li class="nav-item"><a href="{{ route('our-story-list') }}" class="nav-link {{ (request()->is('our-story-list')) ? 'active' : '' }}">Our Story </a></li>
                                
								<li class="nav-item"><a href="{{ route('setings_edit') }}" class="nav-link {{ (request()->is('setings_edit')) ? 'active' : '' }}">Settings</a></li>
							</ul>
						</li>
                       
                        <!-- /page kits -->

                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->
            
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">
              @yield('content')
        <!-- /main content -->
         <!-- Footer -->
           <div class="navbar navbar-expand-lg navbar-light">
              <div class="text-center d-lg-none w-100">
                 <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                 <i class="icon-unfold mr-2"></i>
                 Footer
                 </button>
              </div>
              <div class="navbar-collapse collapse" id="navbar-footer">
                 <span class="navbar-text">
                 &copy; 2021 - 2022. <a href="#">Ratibani Dashboard</a> by <a href="" target="_blank">Kundan</a>
                 </span>
                 <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item"><a href="" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
                    <li class="nav-item"><a href="" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
                 </ul>
              </div>
           </div>
   <!-- /footer -->
        </div>

    </div>
    <!-- /page content -->
    <script>
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>

    <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

</body>
</html>

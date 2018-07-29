<!DOCTYPE html>
<html class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <title>Digi-System</title>

        <!-- fav icon -->
        <link rel="shortcut icon" href="{{asset('img/favicons/favicon.png')}}">

        <!-- Web fonts -->
        <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700"> -->

        <!-- Pages CSS -->
        <link rel="stylesheet" href="{{asset('js/plugins/slick/slick.min.css')}}">
        <link rel="stylesheet" href="{{asset('js/plugins/slick/slick-theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('js/plugins/datatables/jquery.dataTables.min.css')}}">
        <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="{{asset('css/oneui.css')}}">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->

        <!-- Admin LTE Files -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/Ionicons/css/ionicons.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/iCheck/all.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/select2/dist/css/select2.min.css">
        <!-- <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/skins/_all-skins.min.css">
        <!-- Admin LTE Files -->
        @yield('styles')
    </head>
    <body>

        <!-- Header -->
<header id="header-navbar" class="content-mini content-mini-full">
    <!-- Header Navigation Right -->
    <ul class="nav-header pull-right">
        <li>
            <div class="btn-group">
                <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                    <img src="{{asset('img/avatars/avatar10.jpg')}}" alt="Avatar">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header">Profile</li>
                    <li>
                        <a tabindex="-1" href="base_pages_inbox.html">
                            <i class="si si-envelope-open pull-right"></i>
                            <span class="badge badge-primary pull-right">3</span>Inbox
                        </a>
                    </li>
                    <li>
                        <a tabindex="-1" href="base_pages_profile.html">
                            <i class="si si-user pull-right"></i>
                            <span class="badge badge-success pull-right">1</span>Profile
                        </a>
                    </li>
                    <li>
                        <a tabindex="-1" href="javascript:void(0)">
                            <i class="si si-settings pull-right"></i>Settings
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Actions</li>
                    <li>
                        <a tabindex="-1" href="base_pages_lock.html">
                            <i class="si si-lock pull-right"></i>Lock Account
                        </a>
                    </li>
                    <li>
                        <a tabindex="-1" href="{{ url('logout') }}">
                            <i class="si si-logout pull-right"></i>Log out
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                <i class="fa fa-tasks"></i>
            </button>
        </li>
    </ul>
    <!-- END Header Navigation Right -->

    <!-- Header Navigation Left -->
    <ul class="nav-header pull-left">
        <li class="hidden-md hidden-lg">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                <i class="fa fa-navicon"></i>
            </button>
        </li>
        <li class="hidden-xs hidden-sm">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                <i class="fa fa-ellipsis-v"></i>
            </button>
        </li>
        <li class="visible-xs">
            <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
            <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                <i class="fa fa-search"></i>
            </button>
        </li>
        <li class="js-header-search header-search">
            <form class="form-horizontal" action="base_pages_search.html" method="post">
                <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                    <input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Search..">
                    <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                </div>
            </form>
        </li>
    </ul>
    <!-- END Header Navigation Left -->
</header>
<!-- END Header -->

        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">

<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="side-header side-content bg-white-op">
                <a class="h5 text-white" href="index.php">
                    <img src="{{asset('img/logo-light.png')}}" alt="logo" class="logo">
                    <span class="h5 sidebar-mini-hide">Digi-Sail</span>
                </a>
            </div>
            <!-- END Side Header -->


            <!-- Side Content -->
            <div class="side-content">
                <ul class="nav-main">
                    <li>
                        <a class="{{ Request::segment(1) == '' ? 'active' : '' }}"
                            href="{{ url('/') }}">
                            <i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'departements' ? 'active' : '' }}"
                            href="{{ url('departements') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Departements</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'positions' ? 'active' : '' }}"
                            href="{{ url('positions') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Positions</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'tasks' ? 'active' : '' }}"
                            href="{{ url('tasks') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Tasks</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'services' ? 'active' : '' }}"
                            href="{{ url('services') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Services</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'subservices' ? 'active' : '' }}"
                            href="{{ url('subservices') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Sub Services</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'values' ? 'active' : '' }}"
                            href="{{ url('values') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Values</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'users' ? 'active' : '' }}"
                            href="{{ url('users') }}">
                            <i class="si si-badge"></i><span class="sidebar-mini-hide">Users</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->

<!-- Side Overlay-->
<aside id="side-overlay">
    <!-- Side Overlay Scroll Container -->
    <div id="side-overlay-scroll">
        <!-- Side Header -->
        <div class="side-header side-content">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">
                <i class="fa fa-times"></i>
            </button>
            <span>
                <img class="img-avatar img-avatar32" src="{{asset('img/avatars/avatar10.jpg')}}" alt="">
                <span class="font-w600 push-10-l">Roger Hart</span>
            </span>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="side-content remove-padding-t">
            <!-- Notifications -->
            <div class="block pull-r-l">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Recent Activity</h3>
                </div>
                <div class="block-content">
                    <!-- Activity List -->
                    <ul class="list list-activity">
                        <li>
                            <i class="si si-wallet text-success"></i>
                            <div class="font-w600">New sale ($15)</div>
                            <div><a href="javascript:void(0)">Admin Template</a></div>
                            <div><small class="text-muted">3 min ago</small></div>
                        </li>
                        <li>
                            <i class="si si-pencil text-info"></i>
                            <div class="font-w600">You edited the file</div>
                            <div><a href="javascript:void(0)"><i class="fa fa-file-text-o"></i> Documentation.doc</a></div>
                            <div><small class="text-muted">15 min ago</small></div>
                        </li>
                        <li>
                            <i class="si si-close text-danger"></i>
                            <div class="font-w600">Project deleted</div>
                            <div><a href="javascript:void(0)">Line Icon Set</a></div>
                            <div><small class="text-muted">4 hours ago</small></div>
                        </li>
                        <li>
                            <i class="si si-wrench text-warning"></i>
                            <div class="font-w600">Core v2.5 is available</div>
                            <div><a href="javascript:void(0)">Update now</a></div>
                            <div><small class="text-muted">6 hours ago</small></div>
                        </li>
                    </ul>
                    <div class="text-center">
                        <small><a href="javascript:void(0)">Load More..</a></small>
                    </div>
                    <!-- END Activity List -->
                </div>
            </div>
            <!-- END Notifications -->

            <!-- Online Friends -->
            <div class="block pull-r-l">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Online Friends</h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- Users Navigation -->
                    <ul class="nav-users">
                        <li>
                            <a href="base_pages_profile.html">
                                <img class="img-avatar" src="{{asset('img/avatars/avatar4.jpg')}}" alt="">
                                <i class="fa fa-circle text-success"></i> Rebecca Gray
                                <div class="font-w400 text-muted"><small>Copywriter</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="base_pages_profile.html">
                                <img class="img-avatar" src="{{asset('img/avatars/avatar10.jpg')}}" alt="">
                                <i class="fa fa-circle text-success"></i> Dennis Ross
                                <div class="font-w400 text-muted"><small>Web Developer</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="base_pages_profile.html">
                                <img class="img-avatar" src="{{asset('img/avatars/avatar6.jpg')}}" alt="">
                                <i class="fa fa-circle text-success"></i> Denise Watson
                                <div class="font-w400 text-muted"><small>Web Designer</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="base_pages_profile.html">
                                <img class="img-avatar" src="{{asset('img/avatars/avatar1.jpg')}}" alt="">
                                <i class="fa fa-circle text-warning"></i> Denise Watson
                                <div class="font-w400 text-muted"><small>Photographer</small></div>
                            </a>
                        </li>
                        <li>
                            <a href="base_pages_profile.html">
                                <img class="img-avatar" src="{{asset('img/avatars/avatar10.jpg')}}" alt="">
                                <i class="fa fa-circle text-warning"></i> John Parker
                                <div class="font-w400 text-muted"><small>Graphic Designer</small></div>
                            </a>
                        </li>
                    </ul>
                    <!-- END Users Navigation -->
                </div>
            </div>
            <!-- END Online Friends -->

            <!-- Quick Settings -->
            <div class="block pull-r-l">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Quick Settings</h3>
                </div>
                <div class="block-content">
                    <!-- Quick Settings Form -->
                    <form class="form-bordered" action="index.html" method="post" onsubmit="return false;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="font-s13 font-w600">Online Status</div>
                                    <div class="font-s13 font-w400 text-muted">Show your status to all</div>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <label class="css-input switch switch-sm switch-primary push-10-t">
                                        <input type="checkbox"><span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="font-s13 font-w600">Auto Updates</div>
                                    <div class="font-s13 font-w400 text-muted">Keep up to date</div>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <label class="css-input switch switch-sm switch-primary push-10-t">
                                        <input type="checkbox"><span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="font-s13 font-w600">Notifications</div>
                                    <div class="font-s13 font-w400 text-muted">Do you need them?</div>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <label class="css-input switch switch-sm switch-primary push-10-t">
                                        <input type="checkbox" checked><span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="font-s13 font-w600">API Access</div>
                                    <div class="font-s13 font-w400 text-muted">Enable/Disable access</div>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <label class="css-input switch switch-sm switch-primary push-10-t">
                                        <input type="checkbox" checked><span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END Quick Settings Form -->
                </div>
            </div>
            <!-- END Quick Settings -->
        </div>
        <!-- END Side Content -->
    </div>
    <!-- END Side Overlay Scroll Container -->
</aside>
<!-- END Side Overlay -->

        @yield('content')

        </div>
        <!-- END Page Container -->



        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="{{asset('js/core/jquery.min.js')}}"></script>
        <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/core/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('js/core/jquery.scrollLock.min.js')}}"></script>
        <script src="{{asset('js/core/jquery.appear.min.js')}}"></script>
        <script src="{{asset('js/core/jquery.countTo.min.js')}}"></script>
        <script src="{{asset('js/core/jquery.placeholder.min.js')}}"></script>
        <script src="{{asset('js/core/js.cookie.min.js')}}"></script>
        <!-- <script src="{{asset('js/app.js')}}"></script> -->

        <!-- Pages Plugins -->
        <script src="{{asset('js/plugins/slick/slick.min.js')}}"></script>
        <script src="{{asset('js/plugins/chartjs/Chart.min.js')}}"></script>
        <script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

        <!-- Admin LTE Files -->
        <!-- jQuery 3 -->
        <script src="{{ asset('adminlte') }}/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('adminlte') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Select2 -->
        <script src="{{ asset('adminlte') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="{{ asset('adminlte') }}/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="{{ asset('adminlte') }}/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- date-range-picker -->
        <script src="{{ asset('adminlte') }}/bower_components/moment/min/moment.min.js"></script>
        <script src="{{ asset('adminlte') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap datepicker -->
        <script src="{{ asset('adminlte') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- bootstrap color picker -->
        <script src="{{ asset('adminlte') }}/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <!-- bootstrap time picker -->
        <script src="{{ asset('adminlte') }}/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!-- DataTables -->
        <script src="{{ asset('adminlte') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('adminlte') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('adminlte') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="{{ asset('adminlte') }}/plugins/iCheck/icheck.min.js"></script>
        <!-- FastClick -->
        <script src="{{ asset('adminlte') }}/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('adminlte') }}/dist/js/demo.js"></script>
        <!-- Admin LTE Files -->

        <script type="text/javascript">
            $(document).ready(function() {
                $('table').DataTable();
                $('.select2').select2()
            });
        </script>
        @yield('scripts')
        @yield('jsCode')
    </body>
</html>
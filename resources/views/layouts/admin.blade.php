<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{url('/images/logo.png')}}">

    <title>@yield('title') | NDC LMS</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{asset('/admin_assets/plugins/morris/morris.css')}}">
    <link href="{{asset('/admin_assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/admin_assets/css/core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/admin_assets/css/components.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/admin_assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/admin_assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/admin_assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <style>
        #sidebar-menu img.icon{
            margin-right: 3px;
        }
        .invalid-feedback small{
            color: red;
        }
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }
        .round {
            width: 60px !important;
            height: 26px !important;
        }
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 24px;
            width: 26px;
            left: 4px;
            bottom: 1px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }
        input:checked + .slider {
            background-color: #2196F3;
        }
        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }
        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }
        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }
        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <!-- DataTables -->
    <link href="{{asset('admin_assets/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin_assets/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin_assets/plugins/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin_assets/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin_assets/plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin_assets/plugins/datatables/dataTables.colVis.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin_assets/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin_assets/plugins/datatables/fixedColumns.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- loading-btn css -->
    <link href="{{asset('admin_assets/plugins/ladda-buttons/css/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css" />
@yield('css')
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')}}"></script>
    <![endif]-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script src="{{asset('/admin_assets/js/modernizr.min.js')}}"></script>
</head>
<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
@include('admin.includes.header')
<!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
@if ($type == 'SuperAdmin')
    @include('admin.includes.super_admin_navbar')
@else
    @include('admin.includes.admin_navbar')
@endif
<!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                @yield('content')

            </div> <!-- container -->
        </div> <!-- content -->
        <footer class="footer text-right">
            Copyright © 2021 NDC LMS. All Rights Reserved.
        </footer>
    </div>

    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>
<!-- jQuery  -->
<script src="{{asset('/admin_assets/js/jquery.min.js')}}"></script>
<script src="{{asset('/admin_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/admin_assets/js/detect.js')}}"></script>
<script src="{{asset('/admin_assets/js/fastclick.js')}}"></script>
<script src="{{asset('/admin_assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('/admin_assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('/admin_assets/js/waves.js')}}"></script>
<script src="{{asset('/admin_assets/js/wow.min.js')}}"></script>
<script src="{{asset('/admin_assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('/admin_assets/js/jquery.scrollTo.min.js')}}"></script>

<script src="{{asset('/admin_assets/plugins/peity/jquery.peity.min.js')}}"></script>
<!-- jQuery  -->
<script src="{{asset('/admin_assets/plugins/waypoints/lib/jquery.waypoints.js')}}"></script>
<script src="{{asset('/admin_assets/plugins/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('/admin_assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('/admin_assets/plugins/raphael/raphael-min.js')}}"></script>
<script src="{{asset('/admin_assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
<script src="{{asset('/admin_assets/pages/jquery.dashboard.js')}}"></script>
<script src="{{asset('/admin_assets/js/jquery.core.js')}}')}}"></script>
<script src="{{asset('/admin_assets/js/jquery.app.js')}}"></script>

{{--datatable--}}
<script src="{{asset('admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/jszip.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/dataTables.colVis.js')}}"></script>
<script src="{{asset('admin_assets/plugins/datatables/dataTables.fixedColumns.min.js')}}"></script>
<script src="{{asset('admin_assets/pages/datatables.init.js')}}"></script>

{{--loading-btns--}}
<script src="{{asset('admin_assets/plugins/ladda-buttons/js/spin.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/ladda-buttons/js/ladda.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/ladda-buttons/js/ladda.jquery.min.js')}}"></script>

<script>
    $(document).ready(function () {
        // Bind normal buttons
        $('.ladda-button').ladda('bind', {timeout: 2000});
        // Bind progress buttons and simulate loading progress
        Ladda.bind('.progress-demo .ladda-button', {
            callback: function (instance) {
                var progress = 0;
                var interval = setInterval(function () {
                    progress = Math.min(progress + Math.random() * 0.1, 1);
                    instance.setProgress(progress);
                    if (progress === 1) {
                        instance.stop();
                        clearInterval(interval);
                    }
                }, 200);
            }
        });
        var l = $('.ladda-button-demo').ladda();
        l.click(function () {
            // Start loading
            l.ladda('start');
            // Timeout example
            // Do something in backend and then stop ladda
            setTimeout(function () {
                l.ladda('stop');
            }, 12000)
        });
    });
</script>
{{--loading-btns ends--}}
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
        $(".knob").knob();
    });
</script>

@yield('js')
</body>
</html>

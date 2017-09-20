<!--
	file: master.blade.php
	description: Master Blade Template
	longdescription: This file is inherited throughout the main views
	author: Bryan James
	license: Group Private License 2.3
-->

<!DOCTYPE html5>
<html lang="en" data-textdirection="LTR" class="loading">

	<head>
		@yield('sss')
		<!-- META tags for pages metadata -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
		<meta name="description" content="Barangay Management System" />
		<meta name="keywords" content="admin, barangay management, barangay management admin" />
		<meta name="author" content="Barangay Management System" />
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Page Title -->
		<title>Barangay 629 Official Website</title>

		<!-- Apple Devices icon tags -->
		<link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('/system-assets/ico/brgy_logo-60.png') }}" />
		<link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('/system-assets/ico/brgy_logo-76.png') }}" />
		<link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('/system-assets/ico/brgy_logo-120.png') }}" />
		<link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('/system-assets/ico/brgy_logo-152.png') }}" />

		<!-- Site icon tags -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('/system-assets/ico/favicon.ico') }}" />
		<link rel="shortcut icon" type="image/png" href="{{ URL::asset('/system-assets/ico/favicon-32.png') }}" />

		<!-- Apple Devices META tags -->
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-touch-fullscreen" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="default" />

		<!-- Custom Styles -->
		
		<!-- Begin Vendor StyleSheet -->
		@yield('vendor-style')
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/calendars/fullcalendar.min.css') }}" />
	        <link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
		<!-- End Vendor StyleSheet -->

		<!-- Begin Font Icons -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/icomoon.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}" />
		@yield('font-icon')
		<!-- End Font Icons -->

		<!-- Begin Plugins CSS -->
		@yield('plugin')
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/icomoon.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/selects/select2.min.css') }}" />	
		<!-- End Plugins CSS -->

		<!-- Begin Vendor Plugins CSS -->
		@yield('vendor-plugin')
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/toggle/bootstrap-switch.min.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/toggle/switchery.min.css') }}" />
        <!-- End Vendor Plugins CSS -->

		<!-- Begin Robust CSS -->
		@yield('template-css')
            <link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
		<!-- End Robust CSS -->

		<!-- Begin Page Level CSS -->
		@yield('page-level-css')
		<!-- End Page Level CSS -->

		<!-- General CSS -->
		@yield('general-css')
		<!-- End General CSS -->

		<!-- Begin Custom CSS -->
		@yield('custom-css')
		<!-- End Custom CSS -->

		<!-- Post META -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		@yield('post-meta')

		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/crash_style.css') }}" />

	</head>

	<body data-open="click" data-menu="vertical-content-menu" data-col="2-columns" class="vertical-layout vertical-content-menu 2-columns menu-expanded body-preset-style">
	

	

		<!-- Start of Content -->
		<div class="robust-content content container-fluid">
			<div class="content-wrapper">
				<div class="content-header row">

				</div>


				<!-- 
				<div class="breadcrumb-wrapper col-xs-12">
					@yield('breadcrumb')
				</div>
				-->

				<div class="content-body">
					@yield('content-body')
				</div>
			</div>
		</div>
		<!-- End of Content -->

		<!-- START FOOTER -->
		@yield('footer')
		<!-- END FOOTER -->

		<!-- Scripts Inclusion -->

		<!-- Begin Top Framework JS -->
		<script src="{{ URL::asset('/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
		@yield('top-framework-js')
		<!-- End Top Framework JS -->

		<!-- Begin Framework JS -->
		@yield('framework-js')
		<!-- End Framework JS -->

		<!-- Begin Vendor JS -->
		@yield('vendor-js')
            <script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
		<!-- End Vendor JS -->

		<!-- Begin Page Vendor JS -->
		@yield('page-vendor-js')

            <script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
            <!-- <script src="{{ URL::asset('/robust-assets/js/components/forms/validation/form-validation.js') }}" type="text/javascript"></script> -->

            <script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-checkbox.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>

		<!-- End Page Vendor JS -->

		<!-- Begin Robust JS -->
		@yield('template-js')
		
            <script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
        <!-- End Robust JS -->

		<!-- Begin Page Level JS -->
		@yield('page-level-js')
		<!-- End Page Level JS -->
            <script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('/js/timehandle.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('/robust-assets/js/components/forms/switch.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
            <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/fullcalendar.min.js') }}" type="text/javascript"></script>
		<!-- Begin Post HTML -->
		@yield('html-setting')
		<!-- End Post HTML -->

		<!-- Begin Post Scripts -->
		@yield('js-setting')
		<!-- End Post Scripts -->

		<!-- Begin System Scripts -->
		<script src="{{ URL::asset('/js/sys-handler.js') }}" type="text/javascript"></script>
		@yield('system-js')
		<!-- End System Scripts -->

		<!-- General Javacript -->
		@yield('general-js')
		<!-- End General Javascript -->

		<!-- Begin Page Actions -->
		@yield('page-action')
		<!-- End Page Actions -->

		@include('master.blockmaster')
	</body>

</html>
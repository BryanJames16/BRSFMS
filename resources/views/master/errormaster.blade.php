<!DOCTYPE html>
<html lang="en" data-textdirection="LTR">

    <head>

        <!-- META tags for pages metadata -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
		<meta name="description" content="Barangay Management System" />
		<meta name="keywords" content="admin, barangay management, barangay management admin" />
		<meta name="author" content="Barangay Management System" />

        <!-- Page Title -->
		<title>@yield('title')</title>

		<!-- Apple Devices icon tags -->
		<link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('/system-assets/ico/brgy_logo-60.png') }}" />
		<link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('/system-assets/ico/brgy_logo-76.png') }}" />
		<link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('/system-assets/ico/brgy_logo-120.png') }}" />
		<link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('/system-assets/ico/brgy_logo-152.png') }}" />

		<!-- Site icon tags -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('/system-assets/ico/favicon.ico') }}" />
		<link rel="shortcut icon" type="image/png" href="{{ URL::asset('/system-assets/ico/facivon-32.png') }}" />

		<!-- Apple Devices META tags -->
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-touch-fullscreen" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="default" />

        <!-- Begin Top Framework JS -->
		<script src="{{ URL::asset('/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
		@yield('top-framework-js')
		<!-- End Top Framework JS -->

        <!-- Custom Styles -->
		
		<!-- Begin Vendor StyleSheet -->
		<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
		@yield('vendor-style')
		<!-- End Vendor StyleSheet -->

		<!-- Begin Font Icons -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/icomoon.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}" />
		@yield('font-icon')
		<!-- End Font Icons -->

		<!-- Begin Plugins CSS -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />
		@yield('plugin')
		<!-- End Plugins CSS -->

		<!-- Begin Vendor Plugins CSS -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/jquery-jvectormap-2.0.3.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/morris.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/unslider.css') }}" />
		@yield('vendor-plugin')
		<!-- End Vendor Plugins CSS -->

		<!-- Begin Robust CSS -->
		<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
		@yield('template-css')
		<!-- End Robust CSS -->

		<!-- Begin Page Level CSS -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/components/weather-icons/climacons.min.css') }}" />
		<!-- End Page Level CSS -->

		<!-- Begin Custom CSS -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
		@yield('custom-css')
		<!-- End Custom CSS -->

		<!-- Post META -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		@yield('post-meta')

		<style>
			.navbar-preset-style {
				background-color: #DF5E6A;
				background-image: url("{{ URL::asset('/system-assets/images/header/pattern.png') }}");
				min-height: "100px";
			}

			.navbar-link-style {
				color: #FFFFFF;
			}
		</style>

    </head>

    <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column bg-red bg-lighten-4 bg-lighten-2">
        
		<!-- START NAVBAR -->
		<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-shadow navbar-border navbar-hide-on-scroll headroom headroom--top headroom--not-bottom navbar-preset-style">
			<div class="navbar-wrapper">
        		<div class="navbar-header">
          			<ul class="nav navbar-nav">
						<li class="nav-item mobile-menu hidden-md-up float-xs-left">
							<a class="nav-link nav-menu-main menu-toggle hidden-xs">
								<i class="icon-menu5 font-large-1"></i>
							</a>
						</li>
						<li class="nav-item">
							<a href="/dashboard" class="navbar-brand nav-link">
								<img alt="branding logo" src="{{ URL::asset('/system-assets/images/logo/brgy.png') }}" data-expand="{{URL::asset('system-assets/images/logo/brgy.png') }}" data-collapse="{{URL::asset('system-assets/images/logo/brgy.png') }}" class="brand-logo" width="500px" />
							</a>
						</li>
						<li class="nav-item hidden-md-up float-xs-right">
							<a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container">
								<i class="icon-ellipsis pe-2x fa-rotate-90"></i>
							</a>
						</li>
					</ul>
        		</div>
				<div class="navbar-container content">
					<div id="navbar-mobile" class="collapse navbar-toggleable-sm">
						<ul class="nav navbar-nav float-xs-right">
							<li class="nav-item">
								<a href="javascript:history.back()" class="nav-link mr-2 nav-link-label navbar-link-style">
									<i class="ficon icon-reply4"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->

		<!-- PAGE CONTENT -->
		<div class="robust-content content container-fluid">
			<div class="content-wrapper">
        		<div class="content-header row">
        	</div>
        	<div class="content-body">
				<section class="col-sm-5 offset-sm-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4 box-shadow-2">
					<div class="card border-grey border-lighten-3 px-2 my-0 row">
						<div class="card-header no-border pb-1">
							<div class="card-block">
								<h2 class="error-code text-xs-center mb-2">@yield('error-code')</h2>
								<h3 class="text-uppercase text-xs-center">@yield('error-name')</h3>
							</div>
						</div>
					<div class="card-body collapse in px-2">
						<fieldset class="row py-2">
							<div class="input-group col-xs-12">
								<input type="text" class="form-control form-control-lg input-lg border-grey border-lighten-1 " placeholder="Search..." aria-describedby="button-addon2" />
								<span class="input-group-btn" id="button-addon2">
									<button class="btn btn-lg btn-secondary border-grey border-lighten-1" type="button">
										<i class="icon-ios-search-strong"></i>
									</button>
								</span>
							</div>
						</fieldset>
						<div class="row py-2">
							<div class="col-xs-12">
							<a href="./dashboard" class="btn btn-success btn-block btn-lg">
								<i class="icon-home3"></i> Back to Home
							</a>
						</div>
					</div>
        		</div>
				<div class="card-footer no-border pb-1">
					<div class="text-xs-center">
						Barangay Resident, Services, and Facilities Management System
					</div>
				</div>
			</div>
				</section>

        </div>
      </div>
    </div>
		<!-- END PAGE CONTENT -->

		<!-- SCRIPTS -->
		<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/components/forms/form-login-register.js') }}" type="text/javascript"></script>
		<!-- END SCRIPTS -->
    </body>
</html>

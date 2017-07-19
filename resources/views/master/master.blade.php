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

		<!-- META tags for pages metadata -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
		<meta name="description" content="Barangay Management System" />
		<meta name="keywords" content="admin, barangay management, barangay management admin" />
		<meta name="author" content="Barangay Management System" />
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Page Title -->
		<title>@yield('title')</title>

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

		<!-- Begin Top Framework JS -->
		<script src="{{ URL::asset('/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
		@yield('top-framework-js')
		<!-- End Top Framework JS -->

		<!-- Custom Styles -->
		
		<!-- Begin Vendor StyleSheet -->
		@yield('vendor-style')
		<!-- End Vendor StyleSheet -->

		<!-- Begin Font Icons -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/icomoon.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}" />
		@yield('font-icon')
		<!-- End Font Icons -->

		<!-- Begin Plugins CSS -->
		@yield('plugin')
		<!-- End Plugins CSS -->

		<!-- Begin Vendor Plugins CSS -->
		@yield('vendor-plugin')
		<!-- End Vendor Plugins CSS -->

		<!-- Begin Robust CSS -->
		@yield('template-css')
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

		<style>
			.navbar-preset-style {
				background-color: #DF5E6A;
				background-image: url("{{ URL::asset('/system-assets/images/header/pattern.png') }}");
				min-height: "100px";
			}
		</style>

	</head>

	<body data-open="click" data-menu="vertical-content-menu" data-col="2-columns" class="vertical-layout vertical-content-menu 2-columns menu-expanded">
	

		<!-- START NAVBAR -->
		<nav class="header-navbar navbar navbar-with-menu navbar-brand-center navbar-fixed-top navbar-shadow navbar-border navbar-hide-on-scroll headroom headroom--top headroom--not-bottom navbar-preset-style">
			<!-- <img src="{{ URL::asset('/system-assets/images/header/pattern.png') }}"/> -->
			<div class="navbar-wrapper">
				<!-- NAVBAR HEADER -->
				<div class="navbar-header">
					<ul class="nav navbar-nav">
						<li class="nav-item mobile-menu hidden-md-up float-xs-left">
							<a class="nav-link nav-menu-main menu-toggle hidden-xs">
								<i class="icon-menu5 font-large-1"></i>
							</a>
						</li>
						<li class="nav-item">
							<a href="/home" class="navbar-brand nav-link">
								<img alt="branding logo" src="{{ URL::asset('/system-assets/images/logo/brgy.png') }}" data-expand="{{URL::asset('system-assets/images/logo/brgy.png') }}" data-collapse="{{URL::asset('system-assets/images/logo/brgy.png') }}" class="brand-logo" width="500px" />
							</a>
						</li>
						<li class="nav-item hidden-md-up float-xs-right">
							<a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container">
								<i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i>
							</a>
						</li>
					</ul>
				</div>

				<!-- NAVBAR CONTENT -->
				<div class="navbar-container content container-fluid">
					<div id="navbar-mobile" class="collapse navbar-toggleable-sm">
						<ul class="nav navbar-nav">
							<li class="nav-item hidden-sm-down">
								<a class="nav-link nav-menu-main menu-toggle hidden-xs is-active">
									<i class="icon-menu5" style="color:white"></i>
								</a>
							</li>
							<li class="nav-item hidden-sm-down">
								<a href="#" class="nav-link nav-link-expand">
									<i class="ficon icon-expand2" style="color:white"></i>
								</a>
							</li>
						</ul>
						<ul class="nav navbar-nav float-xs-right">
							<li class="dropdown dropdown-notification nav-item">
								<a href="#" data-toggle="dropdown" class="nav-link nav-link-label">
									<i class="ficon icon-bell4" style="color:white"></i>
									<span class="tag tag-pill tag-default tag-danger tag-default tag-up" id="notif-count">2</span>
								</a>
								<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
									<li class="dropdown-menu-header">
										<h6 class="dropdown-header m-0">
											<span class="grey darken-2">Notifications</span>
											<span class="notification-tag tag tag-default tag-danger float-xs-right m-0">2 New</span>
										</h6>
									</li>
									<li class="list-group scrollable-container">
										<a href="javascript:void(0)" class="list-group-item">
											<div class="media">
												<div class="media-left valign-middle">
													<i class="icon-cart3 icon-bg-circle bg-cyan" style="color:white"></i>
												</div>
												<div class="media-body">
													<h6 class="media-heading">New legal document request!</h6>
													<p class="notification-text font-small-3 text-muted">
														Lorem ipsum dolor sit amet, consectetuer elit.
													</p>
													<small>
														<time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">
															30 minutes ago
														</time>
													</small>
												</div>
											</div>
										</a>
										<a href="javascript:void(0)" class="list-group-item">
											<div class="media">
												<div class="media-left valign-middle">
													<i class="icon-monitor3 icon-bg-circle bg-red bg-darken-1"></i>
												</div>
												<div class="media-body">
													<h6 class="media-heading red darken-1">New Incident Report!</h6>
													<p class="notification-text font-small-3 text-muted">
														Aliquam tincidunt mauris eu risus.
													</p>
													<small>
														<time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">
															5 hour ago
														</time>
													</small>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</li>
							<li class="dropdown dropdown-notification nav-item">
								<a href="#" data-toggle="dropdown" class="nav-link nav-link-label">
									<i class="ficon icon-mail6" style="color:white"></i>
									<span class="tag tag-pill tag-default tag-info tag-default tag-up" id="message-count">4</span>
								</a>
								<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
									<li class="dropdown-menu-header">
										<h6 class="dropdown-header m-0">
											<span class="grey darken-2">Messages</span>
											<span class="notification-tag tag tag-default tag-info float-xs-right m-0">4 New</span>
										</h6>
									</li>
									<li class="list-group scrollable-container">
										<a href="javascript:void(0)" class="list-group-item">
											<div class="media">
												<div class="media-left">
													<span class="avatar avatar-sm avatar-online rounded-circle">
														<img src="./robust-assets/images/portrait/small/marty-mcfly.png" alt="avatar" /><i></i>
													</span>
												</div>
												<div class="media-body">
													<h6 class="media-heading">Margaret Govan</h6>
													<p class="notification-text font-small-3 text-muted">
														I like your portfolio, let's start the project.
													</p>
													<small>
														<time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time>
													</small>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</li>
							<li class="dropdown dropdown-user nav-item">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link" style="color:white">
									

									@if(Auth::check())
										<span class="user-name" style="color:white">{{ Auth::user()->name }}</span>
										<span class="avatar avatar-online">
										<img src="./robust-assets/images/portrait/small/marty-mcfly.png" alt="avatar" /><i></i>
									</span>
									@endif
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item">
										<i class="icon-head"></i> Edit Profile
									</a>
									<a href="#" class="dropdown-item">
										<i class="icon-mail6"></i> My Inbox
									</a>
									<a href="#" class="dropdown-item">
										<i class="icon-clipboard2"></i> Task
									</a>
									<a href="#" class="dropdown-item">
										<i class="icon-calendar5"></i> Calender
									</a>
									<div class="dropdown-divider"></div>
									<a href="/logout" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->

		<!-- Start of Content -->
		<div class="robust-content content container-fluid">
			<div class="content-wrapper">
				<div class="content-header row">
					
				</div>

				<!-- Start of Main Menu -->
				<div class="main-menu menu-light menu-border menu-shadow navbar-border menu-accordion">
					<!-- BEGIN Main Menu Header -->
					<div class="main-menu-header">
						<input type="text" placeholder="Search" class="menu-search form-control round" />
					</div>
					<!-- END Main Menu Header -->

					<!-- BEGIN Main Menu Content -->
					<div class="main-menu-content">
						<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main ">
							<li class="nav-item" id="dashboard-id">
								<a href="/home">
									<i class="icon-home3"></i>
									<span data-i18n="nav.dash.main" class="menu-title">Dashboard</span>
								</a>
							</li>

							<br />

							<li class="nav-item">
								<a href="#">
									<i class="icon-book"></i>
									<span data-i18n="nav.navbars.main" class="menu-title">Maintenance</span>
								</a>
								<ul class="menu-content">
									<li id="document-id">
										<a href="/document">
											<i class="icon-file-text2"></i>
											<span>Document</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="icon-office"></i>
											<span>Facility</span>
										</a>
										<ul class="menu-content">
											<li id="facility-type-id">										
												<a href="/facility-type" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-drawer"></i>
													Facility Type
												</a>
											</li>
											<li id="facility-id">
												<a href="/facility" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-library"></i>
													Facility
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="#">
											<i class="icon-cogs"></i>
											<span>Service</span>
										</a>
										<ul class="menu-content">
											<li id="service-type-id">
												<a href="/service-type" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-drawer"></i>
													Service Type
												</a>
											</li>
											<li id="services-id">
												<a href="/service" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-aperture"></i>
													Service
												</a>
											</li>
										</ul>
									</li>
									<li id="building-id">
										<a href="/building">
											<i class="icon-file-text2"></i>
											<span>Building</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="icon-android-car"></i>
											<span>Business</span>
										</a>
										<ul class="menu-content">
											<li id="business-category-id">
												<a href="/business-category" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-drawer"></i>
													Business Category
												</a>
											</li>
											<li id="business-id">
												<a href="/business" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-truck"></i>
													Business
												</a>
											</li>
										</ul>
									</li>				
									<li>
										<a href="#">
											<i class="icon-location22"></i>
											<span>Address</span>
										</a>
										<ul class="menu-content">
											<li id="street-id">
												<a href="/street" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-road"></i>
													Street
												</a>
											</li>
											<li id="lot-id">
												<a href="/lot" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-enlarge"></i>
													Lot
												</a>
											</li>
											<li id="unit-id">
												<a href="/unit" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-compass2"></i>
													Unit
												</a>
											</li>
											<li id="house-number-id">
												<a href="/house" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-pushpin"></i>
													House Number
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>

							<li class=" nav-item">
								<a href="#">
									<i class="icon-stack"></i>
									<span data-i18n="nav.navbars.main" class="menu-title">Transaction</span>
								</a>
								<ul class="menu-content">
									<li id="resident-application-id">
										<a href="/resident" data-i18n="nav.navbars.nav_light" class="menu-item">
											<i class="icon-user-tie"></i>
											<span>Resident</span>
										</a>
									</li>
									<li id="facility-reservation-id">
										<a href="/reservation" data-i18n="nav.navbars.nav_light" class="menu-item">
											<i class="icon-android-calendar"></i>
											<span>Facility Reservation</span>
										</a>
									</li>
									<li>
										<a href="/document-request" data-i18n="nav.navbars.nav_light" class="menu-item">
											<i class="icon-file-text2"></i>
											<span>Document Request</span>
										</a>
									</li>
									<li id="service-sponsorship-id">
										<a href="/sponsors">
											<i class="icon-android-hand" data-i18n="nav.navbars.nav_light" class="menu-item"></i>
											<span>Service Sponsorship</span>
										</a>
									</li>
									<li id="incident-report-id">
										<a href="/incident-report" data-i18n="nav.navbars.nav_light" class="menu-item">
											<i class="icon-location4"></i>
											<span>Incident Report</span>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item">
								<a href="#">
									<i class="icon-podium"></i>
									<span data-i18n="nav.navbars.main" class="menu-title">Reports</span>
								</a>
								<ul class="menu-content">
									<li id="street-id">
										<a href="/rendered-services" data-i18n="nav.navbars.nav_dark" class="menu-item">
											<i class="icon-lifebuoy"></i>
											Rendered Services
										</a>
									</li>
									<li id="lot-id">
										<a href="/reservation-of-facilities" data-i18n="nav.navbars.nav_dark" class="menu-item">
											<i class="icon-calendar3"></i>
											Reservation of Facilities
										</a>
									</li>
									<li id="unit-id">
										<a href="/registered-residents" data-i18n="nav.navbars.nav_dark" class="menu-item">
											<i class="icon-user-check"></i>
											Registered Residents
										</a>
									</li>
									<li id="house-number-id">
										<a href="/senior-citizen" data-i18n="nav.navbars.nav_dark" class="menu-item">
											<i class="icon-android-contact"></i>
											Senior Citizens
										</a>
									</li>
									<li id="house-number-id">
										<a href="/pwd" data-i18n="nav.navbars.nav_dark" class="menu-item">
											<i class="icon-android-bicycle"></i>
											PWD
										</a>
									</li>
									<li id="house-number-id">
										<a href="/employed-residents" data-i18n="nav.navbars.nav_dark" class="menu-item">
											<i class="icon-price-tags"></i>
											Employed Residents
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item" id="query-id">
								<a href="/queries">
									<i class="icon-question"></i>
									<span data-i18n="nav.dash.main" class="menu-title">Query</span>
								</a>
							</li>

						

							<li class="nav-item" id="utilities-id">
								<a href="/utilities">
									<i class="icon-wrench3"></i>
									<span data-i18n="nav.dash.main" class="menu-title">Utilities</span>
								</a>
							</li>
	
							<br />

							<span data-i18n="nav.dash.main" class="menu-title">
								<center>
									<i class="icon-ellipsis"></i>
								</center>
							</span>

							<br />
						</ul>
					</div>
					<!-- END Main Menu Content -->
				</div>
				<!-- End of Main Menu -->

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

		<!-- Begin Framework JS -->
		@yield('framework-js')
		<!-- End Framework JS -->

		<!-- Begin Vendor JS -->
		@yield('vendor-js')
		<!-- End Vendor JS -->

		<!-- Begin Page Vendor JS -->
		@yield('page-vendor-js')
		<!-- End Page Vendor JS -->

		<!-- Begin Robust JS -->
		@yield('template-js')
		<!-- End Robust JS -->

		<!-- Begin Page Level JS -->
		@yield('page-level-js')
		<!-- End Page Level JS -->

		<!-- Begin Post HTML -->
		@yield('html-setting')
		<!-- End Post HTML -->

		<!-- Begin Post Scripts -->
		@yield('js-setting')
		<!-- End Post Scripts -->

		<!-- General Javacript -->
		@yield('general-js')
		<!-- End General Javascript -->

		<!-- Begin Page Actions -->
		@yield('page-action')
		<!-- End Page Actions -->

	</body>

</html>
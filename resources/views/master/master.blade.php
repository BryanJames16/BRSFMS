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

		<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/crash_style.css') }}" />

	</head>

	<body data-open="click" data-menu="vertical-content-menu" data-col="2-columns" class="vertical-layout vertical-content-menu 2-columns menu-expanded body-preset-style">
	

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
							<a href="/dashboard" class="navbar-brand nav-link">
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
							<!--<li class="dropdown dropdown-notification nav-item">
								<a href="#" data-toggle="dropdown" class="nav-link nav-link-label">
									<i class="ficon icon-bell4" style="color:white"></i>
									<span class="tag tag-pill tag-default tag-danger tag-default tag-up" id="notif-count">{{ $total }}</span>
								</a>
								<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
									<li class="dropdown-menu-header">
										<h6 class="dropdown-header m-0">
											<span class="grey darken-2">Notifications</span>
											<span class="notification-tag tag tag-default tag-danger float-xs-right m-0">2 New</span>
										</h6>
									</li>
									@if(Auth::user()->position == "Chairman")
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
									@endif
								</ul>
							</li>-->
							<li class="dropdown dropdown-notification nav-item">
								<a href="#" data-toggle="dropdown" class="nav-link nav-link-label">
									<i class="ficon icon-mail6" style="color:white"></i>
									@if($mess>0)
										<span class="tag tag-pill tag-default tag-info tag-default tag-up">
										{{ $mess }}
										</span>
									@endif
								</a>

								<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
								
								<li class="dropdown-menu-header">
									<h6 class="dropdown-header m-0">
										<span class="grey darken-2">Messages</span>
										@if($mess>0)
										<span class="notification-tag tag tag-default tag-info float-xs-right m-0">{{ $mess }} Unread</span>
										@endif
									</h6>
								</li>
								<li style="text-align:center" class="dropdown-menu-header">
									
									<a href="#" class="create"><i class="ficon icon-mail6" style="color:violet"></i> Create new message</a>
									
								</li>

								<li class="list-group scrollable-container">
									
									@foreach($messages as $message)

									<a href="#" data-value="{{ $message->id }}" class="list-group-item viewReply">
										<div class="media">
											<div class="media-left">
												<span class="avatar avatar-sm avatar-online rounded-circle">
													<img src="/storage/upload/{{ $message->imagePath }}" alt="avatar" /><i></i>
												</span>
											</div>
											<div class="media-body">
												<h6 class="media-heading">{{$message->firstName}} {{$message->lastName}}</h6>
												<p class="notification-text font-small-3 text-muted">{{ $message->content }}</p><small>
													<time datetime="{{$message->dateSent}}" class="media-meta text-muted">{{ Carbon\Carbon::parse($message->dateSent)->diffForHumans() }}</time></small>
											</div>
										</div>
									</a>
									@endforeach
								
								</li>

								<li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all messages</a></li>
								</ul>
							</li>
							<li class="dropdown dropdown-user nav-item">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link" style="color:white">
									

									@if(Auth::check())
										<span class="user-name" style="color:white">{{ Auth::user()->name }}</span>
										<span class="avatar avatar-online">
										<img src="/storage/upload/{{ Auth::user()->imagePath }}" alt="avatar" /><i></i>
									</span>
									@endif
								</a>
								<div class="dropdown-menu dropdown-menu-right">
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
								<a href="/dashboard">
									<i class="icon-home3"></i>
									<span data-i18n="nav.dash.main" class="menu-title">Dashboard</span>
								</a>
							</li>

							<li class="nav-item">
								<a href="#">
									<i class="icon-book"></i>
									<span data-i18n="nav.navbars.main" class="menu-title">Maintenance</span>
								</a>
								<ul class="menu-content">
									<li>
										<a href="#">
											<i class="icon-note"></i>
											<span>Document</span>
										</a>
										<ul class="menu-content">
											
											<li id="requirement-id">
												<a href="/requirement" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-paperplane"></i>
													Requirement
												</a>
											</li>
											<li id="document-id">										
												<a href="/document" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-drawer"></i>
													Physical Document
												</a>
											</li>
											
										</ul>
									</li>
									<li>
										<a href="#">
											<i class="icon-office"></i>
											<span>Facility</span>
										</a>
										<ul class="menu-content">
											<li id="item-id">										
												<a href="/item" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-box"></i>
													Item
												</a>
											</li>
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
											<li id="recipient-id">
												<a href="/recipient" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-drawer"></i>
													Recipient
												</a>
											</li>
										</ul>
									</li>
									<li id="business-category-id">
										<a href="/business-category" data-i18n="nav.navbars.nav_light" class="menu-item">
											<i class="icon-car"></i>
											<span>Business Category</span>
										</a>
									</li>
								</ul>
							</li>

							<li class=" nav-item">
								<a href="#">
									<i class="icon-stack"></i>
									<span data-i18n="nav.navbars.main" class="menu-title">Transaction</span>
								</a>
								<ul class="menu-content">
									@if(Auth::user()->resident == 1)
										<li>
											<a href="#">
												<i class="icon-android-contacts"></i>
												<span>Resident</span>
											</a>
											<ul class="menu-content">
												<li id="resident-application-id">
													<a href="/resident" data-i18n="nav.navbars.nav_light" class="menu-item">
														<i class="icon-user-tie"></i>
														<span>Resident &amp; Family</span>
													</a>
												</li>

												<li id="id-releasing-id">
													<a href="/id-release" data-i18n="nav.navbars.nav_light" class="menu-item">
														<i class="icon-card"></i>
														<span>ID Releasing</span>
													</a>
												</li>
											</ul>
										</li>
									@endif

									<li>
										<a href="#">
											<i class="icon-cogs"></i>
											<span>Document</span>
										</a>
										<ul class="menu-content">
											@if(Auth::user()->request == 1)
												<li id="document-request-id">
													<a href="/document-request" data-i18n="nav.navbars.nav_dark" class="menu-item">
														<i class="icon-drawer"></i>
														Document Request
														@if($countOfRequest != 0)
														<span class="tag tag tag-primary tag-pill mr-2">{{ $countOfRequest }}</span>
														@endif
													</a>
													
												</li>
											@endif
											@if(Auth::user()->approval == 1)
												<li id="document-approval-id">
													<a href="/document-approval" data-i18n="nav.navbars.nav_dark" class="menu-item">
														<i class="icon-aperture"></i>
														Document Approval
														@if($countOfApproval != 0)
														<span class="tag tag tag-primary tag-pill mr-2">{{ $countOfApproval }}</span>
														@endif
													</a>
												</li>
											@endif
										</ul>
									</li>

									@if(Auth::user()->reservation == 1)
									<li>
										<a href="#">
											<i class="icon-android-calendar"></i>
											<span>Reservation</span>
										</a>
										<ul class="menu-content">
											<li id="item-reservation-id">
												<a href="/item-reservation" data-i18n="nav.navbars.nav_light" class="menu-item">
													<i class="icon-briefcase4"></i>
													<span>Item Reservation </span>
												</a>
											</li>
											<li id="facility-reservation-id">
												<a href="/facility-reservation" data-i18n="nav.navbars.nav_light" class="menu-item">
													<i class="icon-house"></i>
													<span>Facility Reservation </span>
													
													@if($countOfReservation != 0)
													<span class="tag tag tag-primary tag-pill mr-2">
														<div id="countOfReservation">
															{{ $countOfReservation }}
														</div>	
													</span>
													@endif
													
												</a>
											</li>
										</ul>
									</li>
									@endif
									@if(Auth::user()->collection == 1)
									<li id="collection-id">
										<a href="/collection" data-i18n="nav.navbars.nav_light" class="menu-item">
											<i class="icon-moneybag"></i>
											<span>Collection</span>
										</a>
									</li>
									@endif
									<li>
										<a href="#">
											<i class="icon-cogs"></i>
											<span>Service</span>
										</a>
										<ul class="menu-content">
											@if(Auth::user()->service == 1)
											<li id="service-registration-id">
												<a href="/service-transaction" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-drawer"></i>
													Service Registration
												</a>
											</li>
											@endif
											@if(Auth::user()->sponsorship == 1)
											<li id="service-sponsorhip-id">
												<a href="/service-sponsorship" data-i18n="nav.navbars.nav_dark" class="menu-item">
													<i class="icon-aperture"></i>
													Service Sponsorship
												</a>
											</li>
											@endif
										</ul>
									</li>
									@if(Auth::user()->business == 1)
									<li id="business-registration-id">
										<a href="/business-registration" data-i18n="nav.navbars.nav_light" class="menu-item">
											<i class="icon-truck"></i>
											<span>Business Registration</span>
										</a>
									</li>
									@endif
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
										<a href="/report/pwd" data-i18n="nav.navbars.nav_dark" class="menu-item">
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
									<li id="report-collection-id">
										<a href="/reports/collection" data-i18n="nav.navbars.nav_dark" class="menu-item">
											<i class="icon-social-bitcoin"></i>
											Collections Report
										</a>
									</li>
								</ul>
							</li>

							<li class=" nav-item">
								<a href="#">
									<i class="icon-map6"></i>
									<span data-i18n="nav.navbars.main" class="menu-title">Query</span>
								</a>
								<ul class="menu-content">
									<li id="query-resident-id">
										<a href="/query/resident" data-i18n="nav.navbars.nav_light" class="menu-item">
											<i class="icon-search4"></i>
											<span>Resident</span>
										</a>
									</li>
									<li id="query-document-id">
										<a href="/query/document" data-i18n="nav.navbars.nav_light" class="menu-item">
											<i class="icon-search4"></i>
											<span>Document Request</span>
										</a>
									</li>
									<li id="query-business-id">
										<a href="/query/business" data-i18n="nav.navbars.nav_light" class="menu-item">
											<i class="icon-search4"></i>
											<span>Business</span>
										</a>
									</li>
									<li id="query-reservation-id">
										<a href="/query/reservation" data-i18n="nav.navbars.nav_light" class="menu-item">
											<i class="icon-search4"></i>
											<span>Facility Reservation</span>
										</a>
									</li>
									<li id="query-service-id">
										<a href="/query/service" data-i18n="nav.navbars.nav_light" class="menu-item">
											<i class="icon-search4"></i>
											<span>Service</span>
										</a>
									</li>
									
								</ul>
							</li>


						

							<li class="nav-item" id="utilities-id">
								<a href="/utilities">
									<i class="icon-wrench3"></i>
									<span data-i18n="nav.dash.main" class="menu-title">Utilities</span>
								</a>
							</li>

							@if(Auth::user()->position == 'Chairman')
								<li class="nav-item" id="users-id">
									<a href="/users">
										<i class="icon-person"></i>
										<span data-i18n="nav.dash.main" class="menu-title">Users</span>
									</a>
								</li>
							@endif

							@if(Auth::user()->position == 'Chairman')
								<li class="nav-item" id="logs-id">
									<a href="/logs">
										<i class="icon-book"></i>
										<span data-i18n="nav.dash.main" class="menu-title">Logs</span>
									</a>
								</li>
							@endif
	
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

					<!--Reply -->

					<!--Reply Modal -->
					<div class="modal fade text-xs-left" id="replyModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
						<div class="modal-dialog " role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>View Message</h4>
								</div>

								<!-- START MODAL BODY -->
								<div class="modal-body" width='100%'>
									{{Form::open(['url'=>'document-approval/reject', 'method' => 'POST', 'id' => 'frm-message', 'class'=>'form'])}}
						
									<input type="hidden" name="receiverID" id="receiverID"></input>
									<input type="hidden" name="senderID" id="senderID"></input>

									<div class="row">

											<div class="form-body">

											<div class="form-group col-md-6 mb-2">
												<p align="center"><b>From:</b> <p align="center" id="sender"></p></p>
												<p align="center">
													<b>Date Sent:</b>
													<p align="center" id="dateSent"></p>
												</p>
												<p align="center">
													<b>Message:</b>
													<p align="center" id="message"></p>
												</p>
												
											</div>
											<div class="form-group col-md-6 mb-2">
												<p align="center"><b>Reply:</b></p>
												<p align="center">
													{!!Form::textarea('reply',null,['id'=>'reply','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus'])!!}
												</p>

											</div>
											</div>

									</div>

									<div class="form-actions center">
										<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
											<i class="icon-cross2"></i> Cancel
										</button>
										<a href="#" class="btn btn-primary sendSubmit">
											<i class="icon-check2"></i> Send
										</a>
									</div>

								{{Form::close()}}
								</div>
								<!-- End of Modal Body -->

							</div>
						</div>
					</div> 
					<!-- End of Modal -->

					<!--Create Message -->

					<!--Create Message Modal -->
					<div class="modal fade text-xs-left" id="createModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
						<div class="modal-dialog modal-xs" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>Create Message</h4>
								</div>

								<!-- START MODAL BODY -->
								<div class="modal-body" width='100%'>
									{{Form::open(['url'=>'document-approval/reject', 'method' => 'POST', 'id' => 'frm-create', 'class'=>'form'])}}
						
									<input type="hidden" name="receiverID" id="receiverID"></input>
									<input type="hidden" name="senderID" id="senderID"></input>

										<p align="center"><b>To:</b></p>
										<p align="center">
											<select name="receiver" id="receiver" class="form-control">
												@foreach($us as $u)
													<option value= {{$u -> id}}>{{$u -> firstName}} {{$u -> lastName}}</option>
												@endforeach
											</select>
										</p>
									
										<p align="center"><b>Message:</b></p>
										<p align="center">
											{!!Form::textarea('createM',null,['id'=>'createM','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus'])!!}
										</p>


									<div class="form-actions center">
										<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
											<i class="icon-cross2"></i> Cancel
										</button>
										<a href="#" class="btn btn-primary createSubmit">
											<i class="icon-check2"></i> Send
										</a>
									</div>

								{{Form::close()}}
								</div>
								<!-- End of Modal Body -->

							</div>
						</div>
					</div> 
					<!-- End of Modal -->


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
		<!-- End Vendor JS -->

		<!-- Begin Page Vendor JS -->
		@yield('page-vendor-js')
		<!-- End Page Vendor JS -->

		<!-- Begin Robust JS -->
		@yield('template-js')
		<!-- End Robust JS -->

		<!-- Begin Page Level JS -->
		@yield('page-level-js')
		
		<script type='text/javascript'>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$(document).on('click', '.sendSubmit', function(event) {
				
				event.preventDefault();
				var frm = $('#frm-message');

				$.ajax({
					url: "{{ url('/users/reply') }}", 
					type: "POST", 
					data: {"content": frm.find('#reply').val(),
							"senderID": frm.find('#senderID').val(),
							"receiverID": frm.find('#receiverID').val(),
					}, 
					success: function(data) {

						$("#frm-message").trigger("reset");
						$('#replyModal').modal('hide');
						swal("Success", "Successfully Replied to a message!", "success");

					}, 
					error: function(error) {
						var message = "Error: ";
						var data = error.responseJSON;
						for (datum in data) {
							message += data[datum];
						}

						swal("Error", "Cannot fetch table data!\n" + message, "error");
					}
				});

			});

			$(document).on('click', '.createSubmit', function(event) {
				
				event.preventDefault();
				var frm = $('#frm-create');

				$.ajax({
					url: "{{ url('/users/create') }}", 
					type: "POST", 
					data: {"content": frm.find('#createM').val(),
							"receiverID": frm.find('#receiver').val(),
					}, 
					success: function(data) {

						$("#frm-message").trigger("reset");
						$('#createModal').modal('hide');
						swal("Success", "Successfully sent!", "success");

					}, 
					error: function(error) {
						var message = "Error: ";
						var data = error.responseJSON;
						for (datum in data) {
							message += data[datum];
						}

						swal("Error", "Cannot fetch table data!\n" + message, "error");
					}
				});

			});

			$(document).on('click', '.create', function(event) {
				
				event.preventDefault();
				$('#createModal').modal('show');

			});

			$(document).on('click', '.viewReply', function(event) {
				event.preventDefault();
				var id = $(this).data("value");

				$.ajax({
					url: "{{ url('/users/read') }}", 
					type: "get", 
					data: {"id": id}, 
					success: function(data) {
						console.log('Read');

						$.ajax({
							url: "{{ url('/users/getMessage') }}", 
							type: "get", 
							data: {"id": id}, 
							success: function(data) {
								
								data = $.parseJSON(data);

								for (index in data) {

									var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
									var date = new Date(data[index].dateSent);
									var month = date.getMonth();
									var day = date.getDate();
									var year = date.getFullYear();
									var d = months[month] + ' ' + day + ', ' + year;

									var start = data[index].dateSent;
									start = start.toString().substring(11);
									
									start = start.match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [start];
									
									if(start.length > 1){
										start = start.slice(1);
										start[5] = +start[0] < 12 ? ' AM' : ' PM';
										start[0] = +start[0] % 12 || 12;
									}

									var st = start.join('');
									
									var frm = $('#frm-message');
									frm.find('#senderID').val(data[index].receiverID);
									frm.find('#receiverID').val(data[index].senderID);
									$('#message').html(data[index].content);
									$('#dateSent').html(d+ ', ' + st );
									$('#sender').html(data[index].firstName + ' ' + data[index].lastName);
									$('#replyModal').modal('show');
								}

							}, 
							error: function(error) {
								var message = "Error: ";
								var data = error.responseJSON;
								for (datum in data) {
									message += data[datum];
								}

								swal("Error", "Cannot fetch table data!\n" + message, "error");
							}
						});
					}, 
					error: function(error) {
						var message = "Error: ";
						var data = error.responseJSON;
						for (datum in data) {
							message += data[datum];
						}

						swal("Error", "Cannot fetch table data!\n" + message, "error");
					}
				});

			});

		</script>
		<!-- End Page Level JS -->

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
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
            <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/icheck/icheck.css') }}" />
			<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/icheck/custom.css') }}" />
			<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/js/plugins/gallery/photo-swipe/photoswipe.css') }}" />
			<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/js/plugins/gallery/photo-swipe/default-skin/default-skin.css') }}" />
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

					<!-- START PRELOADER-->

					<div id="preloader-wrapper">
					<div id="loader">
						<div class="line-scale-pulse-out-rapid loader-white">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						</div>
					</div>
					<div class="loader-section section-top bg-cyan"></div>
					<div class="loader-section section-bottom bg-cyan"></div>
					</div>

					<!-- END PRELOADER-->

					<div class="card">
					<div class="card-header">
						<h4 class="card-title">Barangay 629 Upcoming Services</h4>
						<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
										<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
							<li><a data-action="reload"><i class="icon-reload"></i></a></li>
							<li><a data-action="close"><i class="icon-cross2"></i></a></li>
						</ul>
						</div>
					</div>
					<div class="card-body collapse in">
						<div class="card-block">
						<div class="card-text">
							<p>These services are all for the residents of Barngay 629</p>
							<section class="cd-horizontal-timeline">
							<div class="timeline">
								<div class="events-wrapper">
								<div class="events">
									<ol>
									@foreach($st as $s)
										<li><a href="#0" class="selected" data-date="{{ date('m/d/Y',strtotime($s -> fromDate)) }}">{{ date('j M',strtotime($s -> fromDate)) }}</a></li>
									@endforeach

									</ol>
									

									<span class="filling-line" aria-hidden="true"></span>
								</div>
								<!-- .events -->
								</div>
								<!-- .events-wrapper -->

								<ul class="cd-timeline-navigation">
								<li><a href="#0" class="prev inactive">Prev</a></li>
								<li><a href="#0" class="next">Next</a></li>
								</ul>
								<!-- .cd-timeline-navigation -->
							</div>
							<!-- .timeline -->

							<div class="events-content">
								<ol>

								@foreach($st as $s)

									<li class="selected" data-date="{{ date('m/d/Y',strtotime($s -> fromDate)) }}">
										<h2>{{$s -> serviceTransactionName}}</h2>
										<h3 class="text-muted mb-1">
											<em>
												@if($s -> toDate==null)
													<td>{{ date('F j, Y',strtotime($s -> fromDate)) }}</td>
												@else
													<td>{{ date('F j, Y',strtotime($s -> fromDate)) }} - {{ date('F j, Y',strtotime($s -> toDate)) }}</td>
												@endif
											</em>
										</h3>
										<p class="lead">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
										reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
										</p>
									</li>

								@endforeach

								

								<li data-date="28/02/2015">
									<h2>Event title here</h2>
									<h3 class="text-muted mb-1"><em>February 28th, 2015</em></h3>
									<p class="lead">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
									reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
									</p>
								</li>

								<li data-date="20/04/2015">
									<h2>Event title here</h2>
									<h3 class="text-muted mb-1"><em>March 20th, 2015</em></h3>
									<p class="lead">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
									reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
									</p>
								</li>

								<li data-date="20/05/2015">
									<h2>Event title here</h2>
									<h3 class="text-muted mb-1"><em>May 20th, 2015</em></h3>
									<p class="lead">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
									reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
									</p>
								</li>

								<li data-date="09/07/2015">
									<h2>Event title here</h2>
									<h3 class="text-muted mb-1"><em>July 9th, 2015</em></h3>
									<p class="lead">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
									reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
									</p>
								</li>

								<li data-date="30/08/2015">
									<h2>Event title here</h2>
									<h3 class="text-muted mb-1"><em>August 30th, 2015</em></h3>
									<p class="lead">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
									reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
									</p>
								</li>

								<li data-date="15/09/2015">
									<h2>Event title here</h2>
									<h3 class="text-muted mb-1"><em>September 15th, 2015</em></h3>
									<p class="lead">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
									reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
									</p>
								</li>

								<li data-date="01/11/2015">
									<h2>Event title here</h2>
									<h3 class="text-muted mb-1"><em>November 1st, 2015</em></h3>
									<p class="lead">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
									reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
									</p>
								</li>

								<li data-date="10/12/2015">
									<h2>Event title here</h2>
									<h3 class="text-muted mb-1"><em>December 10th, 2015</em></h3>
									<p class="lead">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
									reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
									</p>
								</li>

								<li data-date="19/01/2016">
									<h2>Event title here</h2>
									<h3 class="text-muted mb-1"><em>January 19th, 2016</em></h3>
									<p class="lead">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
									reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
									</p>
								</li>

								<li data-date="03/03/2016">
									<h2>Event title here</h2>
									<h3 class="text-muted mb-1"><em>March 3rd, 2016</em></h3>
									<p class="lead">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi
									reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
									</p>
								</li>
								</ol>
							</div>
							<!-- .events-content -->
							</section>
						</div>
						</div>
					</div>
					</div>
					<!--/ Basic Horizontal Timeline -->

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

			<script src="{{ URL::asset('/robust-assets/js/plugins/timeline/horizontal-timeline.js') }}" type="text/javascript"></script>
			<script src="{{ URL::asset('/robust-assets/js/plugins/gallery/masonry/masonry.pkgd.min.js') }}" type="text/javascript"></script>
			<script src="{{ URL::asset('/robust-assets/js/plugins/charts/gmaps.min.js') }}" type="text/javascript"></script>
			<script src="{{ URL::asset('/robust-assets/js/plugins/gallery/photo-swipe/photoswipe.min.js') }}" type="text/javascript"></script>
			<script src="{{ URL::asset('/robust-assets/js/plugins/gallery/photo-swipe/photoswipe-ui-default.min.js') }}" type="text/javascript"></script>
			<script src="{{ URL::asset('/robust-assets/js/plugins/charts/echarts/echarts.js') }}" type="text/javascript"></script>
			<script src="{{ URL::asset('/robust-assets/js/components/charts/echarts/bar-column/stacked-column.js') }}" type="text/javascript"></script>
			<script src="{{ URL::asset('/robust-assets/js/components/charts/echarts/radar-chord/non-ribbon-chord.js') }}" type="text/javascript"></script>
			


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
			<script src="{{ URL::asset('/robust-assets/js/components/pages/timeline.js') }}" type="text/javascript"></script>
			<script src="{{ URL::asset('/robust-assets/js/components/gallery/photo-swipe/photoswipe-script.js') }}" type="text/javascript"></script>
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
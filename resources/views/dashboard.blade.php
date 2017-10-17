<!-- Parent Template -->
@extends('master.master')

@section('vendor-style')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
@endsection

@section('plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />
@endsection

<!-- CSS Styles -->
@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/main-card.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/datatable.custom.red.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/jquery-jvectormap-2.0.3.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/morris.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/unslider.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
@endsection

@section('page-level-css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/components/weather-icons/climacons.min.css') }}" />
@endsection

@section('custom-css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Dashboard
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')
	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(DASHBOARD);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12 mb-1">
		<h2 class="content-header-title">Dashboard</h2>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
		<li class="breadcrumb-item"></li>
	</ol>
@endsection

@section('content-body')
	<section id="minimal-statistics-bg">
		<!-- Top Cards -->
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header card-head-custom">
						<h4 class="card-title">Dashboard</h4>
						<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
						<div class="heading-elements">
							<ul class="list-inline mb-0">
								<li><a data-action="reload"><i class="icon-reload"></i></a></li>
								<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="card-body collapse in">
						<div class="card-block">
							<ul class="nav nav-tabs nav-top-border no-hover-bg">
								<li class="nav-item">
									<a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Summary</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Reservations</a>
								</li>
							</ul>

							<div class="tab-content px-1 pt-1">
								<div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
									<div class="card-block card-dashboard">
										<a href="/resident">
											<div class="col-xl-3 col-lg-6 col-xs-12">
												<div class="card bg-gradient-y2-cyan">
													<div class="card-body">
														<div class="card-block">
															<div class="media">
																<div class="media-left media-middle">
																	<i class="icon-user1 white font-large-2 float-xs-left"></i>
																</div>
																<div class="media-body white text-xs-right">
																	<h3 id="population">{{ $residents }}</h3>
																	<span>Current Total Population</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</a>

										<a href="/resident">
											<div class="col-xl-3 col-lg-6 col-xs-12">
												<div class="card bg-gradient-y2-teal">
													<div class="card-body">
														<div class="card-block">
															<div class="media">
																<div class="media-left media-middle">
																	<i class="icon-home22 white font-large-2 float-xs-left"></i>
																</div>
																<div class="media-body white text-xs-right">
																	<h3 id="population">{{ $family }}</h3>
																	<span>Current Total Families</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</a>

										<a href="/document-request">
											<div class="col-xl-3 col-lg-6 col-xs-12">
												<div class="card bg-gradient-y2-deep-orange">
													<div class="card-body">
														<div class="card-block">
															<div class="media">
																<div class="media-left media-middle">
																	<i class="icon-note white font-large-2 float-xs-left"></i>
																</div>
																<div class="media-body white text-xs-right">
																	<h3 id="doc-request">{{ $request }}</h3>
																	<span>Document Requests</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</a>

										<a href="/document-approval">
											<div class="col-xl-3 col-lg-6 col-xs-12">
												<div class="card bg-gradient-y2-brown">
													<div class="card-body">
														<div class="card-block">
															<div class="media">
																<div class="media-left media-middle">
																	<i class="icon-pen2 white font-large-2 float-xs-left"></i>
																</div>
																<div class="media-body white text-xs-right">
																	<h3 id="doc-request">{{ $approval }}</h3>
																	<span>Document Approvals</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</a>

										<a href="/facility-reservation">
											<div class="col-xl-3 col-lg-6 col-xs-12">
												<div class="card bg-gradient-y2-indigo">
													<div class="card-body">
														<div class="card-block">
															<div class="media">
																<div class="media-left media-middle">
																	<i class="icon-calendar2 white font-large-2 float-xs-left"></i>
																</div>
																<div class="media-body white text-xs-right">
																	<h3 id="reservation">{{ $pendingres }}</h3>
																	<span>Pending Reservations</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</a>

										<a href="/service-transaction">
											<div class="col-xl-3 col-lg-6 col-xs-12">
												<div class="card bg-gradient-y2-pink">
													<div class="card-body">
														<div class="card-block">
															<div class="media">
																<div class="media-left media-middle">
																	<i class="icon-antenna white font-large-2 float-xs-left"></i>
																</div>
																<div class="media-body white text-xs-right">
																	<h3 id="pending-services">{{ $pendingser }}</h3>
																	<span>Pending Services</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</a>

										<a href="/service-sponsorship">
											<div class="col-xl-3 col-lg-6 col-xs-12">
												<div class="card bg-gradient-y2-info">
													<div class="card-body">
														<div class="card-block">
															<div class="media">
																<div class="media-left media-middle">
																	<i class="icon-android-contact white font-large-2 float-xs-left"></i>
																</div>
																<div class="media-body white text-xs-right">
																	<h3 id="pending-services">{{ $countOfSponsor }}</h3>
																	<span>Service Sponsors</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</a>

										<a href="/business-registration">
											<div class="col-xl-3 col-lg-6 col-xs-12">
												<div class="card bg-gradient-y2-blue-grey">
													<div class="card-body">
														<div class="card-block">
															<div class="media">
																<div class="media-left media-middle">
																	<i class="icon-office white font-large-2 float-xs-left"></i>
																</div>
																<div class="media-body white text-xs-right">
																	<h3 id="pending-services">{{ $countOfBusiness }}</h3>
																	<span>Registered Businesses</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>

								<div class="tab-pane fade" role="tabpanel" id="tab2" aria-labelledby="base-tab2" aria-expanded="false">
									<div class="card-block card-dashboard">
										<table class="table table-striped table-custome-outline-red" id="table-container">
											<thead class="thead-custom-bg-red">
												<tr>
													<th>Facility</th>
													<th>Reservee</th>
													<th>Time</th>
													<th>Status</th>
												</tr>
											</thead>

											<tbody>
												@foreach($listOfReservations as $reservation)
													<tr>
														<td>{{ $reservation -> facilityName }}</td>
														<td>
															{{ $reservation -> firstName}} {{ $reservation -> middleName }} {{ $reservation -> lastName }} {{ $reservation -> suffix }}
														</td>
														<td>
															{{ date('F j, Y',strtotime($reservation -> dateReserved)) }} 
															{{ date('g:i a',strtotime($reservation -> reservationStart)) }} - 
															{{ date('g:i a',strtotime($reservation -> reservationEnd)) }}
														</td>
														<td>
															@if($reservation -> eventStatus == 'NYD')
																<span class="tag tag-default tag-info">Not Yet Done</span>
															@elseif($reservation -> eventStatus == 'OnGoing')
																<span class="tag tag-default tag-success">On-Going</span>
															@elseif($reservation -> eventStatus == 'Extended')
																<span class="tag tag-default tag-warning">Extended</span>
															@elseif($reservation -> eventStatus == 'Done')
																<span class="tag tag-default tag-default">Done</span>
															@endif
														</td>
													</tr>
												@endforeach

												@foreach($listOfNReservations as $reservation)
													<tr>
														<td>{{ $reservation -> facilityName }}</td>
														<td>
															{{ $reservation -> name }}
														</td>
														<td>
															{{ date('F j, Y',strtotime($reservation -> dateReserved)) }} 
															{{ date('g:i a',strtotime($reservation -> reservationStart)) }} - 
															{{ date('g:i a',strtotime($reservation -> reservationEnd)) }}
														</td>
														<td>
															@if($reservation -> eventStatus == 'NYD')
																<span class="tag tag-default tag-info">Not Yet Done</span>
															@elseif($reservation -> eventStatus == 'OnGoing')
																<span class="tag tag-default tag-success">On-Going</span>
															@elseif($reservation -> eventStatus == 'Extended')
																<span class="tag tag-default tag-warning">Extended</span>
															@elseif($reservation -> eventStatus == 'Done')
																<span class="tag tag-default tag-default">Done</span>
															@endif
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
	<script src="{{ URL::asset('/js/Chart.bundle.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.knob.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/underscore-min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/clndr.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/unslider-min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.steps.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/spinner/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/dateTime/moment-with-locales.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/daterange/daterangepicker.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/validation/form-validation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/wizard-steps.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>

	<script>
		$("#btnAddModal").on('click', function() {
			$("#iconModal").modal('show');
		});
	</script>
@endsection

@section('page-action')
	<script>
		$(document).ready(function() {
			$.ajaxSetup({
				headerheaders: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				url: '{{ url("/dashboard/card") }}', 
				method: 'GET', 
				success: function(data) {
					data = $.parseJSON(data);
				}, 
				error: function(data) {
					var message = "Errors: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});

			if (navigator.onLine) {
				var city = "Antipolo";
				var country = "ph";
				/*
				$.ajax({
					url: 'https://query.yahooapis.com/v1/public/' +
							'yql?q=select%20*%20' + 
									'from%20weather.forecast%20' + 
									'where%20woeid%20in%20(select%20woeid%20' + 
															'from%20geo.places(1)%20' + 
															'where%20text%3D%22' + city + '%2C%20' + 
																country + '%22)' + 
									'&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys', 
					method: 'GET', 
					success: function(data) {
						console.log(data);
						var weatherName = data.query.results.channel.item.condition.text;
						$("#weather-name").html(weatherName);
						$("#temperature-value").html(data.query.results.channel.item.condition.temp + 
														"&deg;F");
						$("#location-value").html(data.query.results.channel.location.city + 
													", " + 
													data.query.results.channel.location.country);
						$("#wind-speed").html(data.query.results.channel.wind.speed + " MPH");
						$("#humidity-value").html(data.query.results.channel.atmosphere.humidity + "%");
						$("#chill-value").html(data.query.results.channel.wind.chill);
						$("#pressure-value").html(data.query.results.channel.atmosphere.pressure + " in");

						
					}, 
					error: function(data) {
						var message = "Errors: ";
						var data = error.responseJSON;
						for (datum in data) {
							message += data[datum];
						}

						swal("Error", message, "error");
					}
				});
				*/
			}
		});
	</script>
@endsection

@section('template-js')
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/timehandle.js') }}" type="text/javascript"></script>
@endsection
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
					<div class="card-header">
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
						<div class="card-block card-dashboard">
							<a href="/resident">
								<div class="col-xl-3 col-lg-6 col-xs-12">
									<div class="card bg-gradient-y-cyan">
										<div class="card-body">
											<div class="card-block">
												<div class="media">
													<div class="media-left media-middle">
														<i class="icon-user1 white font-large-2 float-xs-left"></i>
													</div>
													<div class="media-body white text-xs-right">
														<h3 id="population">7,107</h3>
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
									<div class="card bg-gradient-y-teal">
										<div class="card-body">
											<div class="card-block">
												<div class="media">
													<div class="media-left media-middle">
														<i class="icon-home22 white font-large-2 float-xs-left"></i>
													</div>
													<div class="media-body white text-xs-right">
														<h3 id="population">318</h3>
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
									<div class="card bg-gradient-y-deep-orange">
										<div class="card-body">
											<div class="card-block">
												<div class="media">
													<div class="media-left media-middle">
														<i class="icon-note white font-large-2 float-xs-left"></i>
													</div>
													<div class="media-body white text-xs-right">
														<h3 id="doc-request">14</h3>
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
									<div class="card bg-gradient-y-brown">
										<div class="card-body">
											<div class="card-block">
												<div class="media">
													<div class="media-left media-middle">
														<i class="icon-pen2 white font-large-2 float-xs-left"></i>
													</div>
													<div class="media-body white text-xs-right">
														<h3 id="doc-request">4</h3>
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
									<div class="card bg-gradient-y-indigo">
										<div class="card-body">
											<div class="card-block">
												<div class="media">
													<div class="media-left media-middle">
														<i class="icon-calendar2 white font-large-2 float-xs-left"></i>
													</div>
													<div class="media-body white text-xs-right">
														<h3 id="reservation">32</h3>
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
									<div class="card bg-gradient-y-pink">
										<div class="card-body">
											<div class="card-block">
												<div class="media">
													<div class="media-left media-middle">
														<i class="icon-antenna white font-large-2 float-xs-left"></i>
													</div>
													<div class="media-body white text-xs-right">
														<h3 id="pending-services">8</h3>
														<span>Current Pending Services</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>

							<a href="/service-sponsorship">
								<div class="col-xl-3 col-lg-6 col-xs-12">
									<div class="card bg-gradient-y-info">
										<div class="card-body">
											<div class="card-block">
												<div class="media">
													<div class="media-left media-middle">
														<i class="icon-android-contact white font-large-2 float-xs-left"></i>
													</div>
													<div class="media-body white text-xs-right">
														<h3 id="pending-services">3</h3>
														<span>Current Service Sponsors</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>

							<a href="/business-registration">
								<div class="col-xl-3 col-lg-6 col-xs-12">
									<div class="card bg-gradient-y-blue-grey">
										<div class="card-body">
											<div class="card-block">
												<div class="media">
													<div class="media-left media-middle">
														<i class="icon-office white font-large-2 float-xs-left"></i>
													</div>
													<div class="media-body white text-xs-right">
														<h3 id="pending-services">8</h3>
														<span>Registered Businesses</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="card-block card-dashboard">
							<h3>Transaction Rate</h3>
							<div class="chartjs" style="height: 80px;">
								<canvas id="transaction-chart" style="display: block; height: 80px;" height="80px"></canvas>
							</div>
						</div>

						<div class="card-block card-dashboard">
							<h3>Liability Rate</h3>
							<div class="chartjs" style="height: 80px;">
								<canvas id="liability-chart" style="display: block; height: 80px;" height="80px"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Chart -->
		<div class="row">
			
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
		var transCTX = $("#transaction-chart")[0].getContext("2d");
		var liabCTX = $("#liability-chart")[0].getContext("2d");
		$(document).ready(function() {
			var frequencyChart = new Chart(transCTX, {
				type: 'line', 
				data: {
					labels: getPrefixMonth(5),
					lineTension: 0, 
					datasets: [{
						label: ['Resident Registration'],
						data: [12, 19, 3, 5, 2],
						backgroundColor: 'rgba(255, 99, 132, 0.2)', 
						borderColor: 'rgba(255, 99, 132,1)',
						borderWidth: 1
					}, 
					{
						label: ['Facility Reservation'], 
						data: [8, 10, 18, 9, 22], 
						backgroundColor: 'rgba(77, 162, 14, 0.2)', 
						borderColor: 'rgba(77, 162, 14, 1)',
						borderWidth: 1
					},
					{
						label: ['Document Requests'], 
						data: [15, 2, 22, 18, 7], 
						backgroundColor: 'rgba(255, 162, 14, 0.2)', 
						borderColor: 'rgba(255, 162, 14, 1)',
						borderWidth: 1
					}, 
					{
						label: ['Services Performed'], 
						data: [20, 5, 25, 10, 15], 
						backgroundColor: 'rgba(0, 87, 173, 0.2)', 
						borderColor: 'rgba(0, 87, 173, 1)',
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}, 
					elements: {
						line: {
							tension: 0.000001
						}
					},
					legend: {
						labels: {
							fontColor: 'black', 
							fontFamily: 'Helvetica', 
							fontStyle: 'bold'
						}
					}
				}
			});

			var liabilityChart = new Chart(liabCTX, {
				type: 'line', 
				data: {
					labels: getPrefixMonth(5),
					lineTension: 0, 
					datasets: [{
						label: ['Sickness'],
						data: [3, 14, 5, 9, 1],
						backgroundColor: 'rgba(255, 99, 132, 0.2)', 
						borderColor: 'rgba(255, 99, 132,1)',
						borderWidth: 1
					}, 
					{
						label: ['Death'], 
						data: [0, 1, 1, 0, 0], 
						backgroundColor: 'rgba(77, 162, 14, 0.2)', 
						borderColor: 'rgba(77, 162, 14, 1)',
						borderWidth: 1
					},
					{
						label: ['Resident Removal'], 
						data: [10, 12, 2, 8, 7], 
						backgroundColor: 'rgba(255, 162, 14, 0.2)', 
						borderColor: 'rgba(255, 162, 14, 1)',
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}, 
					elements: {
						line: {
							tension: 0.000001
						}
					},
					legend: {
						labels: {
							fontColor: 'black', 
							fontFamily: 'Helvetica', 
							fontStyle: 'bold'
						}
					}
				}
			});
		});

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
					$("#population").html(data.population);
					$("#reservation").html(data.reservation);
					$("#doc-request").html(data.request);
					$("#pending-services").html(data.pendingService);
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
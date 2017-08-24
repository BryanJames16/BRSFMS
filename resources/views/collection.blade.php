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
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/card-bg.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Collection
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')
	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(COLLECTION);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12 mb-1">
		<h2 class="content-header-title">Collection</h2>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Collection</a></li>
		<li class="breadcrumb-item"></li>
	</ol>
@endsection

@section('content-body')
    <section id="multi-column">
        <div class="row">
            <div class="col-xs-14">
                <div class="card">
                    <div class="card-header">
						<h4 class="card-title">Collection</h4>
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
                            <p align="center">
                                <!-- Button trigger modal -->
								<button type="button" class="btn btn-outline-info btn-lg" id="btnAddModal"  style="width:160px; font-size:13px">
									<i class="icon-edit2"></i> Add New Collection 
								</button>
                            </p>

                            <table class="table table-striped table-bordered multi-ordering" style="font-size:14px;width:100%;" id="table-container">
                    			<thead>
                    				<tr>
										<td>Collection ID</td>
										<td>Customer Name</td>
										<td>Collection From</td>
										<td>Amount</td>
										<td>Status</td>
										<td>Actions</td>
									</tr>
                    			</thead>

	                    		<tbody>
	                    			@foreach($collections as $collection)
                                    <tr>
                                        <td>{{ $collection -> collectionID }}</td>
                                        <td>
                                            <p>
                                            {{ $collection -> firstName }}
                                            {{ $collection -> middleName }}
                                            {{ $collection -> lastName }}
                                            ({{ $collection -> residentID }})
                                            </p>
                                        </td>
                                        <td>
											@if($collection -> collectionType == 1)
												Barangay ID
											@elseif($collection -> collectionType == 2) 
												Document Request
											@elseif($collection -> collectionType == 3) 
												Facility Reservation
											@elseif($collection -> collectionType == 4) 
												Services
											@else
												Business Registration
											@endif 
										</td>
                                        <td>{{ $collection -> amount }}</td>
                                        <td>{{ $collection -> status }}</td>
                                        <td>
											<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
											<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
												<a href="#" class="dropdown-item btnUpdate" data-value="{{ $collection -> collectionPrimeID }}"><i class="icon-eye6"></i> Update</a>
												<a href="#" class="dropdown-item btnReceipt" data-value="{{ $collection -> collectionPrimeID }}"><i class="icon-pen3"></i> Receipt</a>
											</span>
                                        </td>
                                    </tr>
                                    @endforeach
	                    		</tbody>
	                    	</table>

							<!-- Modal Area -->
							<div class="modal animated bounceIn text-xs-left" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close cancel-view" data-dismiss="modal" aria-label="Close" id="modal-dismis">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> Add New Collection</h4>
										</div>
										<div class="modal-body dirty-white-card">
											<div class="card-block">
												<div class="card-text">
													<div class="col-xl-4 col-md-6 col-sm-12">
														<div class="card">
															<div class="card-body">
																<img class="card-img-top img-fluid" src="{{ URL::asset('/system-assets/images/header/residentheader.png') }}" alt="Card image cap" />
																<div class="card-block">
																	<h4 class="card-title" align="center">Barangay ID</h4>
																	<p class="card-text" align="justify">
																		Barangay ID is the primary legal and valid 
																		identification document issued in Barangay. 
																	</p>
																	<p align="center">
																		<a href="{{ url('/resident') }}" class="btn btn-outline-pink">Request Barangay ID</a>
																	</p>
																</div>
															</div>
														</div>
													</div>

													<div class="col-xl-4 col-md-6 col-sm-12">
														<div class="card">
															<div class="card-body">
																<img class="card-img-top img-fluid" src="{{ URL::asset('/system-assets/images/header/docreqheader.png') }}" alt="Card image cap" />
																<div class="card-block">
																	<h4 class="card-title" align="center">Document Request</h4>
																	<p class="card-text" align="justify">
																		Document Requests are general documents needed
																		in fulfillment of other crucial requirements. 
																	</p>
																	<p align="center">
																		<a href="{{ url('/document-request') }}" class="btn btn-outline-pink">Request a Document</a>
																	</p>
																</div>
															</div>
														</div>
													</div>

													<div class="col-xl-4 col-md-6 col-sm-12">
														<div class="card">
															<div class="card-body">
																<img class="card-img-top img-fluid" src="{{ URL::asset('/system-assets/images/header/facilityheader.png') }}" alt="Card image cap" />
																<div class="card-block">
																	<h4 class="card-title" align="center">Facility Reservation</h4>
																	<p class="card-text" align="justify">
																		Facilities can be reserved for different occasions
																		such as league, contest, graduation, etc...
																	</p>
																	<p align="center">
																		<a href="{{ url('/facility-reservation') }}" class="btn btn-outline-pink">Reserve a Facility</a>
																	</p>
																</div>
															</div>
														</div>
													</div>

													<div class="col-xl-4 col-md-6 col-sm-12">
														<div class="card">
															<div class="card-body">
																<img class="card-img-top img-fluid" src="{{ URL::asset('/system-assets/images/header/serviceheader.png') }}" alt="Card image cap" />
																<div class="card-block">
																	<h4 class="card-title" align="center">Services Engagement</h4>
																	<p class="card-text" align="justify">
																		Some services contains collections. These collections
																		will be used for future programs and services.
																	</p>
																	<p align="center">
																		<a href="{{ url('/service-transaction') }}" class="btn btn-outline-pink">Engage in a Service</a>
																	</p>
																</div>
															</div>
														</div>
													</div>

													<div class="col-xl-4 col-md-6 col-sm-12">
														<div class="card">
															<div class="card-body">
																<img class="card-img-top img-fluid" src="{{ URL::asset('/system-assets/images/header/sponsorheader.png') }}" alt="Card image cap" />
																<div class="card-block">
																	<h4 class="card-title" align="center">Service Sponsorships</h4>
																	<p class="card-text" align="justify">
																		Amount given by the sponsors when sponsoring 
																		services are used in implementation of services.
																	</p>
																	<p align="center">
																		<a href="{{ url('/service-sponsorship') }}" class="btn btn-outline-pink">Engage in a Service</a>
																	</p>
																</div>
															</div>
														</div>
													</div>

													<div class="col-xl-4 col-md-6 col-sm-12">
														<div class="card">
															<div class="card-body">
																<img class="card-img-top img-fluid" src="{{ URL::asset('/system-assets/images/header/businessheader.png') }}" alt="Card image cap" />
																<div class="card-block">
																	<h4 class="card-title" align="center">Business Registrations</h4>
																	<p class="card-text" align="justify">
																		When someone registers a business in a Barangay, 
																		funds collected can be considered as collection.
																	</p>
																	<p align="center">
																		<a href="{{ url('/business-registration') }}" class="btn btn-outline-pink">Register a Business</a>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="form-actions center">
													<p align="center">
														<button type="button" data-dismiss="modal" class="btn btn-warning mr-1 cancel-view" id="cancel-view">Back</button>
													</p>
												</div>												
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="modal animated bounceIn text-xs-left" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
								<div class="modal-dialog modal-md" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close cancel-view" data-dismiss="modal" aria-label="Close" id="modal-dismis">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> Update Collection</h4>
										</div>
										<div class="modal-body dirty-white-card">
											<div class="card-block">
												{{ Form::open([
													'url' => '/collection/update', 
													'method' => 'POST', 
													'id' => 'frmPay'
												]) }}
												<div class="card-text">
													<div class="form-group col-md-6 mb-2">
														<label for="recievedCash">Enter the amount of the recieved cash:</label>
														{{ Form::number('recievedCash', 
																			null, 
																			['id' => 'recievedCash' , 
																			'class' => 'form-control ', 
																			'placeholder' => 'eg. 100', 
																			'data-toggle' => 'tooltip', 
																			'data-trigger' => 'focus', 
																			'data-placement' => 'top', 
																			'data-title' => 'Please enter a valid amount', 
																			'required', 
																			'step'=>'0.25']) }}

														{{ Form::hidden('uCollectionID', 
																			null, 
																			['id' => 'uCollectionID']) }}
													</div>
												</div>

												<div class="form-actions center">
													<p align="center">
														<input type="submit" class="btn btn-primary mr-1 cancel-view" id="btnSubmit">
														<button type="button" data-dismiss="modal" class="btn btn-warning mr-1 cancel-view" id="cancel-view">Cancel</button>
													</p>
												</div>	
												{{ Form::close() }}											
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="modal animated bounceIn text-xs-left" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close cancel-view" data-dismiss="modal" aria-label="Close" id="modal-dismis">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> Receipt</h4>
										</div>
										<div class="modal-body dirty-white-card">
											<div class="card-block">
												<div class="card-text">
													<p align="center" id="rHeader" style="font-size: 30px;">

													</p>
													<hr color="black" />
													<br>
													<p id="particulars">

													</p>
												</div>

												<div class="form-actions center">
													<p align="center">
														<button type="button" data-dismiss="modal" class="btn btn-warning mr-1 cancel-view" id="cancel-view">Cancel</button>
													</p>
												</div>												
											</div>
										</div>
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
@endsection

@section('page-action')
    <script type="text/javascript">
        $("#btnAddModal").on('click', function () {
            $("#addModal").modal('show');
        });

		$(".btnUpdate").on('click', function () {
			var collectionID = $(this).data('value');
			
			$("#updateModal").modal('show');
			$("#uCollectionID").val(collectionID);
		});

		$(".btnReceipt").on('click', function () {
			$("#receiptModal").modal('show');
			showReceipt();
		});

		$("#frmPay").submit(function (event) {
			event.preventDefault();
			
			$.ajax({
				url: '{{ url("/") }}', 
				method: 'GET', 
				data: {
					"collectionPrimeID": $("#uCollectionID").val()
				}, 
				success: function (data) {
					if ((data.amount - $("#recievedCash").val()) >= 0) {
						payColelction($("#recievedCash").val());
					} 
					else {
						swal("Error", 
								"Recieved Cash is not sufficient to pay the collection!", 
								"error");
					}
				}, 
				error: function (errors) {
					var message = "Errors: ";
					var data = errors.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});
		});

		var payCollection = function (amount) {
			$.ajax({
				url: '{{ url("/") }}',
				method: 'POST', 
				data: {
					"recieved": amount
				}
				success: function() {
					$("#updateModal").modal('hide');
					$("#frmPay").trigger('reset');
					swal("Success",
							"Successfully paid!", 
							"success");
				}, 
				error: function (errors) {
					var message = "Errors: ";
					var data = errors.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});
		}

		var showReceipt = function () {
			$.ajax({
				url: '{{ url("/collection/gHeader") }}', 
				method: 'GET', 
				success: function (data) {
					data = $.parseJSON(data);
					$("#rHeader").html(
						"<b>" + 
						data.barangayName + "<br>" + 
						data.address + 
						"</b>"
					);
				}, 
				error: function (errors) {
					var message = "Errors: ";
					var data = errors.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});
		};
    </script>
@endsection

@section('template-js')
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/timehandle.js') }}" type="text/javascript"></script>
@endsection

<!-- Parent Template -->
@extends('master.master')

<!-- Page Initiatives -->
@section('title')
	Document Request
@endsection

<!-- Preset -->
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

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/long-press.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
@endsection

@section('page-action')
	<script>
		setSelectedTab(DOCUMENT_REQUEST);
	</script>
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Document Requests</h4>
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
									<i class="icon-edit2"></i> Request Document 
								</button>

								<!-- Request Modal -->
								<div class="modal animated bounceIn text-xs-left" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> Request a Document</h4>
											</div>
											<div ng-app="maintenanceApp" class="modal-body">
												<div class="card-block">
													<div class="card-text">
														{{ Form::open(['method' => 'POST', 'id' => 'frmReq']) }}

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Request ID</label>
															<div class="col-md-9">
																{{ Form::text('requestID', 
																				null, 
																				['id' => 'requestID', 
																					'class' => 'long-press form-control', 
																					'placeholder' => 'eg.REQ_001', 
																					'maxlength' => '20', 
																					'data-toggle' => 'tooltip', 
																					'data-trigger' => 'focus', 
																					'data-placement' => 'top', 
																					'data-title' => 'Maximum of 20 characters', 
																					'required', 
																					'readonly', 
																					'minlength'=>'5', 
																					'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Requestor Name</label>
															<div class="col-md-9">
																<select class ='form-control border-info selectBox' name='type' id="aRequestor">

																</select>
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Document</label>
															<div class="col-md-9">
																<select class ='form-control border-info selectBox' name='type' id="aDocument">

																</select>
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Quantity</label>
															<div class="col-md-3">
																{{ Form::number('requestQuantity', 
																					null, 
																					['id' => 'requestQuantity', 
																						'class' => 'form-control', 
																						'min' => '1', 
																						'max' => '8', 
																						'maxlength' => '10', 
																						'minlength' => '1', 
																						'step' => '1']) }}
															</div>	
														</div>
													</div>

													<div class="form-actions center">
														<input type="submit" class="btn btn-success" value="Request Document" name="btnRequest">
														<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>

														{{ Form::close() }}
													</div>					
																				
												</div>
											</div>
											<!-- End of Modal Body -->
										</div>
									</div>
								</div> 
								<!-- End of Modal -->
                    		</p>

							<!-- View Modal -->
                    		<div class="modal fade text-xs-left" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> @yield('view-modal-card-title')</h4>
										</div>
										<div class="modal-body">
											<div class="card-block">
												<div class="card-text">
													
												</div>

												

												<div class="form-actions center">
													@yield('view-modal-form-action')
												</div>													
											</div>
										</div>

										<!-- End of Modal Body -->

									</div>
								</div>
							</div> 
							<!-- End of Modal -->

							<table class="table table-striped table-bordered multi-ordering" style="font-size:14px;width:100%;" id="table-container">
                    			<thead>
                    				<tr>
										<td>Requestor Name</td>
										<td>Request Date</td>
										<td>Document</td>
										<td>Quantity</td>
										<td>Status</td>
										<td>Actions</td>
									</tr>
                    			</thead>

	                    		<tbody>
	                    			@foreach($requests as $request)
									<tr>
										<td>{{ $request -> firstName }} {{ $request -> middleName }} {{ $request -> lastName }}</td> 
										<td>{{ $request -> requestDate }} </td>
										<td>{{ $request -> documentName }} </td>
										<td>{{ $request -> quantity }}</td>

										@if ($request -> status == "Pending")
											<td><span class="tag round tag-default tag-info">Pending</span></td>
										@elseif($request -> status == "Cancelled") 
											<td><span class="tag round tag-default tag-danger">Cancelled</span></td>
										@else 
											<td><span class="tag round tag-default tag-success">Approved</span></td>
										@endif
										<td>
											<span class="dropdown">
												<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
												<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
													<a href="#" class="dropdown-item view" name="btnView" data-value='{{ $request -> headerPrimeID }}'><i class="icon-eye6"></i> View</a>
													<a href="#" class="dropdown-item edit" name="btnEdit" data-value='{{ $request -> headerPrimeID }}'><i class="icon-pen3"></i> Sign</a>
													<a href="#" class="dropdown-item delete" name="btnDelete" data-value='{{ $request -> headerPrimeID }}'><i class="icon-trash4"></i> Cancel</a>
												</span>
											</span>
										</td>  
									</tr>
									@endforeach
	                    		</tbody>
	                    	</table>

	                    	@yield('ajax-modal')

	                    	<div class="modal fade text-xs-left" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
								<div class="modal-dialog" id="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>@yield('edit-modal-title')</h4>
										</div>

										<div class="modal-body">
											<div class="card-block">

												@yield('ajax-edit-form')

												<div class="card-text">
													
												
												</div>
												<div class="form-body">
														
												</div>

												<div class="form-actions center">
														
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

<!-- Javascript Resources -->
@section('vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
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

	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/jquery.mousewheel.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/jquery.longpress.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/plugins.js') }}" type="text/javascript"></script>
@endsection

@section('template-js')
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
@endsection

@section('page-level-js')
	<script type='text/javascript'>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$("#btnAddModal").on('click', function() {
			$("#iconModal").modal('show');

			$.ajax({
				url: "{{ url('/document-request/nextPK') }}", 
				method: "GET", 
				success: function(data) {
					if (data == null) {
						console.log("Reponse is null!");
					}
					else {
						console.log(data);
						$("#requestID").val(data);
					}
				}, 
				failed: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
					console.log("Error: Cannot refresh table!\n" + message);
				}
			});

			$.ajax({
				url: "{{ url('/document-request/getRequestor') }}", 
				method: "GET", 
				success: function(data) {
					$("#aRequestor").html("");

					for (datum in data) {
						$("#aRequestor").append(
							"<option value=" + data[datum].residentPrimeID + ">" + 
								data[datum].lastName + ", " + 
								data[datum].firstName + " " + 
								data[datum].middleName + " " + 
								data[datum].suffix + 
							"</option>"
						);
					}
				}, 
				failed: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
					console.log("Error: Cannot refresh table!\n" + message);
				}
			});

			$.ajax({
				url: "{{ url('/document-request/getDocument') }}", 
				method: "GET", 
				success: function(data) {
					$("#aDocument").html("");

					for (datum in data) {
						$("#aDocument").append(
							"<option value=" + data[datum].primeID + ">" + 
								data[datum].documentName + 
							"</option>"
						);
					}
				}, 
				failed: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
					console.log("Error: Cannot refresh table!\n" + message);
				}
			});
		});

		$("#frmReq").submit(function (event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/document-request/store') }}", 
				method: "POST", 
				data: {
					"requestID": $("#requestID").val(), 
					"peoplePrimeID": $("#aRequestor").val(), 
					"documentPrimeID": $("#aDocument").val(),
					"quantity": $("#requestQuantity").val()
				}, 
				success: function(data) {
					$("#iconModal").modal("hide");
					refreshTable();
					$("#frmReq").trigger('reset');
					swal("Success", "Successfully Added!", "success");
				}, 
				failed: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
					console.log("Error: Cannot refresh table!\n" + message);
				}
			});
		});

		var refreshTable = function() {

		}
	</script>

	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/extensions/long-press.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/jspdf.min.js') }}" type="text/javascript"></script>
@endsection

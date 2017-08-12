@extends('master.master')

@section('title')
Utilities
@endsection

<!-- Preset -->
@section('vendor-style')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
@endsection

<!-- CSS Styles -->
@section('vendor-plugin')
	<link rel="stylesheet" href="{{ URL::asset('/signature/jquery.signaturepad.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Barangay Info</h4>
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
							<p align="right">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-outline-info btn-lg" id="btnAddModal"  style="width:130px; font-size:13px">
									<i class="icon-edit2"></i> Edit Settings  
								</button>
                    		</p>
							<table class="table table-striped table-bordered" style="font-size:14px;width:100%;" id="table-container">
								<thead>
									<tr>
										<col width="240">
										<th>Assets</th>
										<th>Value</th>
									</tr>
								</thead>
								<tbody>
									@foreach($utilities as $utility)
										<tr>
											<td>Barangay Name</td>
											<td>{{ $utility -> barangayName }}</td>
										</tr>
										<tr>
											<td>Chairman Name</td>
											<td>
												{{ $utility -> chairmanName }}<br>
												<img src="{{ URL::asset('system-assets/images/sign/sign.png') }}" height="95px" width="185px">
											</td>
										</tr>
										<tr>
											<td>Address</td>
											<td>{{ $utility -> address }}</td>
										</tr>
										<tr>
											<td>Barangay Logo</td>
											<td>
												<img src="{{ URL::asset('system-assets/images/logo/brgy_tl.png') }}" height="100px" width="100px"><br>
												{{ $utility -> brgyLogoPath }}
											</td>
										</tr>
										<tr>
											<td>Province Logo</td>
											<td>
												<img src="{{ URL::asset('system-assets/images/logo/prov_tl.png') }}" height="100px" width="100px"><br>
												{{ $utility -> provLogoPath }}
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Unique Identifiers</h4>
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
							<p align="right">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-outline-info btn-lg" id="btnUpdatePK"  style="width:130px; font-size:13px">
									<i class="icon-edit2"></i> Edit Values  
								</button>
                    		</p>
							<table class="table table-striped table-bordered" style="font-size:14px;width:100%;" id="table-container">
								<thead>
									<tr>
										<col width="240">
										<th>Identifier</th>
										<th>Value</th>
									</tr>
								</thead>
								<tbody>
									@foreach($utilities as $utility)
										<tr>
											<td>Document Identifier</td>
											<td>{{ $utility -> documentPK }}</td>
										</tr>
										<tr>
											<td>Document Approval Identifier</td>
											<td>{{ $utility -> docApprovalPK }}</td>
										</tr>
										<tr>
											<td>Document Request Identifier</td>
											<td>{{ $utility -> docRequestPK }}</td>
										</tr>
										<tr>
											<td>Facility Identifier</td>
											<td>{{ $utility -> facilityPK }}</td>
										</tr>
										<tr>
											<td>Family Identifier</td>
											<td>{{ $utility -> familyPK }}</td>
										</tr>
										<tr>
											<td>Reservation Identifier</td>
											<td>{{ $utility -> reservationPK }}</td>
										</tr>
										<tr>
											<td>Resident Identifier</td>
											<td>{{ $utility -> residentPK }}</td>
										</tr>
										<tr>
											<td>Service Identifier</td>
											<td>{{ $utility -> servicePK }}</td>
										</tr>
										<tr>
											<td>Service Registration Identifier</td>
											<td>{{ $utility -> serviceRegPK }}</td>
										</tr>
										<tr>
											<td>Sponsor Identifier</td>
											<td>{{ $utility -> sponsorPK }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="modal animated bounceIn text-xs-left" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> Update Barangay Meta Info</h4>
							</div>
							<div ng-app="maintenanceApp" class="modal-body">
								<div class="card-block">
									<div class="card-text">
										{{ Form::open(['method' => 'POST', 'id' => 'frmMeta', 'files' => true]) }}

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Barangay Name:</label>
											<div class="col-md-9">
												{{ Form::text('barangayName', 
																null, 
																['id' => 'barangayName', 
																	'class' => 'form-control', 
																	'placeholder' => 'Barangay Caguinto', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Chairman Name</label>
											<div class="col-md-9">
												{{ Form::text('chairmanName', 
																null, 
																['id' => 'chairmanName', 
																	'class' => 'form-control', 
																	'placeholder' => 'Barangay Caguinto', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Chairman Signature</label>
											<div class="col-md-9">
												<form method="POST" action="">
													<div class="sigPad">
														<ul class="sigNav">
															<li class="drawIt"><a href="#draw-it" >Sign</a></li>
															<li class="clearButton"><a href="#clear">Clear</a></li>
														</ul>
														<div class="sig sigWrapper">
															<div class="typed"></div>
															<canvas class="pad" width="398" height="100"></canvas>
															<input type="hidden" name="output" class="output">
														</div>
													</div>
												</form>
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Address</label>
											<div class="col-md-9">
												{{ Form::text('address', 
																null, 
																['id' => 'address', 
																	'class' => 'form-control', 
																	'placeholder' => 'Barangay Caguinto', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Barangay Logo</label>
											<div class="col-md-3">
												{{ Form::text('brgyLogo', 
																null, 
																['id' => 'brgyLogo', 
																	'class' => 'form-control', 
																	'placeholder' => 'Barangay Caguinto', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Province Logo</label>
											<div class="col-md-3">
												{{ Form::text('provLogo', 
																null, 
																['id' => 'provLogo', 
																	'class' => 'form-control', 
																	'placeholder' => 'Barangay Caguinto', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
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

				<div class="modal animated bounceIn text-xs-left" id="updatePKModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> Update Unique Identifiers</h4>
							</div>
							<div ng-app="maintenanceApp" class="modal-body">
								<div class="card-block">
									<div class="card-text">
										{{ Form::open(['method' => 'POST', 'id' => 'frmIdent', 'files' => true]) }}

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Document Identifier:</label>
											<div class="col-md-9">
												{{ Form::text('documentIdentifier', 
																null, 
																['id' => 'documentIdentifier', 
																	'class' => 'form-control', 
																	'placeholder' => 'DOC_000', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Approval Identifier:</label>
											<div class="col-md-9">
												{{ Form::text('approvalIdentifier', 
																null, 
																['id' => 'approvalIdentifier', 
																	'class' => 'form-control', 
																	'placeholder' => 'APPR_000', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Document Request Identifier:</label>
											<div class="col-md-9">
												{{ Form::text('requestIdentifier', 
																null, 
																['id' => 'requestIdentifier', 
																	'class' => 'form-control', 
																	'placeholder' => 'REQ_000', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Facility Identifier:</label>
											<div class="col-md-9">
												{{ Form::text('facilityIdentifier', 
																null, 
																['id' => 'facilityIdentifier', 
																	'class' => 'form-control', 
																	'placeholder' => 'FCL_000', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Family Identifier:</label>
											<div class="col-md-9">
												{{ Form::text('familyIdentifier', 
																null, 
																['id' => 'familyIdentifier', 
																	'class' => 'form-control', 
																	'placeholder' => 'FAM_000', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Facility Reservation Identifier:</label>
											<div class="col-md-9">
												{{ Form::text('reservationIdentifier', 
																null, 
																['id' => 'reservationIdentifier', 
																	'class' => 'form-control', 
																	'placeholder' => 'FRES_000', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Resident Identifier:</label>
											<div class="col-md-9">
												{{ Form::text('residentIdentifier', 
																null, 
																['id' => 'residentIdentifier', 
																	'class' => 'form-control', 
																	'placeholder' => 'RES_000', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Service Identifer:</label>
											<div class="col-md-9">
												{{ Form::text('serviceIdentifier', 
																null, 
																['id' => 'serviceIdentifier', 
																	'class' => 'form-control', 
																	'placeholder' => 'SERV_000', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Service Registration Identifier:</label>
											<div class="col-md-9">
												{{ Form::text('servRegIdentifier', 
																null, 
																['id' => 'servRegIdentifier', 
																	'class' => 'form-control', 
																	'placeholder' => 'SREG_000', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>

										<div class="form-group row">
											<label class="col-md-3 label-control" for="eventRegInput1">Sponsor Identifier:</label>
											<div class="col-md-9">
												{{ Form::text('sponsorIdentifier', 
																null, 
																['id' => 'sponsorIdentifier', 
																	'class' => 'form-control', 
																	'placeholder' => 'SPON_000', 
																	'maxlength' => '20', 
																	'data-toggle' => 'tooltip', 
																	'data-trigger' => 'focus', 
																	'data-placement' => 'top', 
																	'data-title' => 'Maximum of 20 characters', 
																	'required', 
																	'minlength'=>'5', 
																	'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
											</div>	
										</div>
									</div>

									<div class="form-actions center">
										<input type="submit" class="btn btn-success" value="Update Identifier(s)" name="btnUpdatePKMod">
										<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>

										{{ Form::close() }}
									</div>					
																
								</div>
							</div>
							<!-- End of Modal Body -->
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

	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/signature/jquery.signaturepad.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/signature/json2.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/underscore-min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/clndr.min.js') }}" type="text/javascript"></script>
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
			$(document).ready(function() {
			$('.sigPad').signaturePad({drawOnly:true});
			});
		</script>

	<script type="text/javascript">

		$("#btnAddModal").on('click', function() {
			$("#iconModal").modal('show');
		});

		$("#btnUpdatePK").on('click', function() {
			$.ajax({
				url: "{{ url('/utilities/getCurrentPK') }}", 
				method: "GET", 
				success: function(data) {
					$("#documentIdentifier").val(data.documentPK);
					$("#approvalIdentifier").val(data.docApprovalPK);
					$("#requestIdentifier").val(data.docRequestPK);
					$("#facilityIdentifier").val(data.facilityPK);
					$("#familyIdentifier").val(data.familyPK);
					$("#reservationIdentifier").val(data.reservationPK);
					$("#residentIdentifier").val(data.residentPK);
					$("#serviceIdentifier").val(data.servicePK);
					$("#servRegIdentifier").val(data.serviceRegPK);
					$("#sponsorIdentifier").val(data.sponsorPK);
				}, 
				failed: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
				}
			});

			$("#updatePKModal").modal('show');
		});

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$("#frmIdent").submit(function (event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/utilities/update') }}", 
				method: "POST", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"documentPK": $("#documentIdentifier").val(), 
					"docApprovalPK": $("#approvalIdentifier").val(), 
					"docRequestPK": $("#facilityIdentifier").val(), 
					"facilityPK": $("#facilityIdentifier").val(), 
					"familyPK": $("#familyIdentifier").val(), 
					"reservationPK": $("#reservationIdentifier").val() , 
					"residentPK": $("#residentIdentifier").val(), 
					"servicePK": $("#serviceIdentifier").val(), 
					"serviceRegPK": $("#servRegIdentifier").val(), 
					"sponsorPK": $("#sponsorIdentifier").val()
				}, 
				success: function(data) {
					$("#iconModal").modal("hide");
					$("#frmIdent").trigger("reset");
					refreshPKTable();
					swal("Success", "Successfully Updated!", "success");
				}, 
				failure: function(data) {
					var message = "Errors: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});
		});

		var refreshMetaTable = function() {
			// Refresh Meta Table
		};

		var refreshPKTable = function() {
			// Refresh Unique Identifiers Table
		};
	</script>
@endsection

@section('page-action')
	<script>
		/* Meta Actions */
		// Canvas Action
		var canvasDiv = document.getElementById('canvasDiv');
		var canvas = document.createElement('canvas');
		var clickX = new Array();
		var clickY = new Array();
		var clickDrag = new Array();
		var paint;

		canvas.setAttribute('width', "390px");
		canvas.setAttribute('height', "220px");
		canvas.setAttribute('id', 'signCanvas');
		canvasDiv.appendChild(canvas);
		if(typeof G_vmlCanvasManager != 'undefined') {
			canvas = G_vmlCanvasManager.initElement(canvas);
		}
		context = canvas.getContext("2d");

		$('#signCanvas').mousedown(function(e){
			var mouseX = e.pageX - this.offsetLeft;
			var mouseY = e.pageY - this.offsetTop;
					
			paint = true;
			addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
			redraw();

			console.log('Mouse Down!');
		});

		$('#signCanvas').mousemove(function(e){
			if(paint){
				addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
				redraw();
				console.log('Dragging while clicking!');
			}
		});

		$('#signCanvas').mouseup(function(e){
			paint = false;
			console.log('Mouse Up!');
		});

		$('#signCanvas').mouseleave(function(e){
			paint = false;
			console.log('Mouse left :(');
		});

		function addClick(x, y, dragging) {
			clickX.push(x);
			clickY.push(y);
			clickDrag.push(dragging);
		}

		function redraw(){
			context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Clears the canvas
			
			context.strokeStyle = "#df4b26";
			context.lineJoin = "round";
			context.lineWidth = 5;
						
			for(var i=0; i < clickX.length; i++) {		
				context.beginPath();
				if (clickDrag[i] && i) {
					context.moveTo(clickX[i-1], clickY[i-1]);
				}
				else {
					context.moveTo(clickX[i]-1, clickY[i]);
				}
				context.lineTo(clickX[i], clickY[i]);
				context.closePath();
				context.stroke();
			}
		}

		/* Primary Key Actions */
	</script>
@endsection

@section('template-js')
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/jspdf.min.js') }}" type="text/javascript"></script>

	<script type="text/javascript">
		setSelectedTab(UTILITIES);
	</script>
@endsection

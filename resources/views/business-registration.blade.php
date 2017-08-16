@extends('master.master')

<!-- Preset -->
@section('vendor-style')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
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
@endsection

@section('template-css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Business Registration
@endsection

@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(BUSINESS_REGISTRATION);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Business Registration </h2>
		<p class="text-muted mb-0">Registration of Business</p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaction</li>
		<li class="breadcrumb-item"><a href="#">Business Registration</a></li>
	</ol>
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Business Registration</h4>
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
								<button type="button" class="btn btn-outline-info btn-lg" id="btnRegModal"  style="width:160px; font-size:13px">
									<i class="icon-edit2"></i> Register Business 
								</button>

								<!-- Register Modal -->
								<div class="modal animated bounceIn text-xs-left" id="regModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
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
																					'class' => 'form-control', 
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

							<table class="table table-striped table-bordered multi-ordering" style="font-size:14px;width:100%;" id="table-container">
								<thead>
                    				<tr>
										<td>Business ID</td>
										<td>Registration Date</td>
										<td>Owner</td>
										<td>Business Type</td>
										<td>Remarks</td>
										<td>Actions</td>
									</tr>
                    			</thead>

								<tbody>

								</tbody>	
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('page-action')
	<script type="text/javascript">
		setSelectedTab(BUSINESS_REGISTRATION);
	</script>

	<script type="text/javascript">
		$("#btnRegModal").click(function(event) {
			$("#regModal").modal("show");
		});
	</script>
@endsection

@section('vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
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
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/jspdf.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/html2canvas.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/canvas2image.js') }}" type="text/javascript"></script>
@endsection

@section('template-js')
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
@endsection

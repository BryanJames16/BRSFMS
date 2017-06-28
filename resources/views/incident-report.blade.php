@extends('master.master')

@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Document Requests
@endsection

@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(CASEFILE);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Incident Reports </h2>
		<p class="text-muted mb-0">All reports sent by the residents</p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaction</li>
		<li class="breadcrumb-item"><a href="#">Incident Report</a></li>
	</ol>
@endsection

@section('content-body')

						
						<!-- Modal -->
								<div class="modal fade text-xs-left" id="iconModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>Incident Report</h4>
											</div>
											<div class="modal-body">
												<div class="card-block">
													<div class="card-text">
														
													</div>

													<div class="form-group row">
														
														<label class="col-md-3 label-control" for="eventRegInput1">Resident Name</label>
														<div class="col-md-9">
															<input type="text" class="form-control" id="firstName1" />
																<button type="button" class="btn" data-dismiss="modal" data-toggle="modal" data-target="#searchModal">Search resident</button>
														
														</div>	
													</div>

													<div cl

													ass="form-group row">
														<label class="col-md-3 label-control" for="eventRegInput1">Document</label>
														<div class="col-md-9">
															<select class="form-control">
																<option>Certificate of Indigency</option>
																<option>Barangay Clearance</option>
															</select>
														</div>	
													</div>

													<div class="form-group row">
														<label class="col-md-3 label-control" for="eventRegInput1">Quantity</label>
														<div class="col-md-9">
															<input type="number" class="form-control" id="firstName1" />
														</div>	
													</div>
														<button type="button" class="btn btn-success mr-1">Add</button>

													<table class="table table-striped table-bordered	" id="table-container">
								                    	<thead>
								                    		<tr>
																<th>Document</th>
																<th>Quantity</th>
																<th>Action</th>
															</tr>
								                    	</thead>

									                	<tbody>
									                		<tr>
									                			<td>Barangay Clearance</td>
									                			<td>5</td>
								             					<td>
								             						<button class='btn btn-icon btn-round btn-danger normal'  type='button'><i class="icon-android-cancel"></i>Remove</button>

								             					</td>
									                		</tr>

									                		
									                	</tbody>
									                </table>
															

												</div>

													<div class="form-actions center">
														<button type="button" data-dismiss="modal" class="btn btn-success mr-1">Request</button>
														<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel
														</button>
													</div>													
												</div>
											</div>

											<!-- End of Modal Body -->

										</div>
									</div>
								</div> <!-- End of Modal -->



	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Incident Reports</h4>
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
								
							</p>
						</div>
					</div>
				

					<table class="table table-striped table-bordered datacol-column-filtering" id="table-container">
                    	<thead>
                    		<tr>
								<th>Report Name</th>
								<th>Description</th>
								<th>Date</th>
								<th>Resident</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
                    	</thead>

	                	<tbody>
	                		<tr>
	                			<td>Commotion</td>
	                			<td>Commotion between Alex Fernandez and Bryan Peninsula</td>
	                			<td>March 12, 2017</td>
	                			<td>Marc Joseph Fuellas</td>
	                			<td>Pending</td>
             					<td>
             						<button class='btn btn-icon btn-round btn-success normal'  type='button'><i class="icon-android-done"></i>Solve</button>

             					</td>
	                		</tr>

	                		<tr>
	                			<td>Car Accident</td>
	                			<td>Two cars chuchu</td>
	                			<td>March, 13, 2017</td>
	                			<td>James Reid</td>
	                			<td>Pending</td>
	                			<td>
             						<button class='btn btn-icon btn-round btn-success normal'  type='button'><i class="icon-android-done"></i>Solve</button>

             					</td>
	                		</tr>
	                	</tbody>
	                </table>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.fixedColumns.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.responsive.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.colReorder.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/buttons.colVis.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables-extensions/datatables-colreorder.js') }}" type="text/javascript"></script>
@endsection

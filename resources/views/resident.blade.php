@extends('master.master')

@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<!--
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/select.dataTables.min.css') }}" />
	<script src="{{ URL::asset('/robust-assets/js/components/extensions/fullcalendar.js') }}" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Resident
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')
	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(RESIDENT_APPLICATION);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Resident </h2>
		<p class="text-muted mb-0">All transactions regarding resident</p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaction</li>
		<li class="breadcrumb-item"><a href="#">Resident</a></li>
	</ol>
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">

				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Person Management</h4>
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
								<button type="button" class="btn btn-outline-info btn-lg"   style="width:130px; font-size:13px" id="btnAddModal">
									<i class="icon-edit2"></i> REGISTER<br />PERSON  
								</button>
							</p>
						</div>
						<div class="card-body">
							<div class="card-block">
								<ul class="nav nav-tabs nav-justified nav-top-border no-hover-bg nav-justified">
									<li class="nav-item">
										<a class="nav-link active" id="active-tab3" data-toggle="tab" href="#all" aria-controls="active3" aria-expanded="true">All Person</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="link-tab3" data-toggle="tab" href="#resident" aria-controls="link3" aria-expanded="false">Residents</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="lin-tab3" data-toggle="tab" href="#outsider" aria-controls="linkOpt3">Outsiders</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="linkOpt-tab3" data-toggle="tab" href="#family" aria-controls="linkOpt3">Families
										</a>
									</li>
								</ul>
								<div class="tab-content px-1 pt-1">
									<div role="tabpanel" class="tab-pane fade active in" id="all" aria-labelledby="active-tab3" aria-expanded="true">
										<table class="table table-striped table-bordered table-fixed-column order-column dataex-column-visibility" style="font-size:14px;width:100%;" id="table-container">
											<thead>
												<tr>
													<th>Person ID</th>
													<th>Person Name</th>
													<th>Contact #</th>
													<th>Gender</th>
													<th>Resident</th>
													<th>Actions</th>
												</tr>
											</thead>

											<tbody>
												<tr>

												</tr>
											</tbody>
										</table>
									</div>

									<div class="tab-pane fade" id="resident" role="tabpanel" aria-labelledby="link-tab3" aria-expanded="false">
										<table class="table table-striped table-bordered order-column dataex-column-visibility" style="font-size:14px;width:100%;" id="table-Resident">
											<thead>
												<tr>
													<th>Resident ID</th>
													<th>Resident Name</th>
													<th>Contact #</th>
													<th>Address</th>
													<th>Resident Type</th>
													<th>Actions</th>
												</tr>
											</thead>

											<tbody>
												
											</tbody>
										</table>
									</div>

									<div class="tab-pane fade" id="outsider" role="tabpanel" aria-labelledby="lin-tab3" aria-expanded="false">
										<table class="table table-striped table-bordered order-column dataex-column-visibility" style="font-size:14px;width:100%;" id="table-Outside">
											<thead>
												<tr>
													<th>Person ID</th>
													<th>Person Name</th>
													<th>Contact #</th>
													<th>Address</th>
													<th>Actions</th>
												</tr>
											</thead>

											<tbody>
												
											</tbody>
										</table>
									</div>

									<div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="linkOpt-tab3" aria-expanded="false">
										<table class="table table-striped table-bordered order-column dataex-column-visibility" style="font-size:14px;width:100%;" id="table-Outside">
											<thead>
												<tr>
													<th>Family ID</th>
													<th>Family Name</th>
													<th>Family Head</th>
													<th>Family Size</th>
													<th>Actions</th>
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
				</div>
			</div>
		</div>

							<!-- Modal -->
								<div class="modal fade text-xl-left" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-xl modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> @yield('modal-card-title')</h4>
											</div>
											<div ng-app="maintenanceApp" class="modal-body">
												<div class="card-block">
													<div class="card-text">
														
													</div>
													@yield('modal-controller')
													
													
																<h4>Resident Registration</h4>
																
															</div>

															<div class="card-body collapse in">
																<div class="card-block">
																		{!!Form::open(['url'=>'', 'method' => 'POST', 'id' => 'frm-add', 'class'=>'number-tab-steps wizard-notification'])!!}

																		{{ csrf_field() }}

																		<h6>Name</h6>
																		<fieldset>
																			<div class="row">
																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="firstName1">First Name :</label>
																						<input type="text" class="form-control" id="firstName" />
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="firstName1">Middle Name :</label>
																						<input type="text" class="form-control" id="middleName" />
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="firstName1">Last Name :</label>
																						<input type="text" class="form-control" id="lastName" />
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="firstName1">Suffix :</label>
																						<input type="text" class="form-control" id="suffix" />
																					</div>
																				</div>
																			</div>

																			<div class="row">
																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="emailAddress1">Gender : </label>
																						<select name="gender" id="gender" class="form-control">
																							<option value="male">MALE</option>
																							<option value="female">FEMALE</option>
																						</select>
																					</div>
																				</div>
																			</div>
																		</fieldset>

																		<h6>Additional Vital Info</h6>
																		<fieldset>
																			<div class="row">
																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="emailAddress1">Birth Date : </label>
																						<input type="date" class="form-control" id="birthDate" />
																					</div>
																				</div>
																			</div>

																			<div class="row">
																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="emailAddress1">Civil Status : </label>
																						<select class="form-control">
																							<option>Married</option>
																							<option>Single</option>
																							<option>Widowed</option>
																							<option>Divorced</option>
																						</select>
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="emailAddress1">Senior Citizen ID : </label>
																						<input type="text" class="form-control" id="firstName1" />
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="emailAddress1">Disabilities : </label>
																						<input type="textarea" class="form-control" id="firstName1" />
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="emailAddress1">Contact Number : </label>
																						<input type="text" class="form-control" id="contactNumber" />
																					</div>
																				</div>
																			</div>

																			<div class="row">
																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="emailAddress1">Resident Type : </label>
																						<select class="form-control">
																							<option>Transient Resident</option>
																							<option>Official Resident</option>
																						</select>
																					</div>
																				</div>
																			</div>
																		</fieldset>

																		<h6>Address</h6>
																		<fieldset>
																			<div class="row">
																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="address">Province : </label>
																						<input type="text" class="form-control" id="firstName1" />
																					</div>
																				</div>
																				
																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="address">Municipality : </label>
																						<input type="text" class="form-control" id="firstName1" />
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="address">City : </label>
																						<input type="text" class="form-control" id="firstName1" />
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="address">Barangay : </label>
																						{{ Form::select('barangayID', $barangays, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="address">Street : </label>
																						{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="address">Lot : </label>
																						{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="address">House : </label>
																						{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="address">Unit : </label>
																						{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
																					</div>
																				</div>
																			</div>
																		</fieldset>

																		<h6>Resident Background</h6>
																		<fieldset>
																			<div class="row">
																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="address">Current Work : </label>
																						<input type="text" class="form-control" id="work" />
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="form-group">
																						<label for="address">Monthly Salary: </label>
																						<select class="form-control">
																							<option value ="1">₱0-₱10,000</option>
																							<option value="2">₱10,001-₱50,000</option>
																							<option value="3">₱50,001-₱100,000</option>
																							<option value="4">₱100,001 and above</option>
																						</select>
																					</div>
																				</div>
																			</div>
																		</fieldset>

																		<h6>Summary</h6>
																		<fieldset>
																			
																		</fieldset>
																	{!!Form::close()!!}

																
												</div>
													<!-- -->
							

													<div class="form-actions center">
														<input type="submit" class="btn btn-success" value="Register" name="btnAdd">
														<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel
													</div>					
													@yield('inside-modal-controller')								
												</div>
											</div>

											

											<!-- End of Modal Body -->

										</div>
									</div>
								</div> 
								<!-- End of Modal -->
	</section>
	<script>
		$("#btnAddModal").on('click', function() {
			$("#iconModal").modal('show');
		});
	</script>
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/buttons.colVis.min.js') }}" type="text/javascript"></script>
	
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>

    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/fullcalendar.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.select.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-level-js')
	<script src="{{URL::asset('/robust-assets/js/components/tables/datatables-extensions/datatable-fixed-column.js') }}" type="text/javascript"></script>
	
@endsection


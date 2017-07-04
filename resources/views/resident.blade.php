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
						<h4 class="card-title">Current Resident</h4>
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
								<button type="button" class="btn btn-outline-info btn-lg"   style="width:130px; font-size:13px" id="btnAddModal">
									<i class="icon-edit2"></i> REGISTER<br>RESIDENT  
								</button>
							</p>
						</div>
					</div>

					<table class="table table-striped table-bordered datacol-column-filtering" id="table-container">
                    	<thead>
                    		<tr>
								<th>Resident ID</th>
								<th>Resident Name</th>
								<th>Contact #</th>
								<th>Gender</th>
								<th>Civil Status</th>
								<th>Resident Type</th>
								<th>Actions</th>
							</tr>
                    	</thead>

	                	<tbody>
	                		<tr>
	                			<td>001</td>
	                			<td>Calipay, Rowel Tenacio</td>
	                			<td>09235618634</td>
	                			<td>MALE</td>
	                			<td>Married</td>
	                			<td>Permanent Resident</td>
	                			<td>
	                				<button class='btn btn-icon btn-round btn-success normal'  type='button'>Edit</button>
             						<button class='btn btn-icon btn-round btn-info normal'  type='button'>Add family</button>
	                			</td>
	                		</tr>

	                		<tr>
	                			<td>002</td>
	                			<td>Renato, Jenny Tagum</td>
	                			<td>09134426789</td>
	                			<td>FEMALE</td>
	                			<td>Single</td>
	                			<td>Transient Resident</td>
	                			<td>
	                				<button class='btn btn-icon btn-round btn-success normal'  type='button'></i>Edit</button>
             						<button class='btn btn-icon btn-round btn-info normal'  type='button'>Add family</button>
	                			</td>
	                		</tr>
	                	</tbody>
	                </table>
				</div>

				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Current Family</h4>
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
						</div>
					</div>

					<table class="table table-striped table-bordered datacol-column-filtering" id="table-container">
                    	<thead>
                    		<tr>
								<tg>Family ID</th>
								<th>Family Name</th>
								<th>Members</th>
								<th>Head</th>
								<th>Actions</th>
							</tr>
                    	</thead>

	                	<tbody>
	                		<tr>
	                			<td>FAM-03</td>
	                			<td>Calipay</td>
	                			<td>5</td>
	                			<td>Calipay, Rowel Tenacio</td>
	                			<td>
	                				<button class='btn btn-icon btn-round btn-success normal'  type='button'></i>Edit</button>
	                				<button class='btn btn-icon btn-round btn-danger normal'  type='button'>Delete</button>
	                			</td>
	                		</tr>

	                		<tr>
	                			<td>FAM-06</td>
	                			<td>Renato</td>
	                			<td>15</td>
	                			<td>Renato, Jenny Tagum</td>
	                			<td>
	                				<button class='btn btn-icon btn-round btn-success normal'  type='button'></i>Edit</button>
	                				<button class='btn btn-icon btn-round btn-danger normal'  type='button'>Delete</button>
	                			</td>
	                		</tr>
	                	</tbody>
	                </table>
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
	<<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/spinner/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/validation/form-validation.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
	
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables-extensions/datatables-colreorder.js') }}" type="text/javascript"></script>
	
@endsection


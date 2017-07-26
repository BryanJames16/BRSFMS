@extends('master.master')

@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/jquery-jvectormap-2.0.3.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/unslider.css') }}" />
	
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}" />	
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/icomoon.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />

	

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />

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
	<li class="breadcrumb-item">
		<a href="#">Resident</a>
	</li>
</ol>
@endsection

@section('content-body')
	
	

	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Resident</h4>
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
								<button type="button" class="btn btn-outline-info btn-lg" data-toggle="modal" data-target="#addModal" style="width:160px; font-size:13px">
									<i class="icon-edit2"></i>Register  
								</button>
								
							</p>	
						</div>

						<!-- TAB COMPONENT -->

						<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
							<li class="nav-item">
								<a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#tab11" aria-expanded="false">Resident</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12" href="#tab12" aria-expanded="true">Family</a>
							</li>
						</ul>
						
						<!-- END OF TAB COMPONENT -->

						<!-- CONTENT -->

						<div class="tab-content px-1 pt-1">
							<div role="tabpanel" class="tab-pane fade active in" id="tab11" aria-labelledby="active-tab32" aria-expanded="true">

								<!-- Resident Tab -->

									<table class="table table-striped table-bordered multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-container">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Birthdate</th>
												<th>Gender</th>
												<th>Type</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>

										<tbody>
											@foreach($residents as $resident)
												<tr>
													<td>{{ $resident -> residentID }}</td>
													<td>{{ $resident -> firstName }} {{ $resident -> middleName }} {{ $resident -> lastName }}</td>
													<td>{{ $resident -> birthDate }}</td>

													@if ($resident -> gender == 'M')
														<td>Male</td>
													@else
														<td>Female</td>
													@endif
													
													<td>{{ $resident -> residentType }} Resident</td>
													
													@if ($resident -> status == 1)
														<td>Active</td>
													@else
														<td>Inactive</td>
													@endif
													
													<td>
														
														{{Form::open(['url'=>'resident/delete', 'method' => 'POST', 'id' => $resident -> residentPrimeID ])}}

															{{Form::hidden('residentPrimeID',$resident->residentPrimeID,['id'=>'residentPrimeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])}}
															<input type='hidden' name='residentID' value='{{ $resident -> residentID }}' />
															<input type='hidden' name='firstName' value='{{ $resident -> firstName }}' />
															<input type='hidden' name='lastName' value='{{ $resident -> lastName }}' />
															<input type='hidden' name='middleName' value='{{ $resident -> middleName }}' />
															<input type='hidden' name='gender' value='{{ $resident -> gender }}' />
															<input type='hidden' name='civilStatus' value='{{ $resident -> civilStatus }}' />
															<input type='hidden' name='birthDate' value='{{ $resident -> birthDate }}' />
															<input type='hidden' name='suffix' value='{{ $resident -> suffix }}' />
															<input type='hidden' name='contactNumber' value='{{ $resident -> contactNumber }}' />
															<input type='hidden' name='seniorCitizenID' value='{{ $resident -> seniorCitizenID }}' />
															<input type='hidden' name='disabilities' value='{{ $resident -> disabilities }}' />
															<input type='hidden' name='residentType' value='{{ $resident -> residentType }}' />
															<input type='hidden' name='status' value='{{ $resident -> status }}' />
															
															<button class='btn btn-icon btn-square btn-info normal view'  type='button' value='{{ $resident -> residentPrimeID }}'><i class="icon-eye6"></i></button>
															<button class='btn btn-icon btn-square btn-success normal edit'  type='button' value='{{ $resident -> residentPrimeID }}'><i class="icon-android-create"></i></button>
															<button class='btn btn-icon btn-square btn-danger delete' value='{{ $resident -> residentPrimeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
															
														{{Form::close()}}
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								<!-- End of Resident Tab -->

							</div>
							<div class="tab-pane fade" id="tab12" role="tabpanel" aria-labelledby="link-tab32" aria-expanded="false">

								<!-- Family Tab -->

								<!-- End of Family Tab -->

							</div>
						</div>


						<!-- END OF CONTENT -->


					</div>
				</div>
		
										
										<!--REGISTER RESIDENT -->

										<!--Add Modal -->
								<div class="modal fade text-xs-left" id="addModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>Register Resident</h4>
											</div>

											<!-- START MODAL BODY -->
											<div class="modal-body">
												

												{{Form::open(['url'=>'resident/store', 'method' => 'POST', 'id' => 'frm-add', 'class'=>'form'])}}

													

													<div class="form-body">
														<h4 class="form-section"><i class="icon-eye6"></i> Name </h4>
														<div class="row">
															<div class="form-group col-md-6 mb-2">
																<label for="userinput1">Fist Name</label>
																<input type="text" id="userinput1" class="form-control border-primary" placeholder="Marc Joseph" name="firstName" />
															</div>
															<div class="form-group col-md-6 mb-2">
																<label for="userinput2">Middle Name</label>
																<input type="text" id="userinput2" class="form-control border-primary" placeholder="Mendoza" name="middleName" />
															</div>
														</div>
														<div class="row">
															<div class="form-group col-md-6 mb-2">
																<label for="userinput3">Last Name</label>
																<input type="text" id="userinput3" class="form-control border-primary" placeholder="Fuellas" name="lastName" />
															</div>
															<div class="form-group col-md-6 mb-2">
																<label for="userinput4">Suffix</label>
																<input type="text" id="userinput4" class="form-control border-primary" placeholder="ex. Sr." name="suffix" />
															</div>
														</div>
														<div class="row">
															<div class="form-group col-md-6 mb-2">
																<label for="userinput3">Gender</label>
																<select name="gender" id="gender" class="form-control">
																	<option value="male">MALE</option>
																	<option value="female">FEMALE</option>
																</select>
															</div>
														</div>

														<h4 class="form-section"><i class="icon-eye6"></i> Additional Vital Info</h4>
														<div class="row">
															<div class="form-group col-md-6 mb-2">
																<label for="userinput1">Birth Date</label>
																<input type="date" class="form-control" id="birthDate" />
															</div>
															<div class="form-group col-md-6 mb-2">
																<label for="userinput2">Civil Status</label>
																<select name="civilStatus" id="civilStatus" class="form-control">
																	<option>Married</option>
																	<option>Single</option>
																	<option>Widowed</option>
																	<option>Divorced</option>
																</select>
															</div>
														</div>
														<div class="row">
															<div class="form-group col-md-6 mb-2">
																<label for="userinput3">Senior Citizen ID</label>
																<input type="text" id="userinput3" class="form-control border-primary" placeholder="" name="seniorCitizenID" />
															</div>
															<div class="form-group col-md-6 mb-2">
																<label for="userinput4">Disabilities</label>
																<input type="text" id="userinput4" class="form-control border-primary" placeholder="ex. HIV" name="disabilities" />
															</div>
														</div>
														<div class="row">
															<div class="form-group col-md-6 mb-2">
																<label for="userinput3">Contact Number</label>
																<input type="text" id="userinput3" class="form-control border-primary" placeholder="09123456789" name="contactNumber" />
															</div>
															<div class="form-group col-md-6 mb-2">
																<label for="userinput4">Resident Type</label>
																<select name="residentType" class="form-control">
																	<option value="Transient">Transient Resident</option>
																	<option value="Official">Official Resident</option>
																</select>
															</div>
														</div>

														<h4 class="form-section"><i class="icon-mail6"></i> Address </h4>
														<div class="row">
															<div class="form-group col-md-6 mb-2">
																<label for="userinput3">Street</label>
																{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
															</div>
															<div class="form-group col-md-6 mb-2">
																<label for="userinput4">Lot</label>
																{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
															</div>
														</div>
														<div class="row">
															<div class="form-group col-md-6 mb-2">
																<label for="userinput3">House</label>
																{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
															</div>
															<div class="form-group col-md-6 mb-2">
																<label for="userinput4">Unit</label>
																{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
															</div>
														</div>

														<h4 class="form-section"><i class="icon-mail6"></i> Resident Background</h4>
														<div class="row">
															<div class="form-group col-xs-12 mb-2">
																<label for="userinput5">Current Work</label>
																<input class="form-control border-primary" type="text" id="userinput5" />
															</div>
														</div>
														<div class="row">
															<div class="form-group col-xs-12 mb-2">
																<label for="userinput6">Monthly Salary</label>
																<select class="form-control">
																	<option value ="1">₱0-₱10,000</option>
																	<option value="2">₱10,001-₱50,000</option>
																	<option value="3">₱50,001-₱100,000</option>
																	<option value="4">₱100,001 and above</option>
																</select>
															</div>
														</div>


													<div class="form-actions right">
														<button type="button" class="btn btn-warning mr-1">
															<i class="icon-cross2"></i> Cancel
														</button>
														<button type="submit" class="btn btn-primary">
															<i class="icon-check2"></i> Save
														</button>
													</div>
												{{Form::close()}}

												<!--  WIZARD STEPS 
															{{Form::open(['url'=>'resident/store', 'method' => 'POST', 'id' => 'frm-add', 'class'=>'number-tab-steps wizard-notification'])}}

															

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
														{{Form::close()}}
													-->

											</div>

											<!-- End of Modal Body -->

										</div>
									</div>
								</div> <!-- End of Modal -->


								<!--View RESIDENT -->

										<!--Viiew Modal -->
								<div class="modal fade text-xs-left" id="viewModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>View Resident</h4>
											</div>

											<!-- START MODAL BODY -->
											<div class="modal-body">
												


												

											</div>

											<!-- End of Modal Body -->

										</div>
									</div>
								</div> <!-- End of Modal -->

								



										
				
			</div>
		</div>
	</section>
		<script>
			$("#btnAddModal").on('click', function() {
				$("#iconModal").modal('show');
			});
		</script>
	<script>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$("#frm-add").submit(function(event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/resident/store') }}", 
				method: "POST", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"residentID": $("#residentID").val(), 
					"lastName": $("#lastName").val(), 
					"middleName": $("#middleName").val(), 
					"firstName": $("#firstName").val(), 
					"suffix": $("#suffix").val(),
					"contactNumber": $("#contactNumber").val(),  
					"gender": $("#gender :selected").val(), 
					"birthDate": $("#birthDate").val(), 
					"civilStatus": $("#civilStatus").val(), 
					"seniorCitizenID": $("#seniorCitizenID").val(), 
					"disabilities": $("#disabilities").val(), 
					"residentType": $("#residentType :selected").text()
				}, 
				success: function(data) {
					console.log(data);
					$("#addModal").modal("hide");
					refreshTable();
					$("#frm-add").trigger("reset");
					swal("Success", "Successfully Added!", "success");
				}, 
				error: function(error) {
					var message = "Errors: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});
		});

		$(document).on('click', '.view', function(e) {
			var id = $(this).val();

			$.ajax({
				type: 'get',
				url: "{{ url('/resident/getEdit') }}", 
				data: {"residentPrimeID":id}, 
				success:function(data)
				{
					console.log(data);
					$('#viewModal').modal('show');
				}, 
				error: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch data!\n" + message, "error");
					console.log("Error: Cannot fetch data!\n" + message);
				}
			})

		});

		$(document).on('click', '.edit', function(e) {
			var id = $(this).val();

			$.ajax({
				type: 'get',
				url: "{{ url('/document/getEdit') }}", 
				data: {"residentPrimeID":id}, 
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find("#eDocumentID").val(data.documentID);
					frm.find('#eDocumentName').val(data.documentName);
					frm.find('#eDocumentDescription').val(data.documentDescription);
					frm.find('#eDocumentPrice').val(data.documentPrice);
					frm.find('#edDocumentType option:contains(' + data.documentType + ')').attr('selected', 'selected');
					frm.find('#ePrimeID').val(data.primeID);
					
					console.log("Data Status: " + data.status);

					if(data.status == 1) {
						$("#eActive").attr('checked', 'checked');
					}
					else {
						$("#eInactive").attr('checked', 'checked');
					}

					$('#modalEdit').modal('show');
				}, 
				error: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch data!\n" + message, "error");
					console.log("Error: Cannot fetch data!\n" + message);
				}
			})

		});

		$("#frm-update").submit(function(event) {
			event.preventDefault();

			var frm = $('#frm-update');

			console.log("Description is: " + $("#eDocumentDescription").val());

			$.ajax({
				url: "{{ url('/document/update') }}",
				type: "POST",
				data: {"primeID": $("#ePrimeID").val(), 
						"documentID": $("#eDocumentID").val(), 
						"documentName": $("#eDocumentName").val(), 
						"documentDescription": $("#eDocumentDescription").val(), 
						"documentType": $("#edDocumentType :selected").text(), 
						"documentPrice": $("#eDocumentPrice").val(), 
						"status": $(".eStatus:checked").val() 
				}, 
				success: function ( _response ){
					$("#modalEdit").modal('hide');
					
					refreshTable();
					
					swal("Successful", 
							"Service has been updated!", 
							"success");
				}, 
				error: function(error) {

					var message = "Errors: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});
		});

		$(document).on('click', '.delete', function(e) {

			var id = $(this).val();

			$.ajax({
					type: 'GET',
					url: "{{ url('/resident/getEdit') }}",
					data: {"residentPrimeID": id},
					success:function(data) {
						console.log(data);
						swal({
							title: "Are you sure you want to delete " + data.firstName + "?",
							text: "",
							type: "warning",
							showCancelButton: true,
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "DELETE",
							closeOnConfirm: false
							},
							function() {
								$.ajax({
									type: "post",
									url: "{{ url('/resident/delete') }}", 
									data: {residentPrimeID:id}, 
									success: function(data) {
										refreshTable();
										swal("Successfull", "Entry is deleted!", "success");
									}, 
									error: function(data) {
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
					}
			})
		});

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/resident/refresh') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-container").find("tr:gt(0)").remove();
					data = $.parseJSON(data);

					for (index in data) {
						var statusText = "";
						if (data[index].status == 1) {
							statusText = "Active";
						}
						else {
							statusText = "Inactive";
						}

						$("#table-container").append('<tr>' + 
									'<td>' + data[index].residentID + '</td>' + 
									'<td>' + data[index].firstName + data[index].middleName + data[index].lastName + '</td>' + 
									'<td>' + data[index].birthDate + '</td>' + 
									'<td>' + data[index].gender + '</td>' + 
									'<td>' + data[index].residentType + '</td>' + 
									'<td>' + statusText + '</td>' + 
									'<td>' + 
										'<form method="POST" id="' + data[index].residentPrimeID + '" action="/resident/delete" accept-charset="UTF-8"])' + 
											'<input type="hidden" name="residentPrimeID" value="' + data[index].residentPrimeID + '" />' + 
											'<button class="btn btn-icon btn-square btn-success normal edit"  type="button" value="' + data[index].residentPrimeID + '"><i class="icon-android-create"></i></button>' + 
											'<button class="btn btn-icon btn-square btn-danger delete" value="' + data[index].residentPrimeID + '" type="button" name="btnEdit"><i class="icon-android-delete"></i></button>' + 
										'</form>' + 
									'</td>' + 
								'</tr>'
						);
					}
				}, 
				error: function(data) {

					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
					console.log("Error: Cannot refresh table!\n" + message);
				}
			});
		};

	</script>
@endsection

@section('page-vendor-js')
		<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
		
		<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>

		<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.knob.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.steps.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/underscore-min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/unslider-min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/forms/spinner/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/daterange/daterangepicker.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/dateTime/moment-with-locales.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>

		<script src="{{ URL::asset('/robust-assets/js/components/forms/validation/form-validation.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/components/forms/wizard-steps.js') }}" type="text/javascript"></script>
		

		
@endsection

@section('page-level-js')
		<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
@endsection


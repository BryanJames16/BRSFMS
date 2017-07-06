@extends('master.master')

@section('vendor-plugin')
	
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
<!--
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" /><link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
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
						<h4 class="card-title">Resident Registration</h4>
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
						<div class="card-body">
							<div class="card-block">
								<ul class="nav nav-tabs nav-linetriangle no-hover-bg nav-justified">
									<li class="nav-item">
										<a class="nav-link active" id="active-tab3" data-toggle="tab" href="#all" aria-controls="active3" aria-expanded="true">All</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="link-tab3" data-toggle="tab" href="#pending" aria-controls="link3" aria-expanded="false">Resident</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="lin-tab3" data-toggle="tab" href="#rescheduled" aria-controls="linkOpt3">Outsider</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="linkOpt-tab3" data-toggle="tab" href="#cancelled" aria-controls="linkOpt3">Family</a>
									</li>
								</ul>
								<div class="tab-content px-1 pt-1">
									<div role="tabpanel" class="tab-pane fade active in" id="all" aria-labelledby="active-tab3" aria-expanded="true">


												<table class="table table-striped table-bordered table-fixed-column order-column dataex-column-visibility" style="font-size:14px;width:100%;" id="table-container">

												<thead>
													<tr>
														<th>Name</th>
														<th>Reserved Facility</th>
														<th>Reserved By</th>
														<th>Date and Time</th>
														<th>Status</th>
														<th>Actions</th>
													</tr>
												</thead>

												<tbody>

													

													
												</tbody>

											</table>

									</div>
									<div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="link-tab3" aria-expanded="false">
										<table class="table table-striped table-bordered table-fixed-column order-column dataex-column-visibility" style="font-size:14px;width:100%;" id="table-container">
											<thead>
												<tr>
													<th>Name</th>
													<th>Reserved Facility</th>
													<th>Reserved By</th>
													<th>Date and Time</th>
													<th>Status</th>
													<th>Actions</th>
												</tr>
											</thead>	
											<tbody>

												

											
											</tbody>
										</table>

									</div>
									<div class="tab-pane fade" id="rescheduled" role="tabpanel" aria-labelledby="dropdownOpt1-tab3" aria-expanded="false">
										<table class="table table-striped table-bordered table-fixed-column order-column dataex-column-visibility" style="font-size:14px;width:100%;" id="table-container">
											<thead>
												<tr>
													<th>Name</th>
													<th>Reserved Facility</th>
													<th>Reserved By</th>
													<th>Date and Time</th>
													<th>Status</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
										</table>
									</div>
									<div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="linkOpt-tab3" aria-expanded="false">
										<table class="table table-striped table-bordered table-fixed-column order-column dataex-column-visibility" style="font-size:14px;width:100%;" id="table-container">
											<thead>
												<tr>
													<th>Name</th>
													<th>Reserved Facility</th>
													<th>Reserved By</th>
													<th>Date</th>
													<th>Status</th>
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

		<script>
			$(document).on('click', '.edit', function(e) {
				var id = $(this).val();

				$.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
				});

				$.ajax({
					type: 'get',
					url: "{{ url('/facility-reservation/getEdit') }}",
					data: {primeID:id},
					success:function(data)
					{
						console.log(data);
						var frm = $('#frm-update');
						frm.find('#name').val(data.reservationName);
						frm.find('#desc').val(data.reservationDescription);
						frm.find('#facilityPrimeID').val(data.facilityPrimeID);
						frm.find('#primeID').val(data.primeID);
						frm.find('#peoplePrimeID').val(data.peoplePrimeID);
						frm.find('#date').val(data.dateReserved);
						frm.find('#startTime').val(data.reservationStart);
						frm.find('#endTime').val(data.reservationEnd);
						
						
						$('#rescheduleModal').modal('show');
						
					}
				})

			});

		</script>

		<script>
			$(document).on('click', '.view', function(e) {
				var id = $(this).val();

				$.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
				});

				$.ajax({
					type: 'get',
					url: "{{ url('/facility-reservation/getEdit') }}",
					data: {primeID:id},
					success:function(data)
					{
						console.log(data);
						var frm = $('#frm-update');
						frm.find('#name').val(data.reservationName);
						frm.find('#desc').val(data.reservationDescription);
						frm.find('#facilityPrimeID').val(data.facilityPrimeID);
						frm.find('#primeID').val(data.primeID);
						frm.find('#peoplePrimeID').val(data.peoplePrimeID);
						frm.find('#date').val(data.dateReserved);
						frm.find('#startTime').val(data.reservationStart);
						frm.find('#endTime').val(data.reservationEnd);
						
						
						$('#viewModal').modal('show');
						
					}
				})

			});

		</script>

		<script>

			$(document).on('click', '.delete', function(e) {
				var id = $(this).val();
				type: 'get',
				url: "{{ url('facility-reservation/getEdit') }}",
				data: {primeID:id},
				success:function(data)
				{
					console.log(data);
					swal({
						  title: "Are you sure you want to cancel " + data.reservationName + "?",
						  text: "",
						  type: "warning",
						  showCancelButton: true,
						  confirmButtonColor: "#DD6B55",
						  confirmButtonText: "DELETE",
						  closeOnConfirm: false
						},
						function(){

						  swal("Successfull", data.reservationName + " is cancelled!", "success");
						  
						  document.getElementById(data.primeID).submit();
						});				
				}
			});
		</script>
										<!-- Reschedule Modal -->
								<div class="modal fade text-xs-left" id="rescheduleModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>Reschedule</h4>
											</div>
											<div class="modal-body">
												<div class="card-block">
													{!!Form::open(['url'=>'/facility-reservation/update', 'method' => 'POST','id'=>'frm-update'])!!}
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Reservation Name :</label>
																		{!!Form::hidden('primeID',null,['id'=>'primeID','class'=>'form-control'])!!}
																		{!!Form::text('name',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5'])!!}
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Reservee :</label>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Facility :</label>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Reservation Description :</label>
																		{!!Form::textarea('desc',null,['id'=>'desc','class'=>'form-control', 'placeholder'=>'eg.Jun Jun 15th Birthday Party', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}

																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Date :</label>
																		<div class='input-group'>
																				{!!Form::date('date',null,['id'=>'date','class'=>'form-control'])!!}	
																		</div>
																	</div>
																</div>

															</div>

															<div class="row">
																
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Start Time :</label>
																				{!!Form::time('startTime',null,['id'=>'startTime','class'=>'form-control'])!!}
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">End Time :</label>
																				{!!Form::time('endTime',null,['id'=>'endTime','class'=>'form-control'])!!}
																	</div>
																</div>
															</div>
													<div class="form-actions center">

															<button type="submit" class="btn btn-success mr-1">Reschedule</button>
															<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>
														
													</div>
													{!!Form::close()!!}													
												</div>
											</div>

											<!-- End of Modal Body -->

										</div>
									</div>
								</div> <!-- End of Modal -->



										

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
											<div class="modal-body">
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
												</div>
											</div>

											<!-- End of Modal Body -->

										</div>
									</div>
								</div> <!-- End of Modal -->




										<!-- VIEW MODAL -->

							<!-- Modal -->
								<div class="modal fade text-xs-left" id="viewModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>View Details</h4>
											</div>
											<div class="modal-body">
												{!!Form::open(['url'=>'/facility-reservation/update', 'method' => 'POST','id'=>'frm-update'])!!}
														
														<fieldset>
															<div class="row">

																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Reservation Name :</label>
																		{!!Form::hidden('primeID',null,['id'=>'primeID','class'=>'form-control'])!!}
																		{!!Form::text('name',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5'])!!}
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Reservee :</label>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Facility :</label>
																	</div>
																</div>
															</div>

															<div class="row">
																

																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Reservation Description :</label>
																		{!!Form::textarea('desc',null,['id'=>'desc','class'=>'form-control', 'placeholder'=>'eg.Jun Jun 15th Birthday Party', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}

																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Date :</label>
																		<div class='input-group'>
																				{!!Form::date('date',null,['id'=>'date','class'=>'form-control'])!!}	
																		</div>
																	</div>
																</div>

															</div>

															<div class="row">
																
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Start Time :</label>
																				{!!Form::time('startTime',null,['id'=>'startTime','class'=>'form-control'])!!}
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">End Time :</label>
																				{!!Form::time('endTime',null,['id'=>'endTime','class'=>'form-control'])!!}
																	</div>
																</div>
															</div>
														</fieldset>
														
												

													<div class="form-actions center">

															<button type="submit" class="btn btn-success mr-1">Reschedule</button>
															<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>
														
													</div>
													{!!Form::close()!!}
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
		<script src="{{ URL::asset('/robust-assets/js/components/forms/wizard-steps.js') }}" type="text/javascript"></script>
@endsection


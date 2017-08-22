@extends('master.master')

@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/toggle/bootstrap-switch.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/toggle/switchery.min.css') }}" />
	
@endsection

@section('plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/icomoon.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/selects/select2.min.css') }}" />	
@endsection

@section('vendor-style')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/calendars/fullcalendar.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Service Transaction
@endsection

@section('content-body')

	

	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					
					<div class="card-header">
						<h4 class="card-title">Service Transaction</h4>
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
								<button type="button" class="btn btn-outline-info btn-lg btnRegister" id="btnRegister" style="width:160px; font-size:13px">
									<i class="icon-edit2"></i>Register Service  
								</button>
							</p>	
						</div>
							<!-- SERVICE TRANSACTIONS TABLE -->
							<table class="table table-striped table-bordered multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-container">
								<thead>
									<tr>
										<th>Name</th>
										<th>Service</th>
										<th>Date</th>
										<th>Age Bracket</th>
										<th>Participants</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
								</thead>

								<tbody>
									@foreach($servicetransactions as $st)
										<tr>
											<td>{{$st->serviceTransactionName}}</td>
											<td>{{$st->serviceName}}</td>
											
											<td>{{ date('F j, Y',strtotime($st -> fromDate)) }} - {{ date('F j, Y',strtotime($st -> toDate)) }}</td>
											<td>{{$st->fromAge}} - {{$st->toAge}} yrs. old</td>
											<td>0</td>
											<td>{{$st->status}}</td>
											<td>
												<span class="dropdown">
													<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
													<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
														<a href="#" class="dropdown-item view" name="btnAdd" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-eye6"></i> View Participants</a>
														<a href="#" class="dropdown-item add" name="btnAdd" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-eye6"></i> Add Participants</a>
														<a href="#" class="dropdown-item edit" name="btnEdit" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-pen3"></i> Edit</a>
														<a href="#" class="dropdown-item delete" name="btnDelete" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-trash4"></i> Delete</a>
													</span>
												</span>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							<!-- End of SERVICE TRANSACTIONS TABLE -->
						</div>
					</div>
				</div>							
			</div>
		</div>
	</section>


	<!--REGISTER SERVICE Modal -->
		<div class="modal fade text-xs-left" id="register" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>Service Registration</h4>
					</div>

					<!-- START MODAL BODY -->
					<div class="modal-body" width='100%'>
						
						<div class="form-body">
							{{Form::open(['url'=>'service-transaction/store', 'method' => 'POST', 'id' => 'frm-register', 'class'=>'form'])}}
							<h4 class="form-section"><i class="icon-eye6"></i> Name </h4>
							<div class="row">
								<div class="form-group col-md-6 mb-2">
									<label for="userinput1">ID</label>
									{!! Form::text('serviceTransactionID', null, ['id' => 'serviceTransactionID',
																		'class' => 'form-control border-primary',
																		'readonly',
																			'placeholder'=> 'SER_001']) !!}
								</div>
								<div class="form-group col-md-6 mb-2">
									<label for="userinput2">Service</label>
									<select name="servicePrimeID" id="servicePrimeID" class="form-control">
										@foreach($services as $service)
											<option value= {{$service -> primeID}}>{{$service -> serviceName}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-xs-12 mb-2">
									<label for="userinput5">Name</label>
									<input class="form-control border-primary" name="serviceName" id="serviceName" type="text" id="userinput5" />
								</div>
							</div>
							
							<h4 class="form-section"><i class="icon-mail6"></i> Date</h4> 
							<div class="form-group ">
								<input type="checkbox" id="switchDate" class="switchery" data-size="sm" data-color="primary"  />
								<label for="switcheryColor" class="card-title ml-1">Date Range</label>
							</div>
							<div class="row">
								<div class="form-group col-md-6 mb-2">
									<label for="userinput4">From</label>
									{!! Form::date('fromDate', null, ['id' => 'fromDate','class' => 'form-control border-primary','disabled']) !!}
								</div>
								<div class="form-group col-md-6 mb-2">
									<label for="userinput4">To</label>
									{!! Form::date('toDate', null, ['id' => 'toDate','class' => 'form-control border-primary','disabled']) !!}
								</div>
							</div>

							<h4 class="form-section"><i class="icon-mail6"></i>Age Bracket</h4>
							<div class="form-group ">
								<input type="checkbox" id="switchAge" class="switchery" data-size="sm" data-color="primary"/>
								<label for="switcheryColor" class="card-title ml-1">Age Range</label>
							</div>
							<div class="row">
								<div class="form-group col-md-6 mb-2">
									<label for="userinput4">From</label>
									{!! Form::number('fromAge', null, ['id' => 'fromAge','class' => 'form-control border-primary','disabled']) !!}
								</div>
								<div class="form-group col-md-6 mb-2">
									<label for="userinput4">To</label>
									{!! Form::number('toAge', null, ['id' => 'toAge','class' => 'form-control border-primary','disabled']) !!}
								</div>
							</div>
							

						
							<div class="form-actions center">
								<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
									<i class="icon-cross2"></i> Cancel
								</button>
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> Save
								</button>
							</div>
						</div>
						{{Form::close()}}
					</div>
					<!-- End of Modal Body -->

				</div>
			</div>
		</div> 
	<!-- End of Modal -->	

	<!--ADD PARTICIPANTS Modal -->
		<div class="modal fade text-xs-left" id="addParticipants" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>Add Participants</h4>
					</div>

					<!-- START MODAL BODY -->
					<div class="modal-body" width='100%'>
						<p style="text-align:center;font-size:20px"><b>RESIDENTS</b></p>
						<hr>
						<p style="text-align:center"<button type="button" class="btn btn-secondary btn-min-width btn-round mr-1 mb-1 viewPart2">View Participants</button></p>
						{{Form::open(['url'=>'service-transaction/addParticipant', 'method' => 'POST', 'id' => 'frm-addParticipant', 'class'=>'form'])}}
								{{Form::hidden('serviceTransactionPrimeID',null,['id'=>'aserviceTransactionPrimeID'])}}

						<table class="table table-striped table-bordered multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-resParticipants">
							<thead>
								<tr>
									<th>Name</th>
									<th>Birthdate</th>
									<th>Gender</th>
									<th>Contact Number</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>
							

								

							
							</tbody>
						</table>
						{{Form::close()}}
					</div>
					<!-- End of Modal Body -->

				</div>
			</div>
		</div> 
	<!-- End of Modal -->		

	<!--EDIT SERVICE Modal -->
		<div class="modal fade text-xs-left" id="editService" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>Edit Service</h4>
					</div>

					<!-- START MODAL BODY -->
					<div class="modal-body" width='100%'>
						
						<div class="form-body">
								{{Form::open(['url'=>'service-transaction/update', 'method' => 'POST', 'id' => 'frm-update', 'class'=>'form'])}}
									
									{!! Form::hidden('eserviceTransactionPrimeID', null, ['id' => 'eserviceTransactionPrimeID','class' => 'form-control border-primary', 'placeholder'=> 'RES_001']) !!}
								<h4 class="form-section"><i class="icon-eye6"></i> Name </h4>
								<div class="row">
									<div class="form-group col-md-6 mb-2">
										<label for="userinput1">ID</label>
										{!! Form::text('serviceTransactionID', null, ['id' => 'eserviceTransactionID',
																			'class' => 'form-control border-primary',
																			'readonly',
																				'placeholder'=> 'SER_001']) !!}
									</div>
									<div class="form-group col-md-6 mb-2">
										<label for="userinput2">Service</label>
										<select name="eservicePrimeID" id="eservicePrimeID" class="form-control">
											@foreach($services as $service)
												<option value= {{$service -> primeID}}>{{$service -> serviceName}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-xs-12 mb-2">
										<label for="userinput5">Name</label>
										<input class="form-control border-primary" name="eserviceName" id="eserviceName" type="text" id="userinput5" />
									</div>
								</div>

								<h4 class="form-section"><i class="icon-mail6"></i> Date</h4>
								<div class="row">
									<div class="form-group col-md-6 mb-2">
										<label for="userinput4">From</label>
										{!! Form::date('efromDate', null, ['id' => 'efromDate','class' => 'form-control border-primary']) !!}
									</div>
									<div class="form-group col-md-6 mb-2">
										<label for="userinput4">To</label>
										{!! Form::date('etoDate', null, ['id' => 'etoDate','class' => 'form-control border-primary']) !!}
									</div>
								</div>

								<h4 class="form-section"><i class="icon-mail6"></i>Age Bracket</h4>
								<div class="row">
									<div class="form-group col-md-6 mb-2">
										<label for="userinput4">From</label>
										{!! Form::number('efromAge', null, ['id' => 'efromAge','class' => 'form-control border-primary']) !!}
									</div>
									<div class="form-group col-md-6 mb-2">
										<label for="userinput4">To</label>
										{!! Form::number('etoAge', null, ['id' => 'etoAge','class' => 'form-control border-primary']) !!}
									</div>
								</div>

							
								<div class="form-actions center">
									<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
										<i class="icon-cross2"></i> Cancel
									</button>
									<button type="submit" class="btn btn-primary">
										<i class="icon-check2"></i> Update
									</button>
								</div>
							{{Form::close()}}
						</div>
					</div>
					<!-- End of Modal Body -->

				</div>
			</div>
		</div> 
	<!-- End of Modal -->

	<!--VIEW PARTICIPANTS Modal -->
		<div class="modal fade text-xs-left" id="viewParticipants" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>View Participants</h4>
					</div>

					<!-- START MODAL BODY -->
					<div class="modal-body" width='100%'>
						<p style="text-align:center;font-size:20px"><b>PARTICIPANTS</b></p>
						<hr>
						<p style="text-align:center"<button type="button" class="btn btn-secondary btn-min-width btn-round mr-1 mb-1 addPart2">Add Participants</button></p>
						{{Form::open(['url'=>'service-transaction/addParticipant', 'method' => 'POST', 'id' => 'frm-viewParticipant', 'class'=>'form'])}}
								{{Form::hidden('serviceTransactionPrimeID',null,['id'=>'aaserviceTransactionPrimeID'])}}

						<table class="table table-striped table-bordered multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-viewParticipants">
							<thead>
								<tr>
									<th>Name</th>
									<th>Birthdate</th>
									<th>Gender</th>
									<th>Contact Number</th>
									<th>Disabilities</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>
							

								

							
							</tbody>
						</table>
						{{Form::close()}}
					</div>
					<!-- End of Modal Body -->

				</div>
			</div>
		</div> 
	<!-- End of Modal -->						


@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(SERVICE_REGISTRATION);
	</script>
@endsection

@section('vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.knob.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/underscore-min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/clndr.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/unslider-min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.steps.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/spinner/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-checkbox.min.js') }}" type="text/javascript"></script>
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
	<script src="{{ URL::asset('/robust-assets/js/components/forms/select/form-select2.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/extensions/long-press.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/jspdf.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/switch.js') }}" type="text/javascript"></script>

	<script type="text/javascript">

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		// ADD PARTICIPANTS ACTION

		$(document).on('click', '.add', function(e) {
			
			var id = $(this).data('value');
			console.log(id);

			var frm = $('#frm-addParticipant');
			
			frm.find('#aserviceTransactionPrimeID').val(id);
			participantRefresh();
			
			$("#addParticipants").modal('show');

		});

		$(document).on('click', '.addPart2', function(e) {
			
			var id = $("#aaserviceTransactionPrimeID").val()

			var frm = $('#frm-addParticipant');
			
			frm.find('#aserviceTransactionPrimeID').val(id);

			participantRefresh();
			
			$("#viewParticipants").modal('hide');
			setTimeout(function() {
			$("#addParticipants").modal('show');	
			},500);
			
			

		});

		$(document).on('click', '.viewPart2', function(e) {
			
			var id = $('#aserviceTransactionPrimeID').val();
			var frm = $('#frm-viewParticipant');
			
			frm.find('#aaserviceTransactionPrimeID').val(id);

			$.ajax({
				url: '/service-transaction/getParticipant/' + id, 
				method: "GET", 
				datatype: "json", 

				success: function(data) {
					$("#table-viewParticipants").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
						
						
						$("#table-viewParticipants").DataTable()
								.row.add([
									data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
									data[index].birthDate, 
									data[index].gender, 
									data[index].contactNumber,
									data[index].disabilities,
									'<button type="button" class="btn btn-danger deletePart" name="btnDelete" data-value="'+ data[index].residentPrimeID +'"><i class="icon-trash4"></i> Remove</a>'
								]).draw(false);
					}
					$("#addParticipants").modal('hide');
						setTimeout(function() {
						$("#viewParticipants").modal('show');	
						},500);

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

		// VIEW PARTICIPANTS ACTION

		$(document).on('click', '.view', function(e) {
			
			var id = $(this).data('value');

			var frm = $('#frm-viewParticipant');
			
			frm.find('#aaserviceTransactionPrimeID').val(id);

			$.ajax({
				url: '/service-transaction/getParticipant/' + id, 
				method: "GET", 
				datatype: "json", 

				success: function(data) {
					$("#table-viewParticipants").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
						
						
						$("#table-viewParticipants").DataTable()
								.row.add([
									data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
									data[index].birthDate, 
									data[index].gender, 
									data[index].contactNumber,
									data[index].disabilities,
									'<button type="button" class="btn btn-danger deletePart" name="btnDelete" data-value="'+ data[index].residentPrimeID +'"><i class="icon-trash4"></i> Remove</a>'
								]).draw(false);
					}
					$("#viewParticipants").modal('show');
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


		//  UPDATE SERVICE

		$("#frm-update").submit(function(event) {
			event.preventDefault();
			
			var frm = $('#frm-update');


			$.ajax({
				url: "{{ url('/service-transaction/update') }}",
				type: "POST",
				data: {	"_token": "{{ csrf_token() }}",
						"serviceTransactionPrimeID": $("#eserviceTransactionPrimeID").val(), 
						"serviceTransactionID": $("#eserviceTransactionID").val(), 
						"serviceName": $("#eserviceName").val(), 
						"servicePrimeID": $("#eservicePrimeID").val(),
						"fromAge": $("#efromAge").val(),
						"toAge": $("#etoAge").val(), 
						"fromDate": $("#efromDate").val(),
						"toDate": $("#etoDate").val(),

						
				}, 
				success: function ( _response ){
					$("#editService").modal('hide');
					
					
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

		//  END OF UPDATE SERVICE

		//  ADD PARTICIPANT SUBMIT 

		$(document).on('click', '.addPart', function(e) {
			
			var id = $(this).val();
			console.log(id);
			
			$.ajax({
				url: "{{ url('/service-transaction/addParticipant') }}", 
				method: "POST", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"serviceTransactionPrimeID": $("#aserviceTransactionPrimeID").val(), 
					"residentID": id
				}, 
				success: function(data) {
					participantRefresh();
					swal("Success", "Successfully Added participant!", "success");
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

		

		//  END OF ADD PARTICIPANT SUBMIT

		//  DELETE PARTICIPANT SUBMIT 

		$(document).on('click', '.deletePart', function(e) {
			
			var id = $(this).data('value');
			var serviceTransactionPrimeID = $("#aaserviceTransactionPrimeID").val()

			console.log(serviceTransactionPrimeID);
			
			$.ajax({
				url: "{{ url('/service-transaction/deletePart') }}", 
				method: "POST", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"residentID": id, 
					"serviceTransactionPrimeID": serviceTransactionPrimeID
				}, 
				success: function(data) {
					
					$.ajax({
					url: '/service-transaction/getParticipant/' + serviceTransactionPrimeID, 
					method: "GET", 
					datatype: "json", 

					success: function(data) {
						$("#table-viewParticipants").DataTable().clear().draw();
						data = $.parseJSON(data);

						for (index in data) {
							
							
							$("#table-viewParticipants").DataTable()
									.row.add([
										data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
										data[index].birthDate, 
										data[index].gender, 
										data[index].contactNumber,
										data[index].disabilities,
										'<button type="button" class="btn btn-danger deletePart" name="btnDelete" data-value="'+ data[index].residentPrimeID +'"><i class="icon-trash4"></i> Remove</a>'
									]).draw(false);
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
					swal("Success", "Successfully Deleted participant!", "success");
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

		

		//  END OF DELETE PARTICIPANT SUBMIT

		// EDIT SERVICE ACTION

		$(document).on('click', '.edit', function(e) {
			var id = $(this).data('value');
			$.ajax({
					type: 'GET',
					url: "{{ url('/service-transaction/getEdit') }}",
					data: {"serviceTransactionPrimeID": id},
					success:function(data) {
						data = $.parseJSON(data);
						

						for(index in data)
						{
							var frm = $('#frm-update');
							console.log(data[index].serviceTransactionName);
							frm.find('#eserviceTransactionID').val(data[index].serviceTransactionID);
							frm.find('#eserviceTransactionPrimeID').val(data[index].serviceTransactionPrimeID);
							frm.find('#eservicePrimeID').val(data[index].servicePrimeID);
							frm.find('#efromAge').val(data[index].fromAge);
							frm.find('#etoAge').val(data[index].toAge);
							frm.find('#efromDate').val(data[index].fromDate);
							frm.find('#etoDate').val(data[index].toDate);
							frm.find('#eserviceName').val(data[index].serviceTransactionName);
							
						}			
					}
			})
			$("#editService").modal('show');
		});
		// DELETE SERVICE ACTION

		$(document).on('click', '.delete', function(e) {
			var id = $(this).data('value');
			$.ajax({
					type: 'GET',
					url: "{{ url('/service-transaction/getEdit') }}",
					data: {"serviceTransactionPrimeID": id},
					success:function(data) {
						console.log(data);
						data = $.parseJSON(data);
						for(index in data)
						{
							swal({
								title: "Are you sure you want to delete " + data[index].serviceTransactionName + "?",
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
										url: "{{ url('/service-transaction/delete') }}", 
										data: {"_token": "{{ csrf_token() }}",
										serviceTransactionPrimeID:id}, 
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
					}
			})
		});
		//  REGISTER SERVICE BUTTON

		$("#btnRegister").on('click', function() {
			$("#register").modal('show');

			$.ajax({
				url: "{{ url('/service-transaction/nextPK') }}", 
				method: "GET", 
				success: function(data) {
					if (data == null) {
						console.log("Reponse is null!");
					}
					else {
						$("#serviceTransactionID").val(data);
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
		});

		//  REGISTER SERVICE BUTTON

		//  SUBMIT ADD RESIDENT

		$("#frm-register").submit(function(event) {
			event.preventDefault();
			console.log("dasa");

			$.ajax({
				url: "{{ url('/service-transaction/store') }}", 
				method: "POST", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"serviceTransactionID": $("#serviceTransactionID").val(), 
					"serviceName": $("#serviceName").val(), 
					"servicePrimeID": $("#servicePrimeID").val(), 
					"fromAge": $("#fromAge").val(), 
					"toAge": $("#toAge").val(),
					"fromDate": $("#fromDate").val(),
					"toDate": $("#toDate").val(),
					
				}, 
				success: function(data) {
					console.log(data);
					$("#register").modal("hide");
					refreshTable();
					$("#frm-register").trigger("reset");
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

		//  END OF SUBMIT ADD RESIDENT

		// DATE SWITCH

		$('#switchDate').change(function(){
			if(this.checked)
			{
				$('#fromDate').prop('disabled'.true);
			}
			else
			{
				console.log('popopopo');
			}
		});

		// END OF DATE SWITCH

		//  SERVICE TRANSACTION REFRESH TABLE

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/service-transaction/refresh') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-container").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
						

						$("#table-container").DataTable()
								.row.add([
									data[index].serviceTransactionName, 
									data[index].serviceName, 
									data[index].fromDate + ' - ' + data[index].toDate, 
									data[index].fromAge + ' - ' + data[index].toAge + ' yrs. old', 
									'12', 
									data[index].status,
										'<input type="hidden" name="residentPrimeID" value="' + data[index].residentPrimeID + '" />' +

											'<span class="dropdown">'+
												'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+
												'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
													'<a href="#" class="dropdown-item view" name="btnView" data-value="'+ data[index].serviceTransactionPrimeID +'"><i class="icon-eye6"></i> Add Participants</a>'+
													'<a href="#" class="dropdown-item edit" name="btnEdit" data-value="'+ data[index].serviceTransactionPrimeID +'"><i class="icon-pen3"></i> Edit</a>'+
													'<a href="#" class="dropdown-item delete" name="btnDelete" data-value="'+ data[index].serviceTransactionPrimeID +'"><i class="icon-trash4"></i> Delete</a>'+
												'</span>'+
											'</span>'
									
								]).draw(false);
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

		//END OF SERVICE TRANSACTION REFRESH TABLE

		//  RESIDENT PARTICIPAT REFRESH TABLE

		var participantRefresh = function() {

			var frm = $('#frm-addParticipant');
			var id;
			id = frm.find('#aserviceTransactionPrimeID').val();
			$.ajax({
				url: '/service-transaction/notParticipant/' + id, 
				method: "GET", 
				datatype: "json", 

				success: function(data) {
					$("#table-resParticipants").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
						
						$("#table-resParticipants").DataTable()
								.row.add([
									data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
									data[index].birthDate, 
									data[index].gender, 
									data[index].contactNumber,
									'<button class="btn btn-icon btn-round btn-success normal addPart"  type="button" value="' + data[index].residentPrimeID + '">Add</button>'
									
								]).draw(false);
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

		//END OF RESIDNET PARTICIPANT REFRESH TABLE



	
	</script>

	

@endsection
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
	
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/redBuilder.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/datatable.custom.red.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/main-card.css') }}" />
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
					
					<div class="card-header card-head-custom">
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
							<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-container">
								<thead class="thead-custom-bg-red">
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
											
											@if($st -> toDate==null)
												<td>{{ date('F j, Y',strtotime($st -> fromDate)) }}</td>
											@else
												<td>{{ date('F j, Y',strtotime($st -> fromDate)) }} - {{ date('F j, Y',strtotime($st -> toDate)) }}</td>
											@endif

											
											
											@if($st->fromAge==null)
												<td>Open</td>
											@else
												<td>{{$st->fromAge}} - {{$st->toAge}} yrs. old</td>
											@endif
											
											<td>{{ $st->number }}</td>

											@if($st->status=='Pending')
												<td><span class="tag round tag-default tag-info">Pending</span></td>
											@elseif($st->status=='On-going')
												<td><span class="tag round tag-default tag-warning">On-going</span></td>
											@else
												<td><span class="tag round tag-default tag-success">Finished</span></td>
											@endif
											<td>
												<span class="dropdown">
													<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
													<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
														
														@if($st->status=='Pending')
															<a href="#" class="dropdown-item start" name="btnAdd" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-eye6"></i> Start</a>
															<a href="#" class="dropdown-item view" name="btnAdd" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-eye6"></i> View Participants</a>
															<a href="#" class="dropdown-item add" name="btnAdd" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-eye6"></i> Add Participants</a>
															<a href="#" class="dropdown-item edit" name="btnEdit" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-pen3"></i> Edit</a>
															<a href="#" class="dropdown-item delete" name="btnDelete" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-trash4"></i> Delete</a>
														@elseif($st->status=='On-going')
															<a href="#" class="dropdown-item finish" name="btnAdd" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-eye6"></i> Finish</a>
															<a href="#" class="dropdown-item view" name="btnAdd" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-eye6"></i> View Participants</a>
															<a href="#" class="dropdown-item add" name="btnAdd" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-eye6"></i> Add Participants</a>
														@else
															<a href="#" class="dropdown-item view" name="btnAdd" data-value='{{ $st -> serviceTransactionPrimeID }}'><i class="icon-eye6"></i> View Participants</a>
														@endif
														
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
		<div class="modal animated bounceInDown text-xs-left" id="register" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header bg-info white">
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
								<input type="checkbox" id="switchDate" class="switchery" data-size="sm" data-color="primary" checked />
								<label for="switcheryColor" class="card-title ml-1">Date Range</label>
							</div>

							<div id="date">
								<div class="row">
									<div class="form-group col-md-6 mb-2">
										<label for="userinput4">From</label>
										{!! Form::date('fromDate', null, ['id' => 'fromDate','class' => 'form-control border-primary']) !!}
									</div>
									<div class="form-group col-md-6 mb-2">
										<label for="userinput4">To</label>
										{!! Form::date('toDate', null, ['id' => 'toDate','class' => 'form-control border-primary']) !!}
									</div>
								</div>
							</div>
							
							<h4 class="form-section"><i class="icon-mail6"></i>Age Bracket</h4>
							<div class="form-group ">
								<input type="checkbox" id="switchAge" class="switchery" data-size="sm" data-color="primary" checked/>
								<label for="switcheryColor" class="card-title ml-1">Age Range</label>
							</div>

							<div id="age">
								<div class="row">
									<div class="form-group col-md-6 mb-2">
										<label for="userinput4">From</label>
										{!! Form::number('fromAge', null, ['id' => 'fromAge','class' => 'form-control border-primary']) !!}
									</div>
									<div class="form-group col-md-6 mb-2">
										<label for="userinput4">To</label>
										{!! Form::number('toAge', null, ['id' => 'toAge','class' => 'form-control border-primary']) !!}
									</div>
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
		<div class="modal animated bounceInDown text-xs-left" id="addParticipants" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>Add Participants</h4>
					</div>

					<!-- START MODAL BODY -->
					<div class="modal-body" width='100%'>
						<p style="text-align:center;font-size:20px"><b>RESIDENTS</b></p>
						<hr>
						<div style="text-align:center">	
						<p style="text-align:center"<button type="button" class="btn btn-secondary btn-min-width btn-round mr-1 mb-1 viewPart2">View Participants</button></p>
						</div>
						{{Form::open(['url'=>'service-transaction/addParticipant', 'method' => 'POST', 'id' => 'frm-addParticipant', 'class'=>'form'])}}
								{{Form::hidden('serviceTransactionPrimeID',null,['id'=>'aserviceTransactionPrimeID'])}}

						<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-resParticipants">
							<thead class="thead-custom-bg-red">
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
		<div class="modal animated bounceInDown text-xs-left" id="editService" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header bg-info white">
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
								<div class="form-group ">
									<input type="checkbox" id="eswitchDate" class="switchery" data-size="sm" data-color="primary" checked />
									<label for="switcheryColor" class="card-title ml-1">Date Range</label>
								</div>

								<div id="edate">
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
								</div>	

								<h4 class="form-section"><i class="icon-mail6"></i>Age Bracket</h4>
								<div class="form-group ">
									<input type="checkbox" id="eswitchAge" class="switchery" data-size="sm" data-color="primary" checked/>
									<label for="switcheryColor" class="card-title ml-1">Age Range</label>
								</div>

								<div id="eage">
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
		<div class="modal animated bounceInDown text-xs-left" id="viewParticipants" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>View Participants</h4>
					</div>

					<!-- START MODAL BODY -->
					<div class="modal-body" width='100%'>
						<p style="text-align:center;font-size:20px"><b>PARTICIPANTS</b></p>
						<div id="recipients">

						</div>
						<hr>
						<div style="text-align:center">	
						<p style="text-align:center"<button type="button" class="btn btn-secondary btn-min-width btn-round mr-1 mb-1 addPart2">Add Participants</button></p>
						</div>
						{{Form::open(['url'=>'service-transaction/addParticipant', 'method' => 'POST', 'id' => 'frm-viewParticipant', 'class'=>'form'])}}
								{{Form::hidden('serviceTransactionPrimeID',null,['id'=>'aaserviceTransactionPrimeID'])}}

						<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-viewParticipants">
							<thead class="thead-custom-bg-red">
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

	<!--RECIPIENT  Modal -->
		<div class="modal animated bounceInDown text-xs-left" id="recipientModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>View Recipient</h4>
					</div>

					<!-- START MODAL BODY -->
					<div class="modal-body" width='100%'>
						<p style="text-align:center;font-size:20px"><b>Recipients</b></p>
						
						<div style="text-align:center">	
							<button type="button" class="btn btn-secondary btn-min-width btn-round mr-1 mb-1 back">Back to Participant</button>
							<button type="button" class="btn btn-secondary btn-min-width btn-round mr-1 mb-1 addRecip">Add Recipient</button>
						</div>
						
						<hr>
						<div id="reci">

						</div>
						<div id="serv">

						</div>
						
						{{Form::open(['url'=>'service-transaction/viewRecipient', 'method' => 'POST', 'id' => 'frm-viewRecipient', 'class'=>'form'])}}
								{{Form::hidden('serviceTransactionPrimeID',null,['id'=>'aaserviceTransactionPrimeID'])}}
								{{Form::hidden('participantID',null,['id'=>'participantID'])}}
								{{Form::hidden('resiID',null,['id'=>'resiID'])}}

						<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-viewRecipients">
							<thead class="thead-custom-bg-red">
								<tr>
									<th>ID</th>
									<th>Recipient</th>
									<th>Quantity</th>
									<th>Action</th>
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

	<!--ADD RECIPIENT  Modal -->
		<div class="modal animated bounceInDown text-xs-left" id="addRecipientModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog modal-xs" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>Add Recipient</h4>
					</div>

					<!-- START MODAL BODY -->
					<div class="modal-body" width='100%'>
						
						<div style="text-align:center">	
							<button type="button" class="btn btn-secondary btn-min-width btn-round mr-1 mb-1 backRec">Back to Recipients</button>
						</div>
						
						<hr>
						{{Form::open(['url'=>'service-transaction/addRecipient', 'method' => 'POST', 'id' => 'frm-addRecipient', 'class'=>'form'])}}
								{{Form::hidden('rrID',null,['id'=>'rrID'])}}
						<div class="form-body">
							<div class="row">
								<div class="form-group col-xs-6 mb-2">
									<label for="userinput5">Recipient</label>
									<select name="recipientID" id="recipientID" class="form-control">
										<div id="selectRecipient">
										<div>
									</select>
								</div>
								<div class="form-group col-xs-6 mb-2">
									<label for="userinput5">Quantity</label>
									<input class="form-control border-primary" name="quantity" id="quantity" type="number" required />
								</div>
							</div>

							<div class="form-actions center">
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> Add
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

			$.ajax({
					type: 'GET',
					url: "{{ url('/service-transaction/getEdit') }}",
					data: {"serviceTransactionPrimeID": id},
					success:function(data) {
						data = $.parseJSON(data);
						
						for(index in data)
						{
							if(data[index].status=='Pending')
							{
								swal("Unavailable", 
												"The service is still pending!", 
												"error");
							}
							else
							{
								var frm = $('#frm-addParticipant');
			
								frm.find('#aserviceTransactionPrimeID').val(id);
								participantRefresh();
								
								$("#addParticipants").modal('show');	
							}
						}			
					}
			});

			

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

		$(document).on('click', '.start', function(e) {
			
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
								title: "Are you sure you want to start " + data[index].serviceTransactionName + "?",
								text: "Start the service",
								type: "warning",
								showCancelButton: true,
								confirmButtonColor: "#DD6B55",
								confirmButtonText: "START",
								closeOnConfirm: false
								},
								function() {
									$.ajax({
										type: "post",
										url: "{{ url('/service-transaction/updateStatus') }}", 
										data: {"_token": "{{ csrf_token() }}",
										serviceTransactionPrimeID:id}, 
										success: function(data) {
											refreshTable();
											swal("Successfull", "Entry started!", "success");
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

		$(document).on('click', '.finish', function(e) {
			
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
								title: "Are you sure you want to finish " + data[index].serviceTransactionName + "?",
								text: "End the service",
								type: "warning",
								showCancelButton: true,
								confirmButtonColor: "#DD6B55",
								confirmButtonText: "FINISH",
								closeOnConfirm: false
								},
								function() {
									$.ajax({
										type: "post",
										url: "{{ url('/service-transaction/finishStatus') }}", 
										data: {"_token": "{{ csrf_token() }}",
										serviceTransactionPrimeID:id}, 
										success: function(data) {
											refreshTable();
											swal("Successfull", "Entry finished!", "success");
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
						
						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].birthDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;
						
						$("#table-viewParticipants").DataTable()
								.row.add([
									data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
									d, 
									data[index].gender, 
									data[index].contactNumber,
									data[index].disabilities,
									'<span class="dropdown">'+
										'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+
										'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
												'<a href="#" class="dropdown-item viewRecipient" name="btnAdd" data-value="'+data[index].residentPrimeID+'"><i class="icon-eye6"></i> View Recipient</a>'+
												'<a href="#" class="dropdown-item deletePart" name="btnDelete" data-value="'+data[index].residentPrimeID+'"><i class="icon-trash4"></i> Delete</a>'+
										'</span>'+
									'</span>'
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

			$.ajax({
					type: 'GET',
					url: "{{ url('/service-transaction/getEdit') }}",
					data: {"serviceTransactionPrimeID": id},
					success:function(data) {
						data = $.parseJSON(data);
						
						for(index in data)
						{
							if(data[index].status=='Pending')
							{
								swal("Unavailable", 
												"The service is still pending!", 
												"error");
							}
							else
							{
								var frm = $('#frm-viewParticipant');
			
								frm.find('#aaserviceTransactionPrimeID').val(id);

								$.ajax({
									url: '/service-transaction/getParticipant/' + id, 
									method: "GET", 
									datatype: "json", 

									success: function(data) {
										$("#table-viewParticipants").DataTable().clear().draw();
										data = $.parseJSON(data);

										for (index in data) 
										{
											
											var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
											var date = new Date(data[index].birthDate);
											var month = date.getMonth();
											var day = date.getDate();
											var year = date.getFullYear();
											var d = months[month] + ' ' + day + ', ' + year;
											
											$("#table-viewParticipants").DataTable()
													.row.add([
														data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
														d, 
														data[index].gender, 
														data[index].contactNumber,
														data[index].disabilities,
														'<span class="dropdown">'+
															'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+
															'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
																	'<a href="#" class="dropdown-item viewRecipient" name="btnAdd" data-value="'+data[index].residentPrimeID+'"><i class="icon-eye6"></i> View Recipient</a>'+
																	'<a href="#" class="dropdown-item deletePart" name="btnDelete" data-value="'+data[index].residentPrimeID+'"><i class="icon-trash4"></i> Delete</a>'+
															'</span>'+
														'</span>'
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
							}
						}			
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

		//SUBMIT ADD RECIPIENT
		$("#frm-addRecipient").submit(function(event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/service-transaction/addRecipient') }}", 
				method: "POST", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"participantID": $("#participantID").val(),
					"recipientID": $("#recipientID").val(), 
					"quantity":  $("#quantity").val()
				}, 
				success: function(data) {
					
					$.ajax({
							type: 'GET',
							url: "{{ url('/service-transaction/getRecipients') }}",
							data: {"serviceTransactionPrimeID": $('#aaserviceTransactionPrimeID').val(),
									"residentPrimeID": $('#resiID').val()},
							success:function(data) {

								$("#table-viewRecipients").DataTable().clear().draw();
								
								data = $.parseJSON(data);
								for(index in data)
								{
									$("#table-viewRecipients").DataTable()
											.row.add([
													data[index].partrecipientID,
													data[index].recipientName,
													data[index].quantity,
													'',
													'<a href="#" class="btn btn-icon btn-danger deleteRecipient" data-value="'+data[index].partrecipientID+'">'+
														'<i class="icon-android-delete">Remove</i>'+
													'</a>'
												]).draw(false);

								}			
							}
					})
					$("#addRecipientModal").modal('hide');
					setTimeout(function() {
						
						$('#recipientModal').modal('show');	
					},500);

					swal("Success", "Successfully Added recipient!", "success");
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

		//  END OF SUBMIT ADD RECIPIENT

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
					refreshTable();
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

		// VIEW RECIPIENT

		$(document).on('click', '.viewRecipient', function(e) {
			
			var id = $(this).data('value');
			var frm = $('#frm-viewParticipant');
			var servID = frm.find('#aaserviceTransactionPrimeID').val();
			$('#resiID').val(id);

			$("#viewParticipants").modal('hide');
			$.ajax({
					type: 'GET',
					url: "{{ url('/service-transaction/getResident') }}",
					data: {"residentPrimeID": id},
					success:function(data) {

						data = $.parseJSON(data);
						for(index in data)
						{
							$('#serv').html(
								'<h4 style="text-align:center">Participant: ' + data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName + '</h4>'

							);	
						}			
					}
			})

			$.ajax({
					type: 'GET',
					url: "{{ url('/service-transaction/getParticipantID') }}",
					data: {"residentID": id,
							"serviceTransactionPrimeID": servID,},
					success:function(data) {

						var frm = $('#frm-viewRecipient');
						data = $.parseJSON(data);
						for(index in data)
						{
							frm.find('#participantID').val(data[index].participantID);

						}			
					}
			})

			$.ajax({
					type: 'GET',
					url: "{{ url('/service-transaction/getEdit') }}",
					data: {"serviceTransactionPrimeID": servID},
					success:function(data) {

						data = $.parseJSON(data);
						for(index in data)
						{
							$('#reci').html(
								'<h4 style="text-align:center">Service: ' + data[index].serviceTransactionName + '</h4>'

							);	
						}			
					}
			})

			$.ajax({
					type: 'GET',
					url: "{{ url('/service-transaction/getRecipients') }}",
					data: {"serviceTransactionPrimeID": servID,
							"residentPrimeID": id},
					success:function(data) {

						$("#table-viewRecipients").DataTable().clear().draw();
						
						data = $.parseJSON(data);
						for(index in data)
						{
							$("#table-viewRecipients").DataTable()
									.row.add([
											data[index].partrecipientID,
											data[index].recipientName,
											data[index].quantity,
											'',
											'<a href="#" class="btn btn-icon btn-danger deleteRecipient" data-value="'+data[index].partrecipientID+'">'+
												'<i class="icon-android-delete">Remove</i>'+
											'</a>'
										]).draw(false);

						}			
					}
			})

			setTimeout(function() {
				
				$('#recipientModal').modal('show');	
			},500);
			
			

		});

		//READY
		$(document).ready(function () {
			try {
				var dt = $("#table-viewRecipients").DataTable();
				dt.column(3).visible(false);
			}
			catch (ex) {
				console.err("DataTable error: \n" + ex);
			}
		});


		// BACK TO PARTICIPANT MODAL

		$(document).on('click', '.back', function(e) {
			
			
			$("#recipientModal").modal('hide');
			
			setTimeout(function() {
				
				$('#viewParticipants').modal('show');	
			},500);
			
			

		});

		// BACK TO RECIPIENT MODAL

		$(document).on('click', '.backRec', function(e) {
			
			
			$("#addRecipientModal").modal('hide');
			
			setTimeout(function() {
				
				$('#recipientModal').modal('show');	
			},500);
			
			

		});

		// DELETE RECIPIENT 

		$(document).on('click', '.deleteRecipient', function(e) {
			
			var id = $(this).data('value');
			
			swal({
				title: "Are you sure you want to remove this?",
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
						url: "{{ url('/service-transaction/deleteRecipient') }}", 
						data: {"_token": "{{ csrf_token() }}",
						partrecipientID:id}, 
						success: function(data) {

							$.ajax({
									type: 'GET',
									url: "{{ url('/service-transaction/getRecipients') }}",
									data: {"serviceTransactionPrimeID": $('#aaserviceTransactionPrimeID').val(),
											"residentPrimeID": $('#resiID').val()},
									success:function(data) {

										$("#table-viewRecipients").DataTable().clear().draw();
										
										data = $.parseJSON(data);
										for(index in data)
										{
											$("#table-viewRecipients").DataTable()
													.row.add([
															data[index].partrecipientID,
															data[index].recipientName,
															data[index].quantity,
															'',
															'<a href="#" class="btn btn-icon btn-danger deleteRecipient" data-value="'+data[index].partrecipientID+'">'+
																'<i class="icon-android-delete">Remove</i>'+
															'</a>'
														]).draw(false);

										}			
									}
							})
							swal("Successfull", "Recipient removed!", "success");
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
			
			

		});

		// ADD RECIPIENT MODAL

		$(document).on('click', '.addRecip', function(e) {
			
			
			var id = $('#participantID').val();

			$.ajax({
					type: 'GET',
					url: '/service-transaction/fillRecipients/'+ id,
					success:function(data) {

						$('#recipientID').html('');
						data = $.parseJSON(data);

						for(index in data)
						{
							$('#recipientID').append($('<option>',{
								value: data[index].recipientID,
								text: data[index].recipientName
							}));	
						}	
								
					}
			})
			
			$("#recipientModal").modal('hide');
			
			setTimeout(function() {
				$('#addRecipientModal').modal('show');	
			},500);
			
			

		});
		

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
						refreshTable();
						$("#table-viewParticipants").DataTable().clear().draw();
						data = $.parseJSON(data);

						for (index in data) {
							
							var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
							var date = new Date(data[index].birthDate);
							var month = date.getMonth();
							var day = date.getDate();
							var year = date.getFullYear();
							var d = months[month] + ' ' + day + ', ' + year;
							
							$("#table-viewParticipants").DataTable()
									.row.add([
										data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
										d, 
										data[index].gender, 
										data[index].contactNumber,
										data[index].disabilities,
										'<span class="dropdown">'+
											'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+
											'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
													'<a href="#" class="dropdown-item viewRecipient" name="btnAdd" data-value="'+data[index].residentPrimeID+'"><i class="icon-eye6"></i> View Recipient</a>'+
													'<a href="#" class="dropdown-item deletePart" name="btnDelete" data-value="'+data[index].residentPrimeID+'"><i class="icon-trash4"></i> Delete</a>'+
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
						var frm = $('#frm-update');
						frm.trigger('reset');

						for(index in data)
						{
							
							frm.find('#eserviceTransactionID').val(data[index].serviceTransactionID);
							frm.find('#eserviceTransactionPrimeID').val(data[index].serviceTransactionPrimeID);
							frm.find('#eservicePrimeID').val(data[index].servicePrimeID);
							frm.find('#eserviceName').val(data[index].serviceTransactionName);

							if(data[index].toDate==null)
							{
								$('#edate').html('<div class="row">'+
													'<div class="form-group col-md-6 mb-2">'+
														'<label for="userinput4">Date</label>'+
														'{!! Form::date('efromDate', null, ['id' => 'efromDate','class' => 'form-control border-primary']) !!}'+
													'</div>'+
												'</div>');
								$('#eswitchDate').trigger('click');
								frm.find('#efromDate').val(data[index].fromDate);
							}
							else
							{
								frm.find('#efromDate').val(data[index].fromDate);
								frm.find('#etoDate').val(data[index].toDate);
							}
							

							if(data[index].fromAge==null)
							{
								$('#eage').html('No Age Limit!');	
								$('#eswitchAge').trigger('click');
							}
							else
							{
								frm.find('#efromAge').val(data[index].fromAge);
								frm.find('#etoAge').val(data[index].toAge);
							}

						}			
					}
			})
			setTimeout(function() {
				$("#editService").modal('show');	
			},500);
			
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

		//  SUBMIT ADD RESERVATION

		$("#frm-register").submit(function(event) {
			event.preventDefault();
			console.log("dasa");

			if(switchDate.checked == true)
			{
				if(switchAge.checked == true)
				{
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
				}
				else
				{
					$.ajax({
						url: "{{ url('/service-transaction/storeNoAge') }}", 
						method: "POST", 
						data: {
							"_token": "{{ csrf_token() }}", 
							"serviceTransactionID": $("#serviceTransactionID").val(), 
							"serviceName": $("#serviceName").val(), 
							"servicePrimeID": $("#servicePrimeID").val(), 
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
				}
			}
			else
			{
				if(switchAge.checked == true)
				{
					$.ajax({
						url: "{{ url('/service-transaction/storeAge') }}", 
						method: "POST", 
						data: {
							"_token": "{{ csrf_token() }}", 
							"serviceTransactionID": $("#serviceTransactionID").val(), 
							"serviceName": $("#serviceName").val(), 
							"servicePrimeID": $("#servicePrimeID").val(), 
							"fromAge": $("#fromAge").val(), 
							"toAge": $("#toAge").val(),
							"fromDate": $("#fromDate").val(),
							
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
				}
				else
				{
					$.ajax({
						url: "{{ url('/service-transaction/storeNo') }}", 
						method: "POST", 
						data: {
							"_token": "{{ csrf_token() }}", 
							"serviceTransactionID": $("#serviceTransactionID").val(), 
							"serviceName": $("#serviceName").val(), 
							"servicePrimeID": $("#servicePrimeID").val(),
							"fromDate": $("#fromDate").val(),
							
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
				}
			}

			
		});

		//  END OF SUBMIT ADD RESERVATION

		// DATE SWITCH

		$('#switchDate').change(function(){
			if(this.checked)
			{
				$('#date').html(
							'<div class="row">'+
								'<div class="form-group col-md-6 mb-2">'+
									'<label for="userinput4">From</label>'+
									'{!! Form::date('fromDate', null, ['id' => 'fromDate','class' => 'form-control border-primary']) !!}'+
								'</div>'+
								'<div class="form-group col-md-6 mb-2">'+
									'<label for="userinput4">To</label>'+
									'{!! Form::date('toDate', null, ['id' => 'toDate','class' => 'form-control border-primary']) !!}'+
								'</div>'+
							'</div>'
						);
			}
			else
			{
				$('#date').html(
						'<div class="row">'+
							'<div class="form-group col-md-6 mb-2">'+
								'<label for="userinput4">Date</label>'+
								'{!! Form::date('fromDate', null, ['id' => 'fromDate','class' => 'form-control border-primary']) !!}'+
							'</div>'+
						'</div>'
					);
			}
		
		});

		// END OF DATE SWITCH

		// AGE SWITCH

		$('#switchAge').change(function(){
			if(this.checked)
			{
				$('#age').html(
								'<div class="row">'+
									'<div class="form-group col-md-6 mb-2">'+
										'<label for="userinput4">From</label>'+
										'{!! Form::number('fromAge', null, ['id' => 'fromAge','class' => 'form-control border-primary']) !!}'+
									'</div>'+
									'<div class="form-group col-md-6 mb-2">'+
										'<label for="userinput4">To</label>'+
										'{!! Form::number('toAge', null, ['id' => 'toAge','class' => 'form-control border-primary']) !!}'+
									'</div>'+
								'</div>'
							);
			}
			else
			{
				$('#age').html('No age limit');
			}
		});

		// END OF AGE SWITCH

		// END DATE SWITCH

		$('#eswitchDate').change(function(){
			if(this.checked)
			{
				$('#edate').html(
							'<div class="row">'+
								'<div class="form-group col-md-6 mb-2">'+
									'<label for="userinput4">From</label>'+
									'{!! Form::date('efromDate', null, ['id' => 'efromDate','class' => 'form-control border-primary']) !!}'+
								'</div>'+
								'<div class="form-group col-md-6 mb-2">'+
									'<label for="userinput4">To</label>'+
									'{!! Form::date('etoDate', null, ['id' => 'etoDate','class' => 'form-control border-primary']) !!}'+
								'</div>'+
							'</div>'
						);
			}
			else
			{
				$('#edate').html(
						'<div class="row">'+
							'<div class="form-group col-md-6 mb-2">'+
								'<label for="userinput4">Date</label>'+
								'{!! Form::date('efromDate', null, ['id' => 'efromDate','class' => 'form-control border-primary']) !!}'+
							'</div>'+
						'</div>'
					);
			}
		
		});

		// END OF EDIT DATE SWITCH

		// EDIT AGE SWITCH

		$('#eswitchAge').change(function(){
			if(this.checked)
			{
				$('#eage').html(
								'<div class="row">'+
									'<div class="form-group col-md-6 mb-2">'+
										'<label for="userinput4">From</label>'+
										'{!! Form::number('efromAge', null, ['id' => 'efromAge','class' => 'form-control border-primary']) !!}'+
									'</div>'+
									'<div class="form-group col-md-6 mb-2">'+
										'<label for="userinput4">To</label>'+
										'{!! Form::number('etoAge', null, ['id' => 'etoAge','class' => 'form-control border-primary']) !!}'+
									'</div>'+
								'</div>'
							);
			}
			else
			{
				$('#eage').html('No age limit');
			}
		});

		// END OF EDIT AGE SWITCH

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
						
						var status;
						var age;
						var date;
						var s;

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var dat = new Date(data[index].fromDate);
						var month = dat.getMonth();
						var day = dat.getDate();
						var year = dat.getFullYear();
						var fd = months[month] + ' ' + day + ', ' + year;

						var tmonths = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var tdat = new Date(data[index].toDate);
						var tmonth = tdat.getMonth();
						var tday = tdat.getDate();
						var tyear = tdat.getFullYear();
						var td = tmonths[tmonth] + ' ' + tday + ', ' + tyear;

						if(data[index].status=='Pending')
						{
							s = '<span class="tag round tag-default tag-info">Pending</span>';
							status= '<a href="#" class="dropdown-item start" name="btnView" data-value="'+ data[index].serviceTransactionPrimeID +'"><i class="icon-eye6"></i> Start</a>'+
									'<a href="#" class="dropdown-item view" name="btnView" data-value="'+ data[index].serviceTransactionPrimeID +'"><i class="icon-eye6"></i> View Participants</a>'+
									'<a href="#" class="dropdown-item add" name="btnView" data-value="'+ data[index].serviceTransactionPrimeID +'"><i class="icon-eye6"></i> Add Participants</a>'+
									'<a href="#" class="dropdown-item edit" name="btnEdit" data-value="'+ data[index].serviceTransactionPrimeID +'"><i class="icon-pen3"></i> Edit</a>'+
									'<a href="#" class="dropdown-item delete" name="btnDelete" data-value="'+ data[index].serviceTransactionPrimeID +'"><i class="icon-trash4"></i> Delete</a>';
						}
						else if(data[index].status=='On-going')
						{
							s = '<span class="tag round tag-default tag-warning">On-going</span>';
							status = '<a href="#" class="dropdown-item finish" name="btnView" data-value="'+ data[index].serviceTransactionPrimeID +'"><i class="icon-eye6"></i> Finish</a>'+ 
									'<a href="#" class="dropdown-item view" name="btnView" data-value="'+ data[index].serviceTransactionPrimeID +'"><i class="icon-eye6"></i> View Participants</a>'+
									'<a href="#" class="dropdown-item add" name="btnView" data-value="'+ data[index].serviceTransactionPrimeID +'"><i class="icon-eye6"></i> Add Participants</a>';
						}
						else
						{
							s = '<span class="tag round tag-default tag-success">Finished</span>';
							status = '<a href="#" class="dropdown-item view" name="btnView" data-value="'+ data[index].serviceTransactionPrimeID +'"><i class="icon-eye6"></i> View Participants</a>';
						}

						if(data[index].fromAge==null)
						{
							age = 'Open';
						}
						else
						{
							age = data[index].fromAge + ' - ' + data[index].toAge + ' yrs. old';
						}

						if(data[index].toDate==null)
						{
							date = fd;
						}
						else
						{
							date = fd  + ' - ' + td;
						}

						$("#table-container").DataTable()
								.row.add([
									data[index].serviceTransactionName, 
									data[index].serviceName, 
									date, 
									age, 
									data[index].number, 
									s,
										'<input type="hidden" name="residentPrimeID" value="' + data[index].residentPrimeID + '" />' +

											'<span class="dropdown">'+
												'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+
												'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
													status +
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
						
						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].birthDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

						$("#table-resParticipants").DataTable()
								.row.add([
									data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
									d, 
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
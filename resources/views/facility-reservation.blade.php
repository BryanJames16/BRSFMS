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

@section('vendor-style')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/calendars/fullcalendar.min.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Facility Reservation
@endsection

@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(FACILITY_RESERVATION);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Facilty Transaction </h2>
		<p class="text-muted mb-0">All transactions regarding facility</p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaction</li>
		<li class="breadcrumb-item"><a href="#">Facility Reservation</a></li>
	</ol>
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Facility Reservation</h4>
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
									<i class="icon-edit2"></i> Facility Reservation  
								</button>
								<button type="button" class="btn btn-outline-info btn-lg" data-toggle="modal" data-target="#calendarModal" style="width:160px; font-size:13px">
									<i class="icon-edit2"></i> View Calendar  
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
										<a class="nav-link" id="link-tab3" data-toggle="tab" href="#pending" aria-controls="link3" aria-expanded="false">Pending</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="lin-tab3" data-toggle="tab" href="#rescheduled" aria-controls="linkOpt3">Rescheduled</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="linkOpt-tab3" data-toggle="tab" href="#cancelled" aria-controls="linkOpt3">Cancelled</a>
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

													@foreach($reservations as $reservation)

													<tr>
														{!!Form::open(['url'=>'facility-reservation/delete', 'method' => 'POST', 'id' => $reservation -> primeID ])!!}					
														{{ csrf_field() }}

														<input type='hidden' name='primeID' value='{{ $reservation -> primeID }}' />
														<td>{{ $reservation -> reservationName }}</td>
														<td>{{ $reservation -> facilityName }}</td>
														<td>{{ $reservation -> lastName }}, {{ $reservation -> firstName }} {{ $reservation -> middleName }}</td>
														<td>{{ $reservation -> dateReserved }} {{ date('g:i a',strtotime($reservation -> reservationStart)) }} - {{ date('g:i a',strtotime($reservation -> reservationEnd)) }}</td>
						
														<td>{{ $reservation -> status }}</td>
														<td>
															@if($reservation -> status  == 'Pending')
															<div class="btn-group" role="group" aria-label="Basic example">
																<button class='btn btn-icon btn-round btn-primary normal view' data-toggle="tooltip" data-placement="top" data-original-title="View Details"  type='button' value='{{ $reservation -> primeID }}'><i class="icon-ios-eye"></i></button>
																<button class='btn btn-icon btn-round btn-success normal edit' data-toggle="tooltip" data-placement="top" data-original-title="Reschedule"  type='button' value='{{ $reservation -> primeID }}'><i class="icon-android-clipboard"></i></button>
																<button class='btn btn-icon btn-round btn-danger delete' data-toggle="tooltip" data-placement="top" data-original-title="Cancel" value='{{ $reservation -> primeID }}' type='button' name='btnEdit'><i class="icon-android-cancel"></i></button>
															</div>
															@else
															N/A
															@endif
														</td>
														{!!Form::close()!!}
													</tr>

													@endforeach

													
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

											@foreach($reservations as $reservation)

											@if($reservation -> status  == 'Pending')
													<tr>
														{!!Form::open(['url'=>'facility-reservation/delete', 'method' => 'POST' ])!!}					
														{{ csrf_field() }}

														<input type='hidden' name='primeID' value='{{ $reservation -> primeID }}' />
														<td>{{ $reservation -> reservationName }}</td>
														<td>{{ $reservation -> facilityName }}</td>
														<td>{{ $reservation -> lastName }}, {{ $reservation -> firstName }} {{ $reservation -> middleName }}</td>
														<td>{{ $reservation -> dateReserved }} {{ date('g:i a',strtotime($reservation -> reservationStart)) }} - {{ date('g:i a',strtotime($reservation -> reservationEnd)) }}</td>
														<td>{{ $reservation -> status }}</td>
														<td>
															<div class="btn-group" role="group" aria-label="Basic example">
																<button class='btn btn-icon btn-round btn-success normal ' data-toggle="tooltip" data-placement="top" data-original-title="Reschedule"  type='button' value='{{ $reservation -> primeID }}' data-toggle='modal' data-target='#rescheduleModal'><i class="icon-android-clipboard"></i></button>
																<button class='btn btn-icon btn-round btn-danger ' data-toggle="tooltip" data-placement="top" data-original-title="Cancel" value='{{ $reservation -> primeID }}' type='button' name='btnEdit'><i class="icon-android-cancel"></i></button>
															</div>
														</td>
														{!!Form::close()!!}
													</tr>
											@endif

											@endforeach

											
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

														@foreach($reservations as $reservation)

														@if($reservation -> status  == 'Rescheduled')
																<tr>
																	{!!Form::open(['url'=>'facility-reservation/delete', 'method' => 'POST' ])!!}					
																	{{ csrf_field() }}

																	<input type='hidden' name='primeID' value='{{ $reservation -> primeID }}' />
																	<td>{{ $reservation -> reservationName }}</td>
																	<td>{{ $reservation -> facilityName }}</td>
																	<td>{{ $reservation -> lastName }}, {{ $reservation -> firstName }} {{ $reservation -> middleName }}</td>
																	<td>{{ $reservation -> dateReserved }} {{ date('g:i a',strtotime($reservation -> reservationStart)) }} - {{ date('g:i a',strtotime($reservation -> reservationEnd)) }}</td>
																	<td>{{ $reservation -> status }}</td>
																	<td>N/A
																	</td>
																	{!!Form::close()!!}
																</tr>
														@endif

														@endforeach

														
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

																@foreach($reservations as $reservation)

																@if($reservation -> status  == 'Cancelled')
																		<tr>
																			{!!Form::open(['url'=>'facility-reservation/delete', 'method' => 'POST' ])!!}					
																			{{ csrf_field() }}

																			<input type='hidden' name='primeID' value='{{ $reservation -> primeID }}' />
																			<td>{{ $reservation -> reservationName }}</td>
																			<td>{{ $reservation -> facilityName }}</td>
																			<td>{{ $reservation -> lastName }}, {{ $reservation -> firstName }} {{ $reservation -> middleName }}</td>
																			<td>{{ $reservation -> dateReserved }} {{ date('g:i a',strtotime($reservation -> reservationStart)) }} - {{ date('g:i a',strtotime($reservation -> reservationEnd)) }}</td>
																			<td>{{ $reservation -> status }}</td>
																			<td>N/A
																			</td>
																			{!!Form::close()!!}
																		</tr>
																@endif

																@endforeach

																
															</tbody>

														</table>



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

	<script type="text/javascript">

	$(document).on('click', '.delete', function(e) {

		
		var id = $(this).val();

		$.ajax({
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
			})

	
		
	});
	</script>
						</div>
					</div>
				</div>

				<!-- Modal -->
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
																		{{ Form::select('peoplePrimeID', $people, null, ['id'=>'peoplePrimeID', 'class' => 'form-control border-info selectBox']) }}
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Facility :</label>
																		{{ Form::select('facilityPrimeID', $facilities, null, ['id'=>'facilityPrimeID', 'class' => 'form-control border-info selectBox']) }}
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



								<!-- Modal -->
								<div class="modal fade text-xs-left" id="calendarModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-xl modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>Calendar</h4>
											</div>
											<div class="modal-body">
												<div class="card-block">
											
												<div class="card-body collapse in">
													<div class="card-block card-dashboard">
													<section id="basic-examples">
														<div class="row">
															<div class="col-xs-12">
																<div class="card">
																	<div class="card-header">
																		<h4 class="card-title">Reservations Events</h4>
																		<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
																		<div class="heading-elements">
																			<ul class="list-inline mb-0">
																				<li><a data-action="reload"><i class="icon-reload"></i></a></li>
																				<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
																			</ul>
																		</div>
																	</div>

																	<div class="card-body collapse in">
																		<div id='fc-bg-events'></div>
																	</div>
																</div>
															</div>
														</div>
													</section>
													</div>
												</div>
											
												</div>
											</div>

											<!-- End of Modal Body -->

										</div>
									</div>
								</div> <!-- End of Modal -->



									<!--                         RESERVE FACILITY                         -->

						<!-- Modal -->
								<div class="modal fade text-xs-left" id="addModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>Reserve Facility</h4>
											</div>
											<div class="modal-body">
												{!!Form::open(['url'=>'/reservation/store', 'method' => 'POST'])!!}
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="firstName1">Reservation Name :</label>
																	{!!Form::text('name',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5'])!!}
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="firstName1">Reservee :</label>
																	{{ Form::select('peoplePrimeID', $people, null, ['id'=>'reserveeCbo', 'class' => 'form-control border-info selectBox']) }}
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="firstName1">Facility :</label>
																	{{ Form::select('facilityPrimeID', $facilities, null, ['id'=>'facilityPrimeID', 'class' => 'form-control border-info selectBox']) }}
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="firstName1">Reservation Description :</label>
																	{!!Form::textarea('desc',null,['id'=>'desc','class'=>'form-control', 'placeholder'=>'eg.Jun Jun 15th Birthday Party', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}

																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-4">
																<div class="form-group">
																	<label for="firstName1">Date :</label>
																	{!!Form::date('date',null,['id'=>'date','class'=>'form-control'])!!}	
																	</div>
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label for="firstName1">Start Time :</label>
																	{!!Form::time('startTime',null,['id'=>'startTime','class'=>'form-control'])!!}
																</div>
															</div>
															<div class="col-md-4">
																<div class="form-group">
																	<label for="firstName1">End Time :</label>
																	{!!Form::time('endTime',null,['id'=>'endTime','class'=>'form-control'])!!}
																</div>
															</div>
														</div>
														<div class="form-actions center">
															{!!Form::submit('Submit',['class'=>'btn btn-success'])!!}
														</div>	
												{!!Form::close()!!}
											</div>

											<!-- End of Modal Body -->

										</div>
									</div>
								</div> <!-- End of Modal -->




								<!--                          VIEW MODAL                        -->

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
																		{{ Form::select('peoplePrimeID', $people, null, ['id'=>'peoplePrimeID', 'class' => 'form-control border-info selectBox']) }}
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label for="firstName1">Facility :</label>
																		{{ Form::select('facilityPrimeID', $facilities, null, ['id'=>'facilityPrimeID', 'class' => 'form-control border-info selectBox']) }}
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
	<script>
		var refreshCbo = function() {
			$.ajax({
				url: "{{ url('/reservation/updatecbo') }}", 
				type: "GET", 
				success: function(data){
					$("#reserveeCbo").empty();
					var reserveeData = "";
					data = $.parseJSON(data);
					for (var index in data) {
						var name = "";
						reserveeData += data[index].lastName + ", ";
						reserveeData += data[index].firstName + " ";
						if (data[index].middleName != "") {
							reserveeData += " " + data[index].middleName;
						}

						console.log("First Name: " + data[index].firstName);
						console.log("Last Name: " + data[index].lastName);

						$("#reserveeCbo").append(
							'<option value="' + data[index].peoplePrimeID + '">' + reserveeData + '</option>'
						);

						reserveeData = "";
					}
				}, 
				error: function(data){
					var message = "Errors: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					console.log("Error: " +  bnhy,message);
				}
			});

			console.log("done loading...");
		}

		refreshCbo();
	</script>
@endsection

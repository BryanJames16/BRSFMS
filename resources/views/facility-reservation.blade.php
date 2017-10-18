@extends('master.master')

@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/redBuilder.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/datatable.custom.red.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/main-card.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/toggle/bootstrap-switch.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/toggle/switchery.min.css') }}" />
@endsection

@section('vendor-style')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/calendars/fullcalendar.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/pickers/pickadate/pickadate.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/datedropper.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/timedropper.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/fullcalendar-style.css') }}" />
@endsection

@section('plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/icomoon.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/selects/select2.min.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
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
					<div class="card-header card-head-custom">
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
								<button type="button" class="btn btn-outline-info btn-lg" data-toggle="modal" id="btnResFac" style="width:160px; font-size:13px">
									<i class="icon-edit2"></i> Facility Reservation  
								</button>
								<button type="button" class="btn btn-outline-info btn-lg" data-toggle="modal" id="btnViewCal" style="width:160px; font-size:13px">
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
										<table class="table table-striped multi-ordering dataTable no-footer table-custome-outline-red" style="font-size:14px;width:100%;" id="table-all">
											<thead class="thead-custom-bg-red">
												<tr>
													<th>Name</th>
													<th>Reserved Facility</th>
													<th>Reserved By</th>
													<th>Date and Time</th>
													<th>Residency</th>
													<th>Status</th>
													<th>Actions</th>
												</tr>
											</thead>

											<tbody>
												@foreach($reservations as $reservation)
													<tr>
														{{ Form::open(['url'=>'facility-reservation/delete', 'method' => 'POST', 'id' => $reservation -> primeID ]) }}					
														{{ csrf_field() }}

														<input type='hidden' name='primeID' value='{{ $reservation -> primeID }}' />
														<td>{{ $reservation -> reservationName }}</td>
														<td>{{ $reservation -> facilityName }}</td>
														<td>{{ $reservation -> lastName }}, {{ $reservation -> firstName }} {{ $reservation -> middleName }}</td>
														<td>{{ date('F j, Y',strtotime($reservation -> dateReserved)) }}<br>{{ date('g:i a',strtotime($reservation -> reservationStart)) }} - {{ date('g:i a',strtotime($reservation -> reservationEnd)) }}</td>
														<td><span class="tag  tag-pill  border-success tag-success">Resident</span></td>
														@if($reservation -> status  == 'Pending')
															<td><span class="tag  tag-pill  border-info tag-info">Pending</span></td>
															<td>
																<span class="dropdown">
																	<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
																	<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
																		<a href="#" class="dropdown-item view" name="btnView" data-value="{{ $reservation -> primeID }}"><i class="icon-eye6"></i> View</a>
																		<a href="#" class="dropdown-item edit" name="btnEdit" data-value="{{ $reservation -> primeID }}"><i class="icon-pen3"></i> Reschedule</a>
																		<a href="#" class="dropdown-item delete" name="btnDelete" data-value="{{ $reservation -> primeID }}"><i class="icon-trash4"></i> Cancel</a>
																	</span>
																</span>
															</td>
														@elseif($reservation -> status  == 'Rescheduled')
															<td><span class="tag  tag-pill   tag-default">Rescheduled</span></td>
															<td>N/A</td>
														@elseif($reservation -> status  == 'Cancelled')	
															<td><span class="tag  tag-pill   round tag-danger">Cancelled</span></td>
															<td>N/A</td>
														@elseif($reservation -> status  == 'Paid')	
															<td>
																<span class="tag tag-pill tag-success">Paid</span>
																<br />
																<br />
																@if($reservation -> eventStatus == 'NYD')
																	<span class="tag tag-default tag-info">Not Yet Done</span>
																@elseif($reservation -> eventStatus == 'OnGoing')
																	<span class="tag tag-default tag-success">On-Going</span>
																@elseif($reservation -> eventStatus == 'Extended')
																	<span class="tag tag-default tag-warning">Extended</span>
																@elseif($reservation -> eventStatus == 'Done')
																	<span class="tag tag-default tag-default">Done</span>
																@endif
															</td>
															<td>
																@if($reservation -> eventStatus == 'OnGoing' || 
																	$reservation -> eventStatus == 'Extended')
																	<span class="dropdown">
																		<button type="button" class="btn btn-info mr-1 btn-extension" value="{{ $reservation -> primeID }}">
																			<i class="icon-dribbble"></i> Extend
																		</button>
																	</span>
																@else 
																	N/A
																@endif
															</td>
														@else
															<td></td>
															<td>N/A</td>
														@endif
															{{ Form::close() }}
													</tr>

												@endforeach
												@foreach($nonres as $reservation)
													<tr>
														{{ Form::open(['url'=>'facility-reservation/delete', 'method' => 'POST', 'id' => $reservation -> primeID ]) }}					
														{{ csrf_field() }}

														<input type='hidden' name='primeID' value='{{ $reservation -> primeID }}' />
														<td>{{ $reservation -> reservationName }}</td>
														<td>{{ $reservation -> facilityName }}</td>
														<td>{{ $reservation -> name }}</td>
														<td>{{ date('F j, Y',strtotime($reservation -> dateReserved)) }}<br>{{ date('g:i a',strtotime($reservation -> reservationStart)) }} - {{ date('g:i a',strtotime($reservation -> reservationEnd)) }}</td>
														<td><span class="tag  tag-pill   tag-danger">Non-resident</span></td>
														@if($reservation -> status  == 'Pending')
															<td><span class="tag  tag-pill   tag-info">Pending</span></td>
															<td>
																
																	<span class="dropdown">
																		<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
																		<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
																			<a href="#" class="dropdown-item view" name="btnView" data-value="{{ $reservation -> primeID }}"><i class="icon-eye6"></i> View</a>
																			<a href="#" class="dropdown-item edit" name="btnEdit" data-value="{{ $reservation -> primeID }}"><i class="icon-pen3"></i> Reschedule</a>
																			<a href="#" class="dropdown-item delete" name="btnDelete" data-value="{{ $reservation -> primeID }}"><i class="icon-trash4"></i> Cancel</a>
																		</span>
																	</span>
																
															</td>
														@elseif($reservation -> status  == 'Rescheduled')
															<td><span class="tag  tag-pill   tag-default">Rescheduled</span></td>
															<td>N/A</td>
														@elseif($reservation -> status  == 'Cancelled')	
															<td><span class="tag  tag-pill   tag-danger">Cancelled</span></td>
															<td>N/A</td>
														@elseif($reservation -> status  == 'Paid')	
															<td>
																<span class="tag tag-pill tag-success">Paid</span>
																<br />
																<br />
																@if($reservation -> eventStatus == 'NYD')
																	<span class="tag tag-default tag-info">Not Yet Done</span>
																@elseif($reservation -> eventStatus == 'OnGoing')
																	<span class="tag tag-default tag-success">On-Going</span>
																@elseif($reservation -> eventStatus == 'Extended')
																	<span class="tag tag-default tag-warning">Extended</span>
																@elseif($reservation -> eventStatus == 'Done')
																	<span class="tag tag-default tag-default">Done</span>
																@endif
															</td>
															<td>
																@if($reservation -> eventStatus == 'OnGoing' || 
																	$reservation -> eventStatus == 'Extended')
																	<span class="dropdown">
																		<button type="button" class="btn btn-info mr-1 btn-extension" value="{{ $reservation -> primeID }}">
																			<i class="icon-dribbble"></i> Extend
																		</button>
																	</span>
																@else 
																	N/A
																@endif
															</td>
														@else
															<td></td>
															<td>N/A</td>
														@endif
															{{ Form::close() }}
													</tr>

												@endforeach

											</tbody>
										</table>
									</div>
									<div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="link-tab3" aria-expanded="false">
										<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-pending">
											<thead class="thead-custom-bg-red">
												<tr>
													<th>Name</th>
													<th>Reserved Facility</th>
													<th>Reserved By</th>
													<th>Date and Time</th>
													<th>Residency</th>
													<th>Status</th>
													<th>Actions</th>
												</tr>
											</thead>	
											<tbody>

												@foreach($reservations as $reservation)

													@if($reservation -> status  == 'Pending')
														<tr>
															{{ Form::open(['url'=>'facility-reservation/delete', 'method' => 'POST' ]) }}					
															{{ csrf_field() }}

															<input type='hidden' name='primeID' value='{{ $reservation -> primeID }}' />
															<td>{{ $reservation -> reservationName }}</td>
															<td>{{ $reservation -> facilityName }}</td>
															<td>{{ $reservation -> lastName }}, {{ $reservation -> firstName }} {{ $reservation -> middleName }}</td>
															<td>{{ date('F j, Y',strtotime($reservation -> dateReserved)) }}<br>{{ date('g:i a',strtotime($reservation -> reservationStart)) }} - {{ date('g:i a',strtotime($reservation -> reservationEnd)) }}</td>
															<td><span class="tag  tag-pill   tag-success">Resident</span></td>
															<td><span class="tag  tag-pill   tag-info">Pending</span></td>
															<td>
																<span class="dropdown">
																	<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
																	<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
																		<a href="#" class="dropdown-item view" name="btnView" data-value="{{ $reservation -> primeID }}"><i class="icon-eye6"></i> View</a>
																		<a href="#" class="dropdown-item edit" name="btnEdit" data-value="{{ $reservation -> primeID }}"><i class="icon-pen3"></i> Reschedule</a>
																		<a href="#" class="dropdown-item delete" name="btnDelete" data-value="{{ $reservation -> primeID }}"><i class="icon-trash4"></i> Cancel</a>
																	</span>
																</span>
															</td>
															{{ Form::close() }}
														</tr>
													@endif
												@endforeach
												@foreach($nonres as $reservation)

													@if($reservation -> status  == 'Pending')
														<tr>
															{{ Form::open(['url'=>'facility-reservation/delete', 'method' => 'POST' ]) }}					
															{{ csrf_field() }}

															<input type='hidden' name='primeID' value='{{ $reservation -> primeID }}' />
															<td>{{ $reservation -> reservationName }}</td>
															<td>{{ $reservation -> facilityName }}</td>
															<td>{{ $reservation -> name }}</td>
															<td>{{ date('F j, Y',strtotime($reservation -> dateReserved)) }}<br>{{ date('g:i a',strtotime($reservation -> reservationStart)) }} - {{ date('g:i a',strtotime($reservation -> reservationEnd)) }}</td>
															<td><span class="tag  tag-pill   tag-danger">Non-resident</span></td>
															<td><span class="tag  tag-pill   tag-info">Pending</span></td>
															<td>
																<span class="dropdown">
																	<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
																	<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
																		<a href="#" class="dropdown-item view" name="btnView" data-value="{{ $reservation -> primeID }}"><i class="icon-eye6"></i> View</a>
																		<a href="#" class="dropdown-item edit" name="btnEdit" data-value="{{ $reservation -> primeID }}"><i class="icon-pen3"></i> Reschedule</a>
																		<a href="#" class="dropdown-item delete" name="btnDelete" data-value="{{ $reservation -> primeID }}"><i class="icon-trash4"></i> Cancel</a>
																	</span>
																</span>
															</td>
															{{ Form::close() }}
														</tr>
													@endif
												@endforeach
											</tbody>
										</table>
									</div>
									<div class="tab-pane fade" id="rescheduled" role="tabpanel" aria-labelledby="dropdownOpt1-tab3" aria-expanded="false">
										<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-rescheduled">
											<thead class="thead-custom-bg-red">
												<tr>
													<th>Name</th>
													<th>Reserved Facility</th>
													<th>Reserved By</th>
													<th>Date and Time</th>
													<th>Residency</th>
													<th>Status</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												@foreach($reservations as $reservation)
													@if($reservation -> status  == 'Rescheduled')
														<tr>
															{{ Form::open(['url'=>'facility-reservation/delete', 'method' => 'POST' ]) }}					
															{{ csrf_field() }}
															<input type='hidden' name='primeID' value='{{ $reservation -> primeID }}' />
															<td>{{ $reservation -> reservationName }}</td>
															<td>{{ $reservation -> facilityName }}</td>
															<td>{{ $reservation -> lastName }}, {{ $reservation -> firstName }} {{ $reservation -> middleName }}</td>
															<td>{{ date('F j, Y',strtotime($reservation -> dateReserved)) }}<br>{{ date('g:i a',strtotime($reservation -> reservationStart)) }} - {{ date('g:i a',strtotime($reservation -> reservationEnd)) }}</td>
															<td><span class="tag  tag-pill   tag-success">Resident</span></td>
															<td><span class="tag  tag-pill   tag-default">Rescheduled</span></td>
															<td>N/A
															</td>
															{{ Form::close() }}
														</tr>
													@endif
												@endforeach
												@foreach($nonres as $reservation)
													@if($reservation -> status  == 'Rescheduled')
														<tr>
															{{ Form::open(['url'=>'facility-reservation/delete', 'method' => 'POST' ]) }}					
															{{ csrf_field() }}
															<input type='hidden' name='primeID' value='{{ $reservation -> primeID }}' />
															<td>{{ $reservation -> reservationName }}</td>
															<td>{{ $reservation -> facilityName }}</td>
															<td>{{ $reservation -> name }}</td>
															<td>{{ date('F j, Y',strtotime($reservation -> dateReserved)) }}<br>{{ date('g:i a',strtotime($reservation -> reservationStart)) }} - {{ date('g:i a',strtotime($reservation -> reservationEnd)) }}</td>
															<td><span class="tag  tag-pill   tag-danger">Non-resident</span></td>
															<td><span class="tag  tag-pill   tag-default">Rescheduled</span></td>
															<td>N/A
															</td>
															{{ Form::close() }}
														</tr>
													@endif
												@endforeach
											</tbody>
										</table>
									</div>
									<div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="linkOpt-tab3" aria-expanded="false">
										<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-cancelled">
											<thead class="thead-custom-bg-red">
												<tr>
													<th>Name</th>
													<th>Reserved Facility</th>
													<th>Reserved By</th>
													<th>Date</th>
													<th>Residency</th>
													<th>Status</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												@foreach($reservations as $reservation)
													@if($reservation -> status  == 'Cancelled')
														<tr>
															{{ Form::open(['url'=>'facility-reservation/delete', 'method' => 'POST' ]) }}					
															{{ csrf_field() }}
															<input type='hidden' name='primeID' value='{{ $reservation -> primeID }}' />
															<td>{{ $reservation -> reservationName }}</td>
															<td>{{ $reservation -> facilityName }}</td>
															<td>{{ $reservation -> lastName }}, {{ $reservation -> firstName }} {{ $reservation -> middleName }}</td>
															<td>{{ date('F j, Y',strtotime($reservation -> dateReserved)) }}<br>{{ date('g:i a',strtotime($reservation -> reservationStart)) }} - {{ date('g:i a',strtotime($reservation -> reservationEnd)) }}</td>
															<td><span class="tag  tag-pill   tag-success">Resident</span></td>
															<td><span class="tag  tag-pill   tag-danger">Cancelled</span></td>
															<td>N/A
															</td>
															{{ Form::close() }}
														</tr>
													@endif
												@endforeach
												@foreach($nonres as $reservation)
													@if($reservation -> status  == 'Cancelled')
														<tr>
															{{ Form::open(['url'=>'facility-reservation/delete', 'method' => 'POST' ]) }}					
															{{ csrf_field() }}
															<input type='hidden' name='primeID' value='{{ $reservation -> primeID }}' />
															<td>{{ $reservation -> reservationName }}</td>
															<td>{{ $reservation -> facilityName }}</td>
															<td>{{ $reservation -> name }}</td>
															<td>{{ date('F j, Y',strtotime($reservation -> dateReserved)) }}<br>{{ date('g:i a',strtotime($reservation -> reservationStart)) }} - {{ date('g:i a',strtotime($reservation -> reservationEnd)) }}</td>
															<td><span class="tag  tag-pill   tag-danger">Non-resident</span></td>
															<td><span class="tag  tag-pill   tag-danger">Cancelled</span></td>
															<td>N/A
															</td>
															{{ Form::close() }}
														</tr>
													@endif
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Reschedule Modal -->
				<div class="modal animated bounceInDown text-xs-left" id="rescheduleModal"  role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-info white">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel2"><i class="icon-calendar3"></i> Reschedule</h4>
							</div>
							<div class="modal-body">
								{{ Form::open(['url'=>'/facility-reservation/update', 'method' => 'POST','id' => 'frm-reschedule']) }}
				
										<div id="echange">

											

										</div>
									
									<div class="form-actions center">
										{{ Form::submit('Reschedule',['class'=>'btn btn-success']) }}
									</div>	
								{{ Form::close() }}
							</div>
							<!-- End of Modal Body -->
						</div>
					</div>
				</div> <!-- End of Modal -->

				<!-- Calendar Modal -->
				<div class="modal animated bounceInDown text-xs-left" id="calendarModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-xl modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-info white">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel2"><i class="icon-calendar3"></i> Calendar</h4>
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
															<div id='fc-external-drag'></div>
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


				<!-- Extend Modal -->
				<div class="modal animated bounceInDown text-xs-left" id="extendModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-info white">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel2"><i class="icon-calendar3"></i> Extend</h4>
							</div>
							<div class="modal-body">
								{{ Form::open(['url'=>'facility-reservation/extend', 'method' => 'POST', 'id' => 'frm-extend', 'value' => '']) }}

								<div class="card-block">
									<div class="form-group row last">
										<label class="col-md-3 label-control">Set new extended time: </label>
										<div class="col-md-9">
											{{ Form::text('date',null,['id'=>'exdate','class'=>'form-control']) }}
										</div>
									</div>

									<div class="form-actions center">
										{{ Form::submit('Extend Time', ['class' => 'btn btn-success', 'value' => '']) }}
									</div>
								</div>

								{{ Form::close() }}
							</div>
							<!-- End of Modal Body -->
						</div>
					</div>
				</div> <!-- End of Modal -->


				<!--RESERVE FACILITY -->

				<!--Add Modal -->
				<div class="modal animated bounceInDown text-xs-left" id="addModal"  role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-info white">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel2"><i class="icon-office"></i> Reserve Facility</h4>
							</div>
							<div class="modal-body">
								{{ Form::open(['url'=>'/facility-reservation/store', 'method' => 'POST','id' => 'frm-reserve']) }}
									
										<div class="form-group ">
											<input type="checkbox" id="switchRes" class="switchery" data-size="sm" data-color="primary" checked/>
											<label for="switcheryColor" class="card-title ml-1"><p style="font-family:century gothic;font-size:16px">Resident</p></label>
										</div>

										

										<div id="change">

											

										</div>
									
									<div class="form-actions center">
										{{ Form::submit('Submit',['class'=>'btn btn-success']) }}
									</div>	
								{{ Form::close() }}
							</div>

							<!-- End of Modal Body -->
						</div>
					</div>
				</div> <!-- End of Modal -->




				<!-- VIEW MODAL -->

				<!-- Modal -->
				<div class="modal animated bounceInDown text-xs-left" id="viewModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-info white">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel2"><i class="icon-eye"></i> View Details</h4>
							</div>
							<div class="modal-body">
								
									<p align="center" style="font-size:20px"><b>RESERVATION DETAILS</b></p>
									<hr>
									<div id="reservationDetails">

									</div>

							</div>
							<!-- End of Modal Body -->
						</div>
					</div>
				</div> <!-- End of Modal -->
			</div>	
		</div>
	</section>	

	
@endsection

@section('vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
@endsection

@section('template-js')
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-checkbox.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/datedropper.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/timedropper.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/robust-assets/js/components/forms/select/form-select2.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/timehandle.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/switch.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/fullcalendar.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/reservationDates.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/date.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/time.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/parser.js') }}" type="text/javascript"></script>
	
	<script type="text/javascript">
		var clickToday = function () {
			$(".fc-today-button").click();

			$(".fc-prev-button").on('click', function () {
				var dateSelected = $("#fc-external-drag").fullCalendar('getDate')._d;
				checkFullCalendar(dateSelected);
			});

			$(".fc-next-button").click('click', function () {
				var dateSelected = $("#fc-external-drag").fullCalendar('getDate')._d;
				checkFullCalendar(dateSelected);
			});
		};

		var eventsFullCal = [];

		$(document).ready(function() {
			const timeCluster = {
				meridians: false, 
				mousewheel: true, 
				dropWidth: 200,
				dropPrimaryColor: "#2fb594",
				dropBorder: "1px solid #2dad8d"
			};

			$("#exdate").timeDropper(timeCluster);
		});

		$(document).ready(function() {
			$("#btnResFac").click(function() {
				$("#addModal").modal("show");
			});

			$("#addModal").on("shown.bs.modal", function() {
				doubleTrigger();
			});
		});

		var doubleTrigger = function() {
			$("#switchRes").trigger('click');
			$("#switchRes").trigger('click');
		}

		$(document).ready(function () {
			
			$(".btn-extension").click(function () {
				$("#extendModal").modal("show");
				$("#frm-extend").val($(this).val());
			});

			$("#frm-extend").submit(function(event) {
				event.preventDefault();
				var primeID = $(this).val();

				var startDate = new Date();
				var oldDate = new Date();
				var extendedDate = new Date();

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					url: "{{ url('/facility-reservation/getResDetails') }}", 
					type: "GET", 
					async: false, 
					data: {
						"primeID": primeID
					}, 
					success: function(data){
						data = $.parseJSON(data);
						
						startDate = formatMySQLtoJS(data[0].reservationStart);
						oldDate = formatMySQLtoJS(data[0].reservationEnd);
						extendedDate = formatMySQLtoJS(data[0].reservationEnd);

						var parseTime = $("#exdate").val().split(" ");
						var parseNumTime = parseTime[0].split(":");
						var extendedHours = parseInt(parseNumTime[0]);
						
						if (parseInt(parseNumTime[0]) != 12 && 
							parseTime[1].toLowerCase() == "pm") {
							extendedHours += 12;
						}

						extendedDate.setHours(extendedHours.toString());
						extendedDate.setMinutes(parseNumTime[1].toString());

						if (oldDate >= extendedDate) {
							swal("Error", "Extended time must be greater than the old time!", "error");
						}
						else {
							$.ajax({
								url: "{{ url('/facility-reservation/checkReservation') }}", 
								type: "GET", 
								data: {
									"primeID": primeID, 
									"mysqlTime": formatJStoMySQL(extendedDate), 
									"phpTime": formatJStoPHP(extendedDate)
								}, 
								success: function(data) {
									if (data == "true") {
										//console.log("true");
										
										$.ajax({
											url: "{{ url('/facility-reservation/extend') }}", 
											type: "POST", 
											data: {
												"primeID": primeID, 
												"mysqlTime": formatJStoMySQL(extendedDate), 
												"phpTime": formatJStoPHP(extendedDate)
											}, 
											success: function(evaluation) {
												swal("Successfull", "Reservation is Extended!", "success");
												refreshTable();
											}, 
											error: function(evaluation) {
												var message = "Error: ";
												var data = evaluation.responseJSON;
												for (datum in data) {
													message += data[datum];
												}

												swal("Error", "Cannot fetch table data!\n" + message, "error");
											}
										});
										
									}
									else {
										console.log(primeID);
										swal("Error", "There is reservation on this time", "error");
									}
								}, 
								error: function(evaluation) {
									var message = "Error: ";
									var data = evaluation.responseJSON;
									for (datum in data) {
										message += data[datum];
									}

									swal("Error", "Cannot fetch table data!\n" + message, "error");
								}
							});
						}

						
					}, 
					error: function(errors) {
						var message = "Error: ";
						var data = errors.responseJSON;
						for (datum in data) {
							message += data[datum];
						}

						swal("Error", "Cannot fetch table data!\n" + message, "error");
					}
				});
			})

			$("#btnViewCal").click(function () {
				checkFullCalendar(getCurrentDateTime());
				$("#fc-external-drag").fullCalendar({
					header: {
						left: 'prev,next today', 
						center: 'title', 
						right: "month,agendaWeek,agendaDay"
					}, 
					editable: 0, 
					droppable: 0, 
					events: eventsFullCal, 
					dayClick: function(date, jsEvent, view) {
						if (date >= $("#fc-external-drag").fullCalendar('getDate')) {
							$("#calendarModal").modal("hide");
							swal({
								title: "Save the Date!", 
								text: "Do you want to reserve a facility on this date?",
								icon: "info",
								showCancelButton: true,
								confirmButtonColor: "#00F704",
								confirmButtonText: "YES",
								cancelButtonText: "NO"
							}, 
							function(confirmRes) {
								if (confirmRes) {
									window.setTimeout(function() {
										updateConfirmation(date);	
									}, 500);
								}
								else {
									$("#calendarModal").modal("show");
								}
							});
						}
					},
					eventClick: function(calEvent, jsEvent, view) {
						var id = calEvent.data_id;

						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});

						$.ajax({

							type: 'get',
							url: "{{ url('facility-reservation/getRes') }}",
							data: {"primeID": id},
							success:function(data)
							{
								data = $.parseJSON(data);

								for (index in data) 
								{
									if(data[index].peoplePrimeID==null)	
									{
										$.ajax({

											type: 'get',
											url: "{{ url('facility-reservation/getEditNonRes') }}",
											data: {primeID:id},
											success:function(data)
											{

												data = $.parseJSON(data);

												for (index in data) 
												{

													var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
													var date = new Date(data[index].dateReserved);
													var month = date.getMonth();
													var day = date.getDate();
													var year = date.getFullYear();
													var d = months[month] + ' ' + day + ', ' + year;

													var start = data[index].reservationStart;
													var end = data[index].reservationEnd;

													start = start.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [start];
													end = end.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [end];

													if(start.length > 1){
														start = start.slice(1);
														start[5] = +start[0] < 12 ? 'AM' : 'PM';
														start[0] = +start[0] % 12 || 12;
													}

													if(end.length > 1){
														end = end.slice(1);
														end[5] = +end[0] < 12 ? 'AM' : 'PM';
														end[0] = +end[0] % 12 || 12;
													}

													var st = start.join('');
													var en = end.join('');

													$('#reservationDetails').html(
														'<p style="font-size:18px" align="center">'+
																
																'<b>CREDENTIALS</b> <br><br>' +
																'Reserved By: ' + data[index].name + '<br>' +
																'Age: ' + data[index].age + '<br>' +
																'E-mail: ' + data[index].email + '<br>' +
																'Contact Number: ' + data[index].contactNumber + '<br>' +
																'Residency: Non-resident <br><br>' +
																'<b>RESERVATION INFORMATION</b> <br><br>' +
																'Reservation Name: ' + data[index].reservationName + '<br>' +
																'Reservation Description: ' + data[index].reservationDescription + '<br>' +
																'Facility: ' + data[index].facilityName + '<br>' +
																'Date Reserved: ' + d + '<br>' +
																'Start Time: ' + st + '<br>' +
																'End Time: ' + en + '<br>' +
														'</p>'
														);	
													$('#calendarModal').modal('hide');
													window.setTimeout(function() {
														$('#viewModal').modal('show');
													}, 500)
												}		
											}
										});
									}
									else
									{
										$.ajax({

											type: 'get',
											url: "{{ url('facility-reservation/getEdit') }}",
											data: {primeID:id},
											success:function(data)
											{

												data = $.parseJSON(data);
												var gender='Female';

												for (index in data) 
												{

													var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
													var date = new Date(data[index].dateReserved);
													var month = date.getMonth();
													var day = date.getDate();
													var year = date.getFullYear();
													var d = months[month] + ' ' + day + ', ' + year;

													var start = data[index].reservationStart;
													var end = data[index].reservationEnd;

													start = start.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [start];
													end = end.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [end];

													if(start.length > 1){
														start = start.slice(1);
														start[5] = +start[0] < 12 ? 'AM' : 'PM';
														start[0] = +start[0] % 12 || 12;
													}

													if(end.length > 1){
														end = end.slice(1);
														end[5] = +end[0] < 12 ? 'AM' : 'PM';
														end[0] = +end[0] % 12 || 12;
													}

													var st = start.join('');
													var en = end.join('');

													if(data[index].gender=='M')
													{
														gender='Male';
													}

													$('#reservationDetails').html(
														'<p style="font-size:18px" align="center">'+
																
																'<b>CREDENTIALS</b> <br><br>' +
																'Reserved By: ' + data[index].lastName + ', ' + data[index].firstName + ' '+ data[index].middleName + '<br>' +
																'Gender: ' + gender + '<br>' +
																'Contact Number: ' + data[index].contactNumber + '<br>' +
																'Residency: Resident <br><br>' +
																'<b>RESERVATION INFORMATION</b> <br><br>' +
																'Reservation Name: ' + data[index].reservationName + '<br>' +
																'Reservation Description: ' + data[index].reservationDescription + '<br>' +
																'Facility: ' + data[index].facilityName + '<br>' +
																'Date Reserved: ' + d + '<br>' +
																'Start Time: ' + st + '<br>' +
																'End Time: ' + en + '<br>' +
														'</p>'
													);	
													$('#calendarModal').modal('hide');
													window.setTimeout(function() {
														$('#viewModal').modal('show');
													}, 500)
												}		
											}
										});
									}
								}		
							},
							error: function(errors) {
								var message = "Error: ";
								var data = errors.responseJSON;
								for (datum in data) {
									message += data[datum];
								}

								swal("Error", "Cannot fetch table data!\n" + message, "error");
							}
						});
					}
				});
				$("#calendarModal").modal("show");

				window.setTimeout(clickToday, 1000);

				$("#fc-external-drag").fullCalendar('rerenderEvents');
			});
		});

		var updateConfirmation = function(curDat) {
			swal({
				title: "Confirmation", 
				text: "Is this a reservation for residents?", 
				icon: "info",
				showCancelButton: true,
				confirmButtonColor: "#00F704",
				confirmButtonText: "YES",
				cancelButtonText: "NO"
			}, 
			function(confirmRes2) {
				$("#addModal").modal('show');

				var residentReg2 = false;
				if (confirmRes2) {
					$("#addModal").modal('show');
					residentReg2 = true;
				}

				window.setTimeout(function() {
					updateDateOnModal(curDat, residentReg2);	
				}, 500)
			});
		}

		var updateDateStyle = function() {
			$('script[src="{{ URL::asset('/js/reservationDates.js') }}"]').remove();
			$("<script>").attr("src", "{{ URL::asset('/js/reservationDates.js') }}").appendTo("head");
		}

		var updateDateOnModal = function(curDat, resRev) {
			if (resRev) {
				if (!$("#switchRes").is(":checked")) {
					$("#switchRes").trigger('click');
				}
			}
			else {
				if ($("#switchRes").is(":checked")) {
					$("#switchRes").trigger('click');
				}
			}

			$(document).ready(function() {
				var formattingDate = new Date(curDat.format("YYYY-MM-DD"));
				$("#rdate").val(curDat.format("MM/DD/YYYY"));
			});
		}

		var checkFullCalendar = function (passedDate) {
			$.ajax({
				url: '{{ url("/facility-reservation/gReservations") }}',
				type: 'GET', 
				async: false, 
				data: { "currentDateTime": passedDate }, 
				success: function (data) {
					var data = $.parseJSON(data);
					var eventColor = "#37BC9B";
					eventsFullCal = [];
					for (datum in data) {
						var eventObj = {
							"title": data[datum].reservationName, 
							"start": data[datum].dateReserved + "T" + data[datum].reservationStart, 
							"end": data[datum].dateReserved + "T" + data[datum].reservationEnd, 
							"color": eventColor,
							"data_id": data[datum].primeID
						};
						eventsFullCal.push(eventObj);
					}
				}, 
				error: function(errors) {
						var message = "Error: ";
						var data = errors.responseJSON;
						for (datum in data) {
							message += data[datum];
						}

						swal("Error", "Cannot fetch table data!\n" + message, "error");
					}
			});
		}

		var residentFunc = function(){
			$('#change').html('<div class="row">'+
									'<div class="form-group col-md-6 mb-2">'+
										'<label for="userinput1">Reservation Name</label>'+
										
										'{{ Form::text('name',null,['id'=>'rreservationName','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'minlength'=>'5', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5']) }}'+
									'</div>'+
									'<div class="form-group col-md-6 mb-2">'+
										'<label for="userinput2">Resident</label>'+
										'<select class="select2 form-control" id="residentCbo" name="resiID" style="width: 100%">'+
											'<optgroup id="male" label="Male">'+
											'</optgroup>'+
											'<optgroup id="female" label="Female">'+
											'</optgroup>'+
										'</select>'+	
									'</div>'+
								'</div>'+

								'<div class="row">'+
									'<div class="form-group col-md-6 mb-2">'+
										'<label for="userinput1">Description</label>'+
										'{{ Form::textarea('desc',null,['id'=>'rdesc','class'=>'form-control', 'placeholder'=>'eg.Jun Jun 15th Birthday Party', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters']) }}'+
									'</div>'+
									'<div class="form-group col-md-6 mb-2">'+
										'<label for="userinput2">Facility</label>'+
										"<select class='form-control border-info selectBox' id='facilityCbo'>"+
										'</select>'+
									'</div>'+
								'</div>'+

								'<div class="row">'+
									'<div class="form-group col-md-6 mb-2">'+
										'<label for="userinput1">Date</label>'+
										'{{ Form::text('date',null,['id'=>'rdate','class'=>'form-control', 'min'=>'2017-08-30']) }}'+
									'</div>'+
								'</div>'+

								'<div class="row">'+
									'<div class="form-group col-md-6 mb-2">'+
										'<label for="userinput1">Start Time</label>'+
										'{{ Form::text('startTime',null,['id'=>'rstartTime','class'=>'form-control']) }}'+
									'</div>'+
									'<div class="form-group col-md-6 mb-2">'+
										'<label for="userinput2">End Time</label>'+
										'{{ Form::text('endTime',null,['id'=>'rendTime','class'=>'form-control']) }}'+
									'</div>'+
								'</div>');

						$('#residentCbo').select2();

						$.ajax({
							type: 'GET',
							url: "{{ url('/facility-reservation/getResidents') }}",
							data: {"serviceTransactionPrimeID": 'asd'},
							success: function(data) {

							data = $.parseJSON(data);

								for (index in data) {

									var male = '';
									var female = '';

									if(data[index].gender == 'M')
									{
										male = male + '<option value= '+ data[index].residentPrimeID + '>'+ data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName + '</option>';
							
									}
									else if(data[index].gender == 'F')
									{
										female = female + '<option value= '+ data[index].residentPrimeID + '>' + data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName + '</option>';
									}

									$('#male').append(male);
									$('#female').append(female);

								}
							}
						});

						$.ajax({
							type: 'GET',
							url: "{{ url('/facility-reservation/getFacilities') }}",
							data: {"serviceTransactionPrimeID": 'asd'},
							success: function(data) {

							data = $.parseJSON(data);

								for (index in data) {

								$('#facilityCbo').append($('<option>',{
									value: data[index].primeID,
									text: data[index].facilityName
								}));

								}
							}
						});

			updateDateStyle();
		}
		residentFunc();

	</script>

	<script>
		$(document).on('click', '.edit', function(e) {
			var id = $(this).data('value');

			$.ajax({

				type: 'get',
				url: "{{ url('facility-reservation/getRes') }}",
				data: {primeID:id},
				success:function(data)
				{

					data = $.parseJSON(data);

					for (index in data) {
						if(data[index].peoplePrimeID == null) {
							$('#echange').html(
									'<h4 class="form-section"><i class="icon-eye6"></i>Credentials </h4>'+
									'<div class="row">'+
										'<div class="form-group col-xs-6 col-md-4">'+
											'<label for="userinput1">Reservation Name</label>'+
											'{{ Form::hidden('ereservationID',null,['id'=>'erreservationID','class'=>'form-control']) }}'+
											'{{ Form::text('ereservationName',null,['id'=>'erreservationName','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'maxlength'=>'30','required','style'=>'width:100%;','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5']) }}'+
										'</div>'+
										'<div class="form-group col-xs-6 col-md-4">'+
											'<label for="userinput2">Name</label>'+
											'{{ Form::text('ename',null,['id'=>'ername','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'maxlength'=>'30','required','style'=>'width:100%;','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5']) }}'+
										'</div>'+
										'<div class="form-group col-xs-6 col-md-4">'+
											'<label for="userinput1">Age</label>'+
											'{{ Form::number('eage',null,['id'=>'eage','class'=>'form-control', 'placeholder'=>'eg.Birthday Party','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5']) }}'+
										'</div>'+
									'</div>'+

									'<div class="row">'+
										'<div class="form-group col-md-6 mb-2">'+
											'<label for="userinput2">Email</label>'+
											'{{ Form::text('eemail',null,['id'=>'eemail','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5']) }}'+
										'</div>'+
										'<div class="form-group col-md-6 mb-2">'+
											'<label for="userinput1">Contact Number</label>'+
											'{{ Form::text('econtactNumber',null,['id'=>'econtactNumber','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5']) }}'+
										'</div>'+
									'</div>'+

									'<h4 class="form-section">Reservation</h4>'+
									'<div class="row">'+
										'<div class="form-group col-md-6 mb-2">'+
											'<label for="userinput1">Description</label>'+
											'{{ Form::textarea('edesc',null,['id'=>'erdesc','class'=>'form-control', 'placeholder'=>'eg.Jun Jun 15th Birthday Party', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters']) }}'+
										'</div>'+
										'<div class="form-group col-md-6 mb-2">'+
											'<label for="userinput2">Facility</label>'+
											"<select class='form-control border-info selectBox' id='efacilityID'>"+
											'</select>'+
										'</div>'+
									'</div>'+

									'<div class="row">'+
										'<div class="form-group col-xs-6 col-md-4">'+
											'<label for="userinput1">Date</label>'+
											'{{ Form::text('edate',null,['id'=>'erdate','class'=>'form-control']) }}'+
										'</div>'+
										'<div class="form-group col-xs-6 col-md-4">'+
											'<label for="userinput1">Start Time</label>'+
											'{{ Form::text('estartTime',null,['id'=>'erstartTime','class'=>'form-control']) }}'+
										'</div>'+
										'<div class="form-group col-xs-6 col-md-4">'+
											'<label for="userinput2">End Time</label>'+
											'{{ Form::text('eendTime',null,['id'=>'erendTime','class'=>'form-control']) }}'+
										'</div>'+
									'</div>');

									$.ajax({
										type: 'GET',
										url: "{{ url('/facility-reservation/getFacilities') }}",
										data: {"serviceTransactionPrimeID": 'asd'},
										success: function(data) {

										data = $.parseJSON(data);

											for (index in data) {

											$('#efacilityID').append($('<option>',{
												value: data[index].primeID,
												text: data[index].facilityName
											}));

											}
										}
									});

								$.ajax({
									type: 'get',
									url: "{{ url('/facility-reservation/getEditNonRes') }}",
									data: {primeID:id},
									success:function(data)
									{

										data = $.parseJSON(data);

										for (index in data) 
										{
											var drn = formatMySQLtoJS(data[index].dateReserved);

											var frm = $('#frm-reschedule');
											frm.find('#erreservationID').val(data[index].primeID);
											frm.find('#erreservationName').val(data[index].reservationName);
											frm.find('#ername').val(data[index].name);
											frm.find('#eage').val(data[index].age);
											frm.find('#eemail').val(data[index].email);
											frm.find('#econtactNumber').val(data[index].contactNumber);
											frm.find('#erdesc').val(data[index].reservationDescription);
											frm.find('#efacilityID').val(data[index].facilityPrimeID);
											frm.find('#erdate').val(drn.getMonth() + "/" + drn.getDate() + "/" + 
																	drn.getFullYear());
											frm.find('#erstartTime').val(pullNaturalTimefromMySQL(data[index].reservationStart));
											frm.find('#erendTime').val(pullNaturalTimefromMySQL(data[index].reservationEnd));
										}
										
										
										
										$('#rescheduleModal').modal('show');
										
									}
								})
							
						}	
						else {
							$('#echange').html('<div class="row">'+
												'<div class="form-group col-md-6 mb-2">'+
													'<label for="userinput1">Reservation Name</label>'+
													'{{ Form::hidden('ereservationID',null,['id'=>'erreservationID','class'=>'form-control']) }}'+
													'{{ Form::text('name',null,['id'=>'erreservationName','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'style'=>'width:100%;', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5']) }}'+
												'</div>'+
												'<div class="form-group col-md-6 mb-2">'+
													'<label for="userinput2">Resident</label>'+
													"<select class='form-control select2' style='width=100%;' id='eresidentCbo'>"+
														'<optgroup id="emale" label="Male">'+
														'</optgroup>'+
														'<optgroup id="efemale" label="Female">'+
														'</optgroup>'+
													'</select>'+	
												'</div>'+
											'</div>'+

											'<div class="row">'+
												'<div class="form-group col-md-6 mb-2">'+
													'<label for="userinput1">Description</label>'+
													'{{ Form::textarea('desc',null,['id'=>'erdesc','class'=>'form-control', 'placeholder'=>'eg.Jun Jun 15th Birthday Party', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters']) }}'+
												'</div>'+
												'<div class="form-group col-md-6 mb-2">'+
													'<label for="userinput2">Facility</label>'+
													"<select class='form-control border-info selectBox' id='efacilityCbo'>"+
													'</select>'+
												'</div>'+
											'</div>'+

											'<div class="row">'+
												'<div class="form-group col-md-6 mb-2">'+
													'<label for="userinput1">Date</label>'+
													'{{ Form::text('date',null,['id'=>'erdate','class'=>'form-control']) }}'+
												'</div>'+
											'</div>'+

											'<div class="row">'+
												'<div class="form-group col-md-6 mb-2">'+
													'<label for="userinput1">Start Time</label>'+
													'{{ Form::text('startTime',null,['id'=>'erstartTime','class'=>'form-control']) }}'+
												'</div>'+
												'<div class="form-group col-md-6 mb-2">'+
													'<label for="userinput2">End Time</label>'+
													'{{ Form::text('endTime',null,['id'=>'erendTime','class'=>'form-control']) }}'+
												'</div>'+
											'</div>');

									$('#eresidentCbo').select2();

									$.ajax({
										type: 'GET',
										url: "{{ url('/facility-reservation/getResidents') }}",
										data: {"serviceTransactionPrimeID": 'asd'},
										success: function(data) {

										data = $.parseJSON(data);

											for (index in data) {

												var male = '';
												var female = '';

												if(data[index].gender == 'M')
												{
													male = male + '<option value= '+ data[index].residentPrimeID + '>'+ data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName + '</option>';
										
												}
												else if(data[index].gender == 'F')
												{
													female = female + '<option value= '+ data[index].residentPrimeID + '>' + data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName + '</option>';
												}

												$('#emale').append(male);
												$('#efemale').append(female);

											}
										}
									});

									$.ajax({
										type: 'GET',
										url: "{{ url('/facility-reservation/getFacilities') }}",
										data: {"serviceTransactionPrimeID": 'asd'},
										success: function(data) {

										data = $.parseJSON(data);

											for (index in data) {

											$('#efacilityCbo').append($('<option>',{
												value: data[index].primeID,
												text: data[index].facilityName
											}));

											}
										}
									});

									$.ajax({
										type: 'get',
										url: "{{ url('/facility-reservation/getEdit') }}",
										data: {primeID:id},
										success:function(data)
										{

											data = $.parseJSON(data);

											for (index in data) 
											{
												console.log(data[index].dateReserved);
												var drn = formatMySQLtoJS(data[index].dateReserved);

												var frm = $('#frm-reschedule');
												frm.find('#erreservationID').val(data[index].primeID);
												frm.find('#erreservationName').val(data[index].reservationName);
												frm.find('#eresidentCbo').val(data[index].peoplePrimeID);
												frm.find('#erdesc').val(data[index].reservationDescription);
												frm.find('#efacilityID').val(data[index].facilityPrimeID);
												frm.find('#erdate').val(drn.getMonth() + "/" + drn.getDate() + "/" + 
																			drn.getFullYear());
												frm.find('#erstartTime').val(pullNaturalTimefromMySQL(data[index].reservationStart));
												frm.find('#erendTime').val(pullNaturalTimefromMySQL(data[index].reservationEnd));
											}
											
											
											
											$('#rescheduleModal').modal('show');
											
										}
									})
						}	

						updateDateStyle();
					}		
				}
			});

			

		});
	</script>

	<script>
		$(document).on('click', '.view', function(e) {
			var id = $(this).data('value');

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({

				type: 'get',
				url: "{{ url('facility-reservation/getRes') }}",
				data: {primeID:id},
				success:function(data)
				{

					data = $.parseJSON(data);

					for (index in data) 
					{
						if(data[index].peoplePrimeID==null)	
						{
							$.ajax({

								type: 'get',
								url: "{{ url('facility-reservation/getEditNonRes') }}",
								data: {primeID:id},
								success:function(data)
								{

									data = $.parseJSON(data);

									for (index in data) 
									{

										var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
										var date = new Date(data[index].dateReserved);
										var month = date.getMonth();
										var day = date.getDate();
										var year = date.getFullYear();
										var d = months[month] + ' ' + day + ', ' + year;

										var start = data[index].reservationStart;
										var end = data[index].reservationEnd;

										start = start.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [start];
										end = end.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [end];

										if(start.length > 1){
											start = start.slice(1);
											start[5] = +start[0] < 12 ? 'AM' : 'PM';
											start[0] = +start[0] % 12 || 12;
										}

										if(end.length > 1){
											end = end.slice(1);
											end[5] = +end[0] < 12 ? 'AM' : 'PM';
											end[0] = +end[0] % 12 || 12;
										}

										var st = start.join('');
										var en = end.join('');

										$('#reservationDetails').html(
											'<p style="font-size:18px" align="center">'+
													
													'<b>CREDENTIALS</b> <br><br>' +
													'Reserved By: ' + data[index].name + '<br>' +
													'Age: ' + data[index].age + '<br>' +
													'E-mail: ' + data[index].email + '<br>' +
													'Contact Number: ' + data[index].contactNumber + '<br>' +
													'Residency: Non-resident <br><br>' +
													'<b>RESERVATION INFORMATION</b> <br><br>' +
													'Reservation Name: ' + data[index].reservationName + '<br>' +
													'Reservation Description: ' + data[index].reservationDescription + '<br>' +
													'Facility: ' + data[index].facilityName + '<br>' +
													'Date Reserved: ' + d + '<br>' +
													'Start Time: ' + st + '<br>' +
													'End Time: ' + en + '<br>' +
											'</p>'
											);	
										$('#viewModal').modal('show');
									}		
								}
							});
						}
						else
						{
							$.ajax({

								type: 'get',
								url: "{{ url('facility-reservation/getEdit') }}",
								data: {primeID:id},
								success:function(data)
								{

									data = $.parseJSON(data);
									var gender='Female';

									for (index in data) 
									{

										var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
										var date = new Date(data[index].dateReserved);
										var month = date.getMonth();
										var day = date.getDate();
										var year = date.getFullYear();
										var d = months[month] + ' ' + day + ', ' + year;

										var start = data[index].reservationStart;
										var end = data[index].reservationEnd;

										start = start.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [start];
										end = end.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [end];

										if(start.length > 1){
											start = start.slice(1);
											start[5] = +start[0] < 12 ? 'AM' : 'PM';
											start[0] = +start[0] % 12 || 12;
										}

										if(end.length > 1){
											end = end.slice(1);
											end[5] = +end[0] < 12 ? 'AM' : 'PM';
											end[0] = +end[0] % 12 || 12;
										}

										var st = start.join('');
										var en = end.join('');

										if(data[index].gender=='M')
										{
											gender='Male';
										}

										$('#reservationDetails').html(
											'<p style="font-size:18px" align="center">'+
													
													'<b>CREDENTIALS</b> <br><br>' +
													'Reserved By: ' + data[index].lastName + ', ' + data[index].firstName + ' '+ data[index].middleName + '<br>' +
													'Gender: ' + gender + '<br>' +
													'Contact Number: ' + data[index].contactNumber + '<br>' +
													'Residency: Resident <br><br>' +
													'<b>RESERVATION INFORMATION</b> <br><br>' +
													'Reservation Name: ' + data[index].reservationName + '<br>' +
													'Reservation Description: ' + data[index].reservationDescription + '<br>' +
													'Facility: ' + data[index].facilityName + '<br>' +
													'Date Reserved: ' + d + '<br>' +
													'Start Time: ' + st + '<br>' +
													'End Time: ' + en + '<br>' +
											'</p>'
										);	
										$('#viewModal').modal('show');
									}		
								}
							});
						}
					}		
				}
			});

			

		});

	</script>

	<script>
		$("[name=btnExtend]").click(function(event) {
			event.preventDefault();
		});

		$(document).on('click', '.delete', function(e) {
			var id = $(this).data('value');


			$.ajax({

				type: 'get',
				url: "{{ url('facility-reservation/getRes') }}",
				data: {primeID:id},
				success:function(data)
				{

					data = $.parseJSON(data);

					for (index in data) 
					{
						if(data[index].peoplePrimeID==null)	
						{
								$.ajax({

									type: 'get',
									url: "{{ url('facility-reservation/getEditNonRes') }}",
									data: {primeID:id},
									success:function(data)
									{

										data = $.parseJSON(data);

										for (index in data) 
										{
											swal({
													title: "Are you sure you want to cancel " + data[index].reservationName + "?",
													text: "",
													type: "warning",
													showCancelButton: true,
													confirmButtonColor: "#DD6B55",
													confirmButtonText: "DELETE",
													closeOnConfirm: false
												},
												function(){

													$.ajax({
															type: "post",
															url: "{{ url('/facility-reservation/delete') }}", 
															data: {"_token": "{{ csrf_token() }}",
															primeID:id}, 
															success: function(data) {
																
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

													swal("Successfull", data[index].reservationName + " is cancelled!", "success");
													refreshTable();
												
											});		
										}		
									}
								});
						}
						else
						{
								$.ajax({

									type: 'get',
									url: "{{ url('facility-reservation/getEdit') }}",
									data: {primeID:id},
									success:function(data)
									{

										data = $.parseJSON(data);

										for (index in data) 
										{
											swal({
													title: "Are you sure you want to cancel " + data[index].reservationName + "?",
													text: "",
													type: "warning",
													showCancelButton: true,
													confirmButtonColor: "#DD6B55",
													confirmButtonText: "DELETE",
													closeOnConfirm: false
												},
												function(){

													$.ajax({
															type: "post",
															url: "{{ url('/facility-reservation/delete') }}", 
															data: {"_token": "{{ csrf_token() }}",
															primeID:id}, 
															success: function(data) {
																
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

													swal("Successfull", data[index].reservationName + " is cancelled!", "success");
													refreshTable();
													document.getElementById(data.primeID).submit();
												
											});		
										}		
									}
								});
						}
					}		
				}
			});

					
		});

		// RES SWITCH

		$('#switchRes').change( function() {
			if(this.checked) {
				residentFunc();
			}
			else {
				$('#change').html(
									'<h4 class="form-section"><i class="icon-eye6"></i>Credentials </h4>'+
									'<div class="row">'+
										'<div class="form-group col-xs-6 col-md-4">'+
											'<label for="userinput1">Reservation Name</label>'+
											'{{ Form::text('reservationName',null,['id'=>'rreservationName','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5']) }}'+
										'</div>'+
										'<div class="form-group col-xs-6 col-md-4">'+
											'<label for="userinput2">Name</label>'+
											'{{ Form::text('name',null,['id'=>'rname','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5']) }}'+
										'</div>'+
										'<div class="form-group col-xs-6 col-md-4">'+
											'<label for="userinput1">Age</label>'+
											'{{ Form::number('age',null,['id'=>'age','class'=>'form-control', 'placeholder'=>'eg.8', 'maxlength'=>'3','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 3 digits', 'minlength'=>'1']) }}'+
										'</div>'+
									'</div>'+

									'<div class="row">'+
										'<div class="form-group col-md-6 mb-2">'+
											'<label for="userinput2">Email</label>'+
											'{{ Form::text('email',null,['id'=>'email','class'=>'form-control', 'placeholder'=>'eg.junjun@yahoo.com', 'maxlength'=>'32','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 32 characters', 'minlength'=>'5']) }}'+
										'</div>'+
										'<div class="form-group col-md-6 mb-2">'+
											'<label for="userinput1">Contact Number</label>'+
											'{{ Form::text('contactNumber',null,['id'=>'contactNumber','class'=>'form-control', 'placeholder'=>'eg.09275223489', 'maxlength'=>'11','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 11 dugits', 'minlength'=>'5']) }}'+
										'</div>'+
									'</div>'+

									'<h4 class="form-section">Reservation</h4>'+
									'<div class="row">'+
										'<div class="form-group col-md-6 mb-2">'+
											'<label for="userinput1">Description</label>'+
											'{{ Form::textarea('desc',null,['id'=>'rdesc','class'=>'form-control', 'placeholder'=>'eg.Jun Jun 15th Birthday Party', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters']) }}'+
										'</div>'+
										'<div class="form-group col-md-6 mb-2">'+
											'<label for="userinput2">Facility</label>'+
											"<select class='form-control border-info selectBox' id='facilityID'>"+
											'</select>'+
										'</div>'+
									'</div>'+

									'<div class="row">'+
										'<div class="form-group col-xs-6 col-md-4">'+
											'<label for="userinput1">Date</label>'+
											'{{ Form::text('date',null,['id'=>'rdate','class'=>'form-control']) }}'+
										'</div>'+
										'<div class="form-group col-xs-6 col-md-4">'+
											'<label for="userinput1">Start Time</label>'+
											'{{ Form::text('startTime',null,['id'=>'rstartTime','class'=>'form-control']) }}'+
										'</div>'+
										'<div class="form-group col-xs-6 col-md-4">'+
											'<label for="userinput2">End Time</label>'+
											'{{ Form::text('endTime',null,['id'=>'rendTime','class'=>'form-control']) }}'+
										'</div>'+
									'</div>');

									$.ajax({
										type: 'GET',
										url: "{{ url('/facility-reservation/getFacilities') }}",
										data: {"serviceTransactionPrimeID": 'asd'},
										success: function(data) {

										data = $.parseJSON(data);

											for (index in data) {

											$('#facilityID').append($('<option>',{
												value: data[index].primeID,
												text: data[index].facilityName
											}));

											}
										}
									});

				updateDateStyle();
			}


		});

		// END OF RES SWITCH
		
		$(document).ready(function () {
			jQuery.validator.addMethod("greaterThan", 
				function(value, element, params) {

					if (!/Invalid|NaN/.test(new Date(value))) {
						return new Date(value) > new Date($(params).val());
					}

					return isNaN(value) && isNaN($(params).val()) 
						|| (Number(value) > Number($(params).val())); 
				},'Must be greater than {0}.'
			);

			//$("#rendTime").rules('add', { greaterThan: "#rstartTime" });
		});
		
		$("#frm-reschedule").submit(function(event) {

			event.preventDefault();

			var aSetDet = $("#erdate").val().split("/");

			var startTimeChop = $("#erstartTime").val().split(" ");
			var snumTimeChop = startTimeChop[0].split(":");
			var shour = parseInt(snumTimeChop[0]);
			var sminute = parseInt(snumTimeChop[1]);

			var endTimeChop = $("#erendTime").val().split(" ");
			var enumTimeChop = endTimeChop[0].split(":");
			var ehour = parseInt(enumTimeChop[0]);
			var eminute = parseInt(enumTimeChop[1]);

			if (startTimeChop[1].toLowerCase() == "am") {
				if (shour == 12) {
					shour = 0;
				}
			}

			if (startTimeChop[1].toLowerCase() == "pm") {
				if (shour != 12) {
					shour += 12;
				}
			}

			if (endTimeChop[1].toLowerCase() == "am") {
				if (ehour == 12) {
					ehour = 0;
				}
			}

			if (endTimeChop[1].toLowerCase() == "pm") {
				if (ehour != 12) {
					ehour += 12;
				}
			}

			var aDateReserved = new Date(aSetDet[2], aSetDet[0], aSetDet[1], 0, 0);
			var aStartTime = new Date(aSetDet[2], aSetDet[0], aSetDet[1], shour, sminute);
			var aEndTime = new Date(aSetDet[2], aSetDet[0], aSetDet[1], ehour, eminute);

			if (aStartTime.getHours() > 22 || 
				aStartTime.getHours() < 10) {
				swal("Error", "Starting time must start from 10 AM to 10 PM", "error");
			}
			else if (aEndTime.getHours() > 22 || 
						aEndTime.getHours() < 10) {
				swal("Error", "Ending time must start from 10 AM to 10 PM", "error");
			}
			else if (aStartTime.getHours() > aEndTime.getHours()) {
				swal("Error", "Starting time must not exceed the ending time", "error");
			}
			else if (aStartTime.getHours() == aEndTime.getHours()) {
				swal("Error", "Ending time must exceed the starting time", "error");
			}
			else {
				id = $('#erreservationID').val();
				rid = $('#eresidentCbo').val();
				name = $('#ername').val();
				age = $('#eage').val();
				cn = $('#econtactNumber').val();
				email = $('#eemail').val();
				desc = $('#erdesc').val();
				facility = $('#efacilityID').val();
				efacility = $('#efacilityCbo').val();
				date = formatDate(aDateReserved);
				start = formatDateTime(aStartTime);
				end = formatDateTime(aEndTime);
				resname = $('#erreservationName').val();

				console.log("Date is: " + aDateReserved);
				console.log("Start is: " + start);
				console.log("End is: " + end);

				$.ajax({
					type: 'get',
					url: "{{ url('facility-reservation/getRes') }}",
					data: {primeID:id},
					success:function(data)
					{

						data = $.parseJSON(data);

						for (index in data) 
						{
							if(data[index].peoplePrimeID==null)
							{
								$.ajax({
									url: "{{ url('/facility-reservation/update') }}", 
									method: "POST", 
									data: {
										"_token": "{{ csrf_token() }}", 
										"primeID": id,
										"reservationName": resname, 
										"reservationDescription": desc, 
										"reservationStart": start, 
										"reservationEnd": end, 
										"dateReserved":date,
										"peoplePrimeID": rid,
										"facilityPrimeID": facility,
										"name": name,
										"age": age,
										"email": email,
										"contactNumber": cn,
										
									}, 
									success: function(data) {

										refreshTable();
										$("#rescheduleModal").modal("hide");
										
										$("#frm-resched").trigger("reset");
										swal("Success", "Successfully Rescheduled!", "success");
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
									url: "{{ url('/facility-reservation/update') }}", 
									method: "POST", 
									data: {
										"_token": "{{ csrf_token() }}", 
										"primeID": id,
										"reservationName": resname, 
										"reservationDescription": desc, 
										"reservationStart": start, 
										"reservationEnd": end, 
										"dateReserved":date,
										"peoplePrimeID": rid,
										"facilityPrimeID": efacility,
										"name": name,
										"age": age,
										"email": email,
										"contactNumber": cn,
										
									}, 
									success: function(data) {

										refreshTable();
										$("#rescheduleModal").modal("hide");
										
										$("#frm-resched").trigger("reset");
										swal("Success", "Successfully Rescheduled!", "success");
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
					}
				});
			}

		});

		$("#frm-reserve").submit(function(event) {
			event.preventDefault();
			var frm = $('#frm-reserve');

			if(switchRes.checked == true) {
				
				var aSetDet = $("#rdate").val().split("/");

				var startTimeChop = $("#rstartTime").val().split(" ");
				var snumTimeChop = startTimeChop[0].split(":");
				var shour = parseInt(snumTimeChop[0]);
				var sminute = parseInt(snumTimeChop[1]);

				var endTimeChop = $("#rendTime").val().split(" ");
				var enumTimeChop = endTimeChop[0].split(":");
				var ehour = parseInt(enumTimeChop[0]);
				var eminute = parseInt(enumTimeChop[1]);

				if (startTimeChop[1].toLowerCase() == "am") {
					if (shour == 12) {
						shour = 0;
					}
				}

				if (startTimeChop[1].toLowerCase() == "pm") {
					if (shour != 12) {
						shour += 12;
					}
				}

				if (endTimeChop[1].toLowerCase() == "am") {
					if (ehour == 12) {
						ehour = 0;
					}
				}

				if (endTimeChop[1].toLowerCase() == "pm") {
					if (ehour != 12) {
						ehour += 12;
					}
				}

				var aDateReserved = new Date(aSetDet[2], aSetDet[0], aSetDet[1], 0, 0);
				var aStartTime = new Date(aSetDet[2], aSetDet[0], aSetDet[1], shour, sminute);
				var aEndTime = new Date(aSetDet[2], aSetDet[0], aSetDet[1], ehour, eminute);

				if (aStartTime.getHours() > 22 || 
					aStartTime.getHours() < 10) {
					swal("Error", "Starting time must start from 10 AM to 10 PM", "error");
				}
				else if (aEndTime.getHours() > 22 || 
							aEndTime.getHours() < 10) {
					swal("Error", "Ending time must start from 10 AM to 10 PM", "error");
				}
				else if (aStartTime.getHours() > aEndTime.getHours()) {
					swal("Error", "Starting time must not exceed the ending time", "error");
				}
				else if (aStartTime.getHours() == aEndTime.getHours()) {
				swal("Error", "Ending time must exceed the starting time", "error");
			}
				else {
					$.ajax({
						url: "{{ url('/facility-reservation/residentStore') }}", 
						method: "POST", 
						data: {
							"_token": "{{ csrf_token() }}", 
							"reservationName": $("#rreservationName").val(), 
							"desc": $("#rdesc").val(), 
							"startTime": formatDateTime(aStartTime), 
							"endTime": formatDateTime(aEndTime), 
							"date": formatDate(aDateReserved),
							"peoplePrimeID": $("#residentCbo").val(),
							"facilityPrimeID": $("#facilityCbo").val(),
							
						}, 
						success: function(data) {

							refreshTable();
							$("#addModal").modal("hide");
							
							$("#frm-reserve").trigger("reset");
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
			else {

				var aSetDet = $("#rdate").val().split("/");

				var startTimeChop = $("#rstartTime").val().split(" ");
				var snumTimeChop = startTimeChop[0].split(":");
				var shour = parseInt(snumTimeChop[0]);
				var sminute = parseInt(snumTimeChop[1]);

				var endTimeChop = $("#rendTime").val().split(" ");
				var enumTimeChop = endTimeChop[0].split(":");
				var ehour = parseInt(enumTimeChop[0]);
				var eminute = parseInt(enumTimeChop[1]);

				if (startTimeChop[1].toLowerCase() == "am") {
					if (shour == 12) {
						shour = 0;
					}
				}

				if (startTimeChop[1].toLowerCase() == "pm") {
					if (shour != 12) {
						shour += 12;
					}
				}

				if (endTimeChop[1].toLowerCase() == "am") {
					if (ehour == 12) {
						ehour = 0;
					}
				}

				if (endTimeChop[1].toLowerCase() == "pm") {
					if (ehour != 12) {
						ehour += 12;
					}
				}

				var aDateReserved = new Date(aSetDet[2], aSetDet[0], aSetDet[1], 0, 0);
				var aStartTime = new Date(aSetDet[2], aSetDet[0], aSetDet[1], shour, sminute);
				var aEndTime = new Date(aSetDet[2], aSetDet[0], aSetDet[1], ehour, eminute);

				if (aStartTime.getHours() > 22 || 
					aStartTime.getHours() < 10) {
					swal("Error", "Starting time must start from 10 AM to 10 PM", "error");
				}
				else if (aEndTime.getHours() > 22 || 
							aEndTime.getHours() < 10) {
					swal("Error", "Ending time must start from 10 AM to 10 PM", "error");
				}
				else if (aStartTime.getHours() > aEndTime.getHours()) {
					swal("Error", "Starting time must not exceed the ending time", "error");
				}
				else {
					$.ajax({
						url: "{{ url('/facility-reservation/nonresidentStore') }}", 
						method: "POST", 
						data: {
							"_token": "{{ csrf_token() }}", 
							"reservationName": $("#rreservationName").val(), 
							"desc": $("#rdesc").val(), 
							"startTime": formatDateTime(aStartTime), 
							"endTime": formatDateTime(aEndTime), 
							"date": formatDate(aDateReserved),
							"name": $("#rname").val(),
							"age": $("#age").val(),
							"email": $("#email").val(),
							"contactNumber": $("#contactNumber").val(),
							"facilityPrimeID": $("#facilityID").val(),
							
						}, 
						success: function(data) {
							$("#addModal").modal("hide");
							
							$("#frm-reserve").trigger("reset");
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

		//  ALL REFRESH TABLE

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/facility-reservation/refresh') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {

					$("#table-all").DataTable().clear().draw();
					$("#table-pending").DataTable().clear().draw();
					$("#table-rescheduled").DataTable().clear().draw();
					$("#table-cancelled").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
						
						var passedDate = formatMySQLtoJS(data[index].dateReserved);
						var passedStart = formatMySQLtoJS(data[index].reservationStart);
						var passedEnd = formatMySQLtoJS(data[index].reservationEnd);

						var actions;
						var status;

						if(data[index].status=="Pending") {
							status = '<span class="tag  tag-pill   tag-default tag-info">Pending</span>';
							actions = 	'<span class="dropdown">'+
											'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+
											'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
												'<a href="#" class="dropdown-item view" name="btnView" data-value="' + data[index].primeID + '"><i class="icon-eye6"></i> View</a>'+
												'<a href="#" class="dropdown-item edit" name="btnEdit" data-value="' + data[index].primeID + '"><i class="icon-pen3"></i> Reschedule</a>'+
												'<a href="#" class="dropdown-item delete" name="btnDelete" data-value="' + data[index].primeID + '"><i class="icon-trash4"></i> Cancel</a>'+
											'</span>'+
										'</span>';

							$("#table-pending").DataTable()
								.row.add([
									data[index].reservationName, 
									data[index].facilityName, 
									data[index].firstName + ' ' + data[index].middleName.substring(0,1) + '. ' + data[index].lastName, 
									getReadableDate(passedDate) + '<br>' + getReadableTime(passedStart) + ' - ' + getReadableTime(passedEnd), 
									'<span class="tag tag-pill tag-success">Resident</span>',
									status,
									actions
									
								]).draw(false);
						}
						else if(data[index].status=="Rescheduled") {
							status = '<span class="tag tag-pill tag-default">Resceduled</span>';
							actions = 'N/A';

							$("#table-rescheduled").DataTable()
								.row.add([
									data[index].reservationName, 
									data[index].facilityName, 
									data[index].firstName + ' ' + data[index].middleName.substring(0,1) + '. ' + data[index].lastName, 
									getReadableDate(passedDate) + '<br>' + getReadableTime(passedStart) + ' - ' + getReadableTime(passedEnd), 
									'<span class="tag tag-pill tag-success">Resident</span>',
									status,
									actions
									
								]).draw(false);
						}
						else if(data[index].status=="Cancelled") {
							status = '<span class="tag tag-pill tag-danger">Cancelled</span>';
							actions = 'N/A';

							$("#table-cancelled").DataTable()
								.row.add([
									data[index].reservationName, 
									data[index].facilityName, 
									data[index].firstName + ' ' + data[index].middleName.substring(0,1) + '. ' + data[index].lastName, 
									getReadableDate(passedDate) + '<br>' + getReadableTime(passedStart) + ' - ' + getReadableTime(passedEnd), 
									'<span class="tag tag-pill tag-success">Resident</span>',
									status,
									actions
									
								]).draw(false);
						}
						else if (data[index].status == "Paid") {
							status = '<span class="tag tag-pill tag-success">Paid</span>' + 
										'<br><br>';
							if (data[index].eventStatus == "NYD") {
								status += '<span class="tag tag-default tag-info">Not Yet Done</span>';
								actions = "N/A";
							}
							else if (data[index].eventStatus == "OnGoing") {
								status += '<span class="tag tag-default tag-success">On-Going</span>';
								actions = '<span class="dropdown">' + 
										   		'<button type="button" class="btn btn-info mr-1 btn-extension" value="{{ $reservation -> primeID }}">' + 
													'<i class="icon-dribbble"></i> Extend' + 
												'</button>' + 
											'</span>";';
							}
							else if (data[index].eventStatus == "Extended") {
								status += '<span class="tag tag-default tag-warning">Extended</span>';
								actions = '<span class="dropdown">' + 
										   		'<button type="button" class="btn btn-info mr-1 btn-extension" value="{{ $reservation -> primeID }}">' + 
													'<i class="icon-dribbble"></i> Extend' + 
												'</button>' + 
											'</span>";';
							}
							else {
								status += '<span class="tag tag-default tag-default">Done</span>';
								actions = "N/A";
							}
						}
						else {
							status = '<span class="tag tag-pill tag-success">Finished</span>';
							actions = 'N/A';
							console.log("Status is: " + data[index].status);
						}

						$("#table-all").DataTable()
								.row.add([
									data[index].reservationName, 
									data[index].facilityName, 
									data[index].firstName + ' ' + data[index].middleName.substring(0,1) + '. ' + data[index].lastName, 
									getReadableDate(passedDate) + '<br>' + getReadableTime(passedStart) + ' - ' + getReadableTime(passedEnd), 
									'<span class="tag tag-pill tag-success">Resident</span>',
									status,
									actions
								]).draw(false);
							
					}
					
					$.ajax({
							url: "{{ url('/facility-reservation/refreshNonRes') }}", 
							method: "GET", 
							datatype: "json", 
							success: function(data) {

								data = $.parseJSON(data);

								for (index in data) {
									
									var passedDate = formatMySQLtoJS(data[index].dateReserved);
									var passedStart = formatMySQLtoJS(data[index].reservationStart);
									var passedEnd = formatMySQLtoJS(data[index].reservationEnd);

									var actions;
									var status;

									if(data[index].status=="Pending") {
										status = '<span class="tag  tag-pill   tag-default tag-info">Pending</span>';
										actions = 	'<span class="dropdown">'+
														'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+
														'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
															'<a href="#" class="dropdown-item view" name="btnView" data-value="'+data[index].primeID + '"><i class="icon-eye6"></i> View</a>'+
															'<a href="#" class="dropdown-item edit" name="btnEdit" data-value="'+data[index].primeID + '"><i class="icon-pen3"></i> Reschedule</a>'+
															'<a href="#" class="dropdown-item delete" name="btnDelete" data-value="'+data[index].primeID + '"><i class="icon-trash4"></i> Cancel</a>'+
														'</span>'+
													'</span>';

										$("#table-pending").DataTable()
											.row.add([
												data[index].reservationName, 
												data[index].facilityName, 
												data[index].name, 
												getReadableDate(passedDate) + '<br>' + getReadableTime(passedStart) + ' - ' + getReadableTime(passedEnd), 
												'<span class="tag tag-pill tag-danger">Non-resident</span>',
												status,
												actions
												
											]).draw(false);
									}
									else if(data[index].status=="Rescheduled") {
										status = '<span class="tag tag-pill tag-default">Resceduled</span>';
										actions = 'N/A';

										$("#table-rescheduled").DataTable()
											.row.add([
												data[index].reservationName, 
												data[index].facilityName, 
												data[index].name, 
												getReadableDate(passedDate) + '<br>' + getReadableTime(passedStart) + ' - ' + getReadableTime(passedEnd), 
												'<span class="tag tag-pill tag-danger">Non-resident</span>',
												status,
												actions
												
											]).draw(false);
									}
									else if(data[index].status=="Cancelled") {
										status = '<span class="tag tag-pill tag-danger">Cancelled</span>';
										actions = 'N/A';

										$("#table-cancelled").DataTable()
											.row.add([
												data[index].reservationName, 
												data[index].facilityName, 
												data[index].name, 
												getReadableDate(passedDate) + '<br>' + getReadableTime(passedStart) + ' - ' + getReadableTime(passedEnd), 
												'<span class="tag tag-pill tag-danger">Non-resident</span>',
												status,
												actions
												
											]).draw(false);
									}
									else if (data[index].status == "Paid") {
										status = '<span class="tag tag-pill tag-danger">Cancelled</span>' + 
													'<br><br>';
										if (data[index].eventStatus == "NYD") {
											status += '<span class="tag tag-default tag-info">Not Yet Done</span>';
											actions = "N/A";
										}
										else if (data[index].eventStatus == "OnGoing") {
											status += '<span class="tag tag-default tag-success">On-Going</span>';
											actions = '<span class="dropdown">' + 
															'<button type="button" class="btn btn-info mr-1 btn-extension" value="{{ $reservation -> primeID }}">' + 
																'<i class="icon-dribbble"></i> Extend' + 
															'</button>' + 
														'</span>";';
										}
										else if (data[index].eventStatus == "Extended") {
											status += '<span class="tag tag-default tag-warning">Extended</span>';
											actions = '<span class="dropdown">' + 
															'<button type="button" class="btn btn-info mr-1 btn-extension" value="{{ $reservation -> primeID }}">' + 
																'<i class="icon-dribbble"></i> Extend' + 
															'</button>' + 
														'</span>";';
										}
										else {
											status += '<span class="tag tag-default tag-default">Done</span>';
											actions = "N/A";
										}
									}
									else {
										status = '<span class="tag  tag-pill   tag-success">Finished</span>';
										actions = 'N/A';
									}


									$("#table-all").DataTable()
											.row.add([
												data[index].reservationName, 
												data[index].facilityName, 
												data[index].name, 
												getReadableDate(passedDate) + '<br>' + getReadableTime(passedStart) + ' - ' + getReadableTime(passedEnd), 
												'<span class="tag  tag-pill   tag-danger">Non-resident</span>',
												status,
												actions
												
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

		//END OF ALL REFRESH TABLE

	</script>
@endsection

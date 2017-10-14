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
	Item Reservation
@endsection

@section('js-setting')
	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(ITEM_RESERVATION);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Item Reservation</h2>
		<p class="text-muted mb-0">Reservation for chairs, tables, and particulars.</p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaction</li>
		<li class="breadcrumb-item"><a href="#">Item Reservation</a></li>
	</ol>
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
                    <div class="card-header card-head-custom">
						<h4 class="card-title">Item Reservation</h4>
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
								<button type="button" class="btn btn-outline-info btn-lg" data-toggle="modal" id="btnItemRes" data-target="#addModal" style="width:160px; font-size:13px">
									<i class="icon-edit2"></i> Item Reservation  
								</button>
								<button type="button" class="btn btn-outline-info btn-lg" data-toggle="modal" id="btnViewCal" style="width:160px; font-size:13px">
									<i class="icon-edit2"></i> View Calendar  
								</button>
								<button type="button" class="btn btn-outline-info btn-lg" data-toggle="modal" id="btnReturn" style="width:160px; font-size:13px">
									<i class="icon-edit2"></i> Item Return  
								</button>
							</p>	
						</div>
                        
                        <div class="card-body">
							<div class="card-block">
								<table class="table table-striped multi-ordering dataTable no-footer table-custome-outline-red" style="font-size:14px;width:100%;" id="table-all">
									<thead class="thead-custom-bg-red">
										<tr>
											<th>Name</th>
											<th>Reserved Item</th>
											<th>Reserved By</th>
											<th>Date and Time</th>
											<th>Residency</th>
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

					<!-- MODAL AREA -->
					
					<!-- Reserve Modal -->
					<div class="modal animated bounceInDown text-xs-left" id="addModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header bg-info white">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="myModalLabel2"><i class="icon-globe2"></i> Reserve Item</h4>
								</div>
								<div class="modal-body">
									{{ Form::open(['url'=>'/item/store', 'method' => 'POST','id' => 'frm-reserve']) }}
											<div class="form-group ">
												<input type="checkbox" id="switchRes" class="switchery" data-size="sm" data-color="primary" checked/>
												<label for="switcheryColor" class="card-title ml-1"><p style="font-family:century gothic;font-size:16px">Resident</p></label>
											</div>

											<div id="change">

												<!-- Dynamic Content -->

											</div>
										<div class="form-actions center">
											{{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
										</div>	
									{{ Form::close() }}
								</div>
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
									<h4 class="modal-title" id="myModalLabel2"><i class="icon-android-calendar"></i> Calendar</h4>
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

                </div>
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
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/robust-assets/js/components/forms/select/form-select2.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/timehandle.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/switch.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/fullcalendar.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-action')
	<!-- AJAX Setup -->
	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>

	<!-- Dynamic Page Actions -->
	<script type="text/javascript">
		// Global Variable
		var eventsFullCal = [];

		// Action Event Functions
		$(document).ready(function () {
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

						$.ajax({
							type: 'get',
							url: "{{ url('/facility-reservation/getRes') }}",
							data: {"primeID": id},
							success: function(data) {
								data = $.parseJSON(data);

								for (index in data)  {
									if(data[index].peoplePrimeID == null)	{
										$.ajax({
											type: 'get',
											url: "{{ url('/facility-reservation/getEditNonRes') }}",
											data: {primeID:id},
											success:function(data) {
												data = $.parseJSON(data);

												for (index in data) {
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

													if (start.length > 1) {
														start = start.slice(1);
														start[5] = +start[0] < 12 ? 'AM' : 'PM';
														start[0] = +start[0] % 12 || 12;
													}

													if (end.length > 1) {
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
									else {
										$.ajax({

											type: 'get',
											url: "{{ url('facility-reservation/getEdit') }}",
											data: {primeID:id},
											success:function(data) {
												data = $.parseJSON(data);
												var gender='Female';

												for (index in data) {
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

													if (start.length > 1) {
														start = start.slice(1);
														start[5] = +start[0] < 12 ? 'AM' : 'PM';
														start[0] = +start[0] % 12 || 12;
													}

													if (end.length > 1) {
														end = end.slice(1);
														end[5] = +end[0] < 12 ? 'AM' : 'PM';
														end[0] = +end[0] % 12 || 12;
													}

													var st = start.join('');
													var en = end.join('');

													if(data[index].gender=='M') {
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

		$("#btnItemRes").click(function(event) {
			$("#switchRes").trigger('click');
			$("#switchRes").trigger('click');
		});

		$(document).ready(function(event) {
			$('#switchRes').change(function () { 
				if (this.checked) {
					changeToResident();
					$('#residentCbo').select2();

					$.ajax({
						type: 'GET',
						url: "{{ url('/item-reservation/getResidents') }}",
						success: function(data) {

						data = $.parseJSON(data);

							for (index in data) {

								var male = '';
								var female = '';

								if(data[index].gender == 'M'){
									male = male + '<option value= '+ data[index].residentPrimeID + '>'+ data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName + '</option>';
								}
								else if(data[index].gender == 'F') {
									female = female + '<option value= '+ data[index].residentPrimeID + '>' + data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName + '</option>';
								}
								else {
									// Do Nothing
								}

								$('#male').append(male);
								$('#female').append(female);

							}
						}
					});

					$.ajax({
						type: 'GET',
						url: "{{ url('/item-reservation/getItems') }}",
						success: function(data) {

						data = $.parseJSON(data);

							for (index in data) {
								$('#facilityCbo').append($('<option>',{
									value: data[index].itemID,
									text: data[index].itemName
								}));
							}
						}
					});
				}
				else {
					changeToNonResident();

					$.ajax({
						type: 'GET',
						url: "{{ url('/item-reservation/getItems') }}",
						success: function(data) {

						data = $.parseJSON(data);

							for (index in data) {

							$('#facilityID').append($('<option>',{
								value: data[index].itemID,
								text: data[index].itemName
							}));

							}
						}
					});
				}
			});
		});

		// Self-Defined Functions
		var changeToResident = function() {
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
									'<label for="userinput2">Item</label>'+
									"<select class='form-control border-info selectBox' id='facilityCbo'>"+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="row">'+
								'<div class="form-group col-md-6 mb-2">'+
									'<label for="userinput1">Date</label>'+
									'{{ Form::date('date',null,['id'=>'rdate','class'=>'form-control', 'min'=>'2017-08-30']) }}'+
								'</div>'+
							'</div>'+
							'<div class="row">'+
								'<div class="form-group col-md-6 mb-2">'+
									'<label for="userinput1">Start Time</label>'+
									'{{ Form::time('startTime',null,['id'=>'rstartTime','class'=>'form-control']) }}'+
								'</div>'+
								'<div class="form-group col-md-6 mb-2">'+
									'<label for="userinput2">End Time</label>'+
									'{{ Form::time('endTime',null,['id'=>'rendTime','class'=>'form-control']) }}'+
								'</div>'+
							'</div>');

						$('#residentCbo').select2();
		}

		var changeToNonResident = function() {
			$('#change').html('<h4 class="form-section"><i class="icon-eye6"></i>Credentials </h4>'+
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
										'<label for="userinput2">Item</label>'+
										"<select class='form-control border-info selectBox' id='facilityID'>"+
										'</select>'+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="form-group col-xs-6 col-md-4">'+
										'<label for="userinput1">Date</label>'+
										'{{ Form::date('date',null,['id'=>'rdate','class'=>'form-control']) }}'+
									'</div>'+
									'<div class="form-group col-xs-6 col-md-4">'+
										'<label for="userinput1">Start Time</label>'+
										'{{ Form::time('startTime',null,['id'=>'rstartTime','class'=>'form-control']) }}'+
									'</div>'+
									'<div class="form-group col-xs-6 col-md-4">'+
										'<label for="userinput2">End Time</label>'+
										'{{ Form::time('endTime',null,['id'=>'rendTime','class'=>'form-control']) }}'+
									'</div>'+
								'</div>');
		}

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
				if (confirmRes2) {
					$("#addModal").modal('show');
					
				}
				else {
					$("#addModal").modal('show');
				}

				window.setTimeout(function() {
					updateDateOnModal(curDat);	
				}, 500)
			});
		}

		var updateDateOnModal = function(curDat, resRev) {
			if (resRev) {
				$("#switchRes").trigger('click');
			}
			else {
				$("#switchRes").trigger('click');
			}

			$(document).ready(function() {
				var formattingDate = new Date(curDat.format("YYYY-MM-DD"));
				$("#rdate").val(curDat.format("YYYY-MM-DD"));
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
	</script>

	<!-- Page Submissions -->
	<script type="text/javascript">

	</script>
@endsection

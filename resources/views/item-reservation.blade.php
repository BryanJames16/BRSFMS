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
								<button type="button" class="btn btn-outline-info btn-lg" data-toggle="modal" data-target="#addModal" style="width:160px; font-size:13px">
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
											<th>Reserved Facility</th>
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
									<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> Reserve Item</h4>
								</div>
								<div class="modal-body">
									{{ Form::open(['url'=>'/item/store', 'method' => 'POST','id' => 'frm-reserve']) }}
											<div class="form-group ">
												<input type="checkbox" id="switchRes" class="switchery" data-size="sm" data-color="primary" checked/>
												<label for="switcheryColor" class="card-title ml-1"><p style="font-family:century gothic;font-size:16px">Resident</p></label>
											</div>

											<div id="change">

												

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

	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-checkbox.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/timehandle.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/switch.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/fullcalendar.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-action')
	<script type="text/javascript">
		$("#btnViewCal").click(function(event) {
			$("#calendarModal").modal("show");
		});
	</script>
@endsection

@extends('master.master')

@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
@endsection

@section('vendor-style')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Document Approval
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(DOCUMENT_APPROVAL);
	</script>
@endsection

@section('content-body')
		<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Document Approval</h4>
						<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
						<div class="heading-elements">
							<ul class="list-inline mb-0">
								<li><a data-action="reload"><i class="icon-reload"></i></a></li>
								<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="card-body">
							<div class="card-block">
								<ul class="nav nav-tabs nav-linetriangle no-hover-bg nav-justified">
									<li class="nav-item">
										<a class="nav-link active" id="active-tab3" data-toggle="tab" href="#waiting" aria-controls="active3" aria-expanded="true">Waiting for approval</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="link-tab3" data-toggle="tab" href="#approved" aria-controls="link3" aria-expanded="false">Approved</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="link-tab3" data-toggle="tab" href="#rejected" aria-controls="link3" aria-expanded="false">Rejected</a>
									</li>
								</ul>
								<div class="tab-content px-1 pt-1">
									<div role="tabpanel" class="tab-pane fade active in" id="waiting" aria-labelledby="active-tab3" aria-expanded="true">
										<table class="table table-striped table-bordered multi-ordering" style="font-size:14px;width:100%;" id="table-waiting">
											<thead>
												<tr>
													<td>Requestor Name</td>
													<td>Request Date</td>
													<td>Document</td>
													<td>Quantity</td>
													<td>Status</td>
													<td>Actions</td>
												</tr>
											</thead>

											<tbody>
												@foreach($requests as $request)
												<tr>
													<td>{{ $request -> firstName }} {{ $request -> middleName }} {{ $request -> lastName }}</td> 
													<td>{{ $request -> requestDate }} </td>
													<td>{{ $request -> documentName }} </td>
													<td>{{ $request -> quantity }}</td>
													<td><span class="tag round tag-default tag-info">Waiting for approval</span></td>
													<td>
														<span class="dropdown">
														<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
														<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
															<a href="#" class="dropdown-item view approve" name="btnView" data-value='{{ $request -> documentRequestPrimeID }}'><i class="icon-eye6"></i> Sign and Approve</a>
															<a href="#" class="dropdown-item view reject" name="btnView" data-value='{{ $request -> documentRequestPrimeID }}'><i class="icon-eye6"></i> Reject</a>
														</span>
													</span>
													</td>  
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
									<div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="link-tab3" aria-expanded="false">
										<table class="table table-striped table-bordered multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-approved">
											<thead>
												<tr>
													<td>Requestor Name</td>
													<td>Request Date</td>
													<td>Document</td>
													<td>Quantity</td>
													<td>Status</td>
												</tr>
											</thead>	
											<tbody>
												@foreach($approved as $request)
												<tr>
													<td>{{ $request -> firstName }} {{ $request -> middleName }} {{ $request -> lastName }}</td> 
													<td>{{ $request -> requestDate }} </td>
													<td>{{ $request -> documentName }} </td>
													<td>{{ $request -> quantity }}</td>
													<td><span class="tag round tag-default tag-success">Approved</span></td> 
												</tr>
												@endforeach
												
											</tbody>
										</table>
									</div>
									<div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="link-tab3" aria-expanded="false">
										<table class="table table-striped table-bordered multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-rejected">
											<thead>
												<tr>
													<td>Requestor Name</td>
													<td>Request Date</td>
													<td>Document</td>
													<td>Quantity</td>
													<td>Status</td>
												</tr>
											</thead>	
											<tbody>
												@foreach($rejected as $request)
												<tr>
													<td>{{ $request -> firstName }} {{ $request -> middleName }} {{ $request -> lastName }}</td> 
													<td>{{ $request -> requestDate }} </td>
													<td>{{ $request -> documentName }} </td>
													<td>{{ $request -> quantity }}</td>
													<td><span class="tag round tag-default tag-danger">Rejected</span></td> 
												</tr>
												@endforeach
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

					<div class="card-body collapse in">
						<div class="card-block card-dashboard">
							
							
							

	                    	<div class="modal animated bounceIn text-xs-left" style="overflow-y:scroll;" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close cancel-view" data-dismiss="modal" aria-label="Close" id="modal-dismis">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> View Document</h4>
										</div>
										<div ng-app="maintenanceApp" class="modal-body">
											<div class="card-block">
												<div class="card-text">
													<span>
														<div class="card-text">
															<div id="imgPlaceholder" class="sign-cursor">

															</div>
														</div>
													</span>
												</div>

												<div class="form-actions center">
													<button type="button" data-dismiss="modal" class="btn btn-warning mr-1 cancel-view" id="cancel-view">Cancel</button>
												</div>												
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="modal animated bounceIn text-xs-left" style="overflow-y:scroll;" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> View Document</h4>
										</div>
										<div ng-app="maintenanceApp" class="modal-body">
											<div class="card-block">
												<div class="card-text">
													<span>
														<div class="card-text">
															<div id="imgContainer">

															</div>
														</div>
													</span>
												</div>

												<div class="form-actions center">
													<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>
												</div>												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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

@section('page-level-js')
	
	<script type='text/javascript'>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$(document).on('click', '.reject', function(event) {
			event.preventDefault();
			var id = $(this).data("value"); 

			swal({
					title: "Are you sure you want to reject this entry?",
					text: "",
					type: "warning",
					showCancelButton: true,
					cancelButtonText: "GO BACK", 
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "REJECT REQUEST",
					closeOnConfirm: false
				}, function() {
					$.ajax({
						url: "{{ url('/document-approval/reject') }}", 
						type: "post", 
						data: {"documentRequestPrimeID": id}, 
						success: function(data) {
							refreshWaiting();
							refreshApproved();
							refreshRejected();
							swal("Success", "Successfully Rejected!", "success");
						}, 
						error: function(error) {
							var message = "Error: ";
							var data = error.responseJSON;
							for (datum in data) {
								message += data[datum];
							}

							swal("Error", "Cannot fetch table data!\n" + message, "error");
						}
					});
				}
			);
		});

		var refreshWaiting = function() {
			$.ajax({
				url: "{{ url('/document-approval/refreshWaiting') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-waiting").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
						
						$("#table-waiting").DataTable()
							.row.add([
								data[index].firstName + " " + 
									data[index].middleName + " " + 
									data[index].lastName, 
								data[index].requestDate, 
								data[index].documentName, 
								data[index].quantity, 
								'<span class="tag round tag-default tag-info">Waiting for approval</span>',
								'<span class="dropdown">'+
									'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+
									'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
										'<a href="#" class="dropdown-item view approve" name="btnView" data-value='+ data[index].documentRequestPrimeID +'><i class="icon-eye6"></i> Sign and Approve</a>'+
										'<a href="#" class="dropdown-item view reject" name="btnView" data-value='+ data[index].documentRequestPrimeID +'><i class="icon-eye6"></i> Reject</a>'+
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
				}
			});
		}

		var refreshApproved = function() {
			$.ajax({
				url: "{{ url('/document-approval/refreshApproved') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-approved").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
						
						$("#table-approved").DataTable()
							.row.add([
								data[index].firstName + " " + 
									data[index].middleName + " " + 
									data[index].lastName, 
								data[index].requestDate, 
								data[index].documentName, 
								data[index].quantity,
								'<span class="tag round tag-default tag-success">Approved</span>',
									
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
				}
			});
		}

		var refreshRejected = function() {
			$.ajax({
				url: "{{ url('/document-approval/refreshRejected') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-rejected").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
						
						$("#table-rejected").DataTable()
							.row.add([
								data[index].firstName + " " + 
									data[index].middleName + " " + 
									data[index].lastName, 
								data[index].requestDate, 
								data[index].documentName, 
								data[index].quantity,
								'<span class="tag round tag-default tag-danger">Rejected</span>',
									
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
				}
			});
		}
	
	</script>
	
	
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/jspdf.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/underscore-min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/clndr.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.steps.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/spinner/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/dateTime/moment-with-locales.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/daterange/daterangepicker.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/validation/form-validation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
@endsection
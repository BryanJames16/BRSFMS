<!-- Parent Template -->
@extends('master.master')

<!-- Page Initiatives -->
@section('title')
	Document Request
@endsection

<!-- Preset -->
@section('vendor-style')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
@endsection

<!-- CSS Styles -->
@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
@endsection

@section('custom-css')
	<style>
		.filePreview {
			border: 1px ridge black;
			width: 8.5in;
			height: 11in;
		}

		.fileNumber {
			font-family: "Bookman Old Style";
			font-size: 10px;
		}

		.fileHeader {
			font-family: 'Arial';
			font-size: 15px;
			height: 1in;
			width: 8.5in;
		}

		.fileTitle {
			font-family: "Arial";
			font-size: 35px;
		}

		.fileContent {
			font-family: "Arial";
			font-size: 18px;
		}

		.dataContentFix {
			vertical-align: middle;
		}

		.parIndented {
			text-indent: 2.0em;
		}

		.signaturePane {
			font-size: 17px;
		}

		.bpage {
			background-color: white;
			left: 20%;
			position: absolute;
		}
	</style>
@endsection

@section('page-action')
	<script>
		setSelectedTab(DOCUMENT_REQUEST);
	</script>
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Document Requests</h4>
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
								<button type="button" class="btn btn-outline-info btn-lg" id="btnAddModal"  style="width:160px; font-size:13px">
									<i class="icon-edit2"></i> Request Document 
								</button>

								<!-- Request Modal -->
								<div class="modal animated bounceIn text-xs-left" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> Request a Document</h4>
											</div>
											<div ng-app="maintenanceApp" class="modal-body">
												<div class="card-block">
													<div class="card-text">
														{{ Form::open(['method' => 'POST', 'id' => 'frmReq']) }}

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Request ID</label>
															<div class="col-md-9">
																{{ Form::text('requestID', 
																				null, 
																				['id' => 'requestID', 
																					'class' => 'form-control', 
																					'placeholder' => 'eg.REQ_001', 
																					'maxlength' => '20', 
																					'data-toggle' => 'tooltip', 
																					'data-trigger' => 'focus', 
																					'data-placement' => 'top', 
																					'data-title' => 'Maximum of 20 characters', 
																					'required', 
																					'readonly', 
																					'minlength'=>'5', 
																					'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Requestor Name</label>
															<div class="col-md-9">
																<select class ='form-control border-info selectBox' name='type' id="aRequestor">

																</select>
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Document</label>
															<div class="col-md-9">
																<select class ='form-control border-info selectBox' name='type' id="aDocument">

																</select>
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Quantity</label>
															<div class="col-md-3">
																{{ Form::number('requestQuantity', 
																					null, 
																					['id' => 'requestQuantity', 
																						'class' => 'form-control', 
																						'min' => '1', 
																						'max' => '8', 
																						'maxlength' => '10', 
																						'minlength' => '1', 
																						'step' => '1']) }}
															</div>	
														</div>
													</div>

													<div class="form-actions center">
														<input type="submit" class="btn btn-success" value="Request Document" name="btnRequest">
														<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>

														{{ Form::close() }}
													</div>					
																				
												</div>
											</div>
											<!-- End of Modal Body -->
										</div>
									</div>
								</div> 
								<!-- End of Modal -->
                    		</p>

							<!-- View Modal -->
                    		<div class="modal fade text-xs-left" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> @yield('view-modal-card-title')</h4>
										</div>
										<div class="modal-body">
											<div class="card-block">
												<div class="card-text">
													
												</div>

												

												<div class="form-actions center">
													@yield('view-modal-form-action')
												</div>													
											</div>
										</div>

										<!-- End of Modal Body -->

									</div>
								</div>
							</div> 
							<!-- End of Modal -->

							<table class="table table-striped table-bordered multi-ordering" style="font-size:14px;width:100%;" id="table-container">
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
										<td>{{ $request -> firstName }} {{ $request -> middleName }} {{ $request -> lastName }} {{ $request -> suffix }}</td> 
										<td>{{ $request -> requestDate }} </td>
										<td>{{ $request -> documentName }} </td>
										<td>{{ $request -> quantity }}</td>

										@if ($request -> status == "Pending")
											<td><span class="tag round tag-default tag-info">Pending</span></td>
										@elseif($request -> status == "Cancelled") 
											<td><span class="tag round tag-default tag-danger">Cancelled</span></td>
										@else 
											<td><span class="tag round tag-default tag-success">Approved</span></td>
										@endif
										<td>
											<span class="dropdown">
												<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
												<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
													<a href="#" class="dropdown-item view btnView" name="btnView" data-value='{{ $request -> documentHeaderPrimeID }}'><i class="icon-eye6"></i> View</a>

													@if($request -> status == "Cancelled" || $request -> status == "Approved")
														<a href="#" class="dropdown-item edit btnEdit" name="btnEdit" data-value='{{ $request -> documentHeaderPrimeID }}' style="pointer-events: none; cursor: default;">
															<i class="icon-pen3 grey"></i> 
															<span style="color: grey;">
																Sign
															</span>
														</a>
													@else
														<a href="#" class="dropdown-item edit btnEdit" name="btnEdit" data-value='{{ $request -> documentHeaderPrimeID }}'><i class="icon-pen3"></i> Sign</a>
													@endif	

													@if($request -> status == "Cancelled" || $request -> status == "Approved")
														<a href="#" class="dropdown-item delete btnDelete" name="btnDelete" data-value='{{ $request -> documentHeaderPrimeID }}' style="pointer-events: none; cursor: default;">
															<i class="icon-trash4 grey"></i> 
															<span style="color: grey;">
																Cancel
															</span>
														</a>
													@else
														<a href="#" class="dropdown-item delete btnDelete" name="btnDelete" data-value='{{ $request -> documentHeaderPrimeID }}'><i class="icon-trash4"></i> Cancel</a>
													@endif
												</span>
											</span>
										</td>  
									</tr>
									@endforeach
	                    		</tbody>
	                    	</table>

	                    	<div class="modal animated bounceIn text-xs-left" style="overflow-y:scroll;" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
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
															<div id="imgPlaceholder">

															</div>
														</div>
													</span>
												</div>

												<div class="form-actions center">
													<button type="button" data-dismiss="modal" class="btn btn-warning mr-1" id="cancel-view">Cancel</button>
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

		<div class="bpage" id="lookContainer">

		</div>
	</section>
@endsection

<!-- Javascript Resources -->
@section('vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
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

		$("#btnAddModal").on('click', function() {
			$("#iconModal").modal('show');

			$.ajax({
				url: "{{ url('/document-request/nextPK') }}", 
				method: "GET", 
				success: function(data) {
					if (data == null) {
						// Fetch PK from utilities
					}
					else {
						$("#requestID").val(data);
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

			$.ajax({
				url: "{{ url('/document-request/getRequestor') }}", 
				method: "GET", 
				success: function(data) {
					$("#aRequestor").html("");

					for (datum in data) {
						$("#aRequestor").append(
							"<option value=" + data[datum].residentPrimeID + ">" + 
								data[datum].lastName + ", " + 
								data[datum].firstName + " " + 
								data[datum].middleName + " " + 
								data[datum].suffix + 
							"</option>"
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
				}
			});

			$.ajax({
				url: "{{ url('/document-request/getDocument') }}", 
				method: "GET", 
				success: function(data) {
					$("#aDocument").html("");

					for (datum in data) {
						$("#aDocument").append(
							"<option value=" + data[datum].primeID + ">" + 
								data[datum].documentName + 
							"</option>"
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
				}
			});
		});

		$("#frmReq").submit(function (event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/document-request/store') }}", 
				method: "POST", 
				data: {
					"requestID": $("#requestID").val(), 
					"peoplePrimeID": $("#aRequestor").val(), 
					"documentPrimeID": $("#aDocument").val(),
					"quantity": $("#requestQuantity").val()
				}, 
				success: function(data) {
					$("#iconModal").modal("hide");
					refreshTable();
					$("#frmReq").trigger('reset');
					swal("Success", "Successfully Added!", "success");
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
		});

		$(document).on('click', '.btnDelete', function(event) {
			event.preventDefault();
			var rowID = $(this).data("value"); 

			swal({
					title: "Are you sure you want to delete this entry?",
					text: "",
					type: "warning",
					showCancelButton: true,
					cancelButtonText: "GO BACK", 
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "CANCEL REQUEST",
					closeOnConfirm: false
				}, function() {
					$.ajax({
						url: "{{ url('/document-request/delete') }}", 
						type: "post", 
						data: {"documentHeaderPrimeID": rowID}, 
						success: function(data) {
							refreshTable();
							swal("Success", "Successfully Cancelled!", "success");
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

			return (false);
		});

		$(document).on('click', '.btnEdit', function(event) {
			event.preventDefault();

			var documentHeaderPrimeID = $(this).data("value");

			var documentID = "";
			var documentName = "";
			var documentContent = "";
			var requestorName = "";


			$.ajax({
				type: "GET", 
				url: "{{ url('/document-request/view') }}", 
				data: { "documentHeaderPrimeID": documentHeaderPrimeID }, 
				async: false, 
				success: function(data) {
					documentID = data.documentID;
					documentName = data.documentName;
					documentContent = data.documentContent;
					requestorName = data.requestorName;
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

			$("#pdfModal").modal("show");

			$("#lookContainer").html(
				"<p align='left' class='fileNumber'>&nbsp;&nbsp;" + documentID + "</p><br>" + 
				"<div>" +
					"<table>" +
						"<tr>" + 
						"<td width='192px'><center>" + "<img src='./system-assets/ico/brgy_logo.png' height='100' width='100'>" + "</center></td>" +  
						"<td width='432px'>" + 
							"<center>" + 
								"<span width='20px'></span>" + 
								"<p align='center'>" + 
									"Republic of the Philippines<br>" + 
									"District VI, City of Manila<br>" + 
									"<b>BARANGAY 629 - ZONE 63</b><br>" + 
									"<i>OFFICE OF THE SANGUNIANG BARANGAY</i><br>" + 
									"Hippodromo Street, Sta. Mesa, Manila<br>" + 
								"</p>" + 
							"</center>" + 
						"</td>" + 
						"<td width='192px'><center>" + "<img src='./system-assets/ico/ManilaSeal.png' height='100' width='100'>" + "</center></td>" +  
						"</tr>" + 
					"</table>" + 
				"</div><br><br><br>" + 
				"<div class='dataContentFix'>" + 
					"<table>" + 
						"<th>" + 
							"<td></td>" + 
							"<td></td>" + 
							"<td></td>" + 
						"</th>" +
						"<tr height='30%'></tr>" + 
						"<tr height='70%'>" + 
							"<td width=20px></td>" + 
							"<td valign='center'>" + 
								"<p align='center' valign='middle' class='fileTitle'><b>" + documentName + "</b></p><br><br><br>" + 
								"<p align='left' class='fileContent'>" + documentContent + "</p><br>" + 
							"</td>" + 
							"<td width=20px></td>" + 
						"</tr>" + 
					"</table>" + 
				"</div>" + 
				"<div height='100%'>" +
					"<table width='100%'>" + 
						"<th>" + 
							"<td></td>" + 
							"<td></td>" + 
						"</th>" + 
						"<tr>" + 
							"<td>" + 
								"<br><br>" + 
								"<p valign='bottom' align='center' class='signaturePane'>" + 
									requestorName + 
								"</p>" + 
							"</td>" + 
							"<td>" + 
								"<p align='center' class='fileContent'>" + 
									"Respectfully Yours,<br><br>" + 
								"</p>" + 
								"<p align='center' class='signaturePane'>" + 
									"Rolito A. Innocencio<br>" + 
									"Barangay Chairman<br>" +  
								"</p>" + 
							"</td>" + 
						"</tr>" + 
					"</table>" +  
				"</div>"
			);

			
			var element = $("#lookContainer");

			$("#lookContainer").width("816").height("1056");
			html2canvas(element, {
				width: 816, 
				height: 1056,
				onrendered: function(canvas) {
					var imgData = canvas.toDataURL('image/png');
					
					$("#imgPlaceholder").html(canvas);
					$("#imgPlaceholder").css("cursor", "url('{{ asset('system-assets/images/sign/samplesignature.png') }}'), crosshair");

					var pdfDoc = new jsPDF('p', 'in', [8.5, 13]);

					pdfDoc.setProperties({
						title: documentID + documentName, 
						subject: documentName, 
						author: "Barangay Resident, Services, and Facilities Managemet System", 
						keyword: documentName,
						creator: "Barangay Resident, Services, and Facilities Managemet System"
					});
					pdfDoc.addImage(imgData, 'png', 0, 0);
					var pdfUrl = pdfDoc.output('datauristring');

					/*
					$("#imgPlaceholder").html(
						'<iframe type="application/pdf" src="' + pdfUrl + '" width="100%" height="500px">' + 
						'</iframe>'
					);
					*/
				}
			});
			
			setTimeout(function () {
				$("#lookContainer").width("0").height("0");
				element.html("");
			}, 5000);

			
		});

		$(document).on('click', '.btnView', function(event) {
			event.preventDefault();

			var documentHeaderPrimeID = $(this).data("value");

			var documentID = "";
			var documentName = "";
			var documentContent = "";
			var requestorName = "";


			$.ajax({
				type: "GET", 
				url: "{{ url('/document-request/view') }}", 
				data: { "documentHeaderPrimeID": documentHeaderPrimeID }, 
				async: false, 
				success: function(data) {
					documentID = data.documentID;
					documentName = data.documentName;
					documentContent = data.documentContent;
					requestorName = data.requestorName;
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

			$("#pdfModal").modal("show");

			$("#lookContainer").html(
				"<p align='left' class='fileNumber'>&nbsp;&nbsp;" + documentID + "</p><br>" + 
				"<div>" +
					"<table>" +
						"<tr>" + 
						"<td width='192px'><center>" + "<img src='./system-assets/ico/brgy_logo.png' height='100' width='100'>" + "</center></td>" +  
						"<td width='432px'>" + 
							"<center>" + 
								"<span width='20px'></span>" + 
								"<p align='center'>" + 
									"Republic of the Philippines<br>" + 
									"District VI, City of Manila<br>" + 
									"<b>BARANGAY 629 - ZONE 63</b><br>" + 
									"<i>OFFICE OF THE SANGUNIANG BARANGAY</i><br>" + 
									"Hippodromo Street, Sta. Mesa, Manila<br>" + 
								"</p>" + 
							"</center>" + 
						"</td>" + 
						"<td width='192px'><center>" + "<img src='./system-assets/ico/ManilaSeal.png' height='100' width='100'>" + "</center></td>" +  
						"</tr>" + 
					"</table>" + 
				"</div><br><br><br>" + 
				"<div class='dataContentFix'>" + 
					"<table>" + 
						"<th>" + 
							"<td></td>" + 
							"<td></td>" + 
							"<td></td>" + 
						"</th>" +
						"<tr height='30%'></tr>" + 
						"<tr height='70%'>" + 
							"<td width=20px></td>" + 
							"<td valign='center'>" + 
								"<p align='center' valign='middle' class='fileTitle'><b>" + documentName + "</b></p><br><br><br>" + 
								"<p align='left' class='fileContent'>" + documentContent + "</p><br>" + 
							"</td>" + 
							"<td width=20px></td>" + 
						"</tr>" + 
					"</table>" + 
				"</div>" + 
				"<div height='100%'>" +
					"<table width='100%'>" + 
						"<th>" + 
							"<td></td>" + 
							"<td></td>" + 
						"</th>" + 
						"<tr>" + 
							"<td>" + 
								"<br><br>" + 
								"<p valign='bottom' align='center' class='signaturePane'>" + 
									requestorName + 
								"</p>" + 
							"</td>" + 
							"<td>" + 
								"<p align='center' class='fileContent'>" + 
									"Respectfully Yours,<br><br>" + 
								"</p>" + 
								"<p align='center' class='signaturePane'>" + 
									"Rolito A. Innocencio<br>" + 
									"Barangay Chairman<br>" +  
								"</p>" + 
							"</td>" + 
						"</tr>" + 
					"</table>" +  
				"</div>"
			);

			
			var element = $("#lookContainer");

			$("#lookContainer").width("816").height("1056");
			html2canvas(element, {
				width: 816, 
				height: 1056,
				onrendered: function(canvas) {
					var imgData = canvas.toDataURL('image/png');
					
					$("#imgPlaceholder").html(canvas);

					var pdfDoc = new jsPDF('p', 'in', [8.5, 13]);

					pdfDoc.setProperties({
						title: documentID + documentName, 
						subject: documentName, 
						author: "Barangay Resident, Services, and Facilities Managemet System", 
						keyword: documentName,
						creator: "Barangay Resident, Services, and Facilities Managemet System"
					});
					pdfDoc.addImage(imgData, 'png', 0, 0);
					var pdfUrl = pdfDoc.output('datauristring');

					/*
					$("#imgPlaceholder").html(
						'<iframe type="application/pdf" src="' + pdfUrl + '" width="100%" height="500px">' + 
						'</iframe>'
					);
					*/
				}
			});
			
			setTimeout(function () {
				$("#lookContainer").width("0").height("0");
				element.html("");
			}, 5000);
		});

		$("#cancel-view").on('click', function() {
			$("#imgPlaceholder").css('cursor', 'default');
			$('#imgPlaceholder').off('click');
		});

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/document-request/refresh') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-container").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
						var statusText = "";
						var buttonEditText = "";
						var buttonDelText = "";

						if (data[index].status == "Pending") {
							statusText = "<span class='tag round tag-default tag-info'>Pending</span>";
							buttonEditText = "<a href='#' class='dropdown-item edit btnEdit' name='btnEdit' data-value=" + data[index].documentHeaderPrimeID + "><i class='icon-pen3'></i> Sign</a>";
							buttonDelText = "<a href='#' class='dropdown-item delete btnDelete' name='btnDelete' data-value=" + data[index].documentHeaderPrimeID + "><i class='icon-trash'></i> Cancel</a>";
						}
						else if (data[index].status == "Cancelled") {
							statusText = "<span class='tag round tag-default tag-danger'>Cancelled</span>";
							buttonEditText = "<a href='#'class='dropdown-item delete btnEdit' name='btnEdit' data-value=" + data[index].documentHeaderPrimeID +  " style='pointer-events: none; cursor: default;'>" + 
												"<i class='icon-pen3 grey'></i>" +  
												"<span style='color: grey;'>" + 
													"Sign" + 
												"</span>" + 
											"</a>";
							buttonDelText = "<a href='#'class='dropdown-item delete btnDelete' name='btnDelete' data-value=" + data[index].documentHeaderPrimeID +  " style='pointer-events: none; cursor: default;'>" + 
												"<i class='icon-trash4 grey'></i>" +  
												"<span style='color: grey;'>" + 
													"Cancel" + 
												"</span>" + 
											"</a>";
						} 
						else {
							statusText = "<span class='tag round tag-default tag-success'>Approved</span>";
							buttonEditText = "<a href='#'class='dropdown-item delete btnEdit' name='btnEdit' data-value=" + data[index].documentHeaderPrimeID +  " style='pointer-events: none; cursor: default;'>" + 
												"<i class='icon-pen3 grey'></i>" +  
												"<span style='color: grey;'>" + 
													"Sign" + 
												"</span>" + 
											"</a>";
							buttonDelText = "<a href='#'class='dropdown-item delete btnDelete' name='btnDelete' data-value=" + data[index].documentHeaderPrimeID +  " style='pointer-events: none; cursor: default;'>" + 
												"<i class='icon-trash4 grey'></i>" +  
												"<span style='color: grey;'>" + 
													"Cancel" + 
												"</span>" + 
											"</a>";
						}

						var buttonText = "<span class='dropdown'>" + 
											"<button id='btnSearchDrop2' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' class='btn btn-primary dropdown-toggle dropdown-menu-right'><i class='icon-cog3'></i></button>" + 
											"<span aria-labelledby='btnSearchDrop2' class='dropdown-menu mt-1 dropdown-menu-right'>" + 
												"<a href='#' class='dropdown-item view btnView' name='btnView' data-value=" + data[index].documentHeaderPrimeID + "><i class='icon-eye6'></i> View</a>" + 
												buttonEditText + 
												buttonDelText + 
											"</span>" + 
										"</span>";
													
													

						$("#table-container").DataTable()
							.row.add([
								data[index].firstName + " " + 
									data[index].middleName + " " + 
									data[index].lastName + " " + 
									data[index].suffix, 
								data[index].requestDate, 
								data[index].documentName, 
								data[index].quantity, 
								statusText,
								buttonText
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
	<script src="{{ URL::asset('/js/html2canvas.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/canvas2image.js') }}" type="text/javascript"></script>
@endsection

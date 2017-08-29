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

		#imgPlaceholder {
			overflow: visible;
		}

		.signage {
			cursor: "{{ URL::asset('/system-assets/images/sign/samplesignature.png') }}";
		}
	</style>
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
													<button type="submit" class="btn btn-success mr-1 approveReq" id="submit">Submit</button>
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

		<div id="fixContainer">
			<div id="signContainer" class="signContainer" height="95px" width="185px">

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

		$(document).on('click', '.approve', function(event) {
			event.preventDefault();

			var documentRequestPrimeID = $(this).data("value");

			var documentID = "";
			var documentName = "";
			var documentContent = "";
			var requestorName = "";


			$.ajax({
				type: "GET", 
				url: "{{ url('/document-approval/view') }}", 
				data: { "documentRequestPrimeID": documentRequestPrimeID }, 
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
					$("#imgPlaceholder").css("cursor", "url('{{ asset('/system-assets/images/sign/Handwriting.cur') }}'), crosshair");
					//$("#imgPlaceholder").addClass("sign-cursor");

					var pdfDoc = new jsPDF('p', 'in', [8.5, 11]);

					pdfDoc.setProperties({
						title: documentID + "_-_" + documentName, 
						subject: documentName, 
						author: "Barangay Resident, Services, and Facilities Managemet System", 
						keyword: documentName,
						creator: "Barangay Resident, Services, and Facilities Managemet System"
					});
					//pdfDoc.addImage(imgData, 'png', 0, 0);
					var pdfUrl = pdfDoc.output('datauristring');
					$("#signContainer").html(
						'<img id="signPanel" src="{{ URL::asset("/system-assets/images/sign/samplesignature.png") }}" height="95px" width="185px">'
					);

					$("#imgPlaceholder").click(function(e) {
						var obj = {
							left: e.pageX - ($("#signPanel").width() / 2), 
							top: e.pageY - ($("#signPanel").height() / 2)
						};

						$("#signContainer").clone().appendTo("#imgPlaceholder").show(0).offset(obj);
						$("#fixContainer").html(
							"<div id='signContainer' class='signContainer' height='95px' width='185px'>" + 
							"</div>"
						);
						$("#fixContainer").html($("#imgPlaceHolder").html());
						html2canvas($("#imgPlaceholder"), {
							width: 816, 
							height: 1056, 
							onrendered: function(newDraw) {
								console.log("Written!");
								pdfDoc.addImage(newDraw, 'png', 0, 0);
								pdfDoc.save("DOC-" + getStringDateTime() + ".pdf");
							}, 
							useCORS: true
						});
					});

					/*
					$("#imgPlaceholder").html(
						'<iframe type="application/pdf" src="' + pdfUrl + '" width="100%" height="500px">' + 
						'</iframe>'
					);
					*/
				}
			});
			
			setTimeout(function () {
				//$("#lookContainer").width("0").height("0");
				//$("#lookContainer").html("");
			}, 5000);

			
		});

		

		$(".cancel-view").on('click', function() {
			//$("#imgPlaceholder").css('cursor', 'default');
			//$("#imgPlaceholder").off('click');
			//$("#signContainer").html("");
			//$("#lookContainer").html("");
		});
	
	</script>
	
	
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/timehandle.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/html2canvas.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/canvas2image.js') }}" type="text/javascript"></script>
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
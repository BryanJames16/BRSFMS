@extends('master.master')

<!-- Preset -->
@section('vendor-style')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
@endsection

@section('plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/icomoon.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/selects/select2.min.css') }}" />	
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
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/redBuilder.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/datatable.custom.red.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/jquery-jvectormap-2.0.3.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/morris.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/unslider.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/long-press.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/redBuilder.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/main-card.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
@endsection


<!-- Title of the Page -->
@section('title')
	Query - Document Request
@endsection


<!-- Set All JavaScript Settings -->
@section('js-setting')
	<script type="text/javascript">
		setSelectedTab(QUERY_DOCUMENT);
	</script>
@endsection

@section('content-body')
	<section id="multi-column">
		
        <div class="row">
			<div class="col-xs-4">
				<div class="card">
					<div class="card-header card-head-custom">
						<h4 class="card-title">Query for Document Request</h4>
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
                            <div class="form-body">
                                
								<h6 align="center">DOCUMENT</h6>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName1">Document :</label>
                                                <select name="document" id="document" class="form-control">
                                                    <option value="All">All</option>
                                                    @foreach($documents as $doc)
                                                        <option value="{{ $doc->primeID }}">{{ $doc-> documentName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                       <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName1">Status :</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="All">All</option>
													<option value="Waiting for approval">Waiting for approval</option>
                                                    <option value="Approved">Approved</option>
													<option value="Pending">Pending</option>
													<option value="Cancelled">Cancelled</option>
													<option value="Rejected">Rejected</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName1">Request From Date :</label>
                                                <input type="date" class="form-control" id="fromDate" />
                                            </div>
                                        </div>

										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName1">Request To Date :</label>
                                                <input type="date" class="form-control" id="toDate" />
                                            </div>
                                        </div>

                                        
                                    </div>

                                    
                                </fieldset>

                                <h6 align="center">REQUESTOR</h6>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName1">First Name:</label>
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
                                                <label for="firstName1">Gender :</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="All">All</option>
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </fieldset>
                               

                                <div style="text-align:center">	
                                <p style="text-align:center"<button type="button" class="btn round btn-success query">Query</button></p>
                                </div>

                            </div>
                        </div>
					</div>	
                </div>									
			</div>

            <div class="col-xs-8">
				<div class="card">
					<div class="card-header card-head-custom">
						<h4 class="card-title">Query Result</h4>
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
                        <!-- Resident Tab -->
                        <table class="table table-striped table-custome-outline-red dataex-html5-export" style="font-size:14px;width:100%;" id="table-container">
                            <thead class="thead-custom-bg-red">
                                <tr>
                                    <th>Requestor</th>
                                    <th>Date</th>
                                    <th>Document</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                
                            </tbody>
                        </table>
                        <!-- End of Resident Tab -->
                        </div>
					</div>	
                </div>									
			</div>
		</div>

        <div class="row">
			
		</div>

		<!--View Modal -->
				<div class="modal fade text-xs-left" id="viewModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>View Business</h4>
							</div>

							<!-- START MODAL BODY -->
							<div class="modal-body" width='100%'>
								<p align="center" style="font-size:20px"><b>DOCUMENT REQUEST DETAILS</b></p>
                                    <hr>
                                    <div id="businessDetails">

									</div>
							</div>
							<!-- End of Modal Body -->

						</div>
					</div>
				</div> 
				<!-- End of Modal -->


	</section>

	
@endsection

<!-- Javascript Resources -->
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
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/dateTime/moment-with-locales.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/daterange/daterangepicker.js') }}" type="text/javascript"></script>
	
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jszip.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/pdfmake.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/vfs_fonts.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/buttons.html5.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/buttons.print.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/buttons.colVis.min.js') }}" type="text/javascript"></script>
	
	
	
	<script src="{{ URL::asset('/robust-assets/js/components/forms/validation/form-validation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/wizard-steps.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/jquery.mousewheel.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/jquery.longpress.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/plugins.js') }}" type="text/javascript"></script>



	<script>
		
		$(document).on('click', '.query', function(e) {
			

            var gender = $("#gender :selected").val();
            var document = $("#document").val();
			var status = $("#status").val();


            if($("#gender :selected").val()=='All')
            {
                gender = '';
            }
            if($("#document").val()=='All')
            {
                document = '';
            }
			if($("#status").val()=='All')
            {
                status = '';
            }

            
        
            $.ajax({
				url: "{{ url('/query/document/submit') }}", 
				method: "GET", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"lastName": $("#lastName").val(), 
					"middleName": $("#middleName").val(), 
					"firstName": $("#firstName").val(), 
					"gender": gender, 
					"documentsPrimeID": document, 
					"status": status, 
					"fromDate": $("#fromDate").val(),
					"toDate": $("#toDate").val(),
					
				}, 
				success: function(data) {

                    $("#table-container").DataTable().clear().draw();
                    data = $.parseJSON(data);
                    
                    console.log(data);

					for (index in data)
					{
                        var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].requestDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

						var genderText = "";
                        

						if (data[index].gender == 'M')
						{
							genderText = "Male";
						}
						else
						{
							genderText = "Female";
						}
						

						$("#table-container").DataTable()
								.row.add([
									data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName,
									d, 
									data[index].documentName, 
									data[index].status, 
										'<a href="#" class="btn btn-success view" name="btnView" data-value="' + data[index].documentRequestPrimeID + '"><i class="icon-eye6"></i> View</a>'
									
								]).draw(false);
                    }
					
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
		

		
		

		

		

		


		


		

		//  RESIDENT REFRESH TABLE

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/resident/refresh') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-container").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
					
						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].birthDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

						var statusText = "";
						var genderText = "";
						var image;
						if (data[index].status == 1) {
							statusText = '<span class="tag round tag-default tag-success">Active</span>';
						}
						else {
							statusText = '<span class="tag round tag-default tag-danger">Inactive</span>';
						}

						if (data[index].gender == 'M')
						{
							genderText = "Male";
						}
						else
						{
							genderText = "Female";
						}
						if(data[index].imagePath==null)
						{
							img='<td><a href="#" class="btn btn-info addImage" data-value='+data[index].residentPrimeID+'>Add Image</a></td>'
						}
						else
						{
							img='<td style="width:10%"><a href="#" class="btn  addImage" data-value="'+data[index].residentPrimeID+'">'+
							'<img style="width:100px;height:70px" src=/storage/upload/'+data[index].imagePath+' alt="No image yet"></a></td>'
						}


						$("#table-container").DataTable()
								.row.add([
									img, 
									data[index].residentID, 
									data[index].firstName + ' ' + data[index].middleName.substring(0,1) + '. ' + data[index].lastName, 
									months[month] + ' ' + day + ', ' + year, 
									genderText, 
									data[index].residentType + ' Resident', 
									statusText,
										'<form method="POST" id="' + data[index].residentPrimeID + '" action="/resident/delete" accept-charset="UTF-8"])' + 
											'<input type="hidden" name="residentPrimeID" value="' + data[index].residentPrimeID + '" />' +

											'<span class="dropdown">' +
												'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+ 
												'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">' +
													'<a href="#" class="dropdown-item view" name="btnView" data-value="' + data[index].residentPrimeID + '"><i class="icon-eye6"></i> View</a>' +
													'<a href="#" class="dropdown-item add" name="btnMember" data-value="' + data[index].residentPrimeID+ '"><i class="icon-outbox"></i> Add to Family</a>' +
													'<a href="#" class="dropdown-item edit" name="btnEdit" data-value="' + data[index].residentPrimeID + '"><i class="icon-pen3"></i> Edit</a>' +
													'<a href="#" class="dropdown-item delete" name="btnDelete" data-value="' + data[index].residentPrimeID + '"><i class="icon-trash4"></i> Delete</a>' +
												'</span>' +
											'</span>' + 
											'</form>'
									
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

		//END OF RESIDENT REFRESH TABLE


		//   FAMILY REFRESH TABLE

		var familyRefreshTable = function() {
			$.ajax({
				url: "{{ url('/family/refresh') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-familyContainer").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].familyRegistrationDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

						var statusText = "";
						var genderText = "";
						if (data[index].status == 1) {
							statusText = '<span class="tag round tag-default tag-success">Active</span>';
						}
						else {
							statusText = '<span class="tag round tag-default tag-danger">Inactive</span>';
						}

						if (data[index].gender == 'M')
						{
							genderText = "Male";
						}
						else
						{
							genderText = "Female";
						}


						$("#table-familyContainer").DataTable()
								.row.add([ 
									data[index].familyID, 
									data[index].familyName, 
									data[index].firstName + ' ' + data[index].middleName.substring(0,1) + '. ' + data[index].lastName, 
									data[index].number,
									d,
										'<form method="POST" id="' + data[index].familyPrimeID + '" action="/family/delete" accept-charset="UTF-8"])' + 
											'<input type="hidden" name="residentPrimeID" value="' + data[index].familyPrimeID + '" />' +

											'<span class="dropdown">' +
												'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+ 
												'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">' +
													'<a href="#" class="dropdown-item viewMember" name="btnView" data-value="' + data[index].familyPrimeID + '"><i class="icon-eye6"></i> View</a>' +
													'<a href="#" class="dropdown-item editMember" name="btnEdit" data-value="' + data[index].familyPrimeID + '"><i class="icon-pen3"></i> Add/Remove members</a>' +
													'<a href="#" class="dropdown-item deleteFamily" name="btnDelete" data-value="' + data[index].familyPrimeID + '"><i class="icon-trash4"></i> Delete</a>' +
												'</span>' +
											'</span>' + 
										'</form>'
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

		//  END OF FAMILY REFRESH TABLE

		

		
		@include('resident-refresh');

	</script>
@endsection

@section('template-js')
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/robust-assets/js/components/forms/select/form-select2.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables-extensions/datatable-button/datatable-html5.js') }}" type="text/javascript"></script>
@endsection

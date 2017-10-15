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
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/jquery-jvectormap-2.0.3.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/morris.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/unslider.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/long-press.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
@endsection


<!-- Title of the Page -->
@section('title')
	Query - Resident
@endsection


<!-- Set All JavaScript Settings -->
@section('js-setting')
	<script type="text/javascript">
		setSelectedTab(QUERY_RESIDENT);
	</script>
@endsection

@section('content-body')
	<section id="multi-column">
		
        <div class="row">
			<div class="col-xs-4">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Query for Resident</h4>
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

                                {{Form::open(['url'=>'/query/resident/submit', 'method' => 'POST', 'id' => 'frm-query'])}}

                                <div class="row">
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput2">First Name</label>
                                        {!! Form::text('firstName', null, ['id' => 'firstName','class' => 'form-control border-primary', 'placeholder'=> 'Marc Joseph']) !!}
                                    </div>
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput3">Middle Name</label>
                                        {!! Form::text('middleName', null, ['id' => 'middleName','class' => 'form-control border-primary', 'placeholder'=> 'Mendoza']) !!}
                                    </div>
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput3">Last Name</label>
                                        {!! Form::text('lastName', null, ['id' => 'lastName','class' => 'form-control border-primary', 'placeholder'=> 'Fuellas']) !!}
                                    </div>
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput4">Suffix</label>
                                        {!! Form::text('suffix', null, ['id' => 'suffix','class' => 'form-control border-primary', 'placeholder'=> 'Sr.']) !!}
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput3">Gender</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="All">All</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput2">Civil Status</label>
                                        <select name="civilStatus" id="civilStatus" class="form-control">
                                            <option>All</option>
                                            <option>Married</option>
                                            <option>Single</option>
                                            <option>Widowed</option>
                                            <option>Divorced</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput4">Disbilities</label>
                                        {!! Form::text('disabilities', null, ['id' => 'disabilities','class' => 'form-control border-primary', 'placeholder'=> 'HIV']) !!}
                                    </div>
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput4">Resident Type</label>
                                        <select id="residentType" name="residentType" class="form-control">
                                            <option value="All">All</option>
                                            <option value="Transient">Transient</option>
                                            <option value="Official">Official</option>
                                        </select>
                                    </div>
                                </div>

								<!--
                                <div class="row">
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput4">Work</label>
                                        {!! Form::text('work', null, ['id' => 'work','class' => 'form-control border-primary', 'placeholder'=> '']) !!}
                                    </div>
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput4">Salary</label>
                                        <select class="form-control" name="salary" id="salary">
                                            <option value ="All">All</option>
                                            <option value ="₱0-₱10,000">₱0-₱10,000</option>
                                            <option value="₱10,001-₱50,000">₱10,001-₱50,000</option>
                                            <option value="₱50,001-₱100,000">₱50,001-₱100,000</option>
                                            <option value="₱100,001 and above">₱100,001 and above</option>
                                        </select>
                                    </div>
                                </div>

								-->

                                <div style="text-align:center">	
                                <p style="text-align:center"<button type="button" class="btn round btn-success query">Query</button></p>
                                </div>

                                {{Form::close()}}

                            </div>
                        </div>
					</div>	
                </div>									
			</div>

            <div class="col-xs-8">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Result</h4>
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
                        <table class="table table-striped table-bordered dataex-html5-export" style="font-size:14px;width:100%;" id="table-container">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Birthdate</th>
                                    <th>Gender</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!--
                                @foreach($residents as $resident)
                                    <tr>
                                        @if($resident->imagePath == null)
                                            <td><a href="#" class="btn btn-info addImage" data-value='{{ $resident -> residentPrimeID }}'>Add Image</a>
                                            </td>
                                        @else
                                            <td style="width:10%"><a href="#" class="btn  addImage" data-value='{{ $resident -> residentPrimeID }}'><img style="width:100px;height:70px" src="/storage/upload/{{ $resident->imagePath}}" alt="No image yet"></a></td>
                                        @endif
                                        <td>{{ $resident -> residentID }}</td>
                                        <td>{{ $resident -> firstName }} {{ substr($resident -> middleName,0,1)  }}. {{ $resident -> lastName }}</td>
                                        <td>{{ date('F j, Y',strtotime($resident -> birthDate)) }}</td>

                                        @if ($resident -> gender == 'M')
                                            <td>Male</td>
                                        @else
                                            <td>Female</td>
                                        @endif
                                        
                                        <td>{{ $resident -> residentType }} Resident</td>
                                        
                                        @if ($resident -> status == 1)
                                            
                                            <td><span class="tag tag-default tag-success">Active</span></td>
                                        @else
                                            <td><span class="tag tag-default tag-danger">Inactive</span></td>
                                        @endif
                                        
                                        <td>
                                            
                                            {{Form::open(['url'=>'resident/delete', 'method' => 'POST', 'id' => $resident -> residentPrimeID ])}}

                                                {{Form::hidden('residentPrimeID',$resident->residentPrimeID,['id'=>'residentPrimeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])}}
                                                <input type='hidden' name='residentID' value='{{ $resident -> residentID }}' />
                                                <input type='hidden' name='firstName' value='{{ $resident -> firstName }}' />
                                                <input type='hidden' name='lastName' value='{{ $resident -> lastName }}' />
                                                <input type='hidden' name='middleName' value='{{ $resident -> middleName }}' />
                                                <input type='hidden' name='gender' value='{{ $resident -> gender }}' />
                                                <input type='hidden' name='civilStatus' value='{{ $resident -> civilStatus }}' />
                                                <input type='hidden' name='birthDate' value='{{ $resident -> birthDate }}' />
                                                <input type='hidden' name='suffix' value='{{ $resident -> suffix }}' />
                                                <input type='hidden' name='contactNumber' value='{{ $resident -> contactNumber }}' />
                                                <input type='hidden' name='seniorCitizenID' value='{{ $resident -> seniorCitizenID }}' />
                                                <input type='hidden' name='disabilities' value='{{ $resident -> disabilities }}' />
                                                <input type='hidden' name='residentType' value='{{ $resident -> residentType }}' />
                                                <input type='hidden' name='status' value='{{ $resident -> status }}' />
                                                
                                                <span class="dropdown">
                                                    <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
                                                    <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                        <a href="#" class="dropdown-item view" name="btnView" data-value='{{ $resident -> residentPrimeID }}'><i class="icon-eye6"></i> View</a>
                                                        
                                                        @foreach($memberss as $member)

                                                            @if($member -> residentPrimeID == $resident -> residentPrimeID)
                                                                <a href="#" class="dropdown-item add" name="btnMember" data-value='{{ $resident -> residentPrimeID }}'><i class="icon-outbox"></i> Add to Family</a>
                                                            @endif
                                                        @endforeach
                                                        
                                                        <a href="#" class="dropdown-item edit" name="btnEdit" data-value='{{ $resident -> residentPrimeID }}'><i class="icon-pen3"></i> Edit</a>
                                                        <a href="#" class="dropdown-item delete" name="btnDelete" data-value='{{ $resident -> residentPrimeID }}'><i class="icon-trash4"></i> Delete</a>
                                                    </span>
                                                </span>
                                            {{Form::close()}}
                                        </td>
                                    </tr>
                                @endforeach
                                -->
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

		<!--View RESIDENT -->

				<!--Viiew Modal -->
				<div class="modal fade text-xs-left" id="viewModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>View Resident</h4>
							</div>

							<!-- START MODAL BODY -->
							<div class="modal-body" width='100%'>
								<table width='100%'>
									<thead>
										<tr>
											<td></td>
											<td></td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<span width='20px'></span>
												<div id='viewName'>

												</div>
												<br>
												<div id='viewBirth'>
												
												</div>
												<div id='viewContact'>
												
												</div>
												<div id='viewAddtl'>
												
												</div>
											</td>
											<td align='right'>
												<div id="resPic">
													
												</div>
												
											</td>
										</tr>
									</tbody>
								</table>
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

	
	@include('script-resident');
	
	@include('script-family');

	

	<script>
		

		$(document).on('click', '.query', function(e) {
			

            var gender = $("#gender :selected").val();
            var civilStatus = $("#civilStatus").val();
            var residentType = $("#residentType").val();
            var monthlyIncome = $("#salary").val();
            var suffix = $("#suffix").val();
            var disabilities = $("#disabilities").val();



            if($("#gender :selected").val()=='All')
            {
                gender = '';
            }
            if($("#civilStatus").val()=='All')
            {
                civilStatus = '';
            }
            if($("#residentType").val()=='All')
            {
                residentType = '';
            }
            if($("#salary").val()=='All')
            {
                monthlyIncome = '';
            }
            if($("#suffix").val()==null)
            {
                suffix = '';
            }
            if($("#disabilities").val()==null)
            {
                disabilities = '';
            }


            $.ajax({
				url: "{{ url('/query/resident/submit') }}", 
				method: "GET", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"lastName": $("#lastName").val(), 
					"middleName": $("#middleName").val(), 
					"firstName": $("#firstName").val(), 
					"suffix": suffix, 
					"gender": gender, 
					"civilStatus": civilStatus, 
					"disabilities": disabilities, 
					"residentType": residentType,
					"currentWork": $("#work").val(),
					"monthlyIncome": monthlyIncome,
					
				}, 
				success: function(data) {

                    $("#table-container").DataTable().clear().draw();
                    data = $.parseJSON(data);
                    
                    console.log(data);

					for (index in data)
					{
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
							img='<td style="width:10%">'+
							'<img style="width:100px;height:70px" src=/storage/upload/'+data[index].imagePath+' alt="No image yet"></td>'
						}


						$("#table-container").DataTable()
								.row.add([
									img, 
									data[index].firstName + ' ' + data[index].middleName.substring(0,1) + '. ' + data[index].lastName, 
									months[month] + ' ' + day + ', ' + year, 
									genderText, 
										'<a href="#" class="btn btn-success view" name="btnView" data-value="' + data[index].residentPrimeID + '"><i class="icon-eye6"></i> View</a>'
									
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

		
		
//  VIEW RESIDENT

		$(document).on('click', '.view', function(e) {
			var id = $(this).data('value');

			$.ajax({
				type: 'get',
				url: "{{ url('/query/resident/getEdit') }}", 
				data: {"residentPrimeID":id}, 
				success:function(data)
				{

					data = $.parseJSON(data);

					for (index in data)
					{

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].birthDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

						var sal = data[index].monthlyIncome;

						if(data[index].currentWork=='None')
						{
							sal = "None";
						}

						var gen;
						if(data[index].gender=='M')
						{
							gen = "Male";
						}
						else
						{
							gen = "Female";
						}

						$('#viewName').html(
						"<p style='font-size:20px' align='center'>"+
						"<b>" + 
						data[index].lastName + ", " + data[index].firstName + " " + 
						data[index].middleName + " " + 
						"</b>"+
						"</p>"
						);
					
						$('#viewBirth').html(
							"<p style='font-size:15px' align='center'>"+
							"Birthday: " + d +
							"</p>"
							);
						$('#viewContact').html(
							"<p style='font-size:15px' align='center'>"+
							"Contact Number: "+data[index].contactNumber
							);
						$('#viewAddtl').html(
							"<p style='font-size:15px' align='center'>"+
							"Gender: "+gen + "<br>" + 
							"Civil Status: "+data[index].civilStatus + "<br>" +
							"Senior Citizen ID: "+data[index].seniorCitizenID + "<br>" + 
							"Disabililities: "+data[index].disabilities + "<br>" +  
							"Current Work: "+data[index].currentWork + "<br>" + 
							"Monthly Income: "+ sal + "<br>" + 
							"Resident Type: "+data[index].residentType + "<br>"
						);
						$('#resPic').html(
							'<img style="width:200px;height:180" src="/storage/upload/'+ data[index].imagePath+ '" alt="No image yet">'+
							"<span width='20px'></span>"
						);
						

						$('#viewModal').modal('show');
					}
					
				}, 
				error: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch data!\n" + message, "error");
					console.log("Error: Cannot fetch data!\n" + message);
				}
			})

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

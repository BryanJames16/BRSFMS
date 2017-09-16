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
	Query - Service
@endsection


<!-- Set All JavaScript Settings -->
@section('js-setting')
	<script type="text/javascript">
		setSelectedTab(QUERY_SERVICE);
	</script>
@endsection

@section('content-body')
	<section id="multi-column">
		
        <div class="row">
			<div class="col-xs-4">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Query for Service</h4>
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
                                <div class="row">
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput2">Name</label>
                                        {!! Form::text('firstName', null, ['id' => 'firstName','class' => 'form-control border-primary', 'placeholder'=> '']) !!}
                                    </div>
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput3">Service</label>
                                        {!! Form::text('middleName', null, ['id' => 'middleName','class' => 'form-control border-primary', 'placeholder'=> '']) !!}
                                    </div>
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput3">Date</label>
                                        {!! Form::date('lastName', null, ['id' => 'lastName','class' => 'form-control border-primary']) !!}
                                    </div>
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput4">Age Bracket</label>
                                        {!! Form::text('suffix', null, ['id' => 'suffix','class' => 'form-control border-primary', 'placeholder'=> '']) !!}
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput3">Status</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="All">All</option>
                                            <option value="M">On-going</option>
                                            <option value="F">Pending</option>
											<option value="F">Finished</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput2">Partiipants</label>
                                        {!! Form::number('suffix', null, ['id' => 'suffix','class' => 'form-control border-primary', 'placeholder'=> '']) !!}
                                    </div>
                                </div>


                                <div style="text-align:center">	
                                <p style="text-align:center"<button type="button" class="btn round btn-success">Query</button></p>
                                </div>

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
                        <table class="table table-striped table-bordered multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-container">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Age Bracket</th>
                                    <th>Status</th>
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
	<script src="{{ URL::asset('/robust-assets/js/components/forms/validation/form-validation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/wizard-steps.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/jquery.mousewheel.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/jquery.longpress.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/plugins.js') }}" type="text/javascript"></script>

	
	@include('script-resident');
	
	@include('script-family');

	

	<script>
		

		

		
		

		

		

		


		


		

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
	<script src="{{ URL::asset('/robust-assets/js/components/extensions/long-press.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/jspdf.min.js') }}" type="text/javascript"></script>
@endsection

@extends('master.master')

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
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/redBuilder.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/datatable.custom.red.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/selects/select2.min.css') }}" />	
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/toggle/bootstrap-switch.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/toggle/switchery.min.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/redBuilder.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/main-card.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Business Registration
@endsection

@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(BUSINESS_REGISTRATION);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Business Registration </h2>
		<p class="text-muted mb-0">Registration of Business</p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaction</li>
		<li class="breadcrumb-item"><a href="#">Business Registration</a></li>
	</ol>
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header card-head-custom">
						<h4 class="card-title">Business Registration</h4>
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
								<button type="button" class="btn btn-outline-info btn-lg" id="btnRegModal"  style="width:160px; font-size:13px">
									<i class="icon-edit2"></i> Register Business 
								</button>

								<!-- Register Modal -->
								<div class="modal animated bounceInDown text-xs-left" id="regModal" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info white">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-android-add-circle"></i> Register Business</h4>
											</div>
											<div ng-app="maintenanceApp" class="modal-body">
												<div class="card-block">
													<div class="card-text">

														<div class="form-group ">
															<input type="checkbox" id="switchRes" class="switchery" data-size="xs" data-color="primary" checked/>
															<label for="switcheryColor" class="card-title ml-1"><p style="font-family:century gothic;font-size:16px">Resident</p></label>
														</div>

														{{ Form::open(['method' => 'POST', 'id' => 'frmReg']) }}

														<h4 align="center">Business</h4>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Business ID</label>
															<div class="col-md-9">
																{{ Form::text('businessID', 
																				null, 
																				['id' => 'businessID', 
																					'class' => 'form-control', 
																					'placeholder' => 'eg. 20-198L77', 
																					'maxlength' => '20', 
																					'data-toggle' => 'tooltip', 
																					'data-trigger' => 'focus', 
																					'data-placement' => 'top', 
																					'data-title' => 'Assigned by Bureau of Internal Revenues. Maximum of 20 characters', 
																					'required', 
																					'minlength'=>'5', 
																					'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Original Business Name</label>
															<div class="col-md-9">
																{{ Form::text('originalName', 
																				null, 
																				['id' => 'originalName', 
																					'class' => 'form-control', 
																					'placeholder' => 'eg. RickaDee Salon', 
																					'maxlength' => '20', 
																					'data-toggle' => 'tooltip', 
																					'data-trigger' => 'focus', 
																					'data-placement' => 'top', 
																					'data-title' => 'Maximum of 20 characters', 
																					'required', 
																					'minlength'=>'5', 
																					'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Business Trade Name</label>
															<div class="col-md-9">
																{{ Form::text('tradeName', 
																				null, 
																				['id' => 'tradeName', 
																					'class' => 'form-control', 
																					'placeholder' => 'eg. RickaDee Salon Corporation', 
																					'maxlength' => '20', 
																					'data-toggle' => 'tooltip', 
																					'data-trigger' => 'focus', 
																					'data-placement' => 'top', 
																					'data-title' => 'Maximum of 20 characters', 
																					'required', 
																					'minlength'=>'5', 
																					'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Address</label>
															<div class="col-md-9">
																{{ Form::text('address', 
																				null, 
																				['id' => 'address', 
																					'class' => 'form-control', 
																					'placeholder' => 'eg. 123-ab Halina St. Bacoor, Cavite', 
																					'maxlength' => '250', 
																					'data-toggle' => 'tooltip', 
																					'data-trigger' => 'focus', 
																					'data-placement' => 'top', 
																					'data-title' => 'Maximum of 20 characters', 
																					'required', 
																					'minlength'=>'5', 
																					'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Business Category</label>
															<div class="col-md-9">
																<select class ='form-control border-info selectBox' name='type' id="categoryID">

																</select>
															</div>	
														</div>
													</div>

														<div id="change">
															<h4 align="center">Owner</h4>
															<div class="form-group row">
																<label class="col-md-3 label-control" for="eventRegInput1">Business Owner or Operator</label>
																<div class="col-md-9">
																	<select class ='form-control select2' name='type' id="residentPrimeID" style="width:100%">
																		<optgroup id="male" label="Male">
																				
																		</optgroup>
																		<optgroup id="female" label="Female">
																		
																		</optgroup>
																	</select>
																</div>	
															</div>
														</div>

														

													<p align="center">
														<a href="#" class="btn btn-success register"  name="btnRegister">Register</a>
														<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>

														{{ Form::close() }}
													</p>					
																				
												</div>
											</div>
											<!-- End of Modal Body -->
										</div>
									</div>
								</div> 
								<!-- End of Modal -->

								<!-- Permit Modal -->
								<div class="modal animated bounceInDown text-xs-left" id="permitModal" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog modal-xl" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info white">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-android-list"></i> Barangay Business Clearance</h4>
											</div>
											<div ng-app="maintenanceApp" class="modal-body">
												<input type="hidden" id="hiddenID"></input>
												<p align="center">
													<a href="#" class="btn btn-success" id="print">Print</a>
												</p>
												<p align="center">
													<iframe id="iframe" style="width:80%;height:100%" frameborder="1" src="" ></iframe>
												</p>
											</div>
											<!-- End of Modal Body -->
										</div>
									</div>
								</div> 
								<!-- End of Modal -->

								<!-- EDIT Modal -->
								<div class="modal animated bounceInDown text-xs-left" id="modalEdit" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info white">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-edit"></i> Edit Business Info</h4>
											</div>
											<div ng-app="maintenanceApp" class="modal-body">
												<div class="card-block">
													<div class="card-text">
														{{ Form::open(['method' => 'POST', 'id' => 'frm-update']) }}


														{{ Form::hidden('registrationPrimeID', 
															null, 
															['id' => 'registrationPrimeID', 
																'class' => 'form-control']) }}

														<div class="form-group ">
															<input type="checkbox" id="eswitchRes" class="switchery" data-size="xs" data-color="primary" checked/>
															<label for="switcheryColor" class="card-title ml-1"><p style="font-family:century gothic;font-size:16px">Resident</p></label>
														</div>

														

														<h4 align="center">Business</h4>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Business ID</label>
															<div class="col-md-9">
																{{ Form::text('ebusinessID', 
																				null, 
																				['id' => 'businessID', 
																					'class' => 'form-control', 
																					'placeholder' => 'eg. 20-198L77', 
																					'maxlength' => '20', 
																					'data-toggle' => 'tooltip', 
																					'data-trigger' => 'focus', 
																					'data-placement' => 'top', 
																					'data-title' => 'Assigned by Bureau of Internal Revenues. Maximum of 20 characters', 
																					'required', 
																					'minlength'=>'5', 
																					'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Original Business Name</label>
															<div class="col-md-9">
																{{ Form::text('originalName', 
																				null, 
																				['id' => 'originalName', 
																					'class' => 'form-control', 
																					'placeholder' => 'eg. RickaDee Salon', 
																					'maxlength' => '20', 
																					'data-toggle' => 'tooltip', 
																					'data-trigger' => 'focus', 
																					'data-placement' => 'top', 
																					'data-title' => 'Maximum of 20 characters', 
																					'required', 
																					'minlength'=>'5', 
																					'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Business Trade Name</label>
															<div class="col-md-9">
																{{ Form::text('tradeName', 
																				null, 
																				['id' => 'tradeName', 
																					'class' => 'form-control', 
																					'placeholder' => 'eg. RickaDee Salon Corporation', 
																					'maxlength' => '20', 
																					'data-toggle' => 'tooltip', 
																					'data-trigger' => 'focus', 
																					'data-placement' => 'top', 
																					'data-title' => 'Maximum of 20 characters', 
																					'required', 
																					'minlength'=>'5', 
																					'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Address</label>
															<div class="col-md-9">
																{{ Form::text('address', 
																				null, 
																				['id' => 'address', 
																					'class' => 'form-control', 
																					'placeholder' => 'eg. 123-ab Halina St. Bacoor, Cavite', 
																					'maxlength' => '250', 
																					'data-toggle' => 'tooltip', 
																					'data-trigger' => 'focus', 
																					'data-placement' => 'top', 
																					'data-title' => 'Maximum of 20 characters', 
																					'required', 
																					'minlength'=>'5', 
																					'pattern'=>'^[a-zA-Z0-9-_]+$']) }}
															</div>	
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="eventRegInput1">Business Category</label>
															<div class="col-md-9">
																<select class ='form-control border-info selectBox' name='type' id="ecategoryID">

																</select>
															</div>	
														</div>
													

														<div id="echange">
															<h4 align="center">Owner</h4>
															<div class="form-group row">
																<label class="col-md-3 label-control" for="eventRegInput1">Business Owner or Operator</label>
																<div class="col-md-9">
																	<select class ='form-control select2' name='type' id="eresidentPrimeID" style="width:100%">
																		<optgroup id="emale" label="Male">
																				
																		</optgroup>
																		<optgroup id="efemale" label="Female">
																		
																		</optgroup>
																	</select>
																</div>	
															</div>
														</div>

													<p align="center">
														<a href="#" class="btn btn-success update"  name="btnRegister">Update</a>
														<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>

														{{ Form::close() }}
													</p>					
													</div>						
												</div>
											</div>
											<!-- End of Modal Body -->
										</div>
									</div>
								</div> 
								<!-- End of Modal -->

											<!-- VIEW MODAL -->

											<!-- Modal -->
								<div class="modal animated bounceInDown text-xs-left" id="viewModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info white">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-eye6"></i> View Details</h4>
											</div>
											<div class="modal-body">
												
													<p align="center" style="font-size:20px"><b>BUSINESS DETAILS</b></p>
													<hr>
													<div id="businessDetails">

													</div>

											</div>
															<!-- End of Modal Body -->
										</div>
									</div>
								</div> <!-- End of Modal -->
							</p>

							<table class="table table-striped multi-ordering dataTable no-footer table-custome-outline-red" style="font-size:14px;width:100%;" id="table-container">
								<thead class="thead-custom-bg-red">
                    				<tr>
										<td>Business ID</td>
										<td>Original Name</td>
										<td>Trade Name</td>
										<td>Registration Date</td>
										<td>Owner</td>
										<td>Category</td>
										<td>Actions</td>
									</tr>
                    			</thead>

								<tbody>
									@foreach($regs as $reg)
									<tr>
										<td>{{$reg -> businessID}}</td>
										<td>{{$reg -> originalName}}</td>
										<td>{{$reg -> tradeName}}</td>
										<td>{{ date('F j, Y',strtotime($reg -> registrationDate)) }}</td>
										<td>{{$reg -> lastName}}, {{$reg -> firstName}} {{$reg -> middleName}}</td>
										<td>{{$reg -> categoryName}}</td>
										<td><span class="dropdown">
												<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
												<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
													<a href="#" class="dropdown-item view" name="btnView" data-value=" {{$reg ->registrationPrimeID}}"><i class="icon-eye3"></i> View</a>
													<a href="#" class="dropdown-item permit" name="btnEdit" data-value="{{$reg ->registrationPrimeID}}"><i class="icon-pen3"></i>Business Clearance</a>
													<a href="#" class="dropdown-item edit" name="btnEdit" data-value="{{$reg ->registrationPrimeID}}"><i class="icon-pen3"></i> Edit</a>
													<a href="#" class="dropdown-item delete" name="btnDelete" data-value="{{$reg ->registrationPrimeID}}"><i class="icon-trash4"></i> Delete</a>
												</span>
											</span>
										</td>
									</tr>
									@endforeach
									@foreach($regsN as $regN)
									<tr>
										<td>{{$regN -> businessID}}</td>
										<td>{{$regN -> originalName}}</td>
										<td>{{$regN -> tradeName}}</td>
										<td>{{ date('F j, Y',strtotime($regN -> registrationDate)) }}</td>
										<td>{{$regN -> lastName}}, {{$regN -> firstName}} {{$regN -> middleName}}</td>
										<td>{{$regN -> categoryName}}</td>
										<td><span class="dropdown">
												<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
												<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
													<a href="#" class="dropdown-item view" name="btnView" data-value=" {{$regN ->registrationPrimeID}}"><i class="icon-eye3"></i> View</a>
													<a href="#" class="dropdown-item permit" name="btnEdit" data-value="{{$regN ->registrationPrimeID}}"><i class="icon-pen3"></i>Business Clearance</a>
													<a href="#" class="dropdown-item edit" name="btnEdit" data-value="{{$regN ->registrationPrimeID}}"><i class="icon-pen3"></i> Edit</a>
													<a href="#" class="dropdown-item delete" name="btnDelete" data-value="{{$regN ->registrationPrimeID}}"><i class="icon-trash4"></i> Delete</a>
												</span>
											</span>
										</td>
									</tr>
									@endforeach
								</tbody>	
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('page-action')
	<script type="text/javascript">
		setSelectedTab(BUSINESS_REGISTRATION);
	</script>

	<script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		var resident = function () {
			$('#change').html(
				'<h4 align="center">Owner</h4>'+
				'<div class="form-group row">'+
					'<label class="col-md-3 label-control" for="eventRegInput1">Business Owner or Operator</label>'+
					'<div class="col-md-9">'+
						'<select class ="form-control select2" name="type" id="residentPrimeID" style="width:100%">'+
							'<optgroup id="male" label="Male">'+
									
							'</optgroup>'+
							'<optgroup id="female" label="Female">'+
							
							'</optgroup>'+
						'</select>'+
					'</div>'+
				'</div>'
			);

			$('#residentPrimeID').select2();

			$.ajax({
					url: '/business-registration/owner', 
					type: 'GET', 
					success: function(data) {

						

						for(index in data)
						{
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
					}, 
					error: function(errors) {
						var message = "Errors: ";
						var data = errors.responseJSON;
						for (datum in data) {
							message += data[datum];
						}

						swal("Error", message, "error");
					}
				});
		};


		var nonResident = function () {
			$('#change').html(
				'<h4 align="center">Owner</h4>'+
				'<div class="form-group row">'+
					'<label class="col-md-2 label-control" for="eventRegInput1">First Name</label>'+
					'<div class="col-md-4">'+
						'<input type="text" class ="form-control select2" id="firstName" placeholder="Johny">'+
					'</div>'+
					'<label class="col-md-2 label-control" for="eventRegInput1">Middle Name</label>'+
					'<div class="col-md-4">'+
						'<input type="text" class ="form-control select2" id="middleName" placeholder="Reyes">'+
					'</div>'+
				'</div>'+
				'<div class="form-group row">'+
					'<label class="col-md-2 label-control" for="eventRegInput1">Last Name</label>'+
					'<div class="col-md-4">'+
						'<input type="text" class ="form-control select2" id="lastName" placeholder="Avelino">'+
					'</div>'+
					'<label class="col-md-2 label-control" for="eventRegInput1">Contact Number</label>'+
					'<div class="col-md-4">'+
						'<input type="text" class ="form-control select2" id="contactNumber" placeholder="09265436578">'+
					'</div>'+
				'</div>'+
				'<div class="form-group row">'+
					'<label class="col-md-2 label-control" for="eventRegInput1">Gender</label>'+
					'<div class="col-md-5">'+
						'<select name="gender" id="gender" class="form-control">'+
							'<option value="M">MALE</option>'+
							'<option value="F">FEMALE</option>'+
						'</select>'+
					'</div>'+
				'</div>'
				
			);
		};

		$('#eswitchRes').change( function() {
			if(this.checked) {
				$('#echange').html(
					'<h4 align="center">Owner</h4>'+
					'<div class="form-group row">'+
						'<label class="col-md-3 label-control" for="eventRegInput1">Business Owner or Operator</label>'+
						'<div class="col-md-9">'+
							'<select class ="form-control select2" name="type" id="eresidentPrimeID" style="width:100%">'+
								'<optgroup id="emale" label="Male">'+
										
								'</optgroup>'+
								'<optgroup id="efemale" label="Female">'+
								
								'</optgroup>'+
							'</select>'+
						'</div>'+
					'</div>'
				);

				$('#eresidentPrimeID').select2();

				$.ajax({
						url: '/business-registration/owner', 
						type: 'GET', 
						success: function(data) {

							

							for(index in data)
							{
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
						}, 
						error: function(errors) {
							var message = "Errors: ";
							var data = errors.responseJSON;
							for (datum in data) {
								message += data[datum];
							}

							swal("Error", message, "error");
						}
					});
			}
			else
			{
				$('#echange').html(
					'<h4 align="center">Owner</h4>'+
					'<div class="form-group row">'+
						'<label class="col-md-2 label-control" for="eventRegInput1">First Name</label>'+
						'<div class="col-md-4">'+
							'<input type="text" class ="form-control select2" id="firstName" placeholder="Johny">'+
						'</div>'+
						'<label class="col-md-2 label-control" for="eventRegInput1">Middle Name</label>'+
						'<div class="col-md-4">'+
							'<input type="text" class ="form-control select2" id="middleName" placeholder="Reyes">'+
						'</div>'+
					'</div>'+
					'<div class="form-group row">'+
						'<label class="col-md-2 label-control" for="eventRegInput1">Last Name</label>'+
						'<div class="col-md-4">'+
							'<input type="text" class ="form-control select2" id="lastName" placeholder="Avelino">'+
						'</div>'+
						'<label class="col-md-2 label-control" for="eventRegInput1">Contact Number</label>'+
						'<div class="col-md-4">'+
							'<input type="text" class ="form-control select2" id="contactNumber" placeholder="09265436578">'+
						'</div>'+
					'</div>'+
					'<div class="form-group row">'+
						'<label class="col-md-2 label-control" for="eventRegInput1">Gender</label>'+
						'<div class="col-md-5">'+
							'<select name="gender" id="gender" class="form-control">'+
								'<option value="M">MALE</option>'+
								'<option value="F">FEMALE</option>'+
							'</select>'+
						'</div>'+
					'</div>'
					
				);
			}
		});

		$('#switchRes').change( function() {
			if(this.checked) {
				resident();	
			}
			else
			{
				nonResident();
			}
		});

		$(document).on('click', '.register', function(e) {
        
			$.ajax({
				url: '/business-registration/store', 
				type: 'POST', 
				data: {
					"businessID": $("#businessID").val(), 
					"originalName": $("#originalName").val(), 
					"tradeName": $("#tradeName").val(), 
					"residentPrimeID": $("#residentPrimeID").val(), 
					"address": $("#address").val(), 
					"firstName": $("#firstName").val(), 
					"middleName": $("#middleName").val(), 
					"lastName": $("#lastName").val(), 
					"gender": $("#gender").val(), 
					"contactNumber": $("#contactNumber").val(), 
					"categoryID": $("#categoryID").val()
				}, 
				success: function(data) {
					refreshTable();
					
					$("#regModal").modal('hide');
					
					$("#frmReg").trigger('reset');
					swal("Success", "Successfully Registered Business!", "success");
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

		$(document).on('click', '.view', function(e) {
			var id = $(this).data('value');

			$.ajax({
				url: '/business-registration/check', 
				type: 'GET', 
				data: {
					'registrationPrimeID':id
				},
				success: function(data) {


					for(index in data)
					{
						if(data[index].residentPrimeID==null)
						{
							$.ajax({

								type: 'get',
								url: "{{ url('business-registration/getDetailsN') }}",
								data: {registrationPrimeID:id},
								success:function(data)
								{

									data = $.parseJSON(data);

									for (index in data) 
									{
										
								

											var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
											var date = new Date(data[index].registrationDate);
											var month = date.getMonth();
											var day = date.getDate();
											var year = date.getFullYear();
											var d = months[month] + ' ' + day + ', ' + year;

											var start = data[index].reservationStart;
											var end = data[index].reservationEnd;
											var g;

											if(data[index].gender=='M')
											{
												g = "Male";
											}
											else{
												g = "Female";
											}

											
											$('#businessDetails').html(
												'<p style="font-size:18px" align="center">'+
														
														'<b>BUSINESS</b> <br><br>' +
														'Business ID:  ' + data[index].businessID + '<br>' +
														'Original Name:  ' + data[index].originalName + '<br>' +
														'Trade Name:  ' + data[index].tradeName + '<br>' +
														'Date Registered:  ' + d + '<br>' +
														'Category:  ' + data[index].categoryName + '<br><br>' +
														'<b>BUSINESS OWNER</b> <br><br>' +
														'Name: ' + data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName + '<br>' +
														'Contact Number: ' + data[index].contactNumber + '<br>' +
														'Gender: ' + g + '<br>' +
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
								url: "{{ url('business-registration/getDetails') }}",
								data: {registrationPrimeID:id},
								success:function(data)
								{

									data = $.parseJSON(data);

									for (index in data) 
									{
										
								

											var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
											var date = new Date(data[index].registrationDate);
											var month = date.getMonth();
											var day = date.getDate();
											var year = date.getFullYear();
											var d = months[month] + ' ' + day + ', ' + year;

											var start = data[index].reservationStart;
											var end = data[index].reservationEnd;
											var g;

											if(data[index].gender=='M')
											{
												g = "Male";
											}
											else{
												g = "Female";
											}

											
											$('#businessDetails').html(
												'<p style="font-size:18px" align="center">'+
														
														'<b>BUSINESS</b> <br><br>' +
														'Business ID:  ' + data[index].businessID + '<br>' +
														'Original Name:  ' + data[index].originalName + '<br>' +
														'Trade Name:  ' + data[index].tradeName + '<br>' +
														'Date Registered:  ' + d + '<br>' +
														'Category:  ' + data[index].categoryName + '<br><br>' +
														'<b>BUSINESS OWNER</b> <br><br>' +
														'Name: ' + data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName + '<br>' +
														'Contact Number: ' + data[index].contactNumber + '<br>' +
														'Gender: ' + g + '<br>' +
												'</p>'
												);	
											$('#viewModal').modal('show');
								
										
									}		
								}
							});
						}
					}
				}, 
				error: function(errors) {
					var message = "Errors: ";
					var data = errors.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});

			

			

		});

		$(document).on('click', '.edit', function(e) {
			var id = $(this).data("value");

			$.ajax({
				url: '/business-registration/check', 
				type: 'GET', 
				data: {
					'registrationPrimeID':id
				},
				success: function(data) {


					for(index in data)
					{
						if(data[index].residentPrimeID==null)
						{
							$("#eswitchRes").trigger('click');
							$('#echange').html(
								'<h4 align="center">Owner</h4>'+
								'<div class="form-group row">'+
									'<label class="col-md-2 label-control" for="eventRegInput1">First Name</label>'+
									'<div class="col-md-4">'+
										'<input type="text" class ="form-control select2" id="firstName" placeholder="Johny">'+
									'</div>'+
									'<label class="col-md-2 label-control" for="eventRegInput1">Middle Name</label>'+
									'<div class="col-md-4">'+
										'<input type="text" class ="form-control select2" id="middleName" placeholder="Reyes">'+
									'</div>'+
								'</div>'+
								'<div class="form-group row">'+
									'<label class="col-md-2 label-control" for="eventRegInput1">Last Name</label>'+
									'<div class="col-md-4">'+
										'<input type="text" class ="form-control select2" id="lastName" placeholder="Avelino">'+
									'</div>'+
									'<label class="col-md-2 label-control" for="eventRegInput1">Contact Number</label>'+
									'<div class="col-md-4">'+
										'<input type="text" class ="form-control select2" id="contactNumber" placeholder="09265436578">'+
									'</div>'+
								'</div>'+
								'<div class="form-group row">'+
									'<label class="col-md-2 label-control" for="eventRegInput1">Gender</label>'+
									'<div class="col-md-5">'+
										'<select name="gender" id="gender" class="form-control">'+
											'<option value="M">MALE</option>'+
											'<option value="F">FEMALE</option>'+
										'</select>'+
									'</div>'+
								'</div>'
								
							);

							$.ajax({
								url: '/business-registration/category', 
								type: 'GET', 
								success: function(data) {

									$('#ecategoryID').html('');

									for (datum in data) {
										$("#ecategoryID").append(
											'<option value="' + data[datum].categoryPrimeID + '">' + 
												data[datum].categoryName + 
											'</option>' 
										);
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

							$.ajax({
								type: 'get',
								url: "{{ url('/business-registration/getEdit') }}",
								data: {registrationPrimeID:id},
								success:function(data)
								{
									var frm = $('#frm-update');
									frm.find('#registrationPrimeID').val(data.registrationPrimeID);
									frm.find('#businessID').val(data.businessID);
									frm.find('#originalName').val(data.originalName);
									frm.find('#tradeName').val(data.tradeName);
									frm.find('#firstName').val(data.firstName);
									frm.find('#middleName').val(data.middleName);
									frm.find('#lastName').val(data.lastName);
									frm.find('#gender').val(data.gender);
									frm.find('#contactNumber').val(data.contactNumber);
									frm.find('#address').val(data.address);
									frm.find('#ecategoryID').val(data.categoryID);

									
									$('#modalEdit').modal('show');
								}
							})
						}					
						else
						{
							$.ajax({
									url: '/business-registration/owner', 
									type: 'GET', 
									success: function(data) {


										for(index in data)
										{
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
									}, 
									error: function(errors) {
										var message = "Errors: ";
										var data = errors.responseJSON;
										for (datum in data) {
											message += data[datum];
										}

										swal("Error", message, "error");
									}
								});

								$.ajax({
									url: '/business-registration/category', 
									type: 'GET', 
									success: function(data) {

										$('#ecategoryID').html('');

										for (datum in data) {
											$("#ecategoryID").append(
												'<option value="' + data[datum].categoryPrimeID + '">' + 
													data[datum].categoryName + 
												'</option>' 
											);
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

								$.ajax({
									type: 'get',
									url: "{{ url('/business-registration/getEdit') }}",
									data: {registrationPrimeID:id},
									success:function(data)
									{
										var frm = $('#frm-update');
										frm.find('#registrationPrimeID').val(data.registrationPrimeID);
										frm.find('#businessID').val(data.businessID);
										frm.find('#originalName').val(data.originalName);
										frm.find('#tradeName').val(data.tradeName);
										frm.find('#eresidentPrimeID').val(data.residentPrimeID);
										frm.find('#address').val(data.address);
										frm.find('#ecategoryID').val(data.categoryID);

										
										$('#modalEdit').modal('show');
									}
								})
						}	
					}
				}, 
				error: function(errors) {
					var message = "Errors: ";
					var data = errors.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});

			

		});

		$(document).on('click', '#print', function(e) {
			var id = $('#hiddenID').val();


			$.ajax({
				url: '/business-registration/check', 
				type: 'GET', 
				data: {
					'registrationPrimeID':id
				},
				success: function(data) {


					for(index in data)
					{
						if(data[index].residentPrimeID==null)
						{
							$.ajax({
								url: '{{ url("/business-registration/permitPrintNonRes") }}', 
								method: 'GET', 
								data: {
									'id': id
								}, 
								success: function (data) {
									swal("Successfull", "Download Successful!", "success");
									$('#permitModal').modal('hide');
								}, 
								error: function (errors) {
									var message = "Errors: ";
									var data = errors.responseJSON;
									for (datum in data) {
										message += data[datum];
									}
								}
							});
						}
						else
						{
							$.ajax({
								url: '{{ url("/business-registration/permitPrintRes") }}', 
								method: 'GET', 
								data: {
									'id': id
								}, 
								success: function (data) {
									swal("Successfull", "Download Successful!", "success");
									$('#permitModal').modal('hide');
								}, 
								error: function (errors) {
									var message = "Errors: ";
									var data = errors.responseJSON;
									for (datum in data) {
										message += data[datum];
									}
								}
							});
						}
					}		
				}, 
				error: function (errors) {
					var message = "Errors: ";
					var data = errors.responseJSON;
					for (datum in data) {
						message += data[datum];
					}
				}
			});

			
		});	

		$(document).on('click', '.permit', function(e) {
			
			var id = $(this).data("value");
			$('#hiddenID').val(id);

			$.ajax({
				url: '/business-registration/check', 
				type: 'GET', 
				data: {
					'registrationPrimeID':id
				},
				success: function(data) {
					for(index in data)
					{
						if(data[index].residentPrimeID == null)
						{
							$('#iframe').attr('src','/business-registration/permitNonRes/'+ id);
						}
						else
						{
							$('#iframe').attr('src','/business-registration/permitRes/'+ id);
						}
					}
				}, 
				error: function(errors) {
					var message = "Errors: ";
					var data = errors.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});


			

			$('#permitModal').modal('show');
		});

		$(document).on('click', '.delete', function(e) {
        
			var id = $(this).data("value");
			
			$.ajax({
				type: 'get',
				url: "{{ url('business-registration/getEdit') }}",
				data: {registrationPrimeID:id},
				success:function(data)
				{
					swal({
						  title: "Are you sure you want to delete " + data.originalName + "?",
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
							  url: "{{ url('business-registration/delete') }}", 
							  data: {registrationPrimeID: id},
							  success: function(data) { 
									swal("Success", "Successfully deleted!", "success");
									refreshTable();
							  }, 
							  error: function(data) {
									swal("Error", "Failed!", "error");
							  }
						  });
						});				
				}
			});
            
		});

		$(document).on('click', '.update', function(e) {
        
			var frm = $('#frm-update');

			$.ajax({
				url: "{{ url('/business-registration/update') }}",
				type: "POST",
				data: {"_token": $('#csrf-token').val(), 
						"registrationPrimeID": frm.find("#registrationPrimeID").val(), 
						"businessID": frm.find("#businessID").val(), 
						"originalName": frm.find("#originalName").val(), 
						"tradeName": frm.find("#tradeName").val(),
						"residentPrimeID": frm.find("#eresidentPrimeID").val(), 
						"firstName": frm.find("#firstName").val(), 
						"middleName": frm.find("#middleName").val(), 
						"lastName": frm.find("#lastName").val(), 
						"gender": frm.find("#gender").val(), 
						"contactNumber": frm.find("#contactNumber").val(), 
						"address": frm.find("#address").val(), 
						"categoryID": frm.find("#ecategoryID").val(), 
				}, 
				success: function ( _response ){
					$("#modalEdit").modal('hide');
					$("#frm-update").trigger('reset');
					
					refreshTable();
					
					swal("Successful", 
							"Business has been updated!", 
							"success");
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

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/business-registration/refresh') }}", 
				type: 'GET', 
				success: function(data) {

					data = $.parseJSON(data);	
					$("#table-container").DataTable().clear().draw();

					for (index in data) {

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].registrationDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

						$("#table-container").DataTable()
								.row.add([
									data[index].businessID,
									data[index].originalName,
									data[index].tradeName, 
									d, 
									data[index].firstName + " " + 
										data[index].middleName + " " + 
										data[index].lastName, 
									data[index].categoryName,
									'<span class="dropdown">' +
										'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>' +
										'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
											'<a href="#" class="dropdown-item view" name="btnView" data-value="' + data[index].registrationPrimeID + '"><i class="icon-eye3"></i> View</a>' +
											'<a href="#" class="dropdown-item edit" name="btnEdit" data-value="' + data[index].registrationPrimeID + '"><i class="icon-pen3"></i> Edit</a>' +
											'<a href="#" class="dropdown-item delete" name="btnDelete" data-value="' + data[index].registrationPrimeID + '"><i class="icon-trash4"></i> Delete</a>' +
										'</span>' +
									'</span>'
								]).draw(false);
					}
				}, 
				error: function(errors) {
					var message = "Errors: ";
					var data = errors.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});

			$.ajax({
				url: "{{ url('/business-registration/refreshNonres') }}", 
				type: 'GET', 
				success: function(data) {

					data = $.parseJSON(data);	

					for (index in data) {

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].registrationDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

						$("#table-container").DataTable()
								.row.add([
									data[index].businessID,
									data[index].originalName,
									data[index].tradeName, 
									d, 
									data[index].firstName + " " + 
										data[index].middleName + " " + 
										data[index].lastName, 
									data[index].categoryName,
									'<span class="dropdown">' +
										'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>' +
										'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
											'<a href="#" class="dropdown-item view" name="btnView" data-value="' + data[index].registrationPrimeID + '"><i class="icon-eye3"></i> View</a>' +
											'<a href="#" class="dropdown-item edit" name="btnEdit" data-value="' + data[index].registrationPrimeID + '"><i class="icon-pen3"></i> Edit</a>' +
											'<a href="#" class="dropdown-item delete" name="btnDelete" data-value="' + data[index].registrationPrimeID + '"><i class="icon-trash4"></i> Delete</a>' +
										'</span>' +
									'</span>'
								]).draw(false);
					}
				}, 
				error: function(errors) {
					var message = "Errors: ";
					var data = errors.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});
		};

		$("#btnRegModal").click(function(event) {
			

			$.ajax({
				url: '/business-registration/owner', 
				type: 'GET', 
				success: function(data) {

					

					for(index in data)
					{
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
				}, 
				error: function(errors) {
					var message = "Errors: ";
					var data = errors.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});

			$.ajax({
				url: '/business-registration/category', 
				type: 'GET', 
				success: function(data) {

					$('#categoryID').html('');

					for (datum in data) {
						$("#categoryID").append(
							'<option value="' + data[datum].categoryPrimeID + '">' + 
								data[datum].categoryName + 
							'</option>' 
						);
					}

					$("#regModal").modal("show");
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

	</script>
@endsection

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
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('/robust-assets/js/components/forms/select/form-select2.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/jspdf.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/html2canvas.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/canvas2image.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/switch.js') }}" type="text/javascript"></script>
@endsection

@section('template-js')
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
@endsection

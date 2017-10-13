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
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/redBuilder.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/datatable.custom.red.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/main-card.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
@endsection


<!-- Title of the Page -->
@section('title')
	Resident
@endsection


<!-- Set All JavaScript Settings -->
@section('js-setting')
	<script type="text/javascript">
		setSelectedTab(RESIDENT_APPLICATION);
	</script>
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header card-head-custom">
						<h4 class="card-title">Resident</h4>
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
								<button type="button" class="btn btn-outline-info btn-lg" id="btnAddModal" style="width:160px; font-size:13px">
									<i class="icon-edit2"></i> Register Resident  
								</button>
								<button type="button" class="btn btn-outline-info btn-lg" id="btnFamilyModal" style="width:160px; font-size:13px">
									<i class="icon-edit2"></i> Add Family  
								</button>
							</p>	
						</div>

						<!-- TAB COMPONENT -->
						<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
							<li class="nav-item">
								<a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#tab11" aria-expanded="false">Resident</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12" href="#tab12" aria-expanded="true">Family</a>
							</li>
						</ul>
						<!-- END OF TAB COMPONENT -->

						<!-- CONTENT -->
						<div class="tab-content px-1 pt-1">
							<div role="tabpanel" class="tab-pane fade active in" id="tab11" aria-labelledby="active-tab32" aria-expanded="true">

								<!-- Resident Tab -->
								<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-container">
									<thead class="thead-custom-bg-red">
										<tr>
											<th>Image</th>
											<th>ID</th>
											<th>Name</th>
											<th>Birthdate</th>
											<th>Gender</th>
											<th>Type</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>

									<tbody>
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
																<a href="#" class="dropdown-item print" name="btnDelete" data-value='{{ $resident -> residentPrimeID }}'><i class="icon-card"></i> Issue a Barangay ID</a>

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
									</tbody>
								</table>
								<!-- End of Resident Tab -->

							</div>
							<div class="tab-pane fade" id="tab12" role="tabpanel" aria-labelledby="link-tab32" aria-expanded="false">

								<!-- Family Tab -->

									<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-familyContainer">
										<thead class="thead-custom-bg-red">
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Head</th>
												<th>Members</th>
												<th>Date Registered</th>
												<th>Actions</th>
											</tr>
										</thead>

										<tbody>
											@foreach($families as $family)
												<tr>

													{{Form::open(['url'=>'family/delete', 'method' => 'POST', 'id' => $family -> familyPrimeID ])}}

														{{Form::hidden('familyPrimeID',$family->familyPrimeID,['id'=>'familyPrimeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])}}

													<td>{{ $family -> familyID }}</td>
													<td>{{ $family -> familyName }}</td>
													<td>{{ $family -> lastName }}, {{ $family -> firstName }}  {{ substr($family -> middleName,0,1)  }}.</td>
													<td>{{ $family -> number }}</td>
													<td>{{ date('F j, Y',strtotime($family -> familyRegistrationDate)) }}</td>
													<td>
														<span class="dropdown">
															<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
															<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
																<a href="#" class="dropdown-item viewMember" name="btnView" data-value='{{ $family -> familyPrimeID }}'><i class="icon-eye6"></i> View</a>
																<a href="#" class="dropdown-item editMember" name="btnEdit" data-value='{{ $family -> familyPrimeID }}'><i class="icon-pen3"></i> Add/Remove members</a>
																<a href="#" class="dropdown-item deleteFamily" name="btnDelete" data-value='{{ $family -> familyPrimeID }}'><i class="icon-trash4"></i> Delete</a>
															</span>
														</span>
													</td>
													{{Form::close()}}
												</tr>
											@endforeach
										</tbody>
									</table>

								<!-- End of Family Tab -->

								

							</div>
						</div>
						<!-- END OF CONTENT -->

						<!--Family -->

						<!--Family Add Modal -->
						<div class="modal animated bounceInDown text-xs-left" id="familyModal" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-dialog " role="document">
								<div class="modal-content">
									<div class="modal-header bg-info white">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2"><i class="icon-android-contacts"></i> Add Family</h4>
									</div>

									<!-- START MODAL BODY -->
									<div class="modal-body" width='100%'>
										{{Form::open(['url'=>'family/store', 'method' => 'POST', 'id' => 'frm-familyAdd', 'class'=>'form'])}}
							

										<div class="form-body">
											<div class="row">
												<div class="form-group col-xs-12 mb-2">
													<label for="eventInput1">Family ID</label>
													<input type="text" id="familyID" class="form-control" placeholder="FAM_001" name="familyID" readonly />
												</div>
											</div>

											<div class="row">
												<div class="form-group col-xs-12 mb-2">
													<label for="eventInput2">Family Name</label>
													<input type="text" id="familyName" class="form-control" placeholder="Fuellas Family" name="familyName" />
												</div>
											</div>

											<div class="row">
												<div class="form-group col-xs-12">
													<label for="eventInput3">Family Head</label>								
												</div>
											</div>

											<div class="row">
												<div class="form-group col-xs-12">
													<select class="select2 form-control" id="familyHeadID" name="familyHeadID" style="width: 50%">
													
														<optgroup label="Male">
														@foreach($notHead as $resident)
															@if($resident -> gender == 'M')
															{
																<option value= {{$resident -> residentPrimeID}}>{{ $resident -> lastName }}, {{ $resident -> firstName }}  {{ substr($resident -> middleName,0,1)  }}.</option>
															}
															@endif
														@endforeach
														</optgroup>
														<optgroup label="Female">
														@foreach($notHead as $resident)
															@if($resident -> gender == 'F')
															{
																<option value= {{$resident -> residentPrimeID}}>{{ $resident -> lastName }}, {{ $resident -> firstName }}  {{ substr($resident -> middleName,0,1)  }}.</option>
															}
															@endif
														@endforeach
														</optgroup>
													</select>
												</div>
											</div>
										</div>

										<div class="form-actions center">
											<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
												<i class="icon-cross2"></i> Cancel
											</button>
											<button type="submit" class="btn btn-primary">
												<i class="icon-check2"></i> Save
											</button>
										</div>
									{{Form::close()}}
									</div>
									<!-- End of Modal Body -->

								</div>
							</div>
						</div> 
						<!-- End of Modal -->

						<!--Work History Modal -->
						<div class="modal animated bounceInDown text-xs-left" id="workHistoryModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header bg-info white">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2"><i class="icon-shop"></i> Work History</h4>
									</div>

									<!-- START MODAL BODY -->
									<div class="modal-body" width='100%'>
										<div>
											<h3 align="center" id="rName"></h3>
											<br>
											<table class="table table-striped table-custome-outline-red dataTable no-footer" style="font-size:14px;width:100%;" id="table-wh">
											<thead class="thead-custom-bg-red">
												<tr>
													<th>Date Updated</th>
													<th>Work</th>
													<th>Salary Range</th>
												</tr>
											</thead>

											<tbody>
												
											</tbody>
										</table>
										</div>
									</div>
									<!-- End of Modal Body -->

								</div>
							</div>
						</div> 
						<!-- End of Modal -->

						<!--Barangay ID -->

						<!--Barangay ID Modal -->
						<div class="modal animated bounceInDown text-xs-left" id="idModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-dialog modal-xl" role="document">
								<div class="modal-content">
									<div class="modal-header bg-info white">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2"><i class="icon-card"></i> Barangay ID</h4>
									</div>

									<!-- START MODAL BODY -->
									<div class="modal-body" width='100%'>
											
											
											
											

											<input type="hidden" id="amount" value="{{$util->barangayIDAmount}}"></input>
											<input type="hidden" id="yearsOfExpiration" value="{{$util->yearsOfExpiration}}"></input>
											<input type="hidden" id="hehe"></input>

											<h4 align="center">AMOUNT: P{{$util->barangayIDAmount}}</h4>
											<h3 align="center">Preview:</h3>
										
											
											<div class="row" id="mainCard" style="padding-left:50px;">
												
												<br>
												<div class="col-md-6" style="width:40%;padding-top:20px;padding-left:70px" id="cardWrapper">
													
													
													<div style="background-color:lightgrey;width:500px;height:80px;border:1px solid;border-color:rgb(0, 0, 193);border-radius:10px 10px 0px 0px;">
														<img style="float:left;padding-top:10px;padding-left:10px;width:80px;height:60px" src='/storage/upload/{{$util->brgyLogoPath}}'></img>
														<h6 style="text-align:center;color:blue;padding-top:5px">
															REPUBLIC OF THE PHILIPPINES<br>
															CITY OF MANILA<br>
															OFFICE OF THE BARANGAY CHAIRMAN<br>
															{{$util->barangayName}}<br>
														</h6>
													</div>
													
													<div style="border:1px solid;height:20px;width:500px;background-color:rgb(0, 224, 0)">
														<p align="center">Barangay Resident Identification Card</p>
													</div>
													<div style="background-color:lightgrey;position:relative;width:500px;height:180px;border:1px solid;border-color:rgb(0, 0, 193);padding:20px;box-sizing:border-box;border-radius:0px 0px 10px 10px;" id="cardContentContainer">
														
														<div style="width:320px;text-align:center">
															<h2 id="nameID">Marc Joseph M. Fuellas</h2>
															<br>
															<br>
															<p>
															___________________________<br>
															CARDHOLDER SIGNATURE<br>
															@if($util->expirationID==1)
															Valid until: <span id="validity"></span>
															@endif
															</p>
														</div>

														

														<div style="background-color:white;position:absolute;top:35px;right:25px;width:96px;height:96px;border:1px solid;float:right;">
															<p style="padding-top:25px;font-size:30px" align="center">1 X 1</p>
														</div>

														<div style="position:absolute;top:100px;right:25px;width:96px;height:96px;float:right;">
															<p style="padding-top:30px;font-size:20px" align="center" id="bID"></p>
														</div>

														
													</div>


												</div>
												<br>

												<div class="col-md-6" style="display: table;width:500px;table-layout:fixed;margin-left:100px;">
													<div style="padding:5px;display:table-cell;color:blue;background-color:lightgrey;width:240px;height:208px;border:1px solid;border-color:rgb(0, 0, 193);border-radius:10px 0px 0px 10px;">
														<p style="color:black"><b>
															BIRTHDAY: 
																<span style="color:blue" id="bdayID">JUNE 18, 1998</span><br>
															ADDRESS: 
																<span style="color:blue" id="addressID">
																</span><br>
															CONTACT NO.: 
																<span style="color:blue" id="contactNumberID">09263526321</span><br>
															<br>
															Parent to be contacted in case of emegency<br>
															NAME: 
																<span style="color:blue" id="emerName"></span><br>
															ADDRESS: 
																<span style="color:blue" id="emerAddress">
																</span><br>
															CONTACT NO.: 
																<span style="color:blue" id="emerNumber"></span></b>
														</p>
													</div>

													<div style="display:table-cell;width:250px;height:208px;border:1px solid;border-color:rgb(0, 0, 193);padding:20px;box-sizing:border-box;border-radius:0px 10px 10px 0px;" id="cardContentContainer">
														<p style="color:black;font-size:12px;"><i>
															Holder is a bonafide constituent of this
															barangay and is entitled to all privilege
															and services holder may require. <br> <br>

															If found please return to the Barangay
															Secretariat, Barangay 629, Sta Mesa, Manila.</i>
														</p>
														
														<p align="center" style="color:black">
															<img src="system-assets/images/sign/samplesignature.png" alt="sign" width="70%" height="30%"><br>
															<span style="font-size:15px"><b>HON. JOSEPH N. BRIONES</b></span><br>
															Barangay Chairman
														</p>
													</div>
												</div>
												
												<br>
											
											

											</div>
											<br>
											<div align="center">
													
													<h4>Person to be contacted in case of emergency: </h4>
													<select style="width:25%" class ="form-control border-info selectPerson" name="selectPerson" id="selectPerson">
														
													</select>
													<br>
													<button class="btn btn-info" id="updateID">Update</button>
													<button class="btn btn-success" id="issueID" value="Print" disabled>Issue</button>
											</div>

										

										

									
									</div>
									<!-- End of Modal Body -->
								</div>
							</div>
						</div> 
						<!-- End of Modal -->

						<!--ADD TO FAMILY -->

						<!--ADD TO FAMILY Modal -->
						<div class="modal animated bounceInDown text-xs-left" id="memberModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-xl modal-dialog " role="document">
								<div class="modal-content">
									<div class="modal-header bg-info white">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2"><i class="icon-android-contacts"></i> Add to family</h4>
									</div>

									<!-- START MODAL BODY -->
									<div class="modal-body" width='100%'>

										{{Form::open(['url'=>'resident/join', 'method' => 'POST', 'id' => 'frm-addToFam' ])}}
												{{Form::hidden('resID',null,['id'=>'resID'])}}				

										<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-addToFam">
											<thead class="thead-custom-bg-red">
												<tr>
													<th>ID</th>
													<th>Name</th>
													<th>Head</th>
													<th>Members</th>
													<th>Relationship</th>
													<th>Actions</th>
												</tr>
											</thead>

											<tbody>
												
												@foreach($families as $family)
													<tr>

														

															{{Form::hidden('famID',$family->familyPrimeID,['id'=>'famID'])}}
															

														<td>{{ $family -> familyID }}</td>
														<td>{{ $family -> familyName }}</td>
														<td>{{ $family -> lastName }}, {{ $family -> firstName }}  {{ substr($family -> middleName,0,1)  }}.</td>
														<td>{{ $family -> number }}</td>
														<td>{!! Form::text('memberRelation', null, ['id' => 'memberRelation',
																							'class' => 'form-control border-primary',
																							 ]) !!}</td>
														<td>
															<button class='btn btn-icon btn-square btn-success normal join'  type='button' value='{{ $family -> familyPrimeID }}'>Join here</button>
														</td>
														
													</tr>
												@endforeach
												
											</tbody>
										</table>
										{{Form::close()}}
									</div>
									<!-- End of Modal Body -->

								</div>
							</div>
						</div> 
						<!-- End of Modal -->

						<!--ADD IMAGE -->

						<!--ADD IMAGE Modal -->
						<div class="modal animated bounceInDown text-xs-left" id="addImageModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-xs modal-dialog " role="document">
								<div class="modal-content">
									<div class="modal-header bg-info white">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2"><i class="icon-camera"></i> Add Image</h4>
									</div>

									<!-- START MODAL BODY -->
									<div class="modal-body" width='100%'>

										{{Form::open(['url'=>'resident/addImage', 'method' => 'POST', 'id' => 'frm-addImage', 'enctype' => 'multipart/form-data'])}}
												{{Form::hidden('rID',null,['id'=>'rID'])}}				
												
												<p style="text-align:center"><b><label for="firstName1">Picture :</label></b>
												<hr>
												{!!Form::file('imagePath',null,['id' => 'imagePath',
																				'class'=>'form-control',
																				'required'])!!}
												</p>
												
												<div class="form-actions center">
													<button type="submit" class="btn btn-primary">
														<i class="icon-check2"></i> Add
													</button>
													<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
														<i class="icon-cross2"></i> Cancel
													</button>
													
												</div>
												
										
										{{Form::close()}}
									</div>
									<!-- End of Modal Body -->

								</div>
							</div>
						</div> 
						<!-- End of Modal -->

						<!--ADD/REMOVE MEMBER -->

						<!--Add/Remove Member Modal -->
						<div class="modal animated bounceInDown text-xs-left" id="editMember" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-lg modal-dialog " role="document">
								<div class="modal-content">
									<div class="modal-header bg-info white">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2"><i class="icon-eye6"></i> Add/Remove Members of the Family</h4>
									</div>

									<!-- START MODAL BODY -->
									<div class="modal-body" width='100%'>
										<p align="center">
											<button type="button" class="btn btn-outline-info btn-lg addMember" style="width:160px; font-size:13px">
												<i class="icon-edit2"></i>Add Member/s  
											</button>
										</p>
										<div id="famName">


										</div>
										<div id="headName">

										</div>
										<div>
											<p>MEMBERS:</p>
										</div>
										{{Form::open(['url'=>'resident/editMember', 'method' => 'POST', 'id' => 'frm-editMember', 'class'=>'form'])}}
											{{Form::hidden('familyID',null,['id'=>'ffID'])}}

										<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-MemberContainer">
											<thead class="thead-custom-bg-red">
												<tr>
													<th>Name</th>
													<th>Gender</th>
													<th>Relation</th>
													<th>Birthdate</th>
													<th>Actions</th>
												</tr>
											</thead>

											<tbody>
												
											</tbody>
										</table>
										{{Form::close()}}

									</div>
									<!-- End of Modal Body -->

								</div>
							</div>
						</div> 
						<!-- End of Modal -->

						<!--ADD MEMBERS -->

						<!--Add Members Modal -->
						<div class="modal animated bounceInDown text-xs-left" id="addMember" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-lg modal-dialog " role="document">
								<div class="modal-content">
									<div class="modal-header bg-info white">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2"><i class="icon-android-contacts"></i> Add Members</h4>
									</div>

									<!-- START MODAL BODY -->
									<div class="modal-body" width='100%'>
											<p style="text-align:center;font-size:20px"><b>RESIDENTS</b></p>
											<p align="center">
												<button type="button" class="btn btn-secondary btn-square mr-1 mb-1 viewMem">View Members</button>
											</p>
											<hr>
											
											{{Form::open(['url'=>'resident/addParticipant', 'method' => 'POST', 'id' => 'frm-addResident', 'class'=>'form'])}}
													{{Form::hidden('familyID',null,['id'=>'fID'])}}

											<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-addResident">
												<thead class="thead-custom-bg-red">
													<tr>
														<th>Name</th>
														<th>Birthdate</th>
														<th>Gender</th>
														<th>Contact Number</th>
														<th>Relation</th>
														<th>Action</th>
													</tr>
												</thead>

												<tbody>
												
												</tbody>
											</table>
											{{Form::close()}}

									</div>
									<!-- End of Modal Body -->

								</div>
							</div>
						</div> 
						<!-- End of Modal -->

						<!--VIEW MEMBER -->

						<!--VIEW Member Modal -->
						<div class="modal animated bounceInDown text-xs-left" id="viewMember" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-xl modal-dialog " role="document">
								<div class="modal-content">
									<div class="modal-header bg-info white">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2"><i class="icon-earth"></i> View Family</h4>
									</div>

									<!-- START MODAL BODY -->
									<div class="modal-body" width='100%'>
										<div class="card-block">
											<div id="members">

											</div>
										</div>
									</div>
									<!-- End of Modal Body -->

								</div>
							</div>
						</div> 
						<!-- End of Modal -->

						<!--UPDATE RELATION -->

						<!--UPDATE RELATION Modal -->
						<div class="modal animated bounceInDown text-xs-left" id="updateRel" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-sm modal-dialog " role="document">
								<div class="modal-content">
									<div class="modal-header bg-info white">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2"><i class="icon-android-contact"></i> Update Relation</h4>
									</div>

									<!-- START MODAL BODY -->
									<div class="modal-body" width='100%'>

										<p style="text-align:center;font-size:20px">
											<b>
												<div id="resName">
													*Resident Name*
												</div>
											</b>
										</p>
										{{Form::open(['url'=>'family/updateRelation', 'method' => 'POST', 'id' => 'frm-updateRelation', 'class'=>'form'])}}
										{!! Form::hidden('familyMemberPrimeID', null, ['id' => 'familyMemberPrimeID','class' => 'form-control border-primary', 'placeholder'=> 'RES_001']) !!}
										<div class="form-body">
											<div class="row">
												<div class="form-group col-xs-8 mb-2">
													<label for="eventInput1">Relation</label>
													<select class ="form-control border-info selectBox" name="type" id="rel">
														<option value="Self">Self</option>
														<option value="Wife">Wife</option>
														<option value="Husband">Husband</option>
														<option value="Mother">Mother</option>
														<option value="Father">Father</option>
														<option value="Son">Son</option>
														<option value="Daughter">Daughter</option>
														<option value="Sister">Sister</option>
														<option value="Brother">Brother</option>
														<option value="Uncle">Uncle</option>
														<option value="Auntie">Auntie</option>
														<option value="Grandmother">Grandmother</option>
														<option value="Grandfather">Grandfather</option>
														<option value="Grandson">Grandson</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-actions right">
											<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
												<i class="icon-cross2"></i> Cancel
											</button>
											<button type="submit" class="btn btn-primary">
												<i class="icon-check2"></i> Save
											</button>
										</div>
										{{Form::close()}}

										


										

										

									</div>
									<!-- End of Modal Body -->

								</div>
							</div>
						</div> 
						<!-- End of Modal -->

						<!--REGISTER RESIDENT -->

						<!--Add Modal -->
						<div class="modal animated bounceInDown text-xs-left" id="addModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header bg-info white">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2"><i class="icon-android-contact"></i> Register Resident</h4>
									</div>

									<!-- START MODAL BODY -->
									<div class="modal-body">
										{{Form::open(['url'=>'resident/store', 'method' => 'POST', 'id' => 'frm-add', 'class'=>'form'])}}
											<div class="form-body">
												<h4 class="form-section"><i class="icon-eye6"></i> Name </h4>
												<div class="row">
													<div class="form-group col-md-6 mb-2">
														<label for="userinput1">ID</label>
														{!! Form::text('residentID', null, ['id' => 'residentID',
																							'class' => 'form-control border-primary',
																							 'placeholder'=> 'RES_001',
																							 'readonly']) !!}
													</div>
													<div class="form-group col-md-6 mb-2">
														<label for="userinput2">First Name</label>
														{!! Form::text('firstName', null, ['id' => 'firstName','class' => 'form-control border-primary', 'placeholder'=> 'Marc Joseph']) !!}
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6 mb-2">
														<label for="userinput3">Middle Name</label>
														{!! Form::text('middleName', null, ['id' => 'middleName','class' => 'form-control border-primary', 'placeholder'=> 'Mendoza']) !!}
													</div>
													<div class="form-group col-md-6 mb-2">
														<label for="userinput3">Last Name</label>
														{!! Form::text('lastName', null, ['id' => 'lastName','class' => 'form-control border-primary', 'placeholder'=> 'Fuellas']) !!}
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6 mb-2">
														<label for="userinput4">Suffix</label>
														{!! Form::text('suffix', null, ['id' => 'suffix','class' => 'form-control border-primary', 'placeholder'=> 'Sr.']) !!}
													</div>
													<div class="form-group col-md-6 mb-2">
														<label for="userinput3">Gender</label>
														<select name="gender" id="gender" class="form-control">
															<option value="M">MALE</option>
															<option value="F">FEMALE</option>
														</select>
													</div>
												</div>

												<h4 class="form-section"><i class="icon-eye6"></i> Additional Vital Info</h4>
												<div class="row">
													<div class="form-group col-md-6 mb-2">
														<label for="userinput1">Birth Date</label>
														{!! Form::date('birthDate', null, ['id' => 'birthDate','class' => 'form-control']) !!}
													</div>
													<div class="form-group col-md-6 mb-2">
														<label for="userinput2">Civil Status</label>
														<select name="civilStatus" id="civilStatus" class="form-control">
															<option>Married</option>
															<option>Single</option>
															<option>Widowed</option>
															<option>Divorced</option>
														</select>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6 mb-2">
														<label for="userinput3">Senior Citizen ID</label>
														{!! Form::text('seniorCitizenID', null, ['id' => 'seniorCitizenID','class' => 'form-control border-primary']) !!}
													</div>
													<div class="form-group col-md-6 mb-2">
														<label for="userinput4">Disabilities</label>
														{!! Form::text('disabilities', null, ['id' => 'disabilities','class' => 'form-control border-primary', 'placeholder'=> 'ex. HIV']) !!}
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6 mb-2">
														<label for="userinput3">Contact Number</label>
														{!! Form::text('contactNumber', null, ['id' => 'contactNumber','class' => 'form-control border-primary', 'placeholder'=> 'ex. 09123456789']) !!}
													</div>
													<div class="form-group col-md-6 mb-2">
														<label for="userinput4">Resident Type</label>
														<select id="residentType" name="residentType" class="form-control">
															<option value="Transient">Transient Resident</option>
															<option value="Official">Official Resident</option>
														</select>
													</div>
												</div>

												<h4 class="form-section"><i class="icon-mail6"></i> Address </h4>
												<div class="row">
													<div class="form-group col-md-12 mb-2">
														<label for="userinput3">Address</label>
														{!! Form::text('address', null, ['id' => 'address','class' => 'form-control border-primary', 'placeholder'=> 'ex. 258-H Teresa St. Sta Mesa, Manila']) !!}
													</div>
												</div>
												

												<h4 class="form-section"><i class="icon-mail6"></i> Resident Background</h4>
												<div class="row">
													<div class="form-group col-xs-12 mb-2">
														<label for="userinput5">Current Work (Enter "None" if not applicable)</label>
														<input class="form-control border-primary" name="work" id="work" type="text" value="None" id="userinput5" />
													</div>
												</div>
												<div class="row">
													<div class="form-group col-xs-12 mb-2">
														<label for="userinput6">Monthly Salary</label>
														<select class="form-control" name="salary" id="salary">
															<option value ="₱0-₱10,000">₱0-₱10,000</option>
															<option value="₱10,001-₱50,000">₱10,001-₱50,000</option>
															<option value="₱50,001-₱100,000">₱50,001-₱100,000</option>
															<option value="₱100,001 and above">₱100,001 and above</option>
														</select>
													</div>
												</div>


												<div class="form-actions right">
													<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
														<i class="icon-cross2"></i> Cancel
													</button>
													<button type="submit" class="btn btn-primary">
														<i class="icon-check2"></i> Save
													</button>
												</div>
											</div>
										{{Form::close()}}
									</div>

									<!-- End of Modal Body -->

								</div>
							</div>
						</div> 
						<!-- End of Modal -->
					</div>
				</div>
		
				<!--View RESIDENT -->

				<!--Viiew Modal -->
				<div class="modal animated bounceInDown text-xs-left" id="viewModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header bg-info white">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel2"><i class="icon-android-contact"></i> View Resident</h4>
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
												<a class="btn btn-info" href="#" id="workHistory">Work History</a>
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

				<!--UPDATE RESIDENT -->

				<!--Update Modal -->
				<div class="modal animated bounceInDown text-xs-left" id="editModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-info white">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel2"><i class="icon-android-contact"></i> Update Resident</h4>
							</div>

							<!-- START MODAL BODY -->
							<div class="modal-body">
								
								{{Form::open(['url'=>'resident/update', 'method' => 'POST', 'id' => 'frm-update', 'class'=>'form'])}}

								

								<div class="form-body">
									<h4 class="form-section"><i class="icon-eye6"></i> Name </h4>
									<div class="row">
										
										<div class="form-group col-md-6 mb-2">
											<label for="userinput1">ID</label>
											{!! Form::hidden('residentPrimeID', null, ['id' => 'eresidentPrimeID','class' => 'form-control border-primary', 'placeholder'=> 'RES_001']) !!}
											{!! Form::hidden('personAddressID', null, ['id' => 'epersonAddressID','class' => 'form-control border-primary', 'placeholder'=> 'RES_001']) !!}
											{!! Form::text('residentID', null, ['id' => 'eresidentID','class' => 'form-control border-primary', 'placeholder'=> 'RES_001']) !!}
										</div>
										<div class="form-group col-md-6 mb-2">
											<label for="userinput2">First Name</label>
											{!! Form::text('firstName', null, ['id' => 'efirstName','class' => 'form-control border-primary', 'placeholder'=> 'Marc Joseph']) !!}
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6 mb-2">
											<label for="userinput3">Middle Name</label>
											{!! Form::text('middleName', null, ['id' => 'emiddleName','class' => 'form-control border-primary', 'placeholder'=> 'Mendoza']) !!}
										</div>
										<div class="form-group col-md-6 mb-2">
											<label for="userinput3">Last Name</label>
											{!! Form::text('lastName', null, ['id' => 'elastName','class' => 'form-control border-primary', 'placeholder'=> 'Fuellas']) !!}
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6 mb-2">
											<label for="userinput4">Suffix</label>
											{!! Form::text('suffix', null, ['id' => 'esuffix','class' => 'form-control border-primary', 'placeholder'=> 'Sr.']) !!}
										</div>
										<div class="form-group col-md-6 mb-2">
											<label for="userinput3">Gender</label>
											<select name="gender" id="egender" class="form-control">
												<option value="M">MALE</option>
												<option value="F">FEMALE</option>
											</select>
										</div>
									</div>

									<h4 class="form-section"><i class="icon-eye6"></i> Additional Vital Info</h4>
									<div class="row">
										<div class="form-group col-md-6 mb-2">
											<label for="userinput1">Birth Date</label>
											{!! Form::date('birthDate', null, ['id' => 'ebirthDate','class' => 'form-control']) !!}
										</div>
										<div class="form-group col-md-6 mb-2">
											<label for="userinput2">Civil Status</label>
											<select name="civilStatus" id="ecivilStatus" class="form-control">
												<option>Married</option>
												<option>Single</option>
												<option>Widowed</option>
												<option>Divorced</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6 mb-2">
											<label for="userinput3">Senior Citizen ID</label>
											{!! Form::text('seniorCitizenID', null, ['id' => 'eseniorCitizenID','class' => 'form-control border-primary']) !!}
										</div>
										<div class="form-group col-md-6 mb-2">
											<label for="userinput4">Disabilities</label>
											{!! Form::text('disabilities', null, ['id' => 'edisabilities','class' => 'form-control border-primary', 'placeholder'=> 'ex. HIV']) !!}
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6 mb-2">
											<label for="userinput3">Contact Number</label>
											{!! Form::text('contactNumber', null, ['id' => 'econtactNumber','class' => 'form-control border-primary', 'placeholder'=> 'ex. 09123456789']) !!}
										</div>
										<div class="form-group col-md-6 mb-2">
											<label for="userinput4">Resident Type</label>
											<select id="eresidentType" name="residentType" class="form-control">
												<option value="Transient">Transient Resident</option>
												<option value="Official">Official Resident</option>
											</select>
										</div>
									</div>

									<h4 class="form-section"><i class="icon-mail6"></i> Address </h4>
									<div class="row">
										<div class="form-group col-md-12 mb-2">
											<label for="userinput3">Address</label>
											{!! Form::text('eaddress', null, ['id' => 'eaddress','class' => 'form-control border-primary']) !!}
										</div>
									</div>
									
									<h4 class="form-section"><i class="icon-mail6"></i> Resident Background</h4>
									<div class="row">
										<div class="form-group col-xs-12 mb-2">
											{!! Form::hidden('hiddenWork', null, ['id' => 'hiddenWork']) !!}
											{!! Form::hidden('hiddenIncome', null, ['id' => 'hiddenIncome']) !!}
											<label for="userinput5">Current Work (Enter "None" if not applicable)</label>
											<input class="form-control border-primary" type="text" name="ework" id="ework" />
										</div>
									</div>
									<div class="row">
										<div class="form-group col-xs-12 mb-2">
											<label for="userinput6">Monthly Salary</label>
											<select class="form-control" id="esalary" name="esalary">
												<option value ="₱0-₱10,000">₱0-₱10,000</option>
												<option value=">₱10,001-₱50,000">₱10,001-₱50,000</option>
												<option value="₱50,001-₱100,000">₱50,001-₱100,000</option>
												<option value="₱100,001 and above">₱100,001 and above</option>
											</select>
										</div>
									</div>


								<div class="form-actions right">
									<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
										<i class="icon-cross2"></i> Cancel
									</button>
									<button type="submit" class="btn btn-primary">
										<i class="icon-check2"></i> Save
									</button>
								</div>
							{{Form::close()}}
							</div>

							<!-- End of Modal Body -->

						</div>
					</div>
				</div> 
				<!-- End of Modal -->	

													
			</div>
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
		
		$(document).on('click', '#workHistory', function(e) {
			var id = $(this).data('value');

			$.ajax({
					type: 'GET',
					url: '/resident/getWorkHistory',
					data: {'residentPrimeID': id},
					success:function(data) {

						data = $.parseJSON(data);
						$("#table-wh").DataTable().clear().draw();

						for(index in data)
						{
							$('#rName').html(data[index].firstName + ' ' + data[index].middleName + ' ' + data[index].lastName);

							var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
							var date = new Date(data[index].dateStarted);
							var month = date.getMonth();
							var day = date.getDate();
							var year = date.getFullYear();
							var d = months[month] + ' ' + day + ', ' + year;

							$("#table-wh").DataTable()
									.row.add([
										d, 
										data[index].currentWork, 
										data[index].monthlyIncome, 
										
									]).draw(false);
						}
						$('#viewModal').modal('hide');	
						setTimeout(function() {
							$('#workHistoryModal').modal('show');
						},500);
							
								
					}
			})
		});

		
		$(document).on('click', '.print', function(e) {
			var id = $(this).data('value');

			$('#hehe').val(id);

			

			$.ajax({
				type: 'get',
				url: "{{ url('/resident/getEdit') }}", 
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

						var m = data[index].middleName.substring(0,1);

						$('#bdayID').html(d);
						$('#nameID').html(data[index].firstName + " " + m + ". " + data[index].lastName);
						$('#contactNumberID').html(data[index].contactNumber);
						$('#addressID').html(data[index].address);
						$('#bID').html(data[index].residentID);

						$.ajax({
								type: 'GET',
								url: '/resident/getPer',
								data: {'residentPrimeID': id},
								success:function(data) {

									$('#selectPerson').html('');
									data = $.parseJSON(data);

									for(index in data)
									{
										$('#selectPerson').append($('<option>',{
											value: data[index].familyMemberPrimeID,
											text: data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName
										}));	
									}	
											
								}
						})

						$('#idModal').modal('show');
						
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

		$("#updateID").click(function () {
			

			$.ajax({
					type: 'GET',
					url: '/resident/getMemDet',
					data: {'familyMemberPrimeID': $('#selectPerson').val()},
					success:function(data) {

						data = $.parseJSON(data);

						for(index in data)
						{
							$('#emerName').html(data[index].firstName + ' ' + data[index].middleName + ' ' + data[index].lastName);
							$('#emerAddress').html(data[index].address);
							$('#emerNumber').html(data[index].contactNumber);
						}	
								
					}
			})

			$("#issueID").prop('disabled',false);
			
			
			
		
		});

		$("#issueID").click(function () {
			
			swal({
				title: "Are you sure you want to issue a barangay ID?",
				text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "ISSUE",
				closeOnConfirm: false
				},
				function() {


					$.ajax({
						type: "post",
						url: "{{ url('/resident/issue') }}", 
						data: {"_token": "{{ csrf_token() }}",
						residentPrimeID:$('#hehe').val(),
						yearsOfExpiration:$('#yearsOfExpiration').val(),
						memID:$('#selectPerson').val(),
						amount:$('#amount').val()}, 
						success: function(data) {
							console.log('Issue save!');
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


					swal({
						title: "Proceed to payment?",
						text: "",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "PROCEED",
						closeOnConfirm: false
						},
						function() {
							window.location.href = "/collection";
						});
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
													'<a href="#" class="dropdown-item print" name="btnMember" data-value="' + data[index].residentPrimeID+ '"><i class="icon-outbox"></i> Issue a barangay ID</a>' +
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
	<script src="{{ URL::asset('/js/html2canvas.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/canvas2image.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/rasterizeHTML.allinone.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/html2pdf.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/timehandle.js') }}" type="text/javascript"></script>
@endsection

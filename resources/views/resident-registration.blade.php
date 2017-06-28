<!-- Parent Template -->
@extends('master.master')

@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
@endsection



<!-- Title of the Page -->
@section('title')
	Resident Application
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(RESIDENT_APPLICATION);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Resident Application Form</h2>
		<p class="text-muted mb-0">Registration of a person as a resident of the Barangay.</p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaction</li>
		<li class="breadcrumb-item"><a href="/resident">Resident</a></li>
		<li class="breadcrumb-item"><a href="#">Resident Application</a></li>
	</ol>
@endsection

@section('content-body')
	<div class="row">
		<div class="col-xs-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Resident Registration</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
							<li><a data-action="reload"><i class="icon-reload"></i></a></li>
							<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							<li><a data-action="close"><i class="icon-cross2"></i></a></li>
						</ul>
					</div>
				</div>

				<div class="card-body collapse in">
					<div class="card-block">
							{!!Form::open(['url'=>'', 'method' => 'POST', 'id' => 'frm-add', 'class'=>'number-tab-steps wizard-notification'])!!}

							{{ csrf_field() }}

							<h6>Name</h6>
							<fieldset>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">First Name :</label>
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
											<label for="firstName1">Suffix :</label>
											<input type="text" class="form-control" id="suffix" />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="emailAddress1">Gender : </label>
											<select name="gender" id="gender" class="form-control">
												<option value="male">MALE</option>
												<option value="female">FEMALE</option>
											</select>
										</div>
									</div>
								</div>
							</fieldset>

							<h6>Additional Vital Info</h6>
							<fieldset>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="emailAddress1">Birth Date : </label>
											<input type="date" class="form-control" id="birthDate" />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="emailAddress1">Civil Status : </label>
											<select class="form-control">
												<option>Married</option>
												<option>Single</option>
												<option>Widowed</option>
												<option>Divorced</option>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="emailAddress1">Senior Citizen ID : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="emailAddress1">Disabilities : </label>
											<input type="textarea" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="emailAddress1">Contact Number : </label>
											<input type="text" class="form-control" id="contactNumber" />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="emailAddress1">Resident Type : </label>
											<select class="form-control">
												<option>Transient Resident</option>
												<option>Official Resident</option>
											</select>
										</div>
									</div>
								</div>
							</fieldset>

							<h6>Address</h6>
							<fieldset>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Province : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Municipality : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">City : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Barangay : </label>
											{{ Form::select('barangayID', $barangays, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Street : </label>
											{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Lot : </label>
											{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">House : </label>
											{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Unit : </label>
											{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
										</div>
									</div>
								</div>
							</fieldset>

							<h6>Resident Background</h6>
							<fieldset>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Current Work : </label>
											<input type="text" class="form-control" id="work" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Monthly Salary: </label>
											<select class="form-control">
												<option value ="1">₱0-₱10,000</option>
												<option value="2">₱10,001-₱50,000</option>
												<option value="3">₱50,001-₱100,000</option>
												<option value="4">₱100,001 and above</option>
											</select>
										</div>
									</div>
								</div>
							</fieldset>

							<h6>Summary</h6>
							<fieldset>
								
							</fieldset>
						{!!Form::close()!!}

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.steps.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/dateTime/moment-with-locales.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/daterange/daterangepicker.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/robust-assets/js/components/forms/wizard-steps.js') }}" type="text/javascript"></script>
@endsection

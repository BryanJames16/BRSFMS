<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Maintenance: Employee
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(EMPLOYEE);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">EMPLOYEE</h2>
@endsection

@section('inside-breadcrumb')
	<li class="breadcrumb-item">Employee</li>
	<li class="breadcrumb-item"><a href="#">Employee</a></li>
@endsection

@section('main-card-title')
	Employee
@endsection

@section('modal-card-title')
	Add Employee
@endsection

@section('modal-card-desc')
	Barangay officials.
@endsection

@section('modal-form-body')
	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Employee Name</label>
		<div class="col-md-9">
			<select class="select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" style="width: 100%" name="typeselect">
				<option value='id'>Fuellas, Marc Joseph Mendoza</option>
				<option value='id'>Reid, James Skubariwa</option>
				<option value='id'>Gil, Enrique Ramos</option>
			</select>
		</div>	
			
	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Username</label>
		<div class="col-md-9">
			<input type="text" id="eventRegInput1" class="form-control" placeholder="eg.skubariwa" maxlength="30" name="middle_name" required>
		</div>	
	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Password</label>
		<div class="col-md-9">
			<input type="password" id="eventRegInput1" class="form-control" maxlength="30" name="middle_name" required>
		</div>	
	</div>
	

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Date of Employment</label>
		<div class="col-md-4">
			<input type="date" id="eventRegInput1" class="form-control" name="middle_name" required>
		</div>
	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput2">Position</label>
		<div class="col-md-9">
			<select class="select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true" style="width: 60%" name="typeselect">
				<option value='id'>Chairman</option>
				<option value='id'>Kagawad</option>
			</select>
		</div>	
	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Barangay ID</label>
		<div class="col-md-9">
			<input type="text" id="eventRegInput1" class="form-control" placeholder="eg.BRGY=AS1234" maxlength="30" name="middle_name" required>
		</div>	
	</div>

	<div class="form-group row last">
		<label class="col-md-3 label-control">Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" name="stat" checked="" class="custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" name="stat"  class="custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Inactive</span>
				</label>
			</div>
		</div>
	</div>
@endsection

@section('modal-form-action')
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
		<i class="icon-cross2"></i> Cancel
	</button>
	<input type="submit" class="btn btn-success" value="Add" name="btnAdd">
@endsection

@section('table-head-list')
	<th>ID</th>
	<th>Employee Name</th>
	<th>Username</th>
	<th>Password</th>
	<th>Position</th>
	<th>Date</th>
	<th>Barangay ID</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')

@endsection
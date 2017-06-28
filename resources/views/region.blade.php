<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Maintenance: Region
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(REGION);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Region</h2>
@endsection

@section('inside-breadcrumb')
	<li class="breadcrumb-item">Address</li>
	<li class="breadcrumb-item"><a href="#">Region</a></li>
@endsection

@section('main-card-title')
	Region
@endsection

@section('modal-card-title')
	Add Region
@endsection

@section('modal-card-desc')
	Region.
@endsection

@section('modal-form-body')
	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Region Name</label>
		<div class="col-md-9">
			<input type="text" id="eventRegInput1" class="form-control" placeholder="eg.Bicol" maxlength="30" name="region_name" required>
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
	<th>Region ID</th>
	<th>Region Name</th>
	<th>Region Number</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($regions as $region)
		<tr>
			<td>{{ $region -> regionID }}</td>
			<td>{{ $region -> regionName }}</td>
			<td>{{ $region -> regionNumber }}</td>
			@if ($region -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				<form>
					<input type='hidden' name='typeID' value='{{ $region -> regionID }}' />
					<input type='hidden' name='typeID' value='{{ $region -> regionName }}' />
					<input type='hidden' name='typeID' value='{{ $region -> regionNumber }}' />
					<input type='hidden' name='typeID' value='{{ $region -> status }}' />
					<button class='btn btn-success normal edit' type='button' name='btnEdit' data-id='{{ $region -> regionID }}'>Edit</button>
					<button class='btn btn-danger' type='button' name='btnEdit'>Delete</button>
				</form>
			</td>
		</tr>
	@endforeach
@endsection
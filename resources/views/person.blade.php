<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Person
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(INDIVIDUAL);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Person</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Person</li>
	<li class="breadcrumb-item"><a href="#">Person</a></li>


@endsection

@section('main-card-title')
	Person
@endsection

@section('modal-card-title')
	Add Person
@endsection

@section('modal-card-desc')
	Name of the Person.
@endsection

@section('modal-form-body')
	{!!Form::open(['url'=>'person/store', 'method' => 'POST', 'id' => 'frm-add'])!!}
	{{ csrf_field() }}
	
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>

	    <script type="text/javascript">
	    	$(document).ready(function () {
		        $('#iconModal').modal('show');
		    });
	    </script>
	@endif


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{!!Form::text('personID',null,['data-validation-required-message'=>'This is required!','id'=>'id','class'=>'form-control', 'placeholder'=>'eg.PER_001','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters', 'maxlength'=>'20','required', 'minlength' => '2', 'pattern'=>'^[a-zA-Z0-9-_]+$'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*First Name</label>
		<div class="col-md-9">
			{!!Form::text('firstname',null,['id'=>'firstname','class'=>'form-control', 'placeholder'=>'eg.Marc','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'maxlength'=>'30','required', 'minlength' => '2', 'pattern'=>'^[a-zA-Z0-9-_\' ]+$'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Middle Name</label>
		<div class="col-md-9">
			{!!Form::text('middlename',null,['id'=>'middlename','class'=>'form-control', 'placeholder'=>'eg.Mendoza', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'pattern'=>'^[a-zA-Z0-9-_\' ]+$'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Last Name</label>
		<div class="col-md-9">
			{!!Form::text('lastname',null,['id'=>'middlename','class'=>'form-control', 'placeholder'=>'eg.Fuellas', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required', 'minlength' => '2', 'pattern'=>'^[a-zA-Z0-9-_\' ]+$'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Suffix</label>
		<div class="col-md-9">
			{!! Form::text('suffix',null,['id'=>'suffix','class'=>'form-control','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 5 characters', 'maxlength'=>'5', 'minlength'=>'2', 'pattern'=>'^[a-zA-Z0-9-_]+$']) !!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Contact Number</label>
		<div class="col-md-9">
			{!!Form::text('contactNumber',null,['id'=>'contactNumber','class'=>'form-control', 'placeholder'=>'eg.09263526312','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 11 numbers', 'maxlength'=>'11', 'minlength'=>'8', 'pattern'=>'^[0-9]+$'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Birthdate</label>
		<div class="col-md-9">
			{!!Form::date('birthdate',null,['required','id'=>'birthdate','class'=>'form-control'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Gender</label>
		<div class="col-md-9">
			<select class ='form-control border-info selectBox' name='gender'>
				<option value='Female'>Female</option>
				<option value='Male'>Male</option>
			</select>
		</div>	

	</div>


	

	<div class="form-group row last">
		<label class="col-md-3 label-control">*Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" value="active" name="stat" checked="" class="custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" value="inactive" name="stat"  class="custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Inactive</span>
				</label>
			</div>
		</div>
	</div>

@endsection

@section('modal-form-action')
<input type="submit" class="btn btn-success" value="Add" name="btnAdd">
<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel
</button>

{!!Form::close()!!}

@endsection

@section('table-head-list')
	<th>ID</th>
	<th>First Name</th>
	<th>Middle Name</th>
	<th>Last Name</th>
	<th>Gender</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($people as $person)
		<tr>
			<td>{{ $person -> personID }}</td>
			<td>{{ $person -> firstName }}</td>
			<td>{{ $person -> middlename }}</td>
			<td>{{ $person -> lastname }}</td>
			
			@if ($person -> gender == 'M')
				<td>Male</td>
			@else
				<td>Female</td>
			@endif
			
			@if ($person -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!! Form::open(['url'=>'person/delete', 'method' => 'POST', 'id' => $person -> peoplePrimeID]) !!}					
				{{ csrf_field() }}

					<input type='hidden' name='peoplePrimeID' value='{{ $person -> peoplePrimeID }}' />
					<input type='hidden' name='firstName' value='{{ $person -> firstname }}' />
					<input type='hidden' name='typeID' value='{{ $person -> middlename }}' />
					<input type='hidden' name='typeID' value='{{ $person -> lastname }}' />
					<input type='hidden' name='typeID' value='{{ $person -> suffix }}' />
					<input type='hidden' name='typeID' value='{{ $person -> gender }}' />
					<input type='hidden' name='typeID' value='{{ $person -> status }}' />

					<div class="btn-group" role="group" aria-label="Basic example">
					<button class='btn btn-info btn-icon btn-round view' data-toggle="tooltip" data-placement="top" data-original-title="View Details" value='{{ $person -> peoplePrimeID }}' type='button' name='btnView'><i class="icon-android-more-vertical"></i></button>
					<button class='btn btn-icon btn-round btn-success normal edit' data-toggle="tooltip" data-placement="top" data-original-title="Edit"  type='button' value='{{ $person -> peoplePrimeID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-round btn-danger delete' data-toggle="tooltip" data-placement="top" data-original-title="Delete" value='{{ $person -> peoplePrimeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
					<button class='btn btn-icon btn-round btn-primary reg' data-toggle="tooltip" data-placement="top" data-original-title="Register as Resident" value='{{ $person -> peoplePrimeID }}' onclick="location.href='/resident-registration';" type='button' name='btnReg'><i class="icon-android-open"></i></button>
					</div>
				{!!Form::close()!!}
			</td>
		</tr>
	@endforeach
@endsection

@section('ajax-modal')
	<script>
		$(document).on('click', '.edit', function(e) {
			var id = $(this).val();

			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});

			$.ajax({
				type: 'get',
				url: "{{ url('/person/getEdit') }}",
				data: {peoplePrimeID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#person_firstname').val(data.firstName);
					frm.find('#person_middlename').val(data.middleName);
					frm.find('#person_lastname').val(data.lastName);
					frm.find('#person_suffix').val(data.suffix);
					if(data.gender=='M')
					{
						frm.find('#person_gender').val("Male");	

					}
					else if(data.gender=='F')
					{
						frm.find('#person_gender').val("Female");
					}
					//frm.find('#person_gender').val(data.gender);
					frm.find('#person_contactNumber').val(data.contactNumber);
					frm.find('#person_birthdate').val(data.birthDate);
					frm.find('#person_ID').val(data.personID);
					frm.find('#peoplePrimeID').val(data.peoplePrimeID);
				
					
					if(data.status==1)
					{
						$("#active").attr('checked', 'checked');
					}
					else
					{
						$("#inactive").attr('checked', 'checked');
					}
					$('#modalEdit').modal('show');
					
				}
			})

		});

	</script>

	<script>
		$(document).on('click', '.view', function(e) {
			var id = $(this).val();

			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});

			$.ajax({
				type: 'get',
				url: "{{ url('/person/getEdit') }}",
				data: {peoplePrimeID:id},
				success:function(data)
				{
					
					var frm = $('#frm-view');
					
					if(data.gender=="F")
					{
						frm.find('#gender').val("Female");	
					}
					else if(data.gender=="M")
					{
						frm.find('#gender').val("Male");	
					}
					frm.find('#id').val(data.personID);
					frm.find('#firstname').val(data.firstName);
					frm.find('#middlename').val(data.middleName);
					frm.find('#lastname').val(data.lastName);
					frm.find('#suffix').val(data.suffix);
					frm.find('#contactNumber').val(data.contactNumber);
					frm.find('#birthdate').val(data.birthDate);
					
				
					
					if(data.status==1)
					{
						frm.find('#status').val("Active");
					}
					else
					{
						frm.find('#status').val("Inactive");
					}
					
					
					$('#viewModal').modal('show');
				}
			})

		});

	</script>

	<script type="text/javascript">

	$(document).on('click', '.delete', function(e) {

		var id = $(this).val();

		$.ajax({
				type: 'get',
				url: "{{ url('person/getEdit') }}",
				data: {peoplePrimeID:id},
				success:function(data)
				{
					console.log(data);
					swal({
						  title: "Are you sure you want to delete " + data.firstName + " " + data.lastName +  "?",
						  text: "",
						  type: "warning",
						  showCancelButton: true,
						  confirmButtonColor: "#DD6B55",
						  confirmButtonText: "DELETE",
						  closeOnConfirm: false
						},
						function(){

						  swal("Successfull", data.firstName + " " + data.lastName + " is deleted!", "success");
						  document.getElementById(data.peoplePrimeID).submit();
						});				
				}
			})		
	});
	</script>
	
@endsection

@section('edit-modal-title')
	Edit Person
@endsection

@section('edit-modal-desc')
	Edit existing facility type data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'/person/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	
	{!!Form::hidden('peoplePrimeID',null,['id'=>'peoplePrimeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{!!Form::text('person_ID',null,['id'=>'person_ID','class'=>'form-control', 'maxlength'=>'20', 'readonly', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'5'])!!}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*First Name</label>
		<div class="col-md-9">
			{!!Form::text('person_firstname',null,['id'=>'person_firstname','class'=>'form-control','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'maxlength'=>'30','required', 'pattern'=>'^[a-zA-Z0-9-_\']+$', 'minlength'=>'2', 'pattern'=>'^[a-zA-Z0-9-_\' ]+$'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Middle Name</label>
		<div class="col-md-9">
			{!!Form::text('person_middlename',null,['id'=>'person_middlename','class'=>'form-control','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'maxlength'=>'30', 'pattern'=>'^[a-zA-Z0-9-_\' ]+$'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Last Name</label>
		<div class="col-md-9">
			{!!Form::text('person_lastname',null,['id'=>'person_lastname','class'=>'form-control','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'maxlength'=>'30','required', 'pattern'=>'^[a-zA-Z0-9-_\' ]+$', 'minlength'=>'2'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Suffix</label>
		<div class="col-md-9">
			{!!Form::text('person_suffix',null,['id'=>'person_suffix','class'=>'form-control','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 5 characters', 'maxlength'=>'5', 'pattern'=>'^[a-zA-Z0-9-_\']+$'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Contact Number</label>
		<div class="col-md-9">
			{!!Form::number('contactNumber',null,['id'=>'person_contactNumber','class'=>'form-control', 'placeholder'=>'eg.09263526312','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 11 characters', 'maxlength'=>'11', 'pattern'=>'^[0-9]+$', 'minlength'=>'7'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Birthdate</label>
		<div class="col-md-9">
			{!!Form::date('birthdate',null,['id'=>'person_birthdate','class'=>'form-control'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Gender</label>
		<div class="col-md-9">
			
			{{ Form::select('gender', ['Male'=>'Male','Female'=>'Female'], null, ['id'=>'person_gender', 'class' => 'form-control border-info selectBox']) }}
			
		</div>	

	</div>


	<div class="form-group row last">
		<label class="col-md-3 label-control">*Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" id='active' name="stat" value="1" class="custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" id='inactive' name="stat" value="0" class="custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Inactive</span>
				</label>
			</div>
		</div>
	</div>

@endsection

@section('edit-modal-action')
	
	{!!Form::submit('Edit',['class'=>'btn btn-success'])!!}
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel
	</button>
	
@endsection

@section('view-modal-card-title')
	Person Information
@endsection

@section('view-modal-form-body')


	{!!Form::open(['url'=>'', 'method' => 'POST', 'id' => 'frm-view'])!!}
	{{ csrf_field() }}

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">ID</label>
		<div class="col-md-9">
			{!!Form::text('personID',null,['id'=>'id','class'=>'form-control','disabled'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">First Name</label>
		<div class="col-md-9">
			{!!Form::text('firstname',null,['id'=>'firstname','class'=>'form-control','disabled'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Middle Name</label>
		<div class="col-md-9">
			{!!Form::text('middlename',null,['id'=>'middlename','class'=>'form-control','disabled'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Last Name</label>
		<div class="col-md-9">
			{!!Form::text('lastname',null,['id'=>'lastname','class'=>'form-control','disabled'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Suffix</label>
		<div class="col-md-9">
			{!! Form::text('suffix',null,['id'=>'suffix','class'=>'form-control','disabled']) !!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Contact Number</label>
		<div class="col-md-9">
			{!!Form::text('contactNumber',null,['id'=>'contactNumber','class'=>'form-control','disabled'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Birthdate</label>
		<div class="col-md-9">
			{!!Form::date('birthdate',null,['required','id'=>'birthdate','class'=>'form-control','disabled'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Gender</label>
		<div class="col-md-9">
			{!!Form::text('g',null,['id'=>'gender','class'=>'form-control','disabled'])!!}
		</div>	

	</div>


	

	<div class="form-group row last">
		<label class="col-md-3 label-control">Status</label>
		<div class="col-md-9">
			{!!Form::text('s',null,['id'=>'status','class'=>'form-control','disabled'])!!}
		</div>
	</div>


@endsection

@section('view-modal-form-action')

	
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Close
	</button>
	{!!Form::close()!!}
@endsection

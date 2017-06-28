<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Unit
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(UNIT);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">CITY</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Unit</li>
	<li class="breadcrumb-item"><a href="#">Unit</a></li>


@endsection

@section('main-card-title')
	Unit
@endsection

@section('modal-card-title')
	Add Unit
@endsection

@section('modal-card-desc')
	Name of the Unit.
@endsection

@section('modal-form-body')

	
		

	{!!Form::open(['url'=>'unit/store', 'method' => 'POST', 'id' => 'frm-add'])!!}

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
		<label class="col-md-3 label-control" for="eventRegInput1">*Unit Number</label>
		<div class="col-md-9">
			{!!Form::text('unitCode',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.21', 'maxlength'=>'8','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 8 characters','required', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'1'])!!}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Lot</label>
		
		<div class="col-md-9">
			
			{{ Form::select('lotID', $types, null, ['id'=>'lotID', 'class' => 'form-control border-info selectBox']) }}
			
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

	<script type="text/javascript">
	
	$(document).ready(function(){
    $('#barangayID').change(function(){
        document.getElementById('lotID').options.length = 0;
		var id = this.value; 
	</script>



@endsection

@section('modal-form-action')
<input type="submit" class="btn btn-success" value="Add" name="btnAdd">
<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel
</button>

{!!Form::close()!!}

@endsection

@section('table-head-list')
	<th>ID</th>
	<th>Unit Number</th>
	<th>Lot</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($units as $unit)
		<tr>
			<td>{{ $unit -> unitID }}</td>
			<td>{{ $unit -> unitCode }}</td>
			<td>{{ $unit -> lotCode }}</td>
			
			@if ($unit -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!!Form::open(['url'=>'unit/delete', 'method' => 'POST', 'id' => $unit -> unitID ])!!}					
				{{ csrf_field() }}

					<input type='hidden' name='unitID' value='{{ $unit -> unitID }}' />
					<input type='hidden' name='unitCode' value='{{ $unit -> unitCode }}' />
					
					<input type='hidden' name='status' value='{{ $unit -> status }}' />
				
				<div class="btn-group" role="group" aria-label="Basic example">
					<button class='btn btn-icon btn-round btn-success normal edit'  type='button' value='{{ $unit -> unitID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-round btn-danger delete' value='{{ $unit -> unitID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
					</div>

					<script type="text/javascript">
	
					$(document).on('click', '.delete', function(e) {

						var id = this.value;
						$.ajax({
								type: 'get',
								url: "{{ url('unit/getEdit') }}",
								data: {unitID:id},
								success:function(data)
								{
									
									swal({
										  title: "Are you sure you want to delete " + data.unitCode + "?",
										  text: "",
										  type: "warning",
										  showCancelButton: true,
										  confirmButtonColor: "#DD6B55",
										  confirmButtonText: "DELETE",
										  closeOnConfirm: false
										},
										function(){

										  swal("Successfull", data.unitCode + " is deleted!", "success");
										  document.getElementById(data.unitID).submit();
										  
										});				
								}
							})

					
						
					});

					</script>

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
				url: "{{ url('/unit/getEdit') }}",
				data: {unitID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#unit_code').val(data.unitCode);
					frm.find('#edit-lotID').val(data.lotID);
					frm.find('#unitID').val(data.unitID);

					
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

	
	
@endsection

@section('edit-modal-title')
	Edit Unit
@endsection

@section('edit-modal-desc')
	Edit existing unit data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'/unit/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	
			{!!Form::hidden('unitID',null,['id'=>'unitID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Unit Number</label>
		<div class="col-md-9">
			{!!Form::text('unit_code',null,['id'=>'unit_code','class'=>'form-control', 'maxlength'=>'8','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 8 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'1'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Lot</label>
		<div class="col-md-9">
			
			{{ Form::select('lotID', $types, null, ['id'=>'edit-lotID', 'class' => 'form-control border-info selectBox']) }}
			
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

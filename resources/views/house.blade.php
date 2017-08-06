<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	House
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(HOUSE);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">CITY</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">House</li>
	<li class="breadcrumb-item"><a href="#">House</a></li>


@endsection

@section('main-card-title')
	House
@endsection

@section('modal-card-title')
	Add House
@endsection

@section('modal-card-desc')
	Name of the House.
@endsection

@section('modal-form-body')

	
		

	{!!Form::open(['url'=>'house/store', 'method' => 'POST', 'id' => 'frm-add'])!!}

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
		<label class="col-md-3 label-control" for="eventRegInput1">*House Number</label>
		<div class="col-md-9">
			{!!Form::text('houseCode',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.4', 'maxlength'=>'11','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 11 characters','required', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'1'])!!}
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



@endsection

@section('modal-form-action')
<input type="submit" class="btn btn-success" value="Add" name="btnAdd">
<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel
</button>

{!!Form::close()!!}

@endsection

@section('table-head-list')
	<th>ID</th>
	<th>Number</th>
	<th>Lot</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($houses as $house)
		<tr>
			<td>{{ $house -> houseID }}</td>
			<td>{{ $house -> houseCode }}</td>
			<td>{{ $house -> lotCode }}</td>
			
			@if ($house -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!!Form::open(['url'=>'house/delete', 'method' => 'POST', 'id' => $house -> houseID ])!!}					
				{{ csrf_field() }}

					<input type='hidden' name='houseID' value='{{ $house -> houseID }}' />
					<input type='hidden' name='houseCode' value='{{ $house -> houseCode }}' />
					
					<input type='hidden' name='status' value='{{ $house -> status }}' />
				
				<div class="btn-group" role="group" aria-label="Basic example">
					<button class='btn btn-icon btn-round btn-success normal edit'  type='button' value='{{ $house -> houseID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-round btn-danger delete' value='{{ $house -> houseID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
					</div>
					<script type="text/javascript">
	
					$(document).on('click', '.delete', function(e) {

						var id = $(this).val();

						$.ajax({
								type: 'get',
								url: "{{ url('house/getEdit') }}",
								data: {houseID:id},
								success:function(data)
								{
									
									swal({
										  title: "Are you sure you want to delete " + data.houseCode + "?",
										  text: "",
										  type: "warning",
										  showCancelButton: true,
										  confirmButtonColor: "#DD6B55",
										  confirmButtonText: "DELETE",
										  closeOnConfirm: false
										},
										function(){

										  swal("Successfull", data.houseCode + " is deleted!", "success");
										  document.getElementById(data.houseID).submit();
										  
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
				url: "{{ url('/house/getEdit') }}",
				data: {houseID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#house_code').val(data.houseCode);
					frm.find('#edit-lotID').val(data.lotID);
					frm.find('#houseID').val(data.houseID);

					
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
	Edit House
@endsection

@section('edit-modal-desc')
	Edit existing house data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'/house/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	
			{!!Form::hidden('houseID',null,['id'=>'houseID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*House Number</label>
		<div class="col-md-9">
			{!!Form::text('house_code',null,['id'=>'house_code','class'=>'form-control', 'maxlength'=>'11','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 11 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'1'])!!}
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

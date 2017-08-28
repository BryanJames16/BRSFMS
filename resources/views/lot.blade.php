<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Lot
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(LOT);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">CITY</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Lot</li>
	<li class="breadcrumb-item"><a href="#">Lot</a></li>


@endsection

@section('main-card-title')
	Lot
@endsection

@section('modal-card-title')
	Add Lot
@endsection

@section('modal-card-desc')
	Name of the Lot.
@endsection

@section('modal-form-body')

	
		

	{!!Form::open(['url'=>'lot/store', 'method' => 'POST', 'id' => 'frm-add'])!!}

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
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('lotCode',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.21', 'maxlength'=>'5','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 5 characters','required', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'1'])!!}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Street</label>
		
		<div class="col-md-9">
			
			{{ Form::select('streetID', $types, null, ['id'=>'streetID', 'class' => 'form-control border-info selectBox']) }}
			
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
	<th>Name</th>
	<th>Street</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($lots as $lot)
		<tr>
			<td>{{ $lot -> lotID }}</td>
			<td>{{ $lot -> lotCode }}</td>
			<td>{{ $lot -> streetName }}</td>
			
			@if ($lot -> status == 1)
				<td><span class="tag round tag-default tag-success">Active</span></td>
			@else
				<td><span class="tag round tag-default tag-danger">Inactive</span></td>
			@endif
			
			<td>
				{!!Form::open(['url'=>'lot/delete', 'method' => 'POST', 'id' => $lot -> lotID ])!!}					
				{{ csrf_field() }}

					<input type='hidden' name='lotID' value='{{ $lot -> lotID }}' />
					<input type='hidden' name='lotCode' value='{{ $lot -> lotCode }}' />
					
					<input type='hidden' name='status' value='{{ $lot -> status }}' />
					
				<div class="btn-group" role="group" aria-label="Basic example">
					<button class='btn btn-icon btn-round btn-success normal edit'  type='button' value='{{ $lot -> lotID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-round btn-danger delete' value='{{ $lot -> lotID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
					</div>
					

				{!!Form::close()!!}
			</td>
		</tr>
	@endforeach
@endsection



@section('edit-modal-title')
	Edit Lot
@endsection

@section('edit-modal-desc')
	Edit existing lot data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'/lot/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	
			{!!Form::hidden('lotID',null,['id'=>'lotID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('lot_code',null,['id'=>'lot_code','class'=>'form-control', 'maxlength'=>'5','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 5 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'1'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Street</label>
		<div class="col-md-9">
			
			{{ Form::select('streetID', $types, null, ['id'=>'edit-streetID', 'class' => 'form-control border-info selectBox']) }}
			
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

@section('page-action')

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
				url: "{{ url('/lot/getEdit') }}",
				data: {lotID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#lot_code').val(data.lotCode);
					frm.find('#edit-streetID').val(data.streetID);
					frm.find('#lotID').val(data.lotID);

					
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

	<script type="text/javascript">
	
					$(document).on('click', '.delete', function(e) {

						var id = this.value;
						$.ajax({
								type: 'get',
								url: "{{ url('lot/getEdit') }}",
								data: {lotID:id},
								success:function(data)
								{
									
									swal({
										  title: "Are you sure you want to delete " + data.lotCode + "?",
										  text: "",
										  type: "warning",
										  showCancelButton: true,
										  confirmButtonColor: "#DD6B55",
										  confirmButtonText: "DELETE",
										  closeOnConfirm: false
										},
										function(){

										  swal("Successfull", data.lotCode + " is deleted!", "success");
										  document.getElementById(data.lotID).submit();
										  
										});				
								}
							})

					
						
					});

					</script>
@endsection

<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Street
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(STREET);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">CITY</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Street</li>
	<li class="breadcrumb-item"><a href="#">Street</a></li>


@endsection

@section('main-card-title')
	Street
@endsection

@section('modal-card-title')
	Add Street
@endsection

@section('modal-card-desc')
	Name of the Street.
@endsection

@section('modal-form-body')

	
		

	{!!Form::open(['url'=>'street/store', 'method' => 'POST', 'id' => 'frm-add'])!!}

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
			{!!Form::text('streetName',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.Hipodromo', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required', 'pattern'=>'^[a-zA-Z0-9-_ ]+$', 'minlength'=>'3'])!!}
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
	<th>Name</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($streets as $street)
		<tr>
			<td>{{ $street -> streetID }}</td>
			<td>{{ $street -> streetName }}</td>
			
			@if ($street -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!!Form::open(['url'=>'street/delete', 'method' => 'POST', 'id' => $street -> streetID ])!!}					
				{{ csrf_field() }}

					<input type='hidden' name='streetID' value='{{ $street -> streetID }}' />
					<input type='hidden' name='streetName' value='{{ $street -> streetName }}' />
					<input type='hidden' name='status' value='{{ $street -> status }}' />
					
				<div class="btn-group" role="group" aria-label="Basic example">
					<button class='btn btn-icon btn-round btn-success normal edit'  type='button' value='{{ $street -> streetID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-round btn-danger delete' value='{{ $street -> streetID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
					</div>
					

				{!!Form::close()!!}
			</td>
		</tr>
	@endforeach
@endsection

@section('page-action')

	<script type="text/javascript">
	
					$(document).on('click', '.delete', function(e) {

						var id = $(this).val();

						$.ajax({
								type: 'get',
								url: "{{ url('street/getEdit') }}",
								data: {streetID:id},
								success:function(data)
								{
									
									swal({
										  title: "Are you sure you want to delete " + data.streetName + "?",
										  text: "",
										  type: "warning",
										  showCancelButton: true,
										  confirmButtonColor: "#DD6B55",
										  confirmButtonText: "DELETE",
										  closeOnConfirm: false
										},
										function(){

										  swal("Successfull", data.streetName + " is deleted!", "success");
										  document.getElementById(data.streetID).submit();
										  
										});				
								}
							})

					
						
					});

					</script>

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
				url: "{{ url('/street/getEdit') }}",
				data: {streetID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#street_name').val(data.streetName);
					frm.find('#streetID').val(data.streetID);
					
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
	Edit Street
@endsection

@section('edit-modal-desc')
	Edit existing street data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'/street/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	
			{!!Form::hidden('streetID',null,['id'=>'streetID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('street_name',null,['id'=>'street_name','class'=>'form-control', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'3'])!!}
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

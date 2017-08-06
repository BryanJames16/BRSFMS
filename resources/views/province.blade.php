<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Province
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(PROVINCE);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Province</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Province</li>
	<li class="breadcrumb-item"><a href="#">Province</a></li>


@endsection

@section('main-card-title')
	Province
@endsection

@section('modal-card-title')
	Add Province
@endsection

@section('modal-card-desc')
	Name of the Province.
@endsection

@section('modal-form-body')

	
		

	{!!Form::open(['url'=>'/province/store', 'method' => 'POST', 'id' => 'frm-add'])!!}

		{{ csrf_field() }}
	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('name',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.Rizal','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 40 characters', 'maxlength'=>'40','required'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Code</label>
		<div class="col-md-9">
			{!!Form::text('code',null,['id'=>'code','class'=>'form-control', 'placeholder'=>'eg.CODE_021','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 8 characters', 'maxlength'=>'8','required'])!!}
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
<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
	<i class="icon-cross2"></i> Cancel
</button>

{!!Form::close()!!}

@endsection

@section('table-head-list')
	<th>ID</th>
	<th>Name</th>
	<th>Code</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($provinces as $province)
		<tr>
			<td>{{ $province -> provinceID }}</td>
			<td>{{ $province -> provinceName }}</td>
			<td>{{ $province -> provinceCode }}</td>
			@if ($province -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!!Form::open(['url'=>'province/delete', 'method' => 'POST', 'id' => $province -> provinceID ])!!}					
				{{ csrf_field() }}
					<input type='hidden' name='provinceID' value='{{ $province -> provinceID }}' />
					<input type='hidden' name='provinceName' value='{{ $province -> provinceName }}' />
					<input type='hidden' name='provinceCode' value='{{ $province -> provinceCode }}' />
					<input type='hidden' name='status' value='{{ $province -> status }}' />
					<button class='btn btn-success normal edit'  type='button' value='{{ $province -> provinceID }}'>Edit</button>
					<button class='btn btn-danger delete' value='{{ $province -> provinceID }}' type='button' name='btnEdit'>Delete</button>
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
				url: "{{ url('/province/getEdit') }}",
				data: {provinceID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#name').val(data.provinceName);
					frm.find('#provinceID').val(data.provinceID);
					frm.find('#code').val(data.provinceCode);

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

		var id = $(this).val();

		$.ajax({
				type: 'get',
				url: "{{ url('/province/getEdit') }}",
				data: {provinceID:id},
				success:function(data)
				{
					console.log(data);
					swal({
						  title: "Are you sure you want to delete " + data.provinceName + "?",
						  text: "",
						  type: "warning",
						  showCancelButton: true,
						  confirmButtonColor: "#DD6B55",
						  confirmButtonText: "DELETE",
						  closeOnConfirm: false
						},
						function(){

						  swal("Successfull", data.provinceName + " is deleted!", "success");
						  document.getElementById(data.provinceID).submit();
						});				
				}
			})

	
		
	});
	</script>
	
@endsection

@section('edit-modal-title')
	Edit Province
@endsection

@section('edit-modal-desc')
	Edit existing facility type data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'province/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{!!Form::text('provinceID',null,['id'=>'provinceID','class'=>'form-control', 'maxlength'=>'11', 'readonly'])!!}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('name',null,['id'=>'name','class'=>'form-control','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 40 characters', 'maxlength'=>'40','required'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Code</label>
		<div class="col-md-9">
			{!!Form::text('code',null,['id'=>'code','class'=>'form-control', 'maxlength'=>'8','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 8 characters','required'])!!}
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
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
		<i class="icon-cross2"></i> Cancel
	</button>
	
@endsection

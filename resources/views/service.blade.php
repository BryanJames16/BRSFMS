<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Service
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(SERVICES);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Service</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Service</li>
	<li class="breadcrumb-item"><a href="#">Service</a></li>
@endsection

@section('main-card-title')
	Service
@endsection

@section('modal-card-title')
	Add Service
@endsection

@section('modal-card-desc')
	Name of the Service.
@endsection

@section('modal-form-body')
	{!!Form::open(['url'=>'/service/store', 'method' => 'POST', 'id' => 'frm-add'])!!}
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
			{!!Form::text('serviceID',null,['id'=>'id','class'=>'form-control', 'placeholder'=>'eg.SERV_001', 'maxlength'=>'20','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters', 'minlength'=>'5', 'pattern'=>'^[a-zA-Z0-9-_]+$'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('serviceName',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.Tuli', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'3', 'pattern'=>'^[a-zA-Z0-9-_ \']+$'])!!}
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{!!Form::textarea('desc',null,['id'=>'desc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Type</label>
		<div class="col-md-9">
			
			{{ Form::select('typeID', $types, null, ['id'=>'typeID', 'class' => 'form-control border-info selectBox']) }}
			
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
	<th>Description</th>
	<th>Type</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($services as $service)
		<tr>
			<td>{{ $service -> serviceID }}</td>
			<td>{{ $service -> serviceName }}</td>
			<td>{{ $service -> serviceDesc }}</td>
			<td>{{ $service -> typeName }}</td>
			
			@if ($service -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!! Form::open(['url'=>'service/delete', 'method' => 'POST', 'id' => $service -> primeID ]) !!}					
				{{ csrf_field() }}
					<input type='hidden' name='primeID' value='{{ $service -> primeID }}' />
					<input type='hidden' name='serviceName' value='{{ $service -> serviceName }}' />
					<input type='hidden' name='typeID' value='{{ $service -> serviceDesc }}' />
					<input type='hidden' name='typeID' value='{{ $service -> typeID }}' />
					<input type='hidden' name='typeID' value='{{ $service -> status }}' />
					<div class="btn-group" role="group" aria-label="Basic example">
					<button class='btn btn-icon btn-round btn-success normal edit'  type='button' value='{{ $service -> primeID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-round btn-danger delete' value='{{ $service -> primeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
					</div>
				{!! Form::close() !!}
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
				url: "{{ url('/service/getEdit') }}",
				data: {primeID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#service_name').val(data.serviceName);
					frm.find('#service_desc').val(data.serviceDesc);
					frm.find('#service_ID').val(data.serviceID);
					frm.find('#typeID').val(data.typeID);
					frm.find('#primeID').val(data.primeID);
					
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
				url: "{{ url('service/getEdit') }}",
				data: {primeID:id},
				success:function(data)
				{
					console.log(data);
					swal({
						  title: "Are you sure you want to delete " + data.serviceName + "?",
						  text: "",
						  type: "warning",
						  showCancelButton: true,
						  confirmButtonColor: "#DD6B55",
						  confirmButtonText: "DELETE",
						  closeOnConfirm: false
						},
						function(){

						  swal("Successfull", data.serviceName + " is deleted!", "success");
						  document.getElementById(data.primeID).submit();
						});				
				}
			})

	
		
	});
	</script>
	
@endsection

@section('edit-modal-title')
	Edit Service
@endsection

@section('edit-modal-desc')
	Edit existing service type data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'/service/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	
			{!!Form::hidden('primeID',null,['id'=>'primeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{!!Form::text('service_ID',null,['id'=>'service_ID','class'=>'form-control', 'maxlength'=>'20', 'readonly','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'5'])!!}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('service_name',null,['id'=>'service_name','class'=>'form-control', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'pattern'=>'^[a-zA-Z0-9-_ \']+$', 'minlength'=>'3'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{!!Form::textarea('service_desc',null,['id'=>'service_desc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Type</label>
		<div class="col-md-9">
			
			{{ Form::select('typeID', $types, null, ['id'=>'typeID', 'class' => 'form-control border-info selectBox']) }}
			
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

<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Business
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(BUSINESS);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Business</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Business</li>
	<li class="breadcrumb-item"><a href="#">Business</a></li>


@endsection

@section('main-card-title')
	Business
@endsection

@section('modal-card-title')
	Add Business
@endsection

@section('modal-card-desc')
	Name of the Business.
@endsection

@section('modal-form-body')

	
		

	{!!Form::open(['url'=>'/business/store', 'method' => 'POST', 'id' => 'frm-add'])!!}

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
			{!!Form::text('businessID',null,['id'=>'id','class'=>'form-control', 'placeholder'=>'eg.BUS_001', 'maxlength'=>'20','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'5'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('businessName',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.Sari-sari Store', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'pattern'=>'^[a-zA-Z0-9-_ \']+$', 'minlength'=>'5'])!!}
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
			<select class ='form-control border-info selectBox' name='type'>
				<option value='Sole'>Sole</option>
				<option value='Partnership'>Partnership</option>
				<option value='Corporation'>Corporation</option>
			</select>
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Category</label>
		<div class="col-md-9">
			
			{{ Form::select('categoryPrimeID', $categories, null, ['id'=>'categoryPrimeID', 'class' => 'form-control border-info selectBox']) }}
			
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
	<th>Category</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($businesses as $business)
		<tr>
			<td>{{ $business -> businessID }}</td>
			<td>{{ $business -> businessName }}</td>
			<td>{{ $business -> businessDesc }}</td>
			<td>{{ $business -> businessType }}</td>
			<td>{{ $business -> categoryName }}</td>
			
			@if ($business -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!!Form::open(['url'=>'business/delete', 'method' => 'POST', 'id' => $business -> businessPrimeID ])!!}					
				{{ csrf_field() }}
					<input type='hidden' name='businessPrimeID' value='{{ $business -> businessPrimeID }}' />
					<input type='hidden' name='typeID' value='{{ $business -> businessName }}' />
					<input type='hidden' name='typeID' value='{{ $business -> businessDesc }}' />
					<input type='hidden' name='typeID' value='{{ $business -> businessType }}' />
					<input type='hidden' name='typeID' value='{{ $business -> categoryPrimeID }}' />
					<input type='hidden' name='typeID' value='{{ $business -> status }}' />
					
				<div class="btn-group" role="group" aria-label="Basic example">
					<button class='btn btn-icon btn-round btn-success normal edit'  type='button' value='{{ $business -> businessPrimeID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-round btn-danger delete' value='{{ $business -> businessPrimeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
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
				url: "{{ url('/business/getEdit') }}",
				data: {businessPrimeID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#businessName').val(data.businessName);
					frm.find('#business_desc').val(data.businessDesc);
					frm.find('#business_ID').val(data.businessID);
					frm.find('#categoryPrimeID').val(data.categoryPrimeID);
					frm.find('#type').val(data.businessType);
					frm.find('#businessPrimeID').val(data.businessPrimeID);
					
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
				url: "{{ url('business/getEdit') }}",
				data: {businessPrimeID:id},
				success:function(data)
				{
					console.log(data);
					swal({
						  title: "Are you sure you want to delete " + data.businessName + "?",
						  text: "",
						  type: "warning",
						  showCancelButton: true,
						  confirmButtonColor: "#DD6B55",
						  confirmButtonText: "DELETE",
						  closeOnConfirm: false
						},
						function(){

						  swal("Successfull", data.businessName + " is deleted!", "success");
						  document.getElementById(data.businessPrimeID).submit();
						});				
				}
			})

	
		
	});
	</script>
	
@endsection

@section('edit-modal-title')
	Edit Business
@endsection

@section('edit-modal-desc')
	Edit existing service type data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'business/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	
			{!!Form::hidden('businessPrimeID',null,['id'=>'businessPrimeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{!!Form::text('business_ID',null,['id'=>'business_ID','class'=>'form-control', 'maxlength'=>'20', 'readonly', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'5'])!!}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('businessName',null,['id'=>'businessName','class'=>'form-control', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'pattern'=>'^[a-zA-Z0-9-_ \']+$', 'minlength'=>'5'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{!!Form::textarea('business_desc',null,['id'=>'business_desc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Type</label>
		<div class="col-md-9">
			{{ Form::select('type', ['Sole'=>'Sole', 'Partnership'=>'Partnership','Corporation'=>'Corporation'],null, ['id'=> 'type', 'class' => 'form-control border-info selectBox']) }}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Category</label>
		<div class="col-md-9">
			
			{{ Form::select('categoryPrimeID', $categories, null, ['id'=>'categoryPrimeID', 'class' => 'form-control border-info selectBox']) }}
			
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

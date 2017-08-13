<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Business Category
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')
	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(BUSINESS_CATEGORY);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Business Category</h2>
@endsection
	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Business</li>
	<li class="breadcrumb-item"><a href="#">Business Category</a></li>
@endsection

@section('main-card-title')
	Business Category
@endsection

@section('modal-card-title')
	Add Business Category
@endsection

@section('modal-card-desc')
	Category of the Business.
@endsection

@section('modal-form-body')
	{!!Form::open(['url'=>'/business-category/store', 'method' => 'POST', 'id' => 'frm-add'])!!}
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>

			
		@endif

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('categoryName',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.Industrial', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength' => '5'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{!!Form::textarea('desc',null,['id'=>'desc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}
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
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($businessCategories as $businessCategory)
		<tr>
			<td>{{ $businessCategory -> categoryPrimeID }}</td>
			<td>{{ $businessCategory -> categoryName }}</td>
			<td>{{ $businessCategory -> categoryDesc }}</td>
			@if ($businessCategory -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!!Form::open(['url'=>'business-category/delete', 'method' => 'POST', 'id' => $businessCategory -> categoryPrimeID ])!!}					
				{{ csrf_field() }}
					<input type='hidden' name='categoryPrimeID' value='{{ $businessCategory -> categoryPrimeID }}' />
					<input type='hidden' name='typeID' value='{{ $businessCategory -> categoryName }}' />
					<input type='hidden' name='typeID' value='{{ $businessCategory -> categoryDesc }}' />
					<input type='hidden' name='typeID' value='{{ $businessCategory -> status }}' />
					<div class="btn-group" role="group" aria-label="Basic example">
					<button class='btn btn-icon btn-round btn-success normal edit'  type='button' value='{{ $businessCategory -> categoryPrimeID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-round btn-danger delete' value='{{ $businessCategory -> categoryPrimeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
					</div>
				{!!Form::close()!!}
			</td>
		</tr>
	@endforeach
@endsection

@section('ajax-modal')
	
	
@endsection

@section('edit-modal-title')
	Edit Business Category
@endsection

@section('edit-modal-desc')
	Edit existing service type data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'business-category/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{!!Form::text('category_ID',null,['id'=>'category_ID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1"*>Name</label>
		<div class="col-md-9">
			{!!Form::text('categoryName',null,['id'=>'categoryName','class'=>'form-control', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'5'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{!!Form::textarea('category_desc',null,['id'=>'category_desc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}
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
				url: "{{ url('/business-category/getEdit') }}",
				data: {categoryPrimeID:id},
				success:function(data)
				{
					var frm = $('#frm-update');
					frm.find('#categoryName').val(data.categoryName);
					frm.find('#category_desc').val(data.categoryDesc);
					frm.find('#category_ID').val(data.categoryPrimeID);

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
				url: "{{ url('business-category/getEdit') }}",
				data: {categoryPrimeID:id},
				success:function(data)
				{
					swal({
						  title: "Are you sure you want to delete " + data.categoryName + "?",
						  text: "",
						  type: "warning",
						  showCancelButton: true,
						  confirmButtonColor: "#DD6B55",
						  confirmButtonText: "DELETE",
						  closeOnConfirm: false
						},
						function(){

						  swal("Successfull", data.categoryName + " is deleted!", "success");
						  document.getElementById(data.categoryPrimeID).submit();
						});				
				}
			})

	
		
	});
	</script>

	<script type="text/javascript">
				$(document).ready(function () {
					$('#iconModal').modal('show');
				});
			</script>

@endsection

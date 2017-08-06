<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Barangay
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(BARANGAY);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">CITY</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Barangay</li>
	<li class="breadcrumb-item"><a href="#">Barangay</a></li>


@endsection

@section('main-card-title')
	Barangay
@endsection

@section('modal-card-title')
	Add Barangay
@endsection

@section('modal-card-desc')
	Name of the Barangay.
@endsection

@section('modal-form-body')

	
		

	{!!Form::open(['url'=>'barangay/store', 'method' => 'POST', 'id' => 'frm-add'])!!}

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
			{!!Form::text('barangayName',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.629', 'maxlength'=>'40','data-toggle'=>'tooltip','data-trigger'=>'focus','data-html' => 'true','data-placement'=>'top','data-title'=>'Maximum of 40 characters<br>Required','required', 'pattern'=>'^[a-zA-Z0-9-_ ]+$', 'minlength'=>'2'])!!}
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
	@foreach($barangays as $barangay)
		<tr>
			<td>{{ $barangay -> barangayID }}</td>
			<td>{{ $barangay -> barangayName }}</td>		
			@if ($barangay -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!!Form::open(['url'=>'barangay/delete', 'method' => 'POST', 'id' => $barangay -> barangayID])!!}					
				{{ csrf_field() }}

					<input type='hidden' name='barangayID' value='{{ $barangay -> barangayID }}' />
					<input type='hidden' name='barangayName' value='{{ $barangay -> barangayName }}' />
					<input type='hidden' name='status' value='{{ $barangay -> status }}' />
				<div class="btn-group" role="group" aria-label="Basic example">
					<button class='btn btn-icon btn-round btn-success normal edit'  type='button' value='{{ $barangay -> barangayID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-round btn-danger delete' value='{{ $barangay -> barangayID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
					</div>
					<script type="text/javascript">
	
						$(document).on('click', '.delete', function(e) {

							var id = $(this).val();

							$.ajax({
									type: 'get',
									url: "{{ url('barangay/getEdit') }}",
									data: {barangayID:id},
									success:function(data)
									{
									
										swal({
											  title: "Are you sure you want to delete " + data.barangayName + "?",
											  text: "",
											  type: "warning",
											  showCancelButton: true,
											  confirmButtonColor: "#DD6B55",
											  confirmButtonText: "DELETE",
											  closeOnConfirm: false
											},
											function(){

											  swal("Successfull", data.barangayName + " is deleted!", "success");
											  document.getElementById(data.barangayID).submit();
											  
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
				url: "{{ url('/barangay/getEdit') }}",
				data: {barangayID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#barangay_name').val(data.barangayName);
					frm.find('#barangayID').val(data.barangayID);
					
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
	Edit Barangay
@endsection

@section('edit-modal-desc')
	Edit existing barangay data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'/barangay/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	
	{!!Form::hidden('barangayID',null,['id'=>'barangayID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('barangay_name',null,['id'=>'barangay_name','class'=>'form-control', 'maxlength'=>'40','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 40 characters', 'pattern'=>'^[a-zA-Z0-9-_ ]+$', 'minlength'=>'2'])!!}
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

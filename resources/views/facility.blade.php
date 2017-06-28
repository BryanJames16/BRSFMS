<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Facility
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(FACILITY);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Facility</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Facility</li>
	<li class="breadcrumb-item"><a href="#">Facility</a></li>


@endsection

@section('main-card-title')
	Facility
@endsection

@section('modal-card-title')
	Add Facility
@endsection

@section('modal-card-desc')
	Name of the Facility.
@endsection

@section('modal-form-body')

	
		

	{!!Form::open(['url'=>'facility/store', 'method' => 'POST', 'id' => 'frm-add'])!!}

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
			{!!Form::text('facilityID',null,['id'=>'id','class'=>'form-control', 'placeholder'=>'eg.FAC_001', 'maxlength'=>'20' ,'data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters','required', 'minlength'=>'5', 'pattern'=>'^[a-zA-Z0-9-_]+$'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('facilityName',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.Hipodromo Court', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required', 'minlength'=>'5', 'pattern'=>'^[a-zA-Z0-9-_\' ]+$'])!!}
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

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Day Price</label>
		<div class="col-md-9">
			{!!Form::number('facilityDayPrice',null,['id'=>'dayPrice','class'=>'form-control', 'placeholder'=>'eg.100', 'data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Please enter a valid amount','required', 'step'=>'0.01'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Night Price</label>
		<div class="col-md-9">
			{!!Form::number('facilityNightPrice',null,['id'=>'nightPrice','class'=>'form-control', 'placeholder'=>'eg.150', 'data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Please enter a valid amount','required', 'step'=>'0.01'])!!}
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
<input type="submit" class="btn btn-success" value="Add" id="btnAdd" name="btnAdd">
<button type="button" data-dismiss="modal"  data-style="slide-left" class="btn btn-warning mr-1">Cancel
</button>


{!!Form::close()!!}

@endsection

@section('table-head-list')
	<th>ID</th>
	<th>Name</th>
	<th>Description</th>
	<th>Type</th>
	<th>Day Price</th>
	<th>Night Price</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($facilities as $facility)
		<tr>
			<td>{{ $facility -> facilityID }}</td>
			<td>{{ $facility -> facilityName }}</td>
			<td>{{ $facility -> facilityDesc }}</td>
			<td>{{ $facility -> typeName }}</td>
			<td>₱{{ $facility -> facilityDayPrice }}</td>
			<td>₱{{ $facility -> facilityNightPrice }}</td>
			
			@if ($facility -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!! Form::open(['url'=>'facility/delete', 'method' => 'POST', 'id' => $facility -> primeID ]) !!}					
				{{ csrf_field() }}
					<input type='hidden' name='primeID' value='{{ $facility -> primeID }}' />
					<input type='hidden' name='facilityName' value='{{ $facility -> facilityName }}' />
					<input type='hidden' name='typeID' value='{{ $facility -> facilityDesc }}' />
					<input type='hidden' name='typeID' value='{{ $facility -> facilityTypeID }}' />
					<input type='hidden' name='typeID' value='{{ $facility -> status }}' />
				<div class="btn-group" role="group" aria-label="Basic example">
					<button class='btn btn-icon btn-round btn-success normal edit'  type='button' value='{{ $facility -> primeID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-round btn-danger delete' value='{{ $facility -> primeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
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
				url: "{{ url('/facility/getEdit') }}",
				data: {primeID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#facility_name').val(data.facilityName);
					frm.find('#facility_desc').val(data.facilityDesc);
					frm.find('#facilityID').val(data.facilityID);
					frm.find('#typeID').val(data.facilityTypeID);
					frm.find('#primeID').val(data.primeID);
					frm.find('#facilityDayPrice').val(data.facilityDayPrice);
					frm.find('#facilityNightPrice').val(data.facilityNightPrice);
					
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
				url: "{{ url('facility/getEdit') }}",
				data: {primeID:id},
				success:function(data)
				{
					console.log(data);
					swal({
						  title: "Are you sure you want to delete " + data.facilityName + "?",
						  text: "",
						  type: "warning",
						  showCancelButton: true,
						  confirmButtonColor: "#DD6B55",
						  confirmButtonText: "DELETE",
						  closeOnConfirm: false
						},
						function(){

						  swal("Successfull", data.facilityName + " is deleted!", "success");
						  document.getElementById(data.primeID).submit();
						});				
				}
			})

	
		
	});
	</script>
	
@endsection

@section('edit-modal-title')
	Edit Facility
@endsection

@section('edit-modal-desc')
	Edit existing facility type data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'/facility/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	
	{!!Form::hidden('primeID',null,['id'=>'primeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{!!Form::text('facilityID',null,['id'=>'facilityID','class'=>'form-control', 'maxlength'=>'30', 'readonly', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'5'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('facilityName',null,['id'=>'facility_name','class'=>'form-control', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'pattern'=>'^[a-zA-Z0-9-_ \']+$', 'minlength'=>'5'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{!!Form::textarea('facility_desc',null,['id'=>'facility_desc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Type</label>
		<div class="col-md-9">
			
			{{ Form::select('typeID', $types, null, ['id'=>'typeID', 'class' => 'form-control border-info selectBox']) }}
			
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Day Price</label>
		<div class="col-md-9">
			{!!Form::number('facilityDayPrice',null,['id'=>'facilityDayPrice','class'=>'form-control', 'placeholder'=>'eg.100', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Night Price</label>
		<div class="col-md-9">
			{!!Form::number('facilityNightPrice',null,['id'=>'facilityNightPrice','class'=>'form-control', 'placeholder'=>'eg.150', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required'])!!}
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

<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Municipality
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(MUNICIPALITY);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">MUNICIPALITY</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Municipality</li>
	<li class="breadcrumb-item"><a href="#">Municipality</a></li>


@endsection

@section('main-card-title')
	Municipality
@endsection

@section('modal-card-title')
	Add Municipality
@endsection

@section('modal-card-desc')
	Name of the Municipality.
@endsection

@section('modal-form-body')

	
		

	{!!Form::open(['url'=>'municipality/store', 'method' => 'POST', 'id' => 'frm-add'])!!}

		{{ csrf_field() }}

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('name',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.Hipodromo Court', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1"><input type="checkbox" id="chk" name="chk" value="checked" checked>  Province</label>
		
		<div class="col-md-9">
			
			{{ Form::select('provinceID', $types, null, ['id'=>'provinceID', 'class' => 'form-control border-info selectBox']) }}
			
		</div>	
	</div>

	<script type="text/javascript">
		$("#chk").click(function(){

			
		  var chk = document.getElementById("chk");
		  var prov = document.getElementById("provinceID");
		  if(chk.checked==true)
		  {

		  	prov.disabled=false;
		  	chk.setAttribute('value','checked');
		  }
		  else
		  {
		  	prov.disabled=true;
		  	chk.setAttribute('value','unchecked');
		  }
		});
	</script>

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

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

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
	<th>Province</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($municipalities as $municipality)
		<tr>
			<td>{{ $municipality -> municipalityID }}</td>
			<td>{{ $municipality -> municipalityName }}</td>
			<td>{{ $municipality -> provinceName }}</td>
			
			@if ($municipality -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!!Form::open(['url'=>'municipality/delete', 'method' => 'POST', 'id' => $municipality -> municipalityID])!!}					
				{{ csrf_field() }}

					<input type='hidden' name='municipalityID' value='{{ $municipality -> municipalityID }}' />
					<input type='hidden' name='municipalityName' value='{{ $municipality -> municipalityName }}' />
					<input type='hidden' name='provinceID' value='{{ $municipality -> provinceID }}' />
					<input type='hidden' name='status' value='{{ $municipality -> status }}' />
					<button class='btn btn-success normal edit'  type='button' value='{{ $municipality -> municipalityID }}'>Edit</button>
					<button class='btn btn-danger delete'   value='{{ $municipality -> municipalityID }}' type='button' name='btnEdit'>Delete</button>
				
					<script type="text/javascript">
	
	$(document).on('click', '.delete', function(e) {

		var id = $(this).val();

		$.ajax({
				type: 'get',
				url: "{{ url('municipality/getEdit') }}",
				data: {municipalityID:id},
				success:function(data)
				{
					console.log(data);
					swal({
						  title: "Are you sure you want to delete " + data.municipalityName + "?",
						  text: "",
						  type: "warning",
						  showCancelButton: true,
						  confirmButtonColor: "#DD6B55",
						  confirmButtonText: "DELETE",
						  closeOnConfirm: false
						},
						function(){

						  swal("Successfull", data.municipalityName + " is deleted!", "success");
						  document.getElementById(data.municipalityID).submit();
						  
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
				url: "{{ url('/municipality/getEdit') }}",
				data: {municipalityID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#municipality_name').val(data.municipalityName);
					frm.find('#provinceID').val(data.provinceID);
					frm.find('#municipalityID').val(data.municipalityID);
					
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
	Edit Municipality
@endsection

@section('edit-modal-desc')
	Edit existing municipality data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'/municipality/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	
			{!!Form::hidden('municipalityID',null,['id'=>'municipalityID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('municipality_name',null,['id'=>'municipality_name','class'=>'form-control', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1"><input type="checkbox" id="edit-chk" name="edit-chk" value="checked" checked>  Province</label>
		<div class="col-md-9">
			
			{{ Form::select('provinceID', $types, null, ['id'=>'edit-provinceID', 'class' => 'form-control border-info selectBox']) }}
			
		</div>	

	</div>

	<script type="text/javascript">
		$("#edit-chk").click(function(){

			
		  var chk = document.getElementById("edit-chk");
		  var prov = document.getElementById("edit-provinceID");
		  if(chk.checked==true)
		  {

		  	prov.disabled=false;
		  	chk.setAttribute('value','checked');
		  }
		  else
		  {
		  	prov.disabled=true;
		  	chk.setAttribute('value','unchecked');
		  }
		});
	</script>


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

<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	City
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(CITY);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">CITY</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">City</li>
	<li class="breadcrumb-item"><a href="#">City</a></li>


@endsection

@section('main-card-title')
	City
@endsection

@section('modal-card-title')
	Add City
@endsection

@section('modal-card-desc')
	Name of the City.
@endsection

@section('modal-form-body')

	
		

	{!!Form::open(['url'=>'city/store', 'method' => 'POST', 'id' => 'frm-add'])!!}

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
	@foreach($cities as $city)
		<tr>
			<td>{{ $city -> cityID }}</td>
			<td>{{ $city -> cityName }}</td>
			<td>{{ $city -> provinceName }}</td>
			
			@if ($city -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!!Form::open(['url'=>'city/delete', 'method' => 'POST', 'id' => $city -> cityID ])!!}					
				{{ csrf_field() }}

					<input type='hidden' name='cityID' value='{{ $city -> cityID }}' />
					<input type='hidden' name='cityName' value='{{ $city -> cityName }}' />
					<input type='hidden' name='provinceID' value='{{ $city -> provinceID }}' />
					<input type='hidden' name='status' value='{{ $city -> status }}' />
					<button class='btn btn-success normal edit'  type='button' value='{{ $city -> cityID }}'>Edit</button>
					<button class='btn btn-danger delete'   value='{{ $city -> cityID }}' type='button' name='btnEdit'>Delete</button>
				
					<script type="text/javascript">
	
					$(document).on('click', '.delete', function(e) {

						var id = $(this).val();

						$.ajax({
								type: 'get',
								url: "{{ url('city/getEdit') }}",
								data: {cityID:id},
								success:function(data)
								{
									
									swal({
										  title: "Are you sure you want to delete " + data.cityName + "?",
										  text: "",
										  type: "warning",
										  showCancelButton: true,
										  confirmButtonColor: "#DD6B55",
										  confirmButtonText: "DELETE",
										  closeOnConfirm: false
										},
										function(){

										  swal("Successfull", data.cityName + " is deleted!", "success");
										  document.getElementById(data.cityID).submit();
										  
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
				url: "{{ url('/city/getEdit') }}",
				data: {cityID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#city_name').val(data.cityName);
					frm.find('#provinceID').val(data.provinceID);
					frm.find('#cityID').val(data.cityID);
					
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
	Edit City
@endsection

@section('edit-modal-desc')
	Edit existing city data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'/city/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	
			{!!Form::hidden('cityID',null,['id'=>'cityID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('city_name',null,['id'=>'city_name','class'=>'form-control', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters'])!!}
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

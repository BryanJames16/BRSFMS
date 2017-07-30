<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Building Type
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(BUILDING_TYPE);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Building Type</h2>
@endsection

@section('inside-breadcrumb')
	<li class="breadcrumb-item">Building</li>
	<li class="breadcrumb-item"><a href="#">Building Type</a></li>
@endsection

@section('main-card-title')
	Building Type
@endsection

@section('modal-card-title')
	Add Building Type
@endsection

@section('modal-card-desc')
	Type of the Building.
@endsection

@section('modal-form-body')
	{!!Form::open(['id' => 'frm-add'])!!}

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

	<div>
		<div class="form-group row">
			<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
			<div class="col-md-9">
				{!! Form::text('buildngTypeName', null, ['id' => 'buildingTypeName', 
													'class' => 'form-control', 
													'ng-model' => 'building.typename', 
													'placeholder' => 'eg.House', 
													'maxlength' => '20', 'required', 
													'data-toggle' => 'tooltip', 
													'data-trigger' => 'focus', 
													'data-placement' => 'top', 
													'data-title' => 'Maximum of 20 characters', 
													'minlength' => '5', 
													'pattern' => '^[a-zA-Z0-9-_ ]+$']) !!}
			</div>	

		</div>


		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

		<div class="form-group row last">
			<label class="col-md-3 label-control">*Status</label>
			<div class="col-md-9">
				<div class="input-group col-md-9">
					<label class="inline custom-control custom-radio">
						<input type="radio" value="active" name="stat" class="tstat custom-control-input" ng-model="service.status">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description ml-0">Active</span>
					</label>
					<label class="inline custom-control custom-radio">
						<input type="radio" value="inactive" name="stat" class="tstat custom-control-input" ng-model="service.status">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description ml-0">Inactive</span>
					</label>
				</div>
			</div>
		</div>
	</div>

	<script>
		$("#btnAddModal").on('click', function() {
			$("#iconModal").modal('show');
		});

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/building-type/refresh') }}",
				type: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-container").find("tr:gt(0)").remove();
					data = $.parseJSON(data);
							
					for (var index in data) {
						var statusText = "";
						if (data[index].status == 1) {
							statusText = "Active";
						}
						else {
							statusText = "Inactive";
						}

						$("#table-container").append('<tr>' + 
									'<td>' + data[index].buildingTypeID + '</td>' + 
									'<td>' + data[index].buildingTypeName + '</td>' + 
									'<td>' + statusText + '</td>' + 
									'<td>' + 
										'<form method="POST" id="' + data[index].buildingTypeID + '" action="/service-type/delete" accept-charset="UTF-8"])!!}' + 
											'<input type="hidden" name="typeID" value="' + data[index].buildingTypeID + '" />' + 
											'<input type="hidden" name="typeName" value="' + data[index].buildingTypeName + '" />' + 
											'<input type="hidden" name="status" value="' + statusText + '" />' + 
											'<span class="dropdown">' +
												'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>' +
												'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
													'<a href="#" class="dropdown-item edit" name="btnEdit" data-value="' + data[index].buildingTypeID + '"><i class="icon-pen3"></i> Edit</a>' +
													'<a href="#" class="dropdown-item delete" name="btnDelete" data-value="' + data[index].buildingTypeID + '"><i class="icon-trash4"></i> Delete</a>' +
												'</span>' +
											'</span>' +
											'</form>' + 
									'</td>' + 
								'</tr>'
						);
					}
				}
			});
		};

		$('#frm-add').submit(function(event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/building-type/store') }}",
				type: "POST",
				data: {"_token": $('#csrf-token').val(), 
						"buildingTypeName": $("#buildingTypeName").val(), 
						"status": $(".tstat:checked").val()
				}, 
				success: function ( _response ){
					$("#iconModal").modal('hide');
					$("#frm-add").trigger("reset");
					
					refreshTable();
					
					swal("Successful", 
							"Building type has been added!", 
							"success");
				}, 
				error: function(error) {

					var message = "Errors: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});
		});
	</script>
@endsection

@section('modal-form-action')
	<input type="submit" class="btn btn-success" value="Add" name="btnAdd">
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>

	{!! Form::close() !!}
@endsection

@section('modal-controller')
	
@endsection

@section('table-head-list')
	<th>ID</th>
	<th>Name</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($buildingTypes as $buildingType)
		<tr>
			<td>{{ $buildingType -> buildingTypeID }}</td>
			<td>{{ $buildingType -> buildingTypeName }}</td>
			@if ($buildingType -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!! Form::open(['url'=>'building-type/delete', 'method' => 'POST', 'id' => $buildingType -> buildingTypeID ]) !!}
					<input type='hidden' name='buildingTypeID' value='{{ $buildingType -> buildingTypeID }}' />
					<input type='hidden' name='buildingTypeName' value='{{ $buildingType -> buildingTypeName }}' />
					<input type='hidden' name='status' value='{{ $buildingType -> status }}' />
					<span class="dropdown">
						<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
						<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
							<a href="#" class="dropdown-item edit" name="btnEdit" data-value='{{ $buildingType -> buildingTypeID }}'><i class="icon-pen3"></i> Edit</a>
							<a href="#" class="dropdown-item delete" name="btnDelete" data-value='{{ $buildingType -> buildingTypeID }}'><i class="icon-trash4"></i> Delete</a>
						</span>
					</span>
					
					
				{!! Form::close() !!}
			</td>
		</tr>
	@endforeach
@endsection

@section('ajax-modal')
	<script>
		$(document).on('click', '.edit', function(e) {
			var id = $(this).data("value");

			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});

			$.ajax({
				type: 'get',
				url: "{{ url('/building-type/getEdit') }}",
				data: {buildingTypeID:id},
				success:function(data)
				{
					var frm = $('#frm-update');
					frm.find('#building_TypeName').val(data.buildingTypeName);
					frm.find('#buildingTypeID').val(data.buildingTypeID);

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
		e.preventDefault();
		var id = $(this).data("value");

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
				type: 'get',
				url: "{{ url('building-type/getEdit') }}",
				data: {buildingTypeID:id},
				success:function(data)
				{
					swal({
						  title: "Are you sure you want to delete " + data.buildingTypeName + "?",
						  text: "",
						  type: "warning",
						  showCancelButton: true,
						  confirmButtonColor: "#DD6B55",
						  confirmButtonText: "DELETE",
						  closeOnConfirm: false
						},
						function(){
						  $.ajax({
							  type: "post", 
							  url: "{{ url('building-type/delete') }}", 
							  data: {buildingTypeID: id},
							  success: function(data) { 
									swal("Success", "Successfully deleted!", "success");
									refreshTable();
							  }, 
							  error: function(data) {
									swal("Error", "Failed!", "error");
							  }
						  });
						});				
				}
			});

	
		
	});
	</script>
	
@endsection

@section('edit-modal-title')
	Edit Building Type
@endsection

@section('edit-modal-desc')
	Edit existing building type data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'building-type/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{!!Form::text('buildingTypeID',null,['id'=>'buildingTypeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!! Form::text('building_TypeName',null,['id'=>'building_TypeName','class'=>'form-control', 'maxlength'=>'20','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'5']) !!}
		</div>	

	</div>

	<div class="form-group row last">
		<label class="col-md-3 label-control">*Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" id='active' name="etstat" value="1" class="etstat custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" id='inactive' name="etstat" value="0" class="etstat custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Inactive</span>
				</label>
			</div>
		</div>
	</div>

@endsection

@section('edit-modal-action')
	
	{!! Form::submit('Edit',['class'=>'btn btn-success']) !!}
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel
	</button>
	
	<script>
		$("#frm-update").submit(function(event) {
			event.preventDefault();

            console.log($("#building_TypeName").val());

			$.ajax({
				url: "{{ url('/building-type/update') }}",
				type: "POST",
				data: {"_token": $('#csrf-token').val(), 
						"buildingTypeID": $("#buildingTypeID").val(), 
						"buildingTypeName": $("#building_TypeName").val(), 
						"status": $(".etstat:checked").val()
				}, 
				success: function ( _response ){
					$("#modalEdit").modal('hide');
					$("#frm-update").trigger('reset');
					
					refreshTable();
					
					swal("Successful", 
							"Building type has been updated!", 
							"success");
				}, 
				error: function(error) {

					var message = "Errors: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
			});
		});
	</script>

@endsection

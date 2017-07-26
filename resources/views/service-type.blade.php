<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Service Type
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(SERVICE_TYPE);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Service Type</h2>
@endsection

@section('inside-breadcrumb')
	<li class="breadcrumb-item">Service</li>
	<li class="breadcrumb-item"><a href="#">Service Type</a></li>
@endsection

@section('main-card-title')
	Service Type
@endsection

@section('modal-card-title')
	Add Service Type
@endsection

@section('modal-card-desc')
	Type of the Service.
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
			<label class="col-md-3 label-control" for="eventRegInput1">*Names</label>
			<div class="col-md-9">
				{!! Form::text('typeName', null, ['id' => 'name', 
													'class' => 'form-control', 
													'ng-model' => 'service.typename', 
													'placeholder' => 'eg.Health', 
													'maxlength' => '20', 'required', 
													'data-toggle' => 'tooltip', 
													'data-trigger' => 'focus', 
													'data-placement' => 'top', 
													'data-title' => 'Maximum of 20 characters', 
													'minlength' => '5', 
													'pattern' => '^[a-zA-Z0-9-_ ]+$']) !!}
			</div>	

		</div>

		<div class="form-group row">
			<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
			<div class="col-md-9">
				{!! Form::textarea('desc', null, ['id' => 'desc', 
													'class' => 'form-control', 
													'ng-model' => 'service.desc', 
													'maxlength' => '500',
													'data-toggle' => 'tooltip',
													'data-trigger' => 'focus',
													'data-placement' => 'top',
													'data-title' => 'Maximum of 500 characters']) !!}
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
				url: "{{ url('/service-type/refresh') }}",
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
									'<td>' + data[index].typeID + '</td>' + 
									'<td>' + data[index].typeName + '</td>' + 
									'<td>' + data[index].typeDesc + '</td>' + 
									'<td>' + statusText + '</td>' + 
									'<td>' + 
										'<form method="POST" id="' + data[index].typeID + '" action="/service-type/delete" accept-charset="UTF-8"])!!}' + 
											'<input type="hidden" name="typeID" value="' + data[index].typeID + '" />' + 
											'<input type="hidden" name="typeName" value="' + data[index].typeName + '" />' + 
											'<input type="hidden" name="typeDesc" value="' + data[index].typeDesc + '" />' + 
											'<input type="hidden" name="status" value="' + statusText + '" />' + 
											'<span class="dropdown">' +
												'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>' +
												'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
													'<a href="#" class="dropdown-item edit" name="btnEdit" data-value="' + data[index].typeID + '"><i class="icon-pen3"></i> Edit</a>' +
													'<a href="#" class="dropdown-item delete" name="btnDelete" data-value="' + data[index].typeID + '"><i class="icon-trash4"></i> Delete</a>' +
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
				url: "{{ url('/service-type/store') }}",
				type: "POST",
				data: {"_token": $('#csrf-token').val(), 
						"typeName": $("#name").val(), 
						"typeDesc": $("#desc").val(), 
						"status": $(".tstat:checked").val()
				}, 
				success: function ( _response ){
					$("#iconModal").modal('hide');
					$("#frm-add").trigger("reset");
					
					refreshTable();
					
					swal("Successful", 
							"Service type has been added!", 
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
	<th>Description</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($serviceTypes as $serviceType)
		<tr>
			<td>{{ $serviceType -> typeID }}</td>
			<td>{{ $serviceType -> typeName }}</td>
			<td>{{ $serviceType -> typeDesc }}</td>
			@if ($serviceType -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!! Form::open(['url'=>'service-type/delete', 'method' => 'POST', 'id' => $serviceType -> typeID ]) !!}
					<input type='hidden' name='typeID' value='{{ $serviceType -> typeID }}' />
					<input type='hidden' name='typeName' value='{{ $serviceType -> typeName }}' />
					<input type='hidden' name='typeDesc' value='{{ $serviceType -> typeDesc }}' />
					<input type='hidden' name='status' value='{{ $serviceType -> status }}' />
					<span class="dropdown">
						<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
						<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
							<a href="#" class="dropdown-item edit" name="btnEdit" data-value='{{ $serviceType -> typeID }}'><i class="icon-pen3"></i> Edit</a>
							<a href="#" class="dropdown-item delete" name="btnDelete" data-value='{{ $serviceType -> typeID }}'><i class="icon-trash4"></i> Delete</a>
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
				url: "{{ url('/service-type/getEdit') }}",
				data: {typeID:id},
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#typeName').val(data.typeName);
					frm.find('#typeDesc').val(data.typeDesc);
					frm.find('#typeID').val(data.typeID);

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
				url: "{{ url('service-type/getEdit') }}",
				data: {typeID:id},
				success:function(data)
				{
					swal({
						  title: "Are you sure you want to delete " + data.typeName + "?",
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
							  url: "{{ url('service-type/delete') }}", 
							  data: {typeID: id},
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
	Edit Service Type
@endsection

@section('edit-modal-desc')
	Edit existing service type data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'service-type/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{!!Form::text('type_ID',null,['id'=>'typeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!! Form::text('typeName',null,['id'=>'typeName','class'=>'form-control', 'maxlength'=>'20','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'5']) !!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{!!Form::textarea('typeDesc',null,['id'=>'typeDesc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}
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

			$.ajax({
				url: "{{ url('/service-type/update') }}",
				type: "POST",
				data: {"_token": $('#csrf-token').val(), 
						"typeID": $("#typeID").val(), 
						"typeName": $("#typeName").val(), 
						"typeDesc": $("#typeDesc").val(), 
						"status": $(".etstat:checked").val()
				}, 
				success: function ( _response ){
					console.log("etstatval: " + $(".etstat:checked").val());
					$("#modalEdit").modal('hide');
					$("#frm-update").trigger('reset');
					
					refreshTable();
					
					swal("Successful", 
							"Service type has been updated!", 
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

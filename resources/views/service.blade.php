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

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{!!Form::text('serviceID',null,['id'=>'serviceID','class'=>'form-control', 'placeholder'=>'eg.SERV_001', 'maxlength'=>'20','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters', 'minlength'=>'5', 'pattern'=>'^[a-zA-Z0-9-_]+$'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('serviceName',null,['id'=>'serviceName','class'=>'form-control', 'placeholder'=>'eg.Tuli', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'3', 'pattern'=>'^[a-zA-Z0-9-_ \']+$'])!!}
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{!!Form::textarea('desc',null,['id'=>'serviceDesc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}
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
					<input type="radio" value="active" name="status" id="status" class="tstatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" value="inactive" name="status" id="status"  class="tstatus custom-control-input" >
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

	<script>
		$("#frm-add").submit(function(event) {
			event.preventDefault();

			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});

			$.ajax({
				url: "{{ url('/service/store') }}", 
				method: "POST", 
				data: {
					"serviceID": $("#serviceID").val(), 
					"serviceName": $("#serviceName").val(), 
					"serviceDesc": $("#serviceDesc").val(), 
					"typeID": $("#typeID").val(), 
					"status": $(".tstatus:checked").val()
				}, 
				success: function(data) {
					$("#iconModal").modal("hide");
					refreshTable();
					$("#frm-add").trigger("reset");
					swal("Success", "Successfully Added!", "success");
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
				{!! Form::open(['id' => $service -> primeID ]) !!}					
					<input type='hidden' id='primeID' value='{{ $service -> primeID }}' />
					<input type='hidden' id='serviceName' value='{{ $service -> serviceName }}' />
					<input type='hidden' id='serviceDesc' value='{{ $service -> serviceDesc }}' />
					<input type='hidden' id='typeID' value='{{ $service -> typeID }}' />
					<input type='hidden' id='status' value='{{ $service -> status }}' />
					<button class='btn btn-icon btn-square btn-success normal edit'  type='button' value='{{ $service -> primeID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-square btn-danger delete' value='{{ $service -> primeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
				{!! Form::close() !!}
			</td>
		</tr>
	@endforeach
@endsection

@section('ajax-modal')
	<script>
		$(document).on('click', '.edit', function(e) {
			var id = $(this).val();

			$.ajax({
				type: 'GET',
				url: "{{ url('/service/getEdit') }}", 
				data: {"primeID":id}, 
				success:function(data)
				{
					
					var frm = $('#frm-update');
					frm.find('#serviceName').val(data.serviceName);
					frm.find('#serviceDesc').val(data.serviceDesc);
					frm.find('#serviceID').val(data.serviceID);
					frm.find('#typeID').val(data.typeID);
					frm.find('#primeID').val(data.primeID);
					
					if(data.status == 1)
					{
						$("#active").attr('checked', 'checked');
					}
					else
					{
						$("#inactive").attr('checked', 'checked');
					}

					$('#modalEdit').modal('show');
					
				}, 
				error: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch data!\n" + message, "error");
					console.log("Error: Cannot fetch data!\n" + message);
				}
			})

		});

	</script>

	<script type="text/javascript">

		$(document).on('click', '.delete', function(e) {

			var id = $(this).val();

			$.ajax({
					type: 'get',
					url: "{{ url('/service/getEdit') }}",
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
							function() {
								$.ajax({
									type: "post",
									url: "{{ url('/service/delete') }}", 
									data: {primeID:id}, 
									success: function(data) {
										refreshTable();
										swal("Successfull", "Entry is deleted!", "success");
									}, 
									error: function(data) {
										var message = "Error: ";
										var data = error.responseJSON;
										for (datum in data) {
											message += data[datum];
										}

										swal("Error", "Cannot fetch table data!\n" + message, "error");
										console.log("Error: Cannot refresh table!\n" + message);
									}
								});
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
@endsection


@section('edit-modal-body')

	
	{!!Form::hidden('primeID',null,['id'=>'primeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{!!Form::text('service_ID',null,['id'=>'serviceID','class'=>'form-control', 'maxlength'=>'20', 'readonly','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'5'])!!}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('service_name',null,['id'=>'serviceName','class'=>'form-control', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'pattern'=>'^[a-zA-Z0-9-_ \']+$', 'minlength'=>'3'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{!!Form::textarea('service_desc',null,['id'=>'serviceDesc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}
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
					<input type="radio" id='active' name="status" value="1" class="estat custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" id='inactive' name="status" value="0" class="estat custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Inactive</span>
				</label>
			</div>
		</div>
	</div>

@endsection

@section('edit-modal-action')
	
	{!!Form::submit('Edit',['class'=>'btn btn-success'])!!}
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>
	
	<script>
		$("#frm-update").submit(function(event) {
			event.preventDefault();

			var frm = $('#frm-update');
			console.log("Service Name: " + frm.find("#serviceName").val() + 
						"\nStatus: " + frm.find(".estat:checked").val());

			$.ajax({
				url: "{{ url('/service/update') }}",
				type: "POST",
				data: {"primeID": frm.find("#primeID").val(), 
						"serviceID": frm.find("#serviceID").val(), 
						"serviceName": frm.find("#serviceName").val(), 
						"serviceDesc": frm.find("#serviceDesc").val(), 
						"typeID": frm.find("#typeID").val(), 
						"status": frm.find(".estat:checked").val() 
				}, 
				success: function ( _response ){
					$("#modalEdit").modal('hide');
					
					refreshTable();
					
					swal("Successful", 
							"Service has been updated!", 
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

@section('page-action')
	<script>
		$("#btnAddModal").on('click', function() {
			$("#iconModal").modal('show');
		});

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/service/refresh') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-container").find("tr:gt(0)").remove();
					data = $.parseJSON(data);

					for (index in data) {
						var statusText = "";
						if (data[index].status == 1) {
							statusText = "Active";
						}
						else {
							statusText = "Inactive";
						}

						$("#table-container").append('<tr>' + 
									'<td>' + data[index].serviceID + '</td>' + 
									'<td>' + data[index].serviceName + '</td>' + 
									'<td>' + data[index].serviceDesc + '</td>' + 
									'<td>' + data[index].typeName + '</td>' + 
									'<td>' + statusText + '</td>' + 
									'<td>' + 
										'<form method="POST" id="' + data[index].primeID + '" action="/service-type/delete" accept-charset="UTF-8"])' + 
											'<input type="hidden" name="primeID" value="' + data[index].primeID + '" />' + 
											'<input type="hidden" name="serviceName" value="' + data[index].serviceName + '" />' + 
											'<input type="hidden" name="serviceDesc" value="' + data[index].serviceDesc + '" />' + 
											'<input type="hidden" name="typeName" value="' + data[index].typeName + '" />' + 
											'<input type="hidden" name="status" value="' + statusText + '" />' + 
											'<button class="btn btn-icon btn-square btn-success normal edit"  type="button" value="' + data[index].primeID + '"><i class="icon-android-create"></i></button>' + 
											'<button class="btn btn-icon btn-square btn-danger delete" value="' + data[index].primeID + '" type="button" name="btnEdit"><i class="icon-android-delete"></i></button>' + 
										'</form>' + 
									'</td>' + 
								'</tr>'
						);
					}
				}, 
				error: function(data) {

					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
					console.log("Error: Cannot refresh table!\n" + message);
				}
			});
		};
	</script>
@endsection

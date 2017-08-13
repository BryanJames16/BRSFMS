<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Requirement
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(REQUIREMENTS);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Requirements</h2>
@endsection
	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Document</li>
	<li class="breadcrumb-item"><a href="#">Requirement</a></li>
@endsection

@section('main-card-title')
	Requirement
@endsection

@section('modal-card-title')
	Add Requirement
@endsection

@section('modal-card-desc')
	Name of the Requirement.
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
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('requirementName',null,['id'=>'requirementName','class'=>'form-control', 'placeholder'=>'eg.Identity Card', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'3', 'pattern'=>'^[a-zA-Z0-9-_ \']+$'])!!}
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{!!Form::textarea('requirementDesc',null,['id'=>'requirementDesc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}
		</div>	

	</div>
	
	<div class="form-group row last">
		<label class="col-md-3 label-control">*Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" value="active" name="status" id="status" class="tstatus custom-control-input" checked>
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
	@foreach($requirements as $requirement)
		<tr>
			<td>{{ $requirement -> requirementID }}</td>
			<td>{{ $requirement -> requirementName }}</td>
			<td>{{ $requirement -> requirementDesc }}</td>
			
			@if ($requirement -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!! Form::open(['id' => $requirement -> requirementID ]) !!}					
					<input type='hidden' id='primeID' value='{{ $requirement -> requirementID }}' />
					<input type='hidden' id='serviceName' value='{{ $requirement -> requirementName }}' />
					<input type='hidden' id='serviceDesc' value='{{ $requirement -> requirementDesc }}' />
					<input type='hidden' id='status' value='{{ $requirement -> status }}' />
					<button class='btn btn-icon btn-square btn-success normal edit'  type='button' value='{{ $requirement -> requirementID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-square btn-danger delete' value='{{ $requirement -> requirementID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
				{!! Form::close() !!}
			</td>
		</tr>
	@endforeach
@endsection

@section('ajax-modal')
	
	
@endsection

@section('edit-modal-title')
	Edit Service
@endsection

@section('edit-modal-desc')
	Edit existing service type data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'/requirement/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
@endsection


@section('edit-modal-body')

	
	{!!Form::hidden('requirementID',null,['id'=>'requirementID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}



	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('service_name',null,['id'=>'requirementName','class'=>'form-control', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'pattern'=>'^[a-zA-Z0-9-_ \']+$', 'minlength'=>'3'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{!!Form::textarea('service_desc',null,['id'=>'requirementDesc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}
		</div>	

	</div>



	<div class="form-group row last">
		<label class="col-md-3 label-control">*Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" id='active' name="status" value="1" class="estat custom-control-input" checked>
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
	
	
@endsection

@section('page-action')

    	<script>
		$("#frm-add").submit(function(event) {
			event.preventDefault();

			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});

			$.ajax({
				url: "{{ url('/requirement/store') }}", 
				method: "POST", 
				data: { 
					"requirementName": $("#requirementName").val(), 
					"requirementDesc": $("#requirementDesc").val(), 
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

    <script>
		$(document).on('click', '.edit', function(e) {
			var id = $(this).val();

			$.ajax({
				type: 'GET',
				url: "{{ url('/requirement/getEdit') }}", 
				data: {"requirementID":id}, 
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find('#requirementName').val(data.requirementName);
					frm.find('#requirementDesc').val(data.requirementDesc);
					frm.find('#requirementID').val(data.requirementID);
					
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
				}
			})

		});

	</script>

	<script type="text/javascript">

		$(document).on('click', '.delete', function(e) {

			var id = $(this).val();

			$.ajax({
					type: 'get',
					url: "{{ url('/requirement/getEdit') }}",
					data: {requirementID:id},
					success:function(data)
					{
						swal({
							title: "Are you sure you want to delete " + data.requirementName + "?",
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
									url: "{{ url('/requirement/delete') }}", 
									data: {requirementID:id}, 
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
									}
								});
							});				
					}
				})

		
			
		});
	</script>

    <script>
		$("#frm-update").submit(function(event) {
			event.preventDefault();

			var frm = $('#frm-update');

			$.ajax({
				url: "{{ url('/requirement/update') }}",
				type: "POST",
				data: {"requirementID": frm.find("#requirementID").val(), 
						"requirementName": frm.find("#requirementName").val(), 
						"requirementDesc": frm.find("#requirementDesc").val(),
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
				url: "{{ url('/requirement/refresh') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-container").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
						var statusText = "";
						if (data[index].status == 1) {
							statusText = "Active";
						}
						else {
							statusText = "Inactive";
						}

						$("#table-container").DataTable()
							.row.add([
								data[index].requirementID,
								data[index].requirementName,
								data[index].requirementDesc,
								statusText, 
								'<form method="POST" id="' + data[index].requirementID + '" action="/requirement/delete" accept-charset="UTF-8"])' + 
									'<input type="hidden" name="primeID" value="' + data[index].requirementID + '" />' + 
									'<input type="hidden" name="serviceName" value="' + data[index].requirementName + '" />' + 
									'<input type="hidden" name="serviceDesc" value="' + data[index].requirementDesc + '" />' + 
									'<input type="hidden" name="status" value="' + statusText + '" />' + 
									'<button class="btn btn-icon btn-square btn-success normal edit"  type="button" value="' + data[index].requirementID + '"><i class="icon-android-create"></i></button>' + 
									'<button class="btn btn-icon btn-square btn-danger delete" value="' + data[index].requirementID + '" type="button" name="btnEdit"><i class="icon-android-delete"></i></button>' + 
								'</form>'
							]).draw(true);
					}
				}, 
				error: function(data) {

					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
				}
			});
		};
	</script>
@endsection

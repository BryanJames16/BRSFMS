<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Recipient
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(RECIPIENTS);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Recipient</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Service</li>
	<li class="breadcrumb-item"><a href="#">Recipient</a></li>
@endsection

@section('main-card-title')
	Recipient
@endsection

@section('modal-card-title')
	Add Recipient
@endsection

@section('modal-card-desc')
	Recipient of the Service.
@endsection

@section('modal-form-body')

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
		

	{{Form::open(['url'=>'/recipient/store', 'method' => 'POST', 'id' => 'frm-add'])}}
	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{{Form::text('recipientName',null,['id'=>'aRecipientName','class'=>'form-control', 'placeholder'=>'eg.Dog', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'required', 'minlength'=>'3', 'pattern'=>'^[a-zA-Z0-9-_ \']+$'])}}
		</div>	

	</div>

	<div class="form-group row last">
		<label class="col-md-3 label-control">*Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" value="active" name="stat" class="aStatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" value="inactive" name="stat"  class="aStatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Inactive</span>
				</label>
			</div>
		</div>
	</div>

@endsection

@section('modal-form-action')
	<input type="submit" class="btn btn-success" value="Add" name="btnAdd">
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>

	{{Form::close()}}
@endsection

@section('table-head-list')
	<th>ID</th>
	<th>Name</th>
	<th>Status</th>
	<th>Actions</th>
	<th>Extras</th>
@endsection

@section('table-body-list')
	@foreach($facilityTypes as $facilityType)
		<tr>
			<td>{{ $facilityType -> recipientID }}</td>
			<td>{{ $facilityType -> recipientName }}</td>
			@if ($facilityType -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{{Form::open(['url'=>'/recipient/delete', 'method' => 'POST', 'id' => $facilityType -> typeID ])}}
					<input type='hidden' name='recipientID' value='{{ $facilityType -> recipientID }}' />
					<input type='hidden' name='recipientName' value='{{ $facilityType -> recipientName }}' />
					<input type='hidden' name='status' value='{{ $facilityType -> status }}' />
					<button class='btn btn-icon btn-square btn-success normal edit'  type='button' value='{{ $facilityType -> recipientID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-square btn-danger delete' value='{{ $facilityType -> recipientID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
				{{Form::close()}}
			</td>

			<td>
			</td>
		</tr>
	@endforeach
@endsection

@section('edit-modal-title')
	Edit Recipient
@endsection

@section('edit-modal-desc')
	Edit existing recipient data
@endsection

@section('ajax-edit-form')
	{{Form::open(['url'=>'/recipient/update', 'method' => 'POST', 'id'=>'frm-update'])}}
@endsection


@section('edit-modal-body')
	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">ID</label>
		<div class="col-md-9">
			{{Form::text('recipient_ID',null,['id'=>'eRecipientID','class'=>'form-control', 'maxlength'=>'30', 'readonly', 'minlength'=>'1'])}}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{{Form::text('recipientName',null,['id'=>'eRecipientName','class'=>'form-control', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required', 'minlength'=>'3', 'pattern'=>'^[a-zA-Z0-9\' ]+$'])}}
		</div>	
	</div>

	<div class="form-group row last">
		<label class="col-md-3 label-control">*Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" id='eActive' name="stat" value="1" class="eStatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" id='eInactive' name="stat" value="0" class="eStatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Inactive</span>
				</label>
			</div>
		</div>
	</div>

@endsection

@section('edit-modal-action')
	
	{{Form::submit('Edit',['class'=>'btn btn-success'])}}
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>
	
@endsection

@section('page-action')
	<script>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		
		$(document).ready(function () {
			try {
				var dt = $("#table-container").DataTable();
				dt.column(4).visible(false);
			}
			catch (ex) {
				console.err("DataTable error: \n" + ex);
			}
		});

		$("#frm-add").submit(function(event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/recipient/store') }}", 
				method: "POST", 
				data: {
					"recipientName": $("#aRecipientName").val(), 
					"status": $(".astatus:checked").val()
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

        $("#frm-update").submit(function(event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/recipient/update') }}", 
				method: "POST", 
				data: {
					"recipientID": $("#eRecipientID").val(),
                    "recipientName": $("#eRecipientName").val(), 
					"stat": $(".estatus:checked").val()
				}, 
				success: function(data) {
					$("#modalEdit").modal("hide");
					refreshTable();
					$("#frm-update").trigger("reset");
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

		$(document).on('click', '.edit', function(e) {
			var id = $(this).val();

			$.ajax({
				type: 'GET',
				url: "{{ url('/recipient/getEdit') }}", 
				data: {"recipientID": id}, 
				success: function(data)
				{
					var frm = $('#frm-update');
					frm.find("#eRecipientID").val(data.recipientID);
					frm.find('#eRecipientName').val(data.recipientName);

					if(data.status == 1) {
						$("#eActive").attr('checked', 'checked');
					}
					else {
						$("#eInactive").attr('checked', 'checked');
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

		$(document).on('click', '.delete', function(e) {

			var id = $(this).val();

			$.ajax({
					type: 'GET',
					url: "{{ url('/recipient/getEdit') }}",
					data: {"recipientID": id},
					success:function(data) {
						swal({
							title: "Are you sure you want to delete " + data.recipientName + "?",
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
									url: "{{ url('/recipient/delete') }}", 
									data: {"recipientID": id}, 
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

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/recipient/refresh') }}", 
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

						$("#table-container").DataTable().column(4).visible(true)
						$('#table-container').DataTable()
							.row.add([
								data[index].recipientID, 
								data[index].recipientName,
								statusText,
								'<form method="POST" id="' + data[index].recipientID + '" action="/recipient/delete" accept-charset="UTF-8"])' + 
									'<input type="hidden" name="primeID" value="' + data[index].recipientID + '" />' + 
									'<button class="btn btn-icon btn-square btn-success normal edit"  type="button" value="' + data[index].recipientID + '"><i class="icon-android-create"></i></button>' + 
									'<button class="btn btn-icon btn-square btn-danger delete" value="' + data[index].recipientID + '" type="button" name="btnEdit"><i class="icon-android-delete"></i></button>' + 
								'</form>',
								null
							]).draw(true);
						$("#table-container").DataTable().column(4).visible(false)
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

		$("#btnAddModal").on('click', function() {
			$("#iconModal").modal('show');
		});
	</script>
@endsection
	
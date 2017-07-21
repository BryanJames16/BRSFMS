<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Facility Type
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(FACILITY_TYPE);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Facility Type</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Facility</li>
	<li class="breadcrumb-item"><a href="#">Facility Type</a></li>
@endsection

@section('main-card-title')
	Facility Type
@endsection

@section('modal-card-title')
	Add Facility Type
@endsection

@section('modal-card-desc')
	Type of the Facility.
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
		

	{{Form::open(['url'=>'/facility-type/store', 'method' => 'POST', 'id' => 'frm-add'])}}
	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{{Form::text('typeName',null,['id'=>'aTypeName','class'=>'form-control', 'placeholder'=>'eg.Covered Court', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'required', 'minlength'=>'5', 'pattern'=>'^[a-zA-Z0-9-_ \']+$'])}}
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
			<td>{{ $facilityType -> typeID }}</td>
			<td>{{ $facilityType -> typeName }}</td>
			@if ($facilityType -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{{Form::open(['url'=>'/facility-type/delete', 'method' => 'POST', 'id' => $facilityType -> typeID ])}}
					<input type='hidden' name='typeID' value='{{ $facilityType -> typeID }}' />
					<input type='hidden' name='typeName' value='{{ $facilityType -> typeName }}' />
					<input type='hidden' name='status' value='{{ $facilityType -> status }}' />
					<button class='btn btn-icon btn-square btn-success normal edit'  type='button' value='{{ $facilityType -> typeID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-square btn-danger delete' value='{{ $facilityType -> typeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
				{{Form::close()}}
			</td>

			<td>
			</td>
		</tr>
	@endforeach
@endsection

@section('edit-modal-title')
	Edit Facility Type
@endsection

@section('edit-modal-desc')
	Edit existing facility type data
@endsection

@section('ajax-edit-form')
	{{Form::open(['url'=>'facility-type/update', 'method' => 'POST', 'id'=>'frm-update'])}}
@endsection


@section('edit-modal-body')
	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">ID</label>
		<div class="col-md-9">
			{{Form::text('type_ID',null,['id'=>'eTypeID','class'=>'form-control', 'maxlength'=>'30', 'readonly', 'minlength'=>'1'])}}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{{Form::text('typeName',null,['id'=>'eTypeName','class'=>'form-control', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required', 'minlength'=>'4', 'pattern'=>'^[a-zA-Z0-9\' ]+$'])}}
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
				console.log("DataTable error: \n" + ex);
			}
		});

		$("#frm-add").submit(function(event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/facility-type/store') }}", 
				method: "POST", 
				data: {
					"typeName": $("#aTypeName").val(), 
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

		$(document).on('click', '.edit', function(e) {
			var id = $(this).val();

			$.ajax({
				type: 'GET',
				url: "{{ url('/facility-type/getEdit') }}", 
				data: {"primeID": id}, 
				success: function(data)
				{
					var frm = $('#frm-update');
					frm.find("#eTypeID").val(data.typeID);
					frm.find('#eTypeName').val(data.typeName);

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
					console.log("Error: Cannot fetch data!\n" + message);
				}
			})

		});

		$(document).on('click', '.delete', function(e) {

			var id = $(this).val();

			$.ajax({
					type: 'GET',
					url: "{{ url('/facility-type/getEdit') }}",
					data: {"primeID": id},
					success:function(data) {
						console.log(data);
						swal({
							title: "Are you sure you want to delete " + data.typeName + "?",
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
									url: "{{ url('/facility-type/delete') }}", 
									data: {"primeID": id}, 
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

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/facility-type/refresh') }}", 
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
									'<td>' + data[index].typeID + '</td>' + 
									'<td>' + data[index].typeName + '</td>' + 
									'<td>' + statusText + '</td>' + 
									'<td>' + 
										'<form method="POST" id="' + data[index].typeID + '" action="/service-type/delete" accept-charset="UTF-8"])' + 
											'<input type="hidden" name="primeID" value="' + data[index].typeID + '" />' + 
											'<button class="btn btn-icon btn-square btn-success normal edit"  type="button" value="' + data[index].typeID + '"><i class="icon-android-create"></i></button>' + 
											'<button class="btn btn-icon btn-square btn-danger delete" value="' + data[index].typeID + '" type="button" name="btnEdit"><i class="icon-android-delete"></i></button>' + 
										'</form>' + 
									'</td>' + 
									'<td></td>' + 
								'</tr>'
						);

						$.ajax.reload();
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

		$("#btnAddModal").on('click', function() {
			$("#iconModal").modal('show');
		});
	</script>
@endsection
	
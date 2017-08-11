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
	{{Form::open(['url'=>'facility/store', 'method' => 'POST', 'id' => 'frm-add'])}}
	
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
			{{Form::text('facilityID',null,['id'=>'aFacilityID','class'=>'form-control','readonly', 'placeholder'=>'eg.FAC_001', 'maxlength'=>'20' ,'data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters','required', 'minlength'=>'5', 'pattern'=>'^[a-zA-Z0-9-_]+$'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{{Form::text('facilityName',null,['id'=>'aFacilityName','class'=>'form-control', 'placeholder'=>'eg.Hipodromo Court', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required', 'minlength'=>'5', 'pattern'=>'^[a-zA-Z0-9-_\' ]+$'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{{Form::textarea('desc',null,['id'=>'aFacilityDesc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Type</label>
		<div class="col-md-9">
			{{ Form::select('typeID', $types, null, ['id'=>'aTypeID', 'class' => 'form-control border-info selectBox']) }}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Day Price</label>
		<div class="col-md-9">
			{{Form::number('facilityDayPrice',null,['id'=>'aDayPrice','class'=>'form-control', 'placeholder'=>'eg.100', 'data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Please enter a valid amount','required', 'step'=>'0.01'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Night Price</label>
		<div class="col-md-9">
			{{Form::number('facilityNightPrice',null,['id'=>'aNightPrice','class'=>'form-control', 'placeholder'=>'eg.150', 'data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Please enter a valid amount','required', 'step'=>'0.01'])}}
		</div>	

	</div>	

	<div class="form-group row last">
		<label class="col-md-3 label-control">*Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" value="aActive" name="aStatus" checked="" class="aStatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" value="aInactive" name="aStatus"  class="aStatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Inactive</span>
				</label>
			</div>
		</div>
	</div>

@endsection

@section('modal-form-action')
	<input type="submit" class="btn btn-success" value="Add" id="btnAdd" name="btnAdd">
	<button type="button" data-dismiss="modal" data-style="slide-left" class="btn btn-warning mr-1">Cancel</button>
	{{Form::close()}}
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
			<td>₱ {{ $facility -> facilityDayPrice }}</td>
			<td>₱ {{ $facility -> facilityNightPrice }}</td>
			
			@if ($facility -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{{ Form::open(['url'=>'facility/delete', 'method' => 'POST', 'id' => $facility -> primeID ]) }}					
					<input type='hidden' name='primeID' value='{{ $facility -> primeID }}' />
					<input type='hidden' name='facilityName' value='{{ $facility -> facilityName }}' />
					<input type='hidden' name='typeID' value='{{ $facility -> facilityDesc }}' />
					<input type='hidden' name='typeID' value='{{ $facility -> facilityTypeID }}' />
					<input type='hidden' name='typeID' value='{{ $facility -> status }}' />
					<button class='btn btn-icon btn-square btn-success normal edit'  type='button' value='{{ $facility -> primeID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-square btn-danger delete' value='{{ $facility -> primeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
				{{Form::close()}}
			</td>
		</tr>
	@endforeach
@endsection

@section('edit-modal-title')
	Edit Facility
@endsection

@section('edit-modal-desc')
	Edit existing facility type data
@endsection

@section('ajax-edit-form')
	{{Form::open(['url'=>'/facility/update', 'method' => 'POST', 'id'=>'frm-update'])}}
@endsection


@section('edit-modal-body')

	
	{{Form::hidden('ePrimeID',null,['id'=>'ePrimeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])}}


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{{Form::text('eFacilityID',null,['id'=>'eFacilityID','class'=>'form-control', 'maxlength'=>'30', 'readonly', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'5'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{{Form::text('eFacilityName',null,['id'=>'eFacilityName','class'=>'form-control', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'pattern'=>'^[a-zA-Z0-9-_ \']+$', 'minlength'=>'5'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{{Form::textarea('eFacilityDesc',null,['id'=>'eFacilityDesc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Type</label>
		<div class="col-md-9">
			
			{{ Form::select('eTypeID', $types, null, ['id'=>'eTypeID', 'class' => 'form-control border-info selectBox']) }}
			
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Day Price</label>
		<div class="col-md-9">
			{{Form::number('eDayPrice',null,['id'=>'eDayPrice','class'=>'form-control', 'placeholder'=>'eg.100', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Night Price</label>
		<div class="col-md-9">
			{{Form::number('eNightPrice',null,['id'=>'eNightPrice','class'=>'form-control', 'placeholder'=>'eg.150', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required'])}}
		</div>	

	</div>


	<div class="form-group row last">
		<label class="col-md-3 label-control">*Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" id='eActive' name="eStatus" value="1" class="eStatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" id='eInactive' name="eStatus" value="0" class="eStatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Inactive</span>
				</label>
			</div>
		</div>
	</div>

@endsection

@section('edit-modal-action')
	
	{{Form::submit('Edit',['class'=>'btn btn-success'])}}
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel
	</button>
	
@endsection

@section('page-action')
	<script>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$("#frm-add").submit(function(event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/facility/store') }}", 
				method: "POST", 
				data: {
					"facilityID": $("#aFacilityID").val(), 
					"facilityName": $("#aFacilityName").val(), 
					"facilityDesc": $("#aFacilityDesc").val(), 
					"facilityType": $("#aTypeID").val(), 
					"facilityDayPrice": $("#aDayPrice").val(), 
					"facilityNightPrice": $("#aNightPrice").val(), 
					"status": $(".aStatus:checked").val()
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
				type: 'get',
				url: "{{ url('/facility/getEdit') }}", 
				data: {"primeID":id}, 
				success:function(data)
				{
					var frm = $('#frm-update');
					frm.find("#eFacilityID").val(data.facilityID);
					frm.find('#eFacilityName').val(data.facilityName);
					frm.find('#eFacilityDesc').val(data.facilityDesc);
					frm.find('#eDayPrice').val(data.facilityDayPrice);
					frm.find('#eNightPrice').val(data.facilityNightPrice);
					frm.find('#eTypeID').val(data.facilityTypeID);
					frm.find('#ePrimeID').val(data.primeID);

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

		$("#frm-update").submit(function(event) {
			event.preventDefault();

			var frm = $('#frm-update');

			$.ajax({
				url: "{{ url('/facility/update') }}",
				type: "POST",
				data: {"primeID": $("#ePrimeID").val(), 
						"facilityID": $("#eFacilityID").val(), 
						"facilityName": $("#eFacilityName").val(), 
						"facilityDesc": $("#eFacilityDesc").val(), 
						"facilityTypeID": $("#eTypeID").val(), 
						"facilityDayPrice": $("#eDayPrice").val(), 
						"facilityNightPrice": $("#eNightPrice").val(), 
						"status": $(".eStatus:checked").val() 
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

		$(document).on('click', '.delete', function(e) {

			var id = $(this).val();

			$.ajax({
					type: 'GET',
					url: "{{ url('/facility/getEdit') }}",
					data: {"primeID": id},
					success:function(data) {
						swal({
							title: "Are you sure you want to delete " + data.facilityName + "?",
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
									url: "{{ url('/facility/delete') }}", 
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
									}
								});
							});				
					}
			})
		});

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/facility/refresh') }}", 
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
								data[index].facilityID,
								data[index].facilityName,
								data[index].facilityDesc, 
								data[index].typeName, 
								"₱ " + data[index].facilityDayPrice, 
								"₱ " + data[index].facilityNightPrice, 
								statusText,
								'<form method="POST" id="' + data[index].primeID + '" action="/service-type/delete" accept-charset="UTF-8"])' + 
									'<input type="hidden" name="primeID" value="' + data[index].primeID + '" />' + 
									'<button class="btn btn-icon btn-square btn-success normal edit"  type="button" value="' + data[index].primeID + '"><i class="icon-android-create"></i></button>' + 
									'<button class="btn btn-icon btn-square btn-danger delete" value="' + data[index].primeID + '" type="button" name="btnEdit"><i class="icon-android-delete"></i></button>' + 
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

		$("#btnAddModal").bind('click', function() {
			$.ajax({
				url: "{{ url('/facility/nextPK') }}", 
				method: "GET", 
				success: function(data) {
					if (data == null) {
						// Get primary key format from utilities
					}
					else {
						$("#aFacilityID").val(data);
					}
				}, 
				failed: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
				}
			});
		});
	</script>
@endsection

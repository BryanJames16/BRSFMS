<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Building
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(BUILDING);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">BUILDING</h2>
@endsection

@section('inside-breadcrumb')
	<li class="breadcrumb-item">Building</li>
	<li class="breadcrumb-item"><a href="#">Building</a></li>
@endsection

@section('main-card-title')
	Building
@endsection

@section('modal-card-title')
	Add Building
@endsection

@section('modal-card-desc')
	
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
				{!! Form::text('buildingName', null, ['id' => 'buildingName', 
													'class' => 'form-control', 
													'ng-model' => 'service.typename', 
													'placeholder' => 'eg.Maui', 
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
			<label class="col-md-3 label-control" for="eventRegInput1">*Lot</label>
			<div class="col-md-9">
				
				{{ Form::select('lotID', $lots, null, ['id'=>'lotID', 'class' => 'form-control border-info selectBox']) }}
				
			</div>	

		</div>

		<div class="form-group row">
			<label class="col-md-3 label-control" for="eventRegInput1">*Type</label>
			<div class="col-md-9">
				
				{{ Form::select('buildingTypeID', $buildingtypes, null, ['id'=>'buildingTypeID', 'class' => 'form-control border-info selectBox']) }}
				
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
				url: "{{ url('/building/refresh') }}",
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
									'<td>' + data[index].buildingName + '</td>' + 
									'<td>' + data[index].lotCode + '</td>' + 
									'<td>' + data[index].buildingTypeName + '</td>' + 
									'<td>' + statusText + '</td>' + 
									'<td>' + 
										'<form method="POST" id="' + data[index].buildingID + '" action="/building/delete" accept-charset="UTF-8"])!!}' + 
											'<input type="hidden" name="buildingID" value="' + data[index].buildingID + '" />' + 
                                            '<input type="hidden" name="buildingName" value="' + data[index].buildingName + '" />' + 
											'<input type="hidden" name="buildingType" value="' + data[index].buildingTypeName + '" />' + 
											'<input type="hidden" name="status" value="' + statusText + '" />' + 
											'<button class="btn btn-icon btn-square btn-success normal edit"  type="button" value="' + data[index].buildingID + '"><i class="icon-android-create"></i></button>' + 
											'<button class="btn btn-icon btn-square btn-danger delete" value="' + data[index].buildingID + '" type="button" name="btnEdit"><i class="icon-android-delete"></i></button>' + 
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
				url: "{{ url('/building/store') }}",
				type: "POST",
				data: {"_token": $('#csrf-token').val(), 
                        "buildingName": $("#buildingName").val(), 
						"lotID": $("#lotID").val(), 
						"buildingTypeID": $("#buildingTypeID").val(), 
						"status": $(".tstat:checked").val()
				}, 
				success: function ( _response ){
					$("#iconModal").modal('hide');
					$("#frm-add").trigger("reset");
					
					refreshTable();
					
					swal("Successful", 
							"Building has been added!", 
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
	<th>Name</th>
	<th>Lot</th>
	<th>Type</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($buildings as $building)
		<tr>
			<td>{{ $building -> buildingName }}</td>
			<td>{{ $building -> lotCode }}</td>
			<td>{{ $building -> buildingTypeName }}</td>
			@if ($building -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				{!! Form::open(['url'=>'building/delete', 'method' => 'POST', 'id' => $building -> buildingID ]) !!}
					<input type='hidden' name='buildingID' value='{{ $building -> buildingID }}' />
					<input type='hidden' name='buildingName' value='{{ $building -> buildingName }}' />
					<input type='hidden' name='buildingType' value='{{ $building -> buildingTypeName }}' />
					<input type='hidden' name='status' value='{{ $building -> status }}' />
					<button class='btn btn-icon btn-square btn-success normal edit'  type='button' value='{{ $building -> buildingID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-square btn-danger delete' value='{{ $building -> buildingID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
				{!! Form::close() !!}
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
				url: "{{ url('/building/getEdit') }}",
				data: {buildingID:id},
				success:function(data)
				{
					var frm = $('#frm-update');
                    frm.find('#buildingName').val(data.buildingName);
					frm.find('#lotID').val(data.lotID);
					frm.find('#buildingTypeID').val(data.buildingTypeID);
					frm.find('#buildingID').val(data.buildingID);

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
		var id = $(this).val();

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
				type: 'get',
				url: "{{ url('building/getEdit') }}",
				data: {buildingID:id},
				success:function(data)
				{
					swal({
						  title: "Are you sure you want to delete " + data.buildingName + "?",
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
							  url: "{{ url('building/delete') }}", 
							  data: {buildingID: id},
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
	Edit Building
@endsection

@section('edit-modal-desc')
	Edit existing building data
@endsection

@section('ajax-edit-form')
	{!!Form::open(['url'=>'building/update', 'method' => 'POST', 'id'=>'frm-update'])!!}
	{{ csrf_field() }}
@endsection


@section('edit-modal-body')

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{!!Form::text('buildingID',null,['id'=>'buildingID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!! Form::text('buildingName',null,['id'=>'buildingName','class'=>'form-control', 'maxlength'=>'20','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'5']) !!}
		</div>	

	</div>

	<div class="form-group row">
			<label class="col-md-3 label-control" for="eventRegInput1">*Lot</label>
			<div class="col-md-9">
				
				{{ Form::select('lotID', $lots, null, ['id'=>'lotID', 'class' => 'form-control border-info selectBox']) }}
				
			</div>	

	</div>
	<div class="form-group row">
			<label class="col-md-3 label-control" for="eventRegInput1">*Type</label>
			<div class="col-md-9">
				
				{{ Form::select('buildingTypeID', $buildingtypes, null, ['id'=>'buildingTypeID', 'class' => 'form-control border-info selectBox']) }}
				
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
				url: "{{ url('/building/update') }}",
				type: "POST",
				data: {"_token": $('#csrf-token').val(), 
						"buildingID": $("#buildingID").val(), 
						"buildingName": $("#buildingName").val(), 
						"buildingTypeID": $("#buildingTypeID").val(), 
						"status": $(".etstat:checked").val()
				}, 
				success: function ( _response ){
					console.log("etstatval: " + $(".etstat:checked").val());
					$("#modalEdit").modal('hide');
					$("#frm-update").trigger('reset');
					
					refreshTable();
					
					swal("Successful", 
							"Building has been updated!", 
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

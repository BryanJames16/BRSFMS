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
			<!-- <label>[[service.typename]]</label> -->
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
					//$("#modal-dismis").click();
					$("#iconModal").modal('hide');
					//$("#iconModal").dialog('close');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					//$("#iconModal").removeClass("modal").addClass("modal modal-backdrop");
					//$('#iconModal').fadeOut('fast');
					
					$.ajax({
						url: "{{ url('/service-type/refresh') }}",
						type: "GET", 
						datatype: "json", 
						success: function(data) {
							$("#table-container").find("tr:gt(0)").remove();
							data = $.parseJSON(data);
							
							for (var index in data) {
								var statusText = "";
								if (data[index].status == 0) {
									statusText = "Active";
								}
								else {
									statusText = "Inactive";
								}

								$("#table-container").append("<tr>" + 
											"<td>" + data[index].typeID + "</td>" + 
											"<td>" + data[index].typeName + "</td>" + 
											"<td>" + data[index].typeDesc + "</td>" + 
											"<td>" + statusText + "</td>" + 
											"<td>" + 
											"<form method='POST' id='" + data[index].typeID + "' action='/service-type/delete' accept-charset='UTF-8'])!!}" + 
											//"{!! csrf_field() !!}" + 
											"</form>" + 
											"</td>" + 
											"</tr>"
								);
							}
						}
					});
					
					swal("Successful", 
							"Service type has been added!", 
							"success");
					//console.log("Success");
					// $("html").html($("html", _response).html());
				}, 
				error: function(xhr, status, error) {
					var err = xhr.responseText;
					swal("ERROR", 
							"Error has been caught:\n" + err.Message, 
							"error");
					console.log("Error found: " + error + "\n" + 
								"Status: " + status + "\n" +
								"XHR: " + xhr + "\n" + 
								"Token: " + $('#csrf-token').val() + "\n" + 
								"TypeName: " + $("#name").val() + "\n" + 
								"TypeDesc: " + $("#desc").val() + "\n" + 
								"Status: " + $(".tstat:checked").val());
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
	<script>
		var app = angular.module("maintenanceApp", []);
		app.controller("serviceTypeController", ["$scope", function($scope) {
			
		}]);
		
	</script>
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
				{!!Form::open(['url'=>'service-type/delete', 'method' => 'POST', 'id' => $serviceType -> typeID ])!!}					
				{{ csrf_field() }}
					<input type='hidden' name='typeID' value='{{ $serviceType -> typeID }}' />
					<input type='hidden' name='typeName' value='{{ $serviceType -> typeName }}' />
					<input type='hidden' name='typeDesc' value='{{ $serviceType -> typeDesc }}' />
					<input type='hidden' name='status' value='{{ $serviceType -> status }}' />
				<div class="btn-group" role="group" aria-label="Basic example">
					<button class='btn btn-icon btn-round btn-success normal edit'  type='button' value='{{ $serviceType -> typeID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-round btn-danger delete' value='{{ $serviceType -> typeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
					</div>
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
				url: "{{ url('/service-type/getEdit') }}",
				data: {typeID:id},
				success:function(data)
				{
					//console.log(data);
					var frm = $('#frm-update');
					frm.find('#type_name').val(data.typeName);
					frm.find('#type_desc').val(data.typeDesc);
					frm.find('#type_ID').val(data.typeID);

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

		var id = $(this).val();

		$.ajax({
				type: 'get',
				url: "{{ url('service-type/getEdit') }}",
				data: {typeID:id},
				success:function(data)
				{
					//console.log(data);
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

						  swal("Successfull", data.typeName + " is deleted!", "success");
						  document.getElementById(data.typeID).submit();
						});				
				}
			})

	
		
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
			{!!Form::text('type_ID',null,['id'=>'type_ID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])!!}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('typeName',null,['id'=>'type_name','class'=>'form-control', 'maxlength'=>'20','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters', 'pattern'=>'^[a-zA-Z0-9-_]+$', 'minlength'=>'5'])!!}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{!!Form::textarea('type_desc',null,['id'=>'type_desc','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}
		</div>	

	</div>

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

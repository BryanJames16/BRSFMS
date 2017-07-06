<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Document
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(DOCUMENT);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Document</h2>
@endsection


	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Document</li>
	<li class="breadcrumb-item"><a href="#">Document</a></li>
@endsection

@section('main-card-title')
	Document
@endsection

@section('modal-card-title')
	Add Document
@endsection

@section('modal-card-desc')
	Name of the Document.
@endsection

@section('modal-form-body')
	{{ Form::open(['url'=>'document/store', 'method' => 'POST', 'id' => 'frm-add']) }}
	
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
			{{Form::text('documentID',null,['id'=>'documentID','class'=>'form-control', 'placeholder'=>'eg.DOC_001', 'maxlength'=>'20','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters','required','minlength'=>'5', 'pattern'=>'^[a-zA-Z0-9-_]+$'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{{Form::text('documentName',null,['id'=>'documentName','class'=>'form-control', 'placeholder'=>'eg.Barangay Clearance', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required','minlength'=>'7', 'pattern'=>'^[a-zA-Z0-9-_ ]+$'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{{Form::text('desc',null,['id'=>'documentDescription','class'=>'form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Type</label>
		<div class="col-md-9">
			<select class ='form-control border-info selectBox' name='type' id="aDocumentType">
				<option value='Legal Document'>Legal Document</option>
				<option value='Clearance'>Clearance</option>
				<option value='Certification'>Certification</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Price</label>
		<div class="col-md-9">
			{{Form::number('documentPrice',null,['id'=>'documentPrice','class'=>'form-control', 'maxlength'=>'10', 'minlength'=>'1', 'step'=>'0.01'])}}
		</div>	
	</div>

	<div class="form-group row last">
		<label class="col-md-3 label-control">Status</label>
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
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel
	</button>

	{{ Form::close() }}

@endsection

@section('table-head-list')
	<th>ID</th>
	<th>Name</th>
	<th>Description</th>
	<th>Type</th>
	<th>Price</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($documents as $document)
		<tr>
			<td>{{ $document -> documentID }}</td>
			<td>{{ $document -> documentName }}</td>
			<td>{{ $document -> documentDescription }}</td>
			<td>{{ $document -> documentType }}</td>
			<td>₱{{ $document -> documentPrice }}</td>
			
			@if ($document -> status == 1)
				<td>Active</td>
			@else
				<td>Inactive</td>
			@endif
			
			<td>
				
				{{Form::open(['url'=>'document/delete', 'method' => 'POST', 'id' => $document -> primeID ])}}					
				{{ csrf_field() }}

					{{Form::hidden('primeID',$document->primeID,['id'=>'primeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])}}
					<input type='hidden' name='documentName' value='{{ $document -> documentName }}' />
					<input type='hidden' name='documentDescription' value='{{ $document -> documentDescription }}' />
					<input type='hidden' name='documentType' value='{{ $document -> documentType }}' />
					<input type='hidden' name='documentPrice' value='{{ $document -> documentPrice }}' />
					<input type='hidden' name='status' value='{{ $document -> status }}' />
					
					<button class='btn btn-icon btn-square btn-success normal edit'  type='button' value='{{ $document -> primeID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-square btn-danger delete' value='{{ $document -> primeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
					
				{{Form::close()}}
			</td>
		</tr>
	@endforeach
@endsection

@section('ajax-modal')
	
@endsection

@section('edit-modal-title')
	Edit Document
@endsection

@section('edit-modal-desc')
	Edit existing facility type data
@endsection

@section('ajax-edit-form')
	{{Form::open(['url'=>'/document/update', 'method' => 'POST', 'id'=>'frm-update'])}}
@endsection


@section('edit-modal-body')

	
	{{ Form::hidden('primeID',null,['id'=>'ePrimeID','class'=>'form-control', 'maxlength'=>'30', 'readonly']) }}

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
			        $('#modalEdit').modal('show');
			    });
		    </script>
	@endif

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*ID</label>
		<div class="col-md-9">
			{{Form::text('document_ID',null,['id'=>'eDocumentID','class'=>'form-control', 'maxlength'=>'20','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters', 'readonly', 'pattern'=>'^[a-zA-Z0-9-_]+$'])}}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{{Form::text('documentName',null,['id'=>'eDocumentName','class'=>'form-control', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required', 'pattern'=>'^[a-zA-Z0-9-_ ]+$'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{{Form::text('desc',null,['id'=>'eDocumentDescription','class'=>'form-control','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters', 'maxlength'=>'500'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Type</label>
		<div class="col-md-9">
			{{ Form::select('type', ['Legal Document'=>'Legal Document','Clearance'=>'Clearance','Certification'=>'Certification'], null, ['id'=>'edDocumentType', 'class' => 'form-control border-info selectBox']) }}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Price</label>
		<div class="col-md-9">
			{{Form::number('documentPrice',null,['id'=>'eDocumentPrice','class'=>'form-control', 'maxlength'=>'8', 'minlength'=>'1', 'step'=>'0.01'])}}
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
	
	{{ Form::submit('Edit', ['class'=>'btn btn-success']) }}
		<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>
	
@endsection

@section('page-action')
	<script>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$("#btnAddModal").on('click', function() {
			$("#iconModal").modal('show');
		});

		$("#frm-add").submit(function(event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/document/store') }}", 
				method: "POST", 
				data: {
					"documentID": $("#documentID").val(), 
					"documentName": $("#documentName").val(), 
					"documentDescription": $("#documentDescription").val(), 
					"documentType": $("#aDocumentType :selected").text(), 
					"documentPrice": $("#documentPrice").val(), 
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
				type: 'get',
				url: "{{ url('/document/getEdit') }}", 
				data: {"primeID":id}, 
				success:function(data)
				{
					console.log(data);
					var frm = $('#frm-update');
					frm.find("#eDocumentID").val(data.documentID);
					frm.find('#eDocumentName').val(data.documentName);
					frm.find('#eDocumentDescription').val(data.documentDescription);
					frm.find('#eDocumentPrice').val(data.documentPrice);
					frm.find('#edDocumentType option:contains(' + data.documentType + ')').attr('selected', 'selected');
					frm.find('#ePrimeID').val(data.primeID);
					
					console.log("Data Status: " + data.status);

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

		$("#frm-update").submit(function(event) {
			event.preventDefault();

			var frm = $('#frm-update');

			console.log("Description is: " + $("#eDocumentDescription").val());

			$.ajax({
				url: "{{ url('/document/update') }}",
				type: "POST",
				data: {"primeID": $("#ePrimeID").val(), 
						"documentID": $("#eDocumentID").val(), 
						"documentName": $("#eDocumentName").val(), 
						"documentDescription": $("#eDocumentDescription").val(), 
						"documentType": $("#edDocumentType :selected").text(), 
						"documentPrice": $("#eDocumentPrice").val(), 
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
					url: "{{ url('/document/getEdit') }}",
					data: {"primeID": id},
					success:function(data) {
						console.log(data);
						swal({
							title: "Are you sure you want to delete " + data.documentName + "?",
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
									url: "{{ url('/document/delete') }}", 
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

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/document/refresh') }}", 
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
									'<td>' + data[index].documentID + '</td>' + 
									'<td>' + data[index].documentName + '</td>' + 
									'<td>' + data[index].documentDescription + '</td>' + 
									'<td>' + data[index].documentType + '</td>' + 
									'<td>&#8369; ' + data[index].documentPrice + '</td>' + 
									'<td>' + statusText + '</td>' + 
									'<td>' + 
										'<form method="POST" id="' + data[index].primeID + '" action="/service-type/delete" accept-charset="UTF-8"])' + 
											'<input type="hidden" name="primeID" value="' + data[index].primeID + '" />' + 
											'<div class="btn-group" role="group" aria-label="Basic example">' + 
												'<button class="btn btn-icon btn-round btn-success normal edit"  type="button" value="' + data[index].primeID + '"><i class="icon-android-create"></i></button>' + 
												'<button class="btn btn-icon btn-round btn-danger delete" value="' + data[index].primeID + '" type="button" name="btnEdit"><i class="icon-android-delete"></i></button>' + 
											'</div>' + 
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

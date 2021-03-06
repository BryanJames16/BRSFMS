<!-- Parent Template -->
@extends('master.base_maintenance')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/icheck/icheck.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/icheck/custom.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Document
@endsection

@section('custom-css')
	<style>
		.filePreview {
			border: 1px ridge black;
			width: 8.5in;
			height: 8.5in;
		}

		.fileNumber {
			font-family: "Bookman Old Style";
			font-size: 10px;
		}

		.fileHeader {
			font-family: 'Arial';
			font-size: 15px;
			height: 1in;
			width: 8.5in;
		}

		.fileTitle {
			font-family: "Arial";
			font-size: 35px;
		}

		.fileContent {
			font-family: "Arial";
			font-size: 18px;
		}

		.dataContentFix {
			vertical-align: middle;
		}

		.parIndented {
			text-indent: 2.0em;
		}

		.signaturePane {
			font-size: 17px;
		}
	</style>
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
			{{ Form::text('documentID', 
							null, 
							['id' => 'documentID', 
							'class' => ' form-control', 
							'placeholder' => 'eg.DOC_001', 
							'maxlength' => '20', 
							'data-toggle' => 'tooltip', 
							'data-trigger' => 'focus', 
							'data-placement' => 'top', 
							'data-title' => 'Maximum of 20 characters', 
							'required', 
							'readonly', 
							'minlength' => '5', 
							'pattern' => '^[a-zA-Z0-9-_]+$']) }}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{{ Form::text('documentName', 
							null, 
							['id' => 'documentName', 
							'class' => ' form-control', 
							'placeholder' => 'eg.Barangay Clearance', 
							'maxlength' => '30', 
							'minlength' => '7', 
							'data-toggle' => 'tooltip', 
							'data-trigger' => 'focus', 
							'data-placement' => 'top', 
							'data-title' => 'Maximum of 30 characters', 
							'required', 
							'pattern' => '^[a-zA-Z0-9-_ ]+$']) }}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{{Form::text('desc',null,['id'=>'documentDescription','class'=>' form-control', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])}}
		</div>	
	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Content</label>
		<div class="col-md-9">
			{{ Form::textarea('content', 
								null, 
								['id' => 'aDocumentContent', 
									'class' => ' form-control', 
									'maxlength' => '500', 
									'data-toggle' => 'tooltip', 
									'data-trigger' => 'focus', 
									'data-placement' => 'top', 
									'data-title' => 'Maximum of 500 characters', 
									'required', 
									'rows' => '10']) }}
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
			{{ Form::number('documentPrice', 
								null, 
								['id' => 'documentPrice', 
								'class' => 'form-control', 
								'min' => '0', 
								'max' => '1000000', 
								'maxlength' => '10', 
								'minlength' => '1', 
								'step'=>'0.25']) }}
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
			<td>{{ $document -> documentName }}</td>
			<td>{{ $document -> documentDescription }}</td>
			<td>{{ $document -> documentType }}</td>
			<td>₱{{ $document -> documentPrice }}</td>
			
			@if ($document -> status == 1)
				<td><span class="tag round tag-default tag-success">Active</span></td>
			@else
				<td><span class="tag round tag-default tag-danger">Inactive</span></td>
			@endif
			
			<td>
				
				{{Form::open(['url'=>'document/delete', 'method' => 'POST', 'id' => $document -> primeID ])}}

					{{Form::hidden('primeID',$document->primeID,['id'=>'primeID','class'=>'form-control', 'maxlength'=>'30', 'readonly'])}}
					<input type='hidden' name='documentName' value='{{ $document -> documentName }}' />
					<input type='hidden' name='documentDescription' value='{{ $document -> documentDescription }}' />
					<input type='hidden' name='documentType' value='{{ $document -> documentType }}' />
					<input type='hidden' name='documentPrice' value='{{ $document -> documentPrice }}' />
					<input type='hidden' name='status' value='{{ $document -> status }}' />
					
					<span class="dropdown">
						<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
						<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
							<a href="#" class="dropdown-item view" name="btnView" data-value='{{ $document -> primeID }}'><i class="icon-eye6"></i> View</a>
							<a href="#" class="dropdown-item requirement" name="btnEdit" data-value='{{ $document -> primeID }}'><i class="icon-pen3"></i> Add Requirements</a>
							<a href="#" class="dropdown-item edit" name="btnEdit" data-value='{{ $document -> primeID }}'><i class="icon-pen3"></i> Edit</a>
							<a href="#" class="dropdown-item delete" name="btnDelete" data-value='{{ $document -> primeID }}'><i class="icon-trash4"></i> Delete</a>
						</span>
					</span>

				{{Form::close()}}
			</td>
		</tr>
	@endforeach
@endsection

@section('ajax-modal')
	<div class="modal animated bounceInDown text-xs-left" style="overflow-y:scroll;" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info white">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel2"><i class="icon-eye6"></i> View Document</h4>
				</div>
				<div ng-app="maintenanceApp" class="modal-body">
					<div class="card-block">
						<div class="card-text filePreview">
							<span>
								<div class="card-text" id="lookContainer">

								</div>
							</span>
						</div>

						<div class="form-actions center">
							<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>
						</div>												
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Modal for document that does not have any requirements-->

	<div class="modal animated bounceInDown text-xs-left" style="overflow-y:scroll;" id="requirementModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info white">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel2"><i class="icon-android-add-circle"></i> Add Requirements</h4>
				</div>
				<div ng-app="maintenanceApp" class="modal-body">
					{{Form::open(['url'=>'/document/requirementsStore', 'method' => 'POST', 'id'=>'frm-addReq'])}}
					<input type="hidden" id="documentIDreq">
					<div class="card-block">
						<p style="text-align:center"><b>CHECK ALL DOCUMENT REQUIREMENTS</b></p>
						<hr>
						<div class="row">
								<div class="form-body">
									<div class="from-group">
										@foreach($requirements as $r)
											<div>
												<div class="col-md-6 " style="text-align:right">
													<label for="input-11">{{ $r->requirementName }}</label>
													<input type="checkbox" name="requirements" class="requirements"  value="{{ $r->requirementID }}" />
												</div>
												<div class="col-md-6" style="text-align:left">
													<div class="col-md-3">
														<label>Quantity: </label>
													</div>
													<div class="col-md-3">
														<input type="number" id="quantity{{ $r->requirementID }}" value="0" placeholder"Quantity" style="width:100%">
													</div>
												</div>
											</div>	
										@endforeach
									</div>
								</div>
						</div>
						<div class="form-actions center">
							<button type="submit" class="btn btn-success mr-1 addReq">Add</button>
							<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>
						</div>												
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

	<!-- Modal for update requirements -->

	<div class="modal animated bounceInDown text-xs-left" style="overflow-y:scroll;" id="updateReqModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info white">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel2"><i class="icon-android-add-circle"></i> Update Requirements</h4>
				</div>
				<div ng-app="maintenanceApp" class="modal-body">

					{{Form::open(['url'=>'/document/requirementsUpdate', 'method' => 'POST', 'id'=>'frm-updateReq'])}}
					
					<input type="hidden" id="edocumentIDreq">
					
					<div class="card-block">
						<p style="text-align:center"><b>CHECK ALL DOCUMENT REQUIREMENTS</b></p>
						<hr>
						<div class="row">
								<div class="form-body">
									<div class="from-group">
										<div id="chk">
										@foreach($requirements as $r)
											<div>
												<div class="col-md-6" style="text-align:right">
													<label for="input-11">{{ $r->requirementName }}</label>
													<input type="checkbox" name="erequirements" id="erequirements_{{ $r->requirementID }}" class="erequirements"  value="{{ $r->requirementID }}" />
												</div>
												<div class="col-md-6" style="text-align:left">
													<div class="col-md-3">
														<label>Quantity: </label>
													</div>
													<div class="col-md-3">
														<input type="number" id="equantity{{ $r->requirementID }}" value="0" placeholder"Quantity" style="width:100%" min="1">
													</div>
												</div>
											</div>	
										@endforeach
										</div>
									</div>
								</div>
						</div>
						
						<div class="form-actions center">
							<button type="submit" class="btn btn-success mr-1 updateReq">Update</button>
							<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>
						</div>												
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
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
			{{Form::text('document_ID',null,['id'=>'eDocumentID','class'=>' form-control', 'maxlength'=>'20','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 20 characters', 'readonly', 'pattern'=>'^[a-zA-Z0-9-_]+$'])}}
		</div>	

	</div>


	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{{Form::text('documentName',null,['id'=>'eDocumentName','class'=>' form-control', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters','required', 'pattern'=>'^[a-zA-Z0-9-_ ]+$'])}}
		</div>	

	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{{Form::text('desc',null,['id'=>'eDocumentDescription','class'=>' form-control','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters', 'maxlength'=>'500'])}}
		</div>	
	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Content</label>
		<div class="col-md-9">
			{{ Form::textarea('content', 
								null, 
								['id' => 'eDocumentContent', 
									'class' => ' form-control', 
									'maxlength' => '500', 
									'data-toggle' => 'tooltip', 
									'data-trigger' => 'focus', 
									'data-placement' => 'top', 
									'data-title' => 'Maximum of 500 characters', 
									'required', 
									'rows' => '10']) }}
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
			{{ Form::number('documentPrice', 
								null, 
								['id' => 'eDocumentPrice', 
								'class' => 'form-control', 
								'min' => '0', 
								'maxlength' => '8', 
								'minlength'=>'1', 
								'max' => '1000000', 
								'step'=>'0.25']) }}
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

		$("#frm-add").submit(function(event) {
			event.preventDefault();

			var concatenated = $("#aDocumentContent").val().replace(/\r\n|\r|\n/g, "<br>");

			$.ajax({
				url: "{{ url('/document/store') }}", 
				method: "POST", 
				data: {
					"documentID": $("#documentID").val(), 
					"documentName": $("#documentName").val(), 
					"documentDescription": $("#documentDescription").val(), 
					"documentContent": concatenated, 
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
				error: function(data) {
					swal("Error", errorReport(data), "error");
				}
			});
		});

		$("#frm-updateReq").submit(function(event) {
			event.preventDefault();

			var arrayCheck = [];

			$('.erequirements:checked').each(function(){
				arrayCheck.push($(this).val());
			})

			var l = arrayCheck.length;
			var quantity;

				console.log($("#edocumentIDreq").val());
				$.ajax({
					url: "{{ url('/document/requirementsUpdate') }}", 
					method: "POST", 
					data: {
						"documentPrimeID": $("#edocumentIDreq").val()
					}
				});
			

			for(var x=0;x<l;x++)
			{
				quantity = $('#equantity'+arrayCheck[x]).val();
				console.log($("#edocumentIDreq").val());
				$.ajax({
					url: "{{ url('/document/requirementsStore') }}", 
					method: "POST", 
					data: {
						"documentPrimeID": $("#edocumentIDreq").val(), 
						"requirementID": arrayCheck[x], 
						"quantity": quantity
					}, 
					success: function(data) {
						
					}, 
					error: function(data) {
						swal("Error", errorReport(data), "error");
					}
				});
					
			}
			$('#updateReqModal').modal('hide');
			$('#frm-updateReq').trigger('reset');
			swal("Successful", 
							"Successfully Updated requirements!", 
							"success");
			refreshTable();
		});

		$(document).on('click', '.edit', function(e) {
			var id = $(this).data('value');

			$.ajax({
				type: 'get',
				url: "{{ url('/document/getEdit') }}", 
				data: {"primeID":id}, 
				success:function(data)
				{
					var frm = $('#frm-update');
					frm.find("#eDocumentID").val(data.documentID);
					frm.find('#eDocumentName').val(data.documentName);
					frm.find('#eDocumentDescription').val(data.documentDescription);
					frm.find("#eDocumentContent").val(data.documentContent);
					frm.find('#eDocumentPrice').val(data.documentPrice);
					frm.find('#edDocumentType option:contains(' + data.documentType + ')').attr('selected', 'selected');
					frm.find('#ePrimeID').val(data.primeID);

					$("#eDocumentContent").val($("#eDocumentContent").val().replace(/<br\s?\/?>/g, "\n"));
					$("#eDocumentContent").val($("#eDocumentContent").val().replace(/<br\/?>/g, "\n"));
					$("#eDocumentContent").val($("#eDocumentContent").val().replace(/<br>/g, "\n"));

					if(data.status == 1) {
						$("#eActive").attr('checked', 'checked');
					}
					else {
						$("#eInactive").attr('checked', 'checked');
					}

					$('#modalEdit').modal('show');
				}, 
				error: function(data) {
					swal("Error", "Cannot fetch data!\n" + errorReport(data), "error");
				}
			})

		});

		$(document).on('click', '.requirement', function(e) {
			
			
			var id = $(this).data('value');
			console.log(id);
			
			$.ajax({
					type: 'GET',
					url: "{{ url('/document/checkRequirements') }}",
					data: {"documentPrimeID": id},
					success:function(data) {
						if(data=='[]')
						{
							$('#frm-addReq').trigger('reset');
							$('#documentIDreq').val(id)

							$('#requirementModal').modal('show');
						}
						else
						{
							$('#frm-updateReq').trigger('reset');
							data = $.parseJSON(data);
							var frm = $('#frm-updateReq');
							for (index in data) 
							{
								console.log(data[index].requirementID);
								frm.find('#equantity'+data[index].requirementID).val(data[index].quantity);
								$("#frm-updateReq input[id^='erequirements_'][value='"+data[index].requirementID+"']").prop("checked",true);
									
							}
							$('#edocumentIDreq').val(id)
							$('#updateReqModal').modal('show');
						}			
					}
			})
			
			
			
		});

		$("#frm-addReq").submit(function(event){
			event.preventDefault();
			console.log('hahaha');
			getCheckbox();
		});

		$("#frm-update").submit(function(event) {
			event.preventDefault();

			var frm = $('#frm-update');

			var concatenated = $("#eDocumentContent").val().replace(/\r\n|\r|\n/g, "<br>");

			$.ajax({
				url: "{{ url('/document/update') }}",
				type: "POST",
				data: {"primeID": $("#ePrimeID").val(), 
						"documentID": $("#eDocumentID").val(), 
						"documentName": $("#eDocumentName").val(), 
						"documentDescription": $("#eDocumentDescription").val(), 
						"documentContent":concatenated, 
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
					swal("Error", errorReport(data), "error");
				}
			});
		});

		$(document).on('click', '.delete', function(e) {

			var id = $(this).data('value');

			$.ajax({
					type: 'GET',
					url: "{{ url('/document/getEdit') }}",
					data: {"primeID": id},
					success:function(data) {
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
										swal("Error", "Cannot fetch table data!\n" + errorReport(data), "error");
									}
								});
							});				
					}
			})
		});

		$(document).on('click', '.view', function() {
			var primeID = $(this).data('value');
			var documentID = "";
			var documentName = "";
			var documentContent = "";


			$.ajax({
				type: "GET", 
				url: "{{ url('/document/getEdit') }}", 
				data: {"primeID": primeID}, 
				async: false, 
				success: function(data) {
					documentID = data.documentID;
					documentName = data.documentName;
					documentContent = data.documentContent;
				}, 
				error: function(data) {
					swal("Error", "Cannot fetch table data!\n" + errorReport(data), "error");
				}
			});

			

			$("#pdfModal").modal('show');
			
			$("#lookContainer").html(
				"<p align='left' class='fileNumber'>&nbsp;&nbsp;" + documentID + "</p><br>" + 
				"<div>" +
					"<table>" +
						"<tr>" + 
						"<td width='192px'><center>" + "<img src='./system-assets/ico/brgy_logo.png' height='100' width='100'>" + "</center></td>" +  
						"<td width='432px'>" + 
							"<center>" + 
								"<span width='20px'></span>" + 
								"<p align='center'>" + 
									"Republic of the Philippines<br>" + 
									"District VI, City of Manila<br>" + 
									"<b>BARANGAY 629 - ZONE 63</b><br>" + 
									"<i>OFFICE OF THE SANGUNIANG BARANGAY</i><br>" + 
									"Hippodromo Street, Sta. Mesa, Manila<br>" + 
								"</p>" + 
							"</center>" + 
						"</td>" + 
						"<td width='192px'><center>" + "<img src='./system-assets/ico/ManilaSeal.png' height='100' width='100'>" + "</center></td>" +  
						"</tr>" + 
					"</table>" + 
				"</div><br><br><br>" + 
				"<div class='dataContentFix'>" + 
					"<table>" + 
						"<th>" + 
							"<td></td>" + 
							"<td></td>" + 
							"<td></td>" + 
						"</th>" +
						"<tr height='30%'></tr>" + 
						"<tr height='70%'>" + 
							"<td width=20px></td>" + 
							"<td valign='center'>" + 
								"<p align='center' valign='middle' class='fileTitle'><b>" + documentName + "</b></p><br><br><br>" + 
								"<p align='left' class='fileContent'>" + documentContent + "</p><br>" + 
							"</td>" + 
							"<td width=20px></td>" + 
						"</tr>" + 
					"</table>" + 
				"</div>" + 
				"<div>" +
					"<table width='100%'>" + 
						"<th>" + 
							"<td></td>" + 
							"<td></td>" + 
						"</th>" + 
						"<tr>" + 
							"<td>" + 
								"<br><br>" + 
								"<p valign='bottom' align='center' class='signaturePane'>" + 
									"{lastname}, {firstname} {middlename}" + 
								"</p>" + 
							"</td>" + 
							"<td>" + 
								"<p align='center' class='fileContent'>" + 
									"Respectfully Yours,<br><br>" + 
								"</p>" + 
								"<p align='center' class='signaturePane'>" + 
									"Rolito A. Innocencio<br>" + 
									"Barangay Chairman<br>" +  
								"</p>" + 
							"</td>" + 
						"</tr>" + 
					"</table>" +  
				"</div>"
			);
		});

		var refreshTable = function() {
			$.ajax({
				url: "{{ url('/document/refresh') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-container").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
						var statusText = "";
						if (data[index].status == 1) {
							statusText = '<span class="tag round tag-default tag-success">Active</span>';
						}
						else {
							statusText = '<span class="tag round tag-default tag-danger">Inactive</span>';
						}

						$("#table-container").DataTable()
							.row.add([
								data[index].documentName, 
								data[index].documentDescription, 
								data[index].documentType, 
								"&#8369; " + data[index].documentPrice,
								statusText,
								'<span class="dropdown">' +
									'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+ 
									'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">' +
										'<a href="#" class="dropdown-item view" name="btnView" data-value="' + data[index].primeID + '"><i class="icon-eye6"></i> View</a>' +
										'<a href="#" class="dropdown-item requirement" name="btnEdit" data-value="' + data[index].primeID + '"><i class="icon-pen3"></i> Add Requirements</a>' +
										'<a href="#" class="dropdown-item edit" name="btnEdit" data-value="' + data[index].primeID + '"><i class="icon-pen3"></i> Edit</a>' +
										'<a href="#" class="dropdown-item delete" name="btnDelete" data-value="' + data[index].primeID + '"><i class="icon-trash4"></i> Delete</a>' +
									'</span>' +
								'</span>'
							]).draw(false);
					}
				}, 
				error: function(data) {
					swal("Error", "Cannot fetch table data!\n" + errorReport(data), "error");
				}
			});
		};

		var getCheckbox = function(){
			var arrayCheck = [];

			$('.requirements:checked').each(function(){
				arrayCheck.push($(this).val());
			})

			var l = arrayCheck.length;
			var quantity;

			for(var x=0;x<l;x++)
			{
				quantity = $('#quantity'+arrayCheck[x]).val();
				console.log($("#documentIDreq").val());
				$.ajax({
					url: "{{ url('/document/requirementsStore') }}", 
					method: "POST", 
					data: {
						"documentPrimeID": $("#documentIDreq").val(), 
						"requirementID": arrayCheck[x], 
						"quantity": quantity
					}, 
					success: function(data) {
						
					}, 
					failure: function(error) {
						var message = "Errors: ";
						var data = error.responseJSON;
						for (datum in data) {
							message += data[datum];
						}

						swal("Error", message, "error");
					}
				});
					
			}
			$('#requirementModal').modal('hide');
			
			$('#frm-addReq').trigger('reset');
			swal("Successful", 
							"Added requirements!", 
							"success");
			refreshTable();

		};

		$("#btnAddModal").bind('click', function() {
			$.ajax({
				url: "{{ url('/document/nextPK') }}", 
				method: "GET", 
				success: function(data) {
					$("#documentID").val(data);
				}, 
				error: function(data) {
					swal("Error", "Cannot fetch table data!\n" + errorReport(data), "error");
				}
			});
		});
	</script>
@endsection

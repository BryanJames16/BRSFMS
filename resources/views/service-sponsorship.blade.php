@extends('master.master')

@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/redBuilder.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/datatable.custom.red.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/toggle/bootstrap-switch.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/toggle/switchery.min.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/redBuilder.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/main-card.css') }}" />
@endsection

@section('plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/icomoon.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/selects/select2.min.css') }}" />	
@endsection

@section('vendor-style')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/calendars/fullcalendar.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Service Sponsorship
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(SERVICE_SPONSORSHIP);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Sponsorship</h2>
		<p class="text-muted mb-0">All transactions regarding sponsorship</p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaction</li>
		<li class="breadcrumb-item"><a href="/sponsors">Service</a></li>
		<li class="breadcrumb-item"><a href="#">Sponsorship</a></li>
	</ol>
@endsection

@section('content-body')
	<div class="row">
		<div class="col-xs-12">
			<div class="card">
				<div class="card-header card-head-custom">
					<h4 class="card-title">Service Sponsorhip</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="reload"><i class="icon-reload"></i></a></li>
							<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
						</ul>
					</div>
				</div>

				<div class="card-body collapse in">

					<div class="card-block card-dashboard">
						<p align="center">
							
						</p>	
					</div>

					<div class="card-block">
						<!-- SERVICE TRANSACTIONS TABLE -->
							<table class="table table-striped multi-ordering dataTable no-footer table-custome-outline-red" style="font-size:14px;width:100%;" id="table-service">
								<thead class="thead-custom-bg-red">
									<tr>
										<th>Name</th>
										<th>Service</th>
										<th>Date</th>
										<th>Age Bracket</th>
										<th>Sponsors</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
								</thead>

								<tbody>
									@foreach($servicetransactions as $st)
										<tr>
											<td>{{$st->serviceTransactionName}}</td>
											<td>{{$st->serviceName}}</td>
											
											@if($st -> toDate==null)
												<td>{{ date('F j, Y',strtotime($st -> fromDate)) }}</td>
											@else
												<td>{{ date('F j, Y',strtotime($st -> fromDate)) }} - {{ date('F j, Y',strtotime($st -> toDate)) }}</td>
											@endif

											
											
											@if($st->fromAge==null)
												<td>Open</td>
											@else
												<td>{{$st->fromAge}} - {{$st->toAge}} yrs. old</td>
											@endif
											
											<td>{{ $st->number }}</td>

											@if($st->status=='Pending')
												<td><span class="tag round tag-default tag-info">Pending</span></td>
											@elseif($st->status=='On-going')
												<td><span class="tag round tag-default tag-warning">On-going</span></td>
											@else
												<td><span class="tag round tag-default tag-success">Finished</span></td>
											@endif
											<td>
												<span class="dropdown">
													<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
													<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
														<a href="#" class="dropdown-item view" name="btnView" data-value="{{$st->serviceTransactionPrimeID}}"><i class="icon-eye6"></i> View Sponsors</a>
														<a href="#" class="dropdown-item sponsor" name="btnView" data-value="{{$st->serviceTransactionPrimeID}}"><i class="icon-earth"></i> Sponsor</a>
													</span>
												</span>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							<!-- End of SERVICE TRANSACTIONS TABLE -->
					</div>
				</div>
			</div>
		</div>
	</div>


	<!--Sponsor Modal -->
		<div class="modal animated bounceInDown text-xs-left" id="sponsorModal" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel2"><i class="icon-coffee"></i> Sponsor a Service</h4>
					</div>

					<!-- START MODAL BODY -->
					<div class="modal-body" width='100%'>
						<input type="checkbox" id="switchResident" class="switchery" data-size="sm" />
						<label for="switcherySize10" class="card-title ml-1">Resident</label>
						<hr>
						<form id="frm-sponsor">
						<input type="hidden" id="serviceID">
						<input type="hidden" id="sponsorID">
						<div>
							<h4 class="form-section">Credentials </h4>
							<div id="residentLayout">	
								<div class="row">
									<div class="form-group col-xs-6 col-md-4">
										<label for="userinput1">First Name</label>
										{!!Form::text('firstName',null,['id'=>'firstName','class'=>'form-control', 'maxlength'=>'30','required','minlength'=>'5'])!!}
									</div>
									<div class="form-group col-xs-6 col-md-4">
										<label for="userinput2">Middle Name</label>
										{!!Form::text('middleName',null,['id'=>'middleName','class'=>'form-control', 'maxlength'=>'30','required', 'minlength'=>'5'])!!}
									</div>
									<div class="form-group col-xs-6 col-md-4">
										<label for="userinput2">Last Name</label>
										{!!Form::text('lastname',null,['id'=>'lastName','class'=>'form-control', 'maxlength'=>'30','required', 'minlength'=>'5'])!!}
									</div>
								</div>

								<div class="row">
									<div class="form-group col-md-6 mb-2">
										<label for="userinput2">Email</label>
										{!!Form::text('email',null,['id'=>'email','class'=>'form-control','maxlength'=>'32','required', 'minlength'=>'5'])!!}
									</div>
									<div class="form-group col-md-6 mb-2">
									<label for="userinput1">Contact Number</label>
									{!!Form::text('contactNumber',null,['id'=>'contactNumber','class'=>'form-control', 'maxlength'=>'11','required', 'minlength'=>'5'])!!}
									</div>
								</div>
						</div>
								<hr>
								<h4 class="form-section">Sponsorship</h4>
								<br>
								<table style="width:100%">
									<td><h5>Item</h5></td>
									<td><h5>Quantity</h5></td>								
								</table>
								<br>
								<div class="repeat">

									<div>
										<div class="input-group mb-1">
											<div class="form-group col-md-5 ">
												<input type="text" class="form-control" placeholder="Item" name="items[]" />
											</div>
											<input type="number" style="width:40%" class="form-control" placeholder="Quantity" name="quantities[]" />
											<span class="" id="button-addon2">
												<button class="btn btn-danger remove" type="button" ><i class="icon-cross2"></i></button>
											</span>
										</div>
									</div>

								</div>
								<div align="center">
									<button type="button" class="btn btn-info addSponsor">
										<i class="icon-plus4"></i> Add item
									</button>
									<button type="button" class="btn btn-success submit">
										Submit  
									</button>
								</div>
						</div>
						</form>
					</div>
					<!-- End of Modal Body -->

				</div>
			</div>
		</div> 
	<!-- End of Modal -->

	<!--View Modal -->
		<div class="modal animated bounceInDown text-xs-left" id="viewModal" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel2"><i class="icon-erlenmeyer-flask"></i> Sponsors</h4>
					</div>

					<!-- START MODAL BODY -->
					<div class="modal-body" width='100%'>

						<div align="center">
							<h2 id="serviceName"></h2>
						</div>
						<table class="table table-striped multi-ordering dataTable no-footer table-custome-outline-red" style="font-size:14px;width:100%;" id="table-sponsor">
							<thead class="thead-custom-bg-red">
								<tr>
									<th>Name</th>
									<th>Contact Number</th>
									<th>Email</th>
									<th>Date Sponsored</th>
									<th>Items Sponsored</th>
									<th>Actions</th>
								</tr>
							</thead>

							<tbody>
								
							</tbody>
						</table>

						<div align="center">
							<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">
								<i class="icon-cross2"></i> Close
							</button>
						</div>
					</div>
					<!-- End of Modal Body -->

				</div>
			</div>
		</div> 
	<!-- End of Modal -->

	<!--Items Modal -->
		<div class="modal animated bounceInDown text-xs-left" id="itemsModal" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info white">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel2"><i class="icon-box"></i> Items</h4>
					</div>

					<!-- START MODAL BODY -->
					<div class="modal-body" width='100%'>
						<table class="table table-striped dataTable no-footer table-custome-outline-red" style="font-size:14px;width:100%;" id="table-item">
							<thead class="thead-custom-bg-red">
								<tr>
									<th>Item Name</th>
									<th>Quantity</th>
								</tr>
							</thead>

							<tbody>
								
							</tbody>
						</table>

						<div align="center">
							<button type="button" data-dismiss="modal" class="btn btn-warning mr-1 modalClose">
								<i class="icon-cross2"></i> Close
							</button>
						</div>
					</div>
					<!-- End of Modal Body -->

				</div>
			</div>
		</div> 
	<!-- End of Modal -->
@endsection

@section('vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
@endsection

@section('template-js')
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.knob.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/underscore-min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/clndr.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/unslider-min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.steps.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/spinner/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-checkbox.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/dateTime/moment-with-locales.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/daterange/daterangepicker.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	
	<script src="{{ URL::asset('/robust-assets/js/components/forms/wizard-steps.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/jquery.mousewheel.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/jquery.longpress.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/plugins.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/robust-assets/js/components/forms/select/form-select2.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/extensions/long-press.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/jspdf.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/switch.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/form-repeater.js') }}" type="text/javascript"></script>

	<script type="text/javascript">

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$(document).on('click', '.sponsor', function(e) {
			
			var id = $(this).data('value');
			$('#serviceID').val(id);

			$('#sponsorModal').modal('show');

		}); 

		$(document).on('click', '.viewItems', function(e) {
			
			var id = $(this).data('value');

			$.ajax({
					type: 'GET',
					url: '/service-sponsorship/getItems',
					data: {sponsorID:id},
					success:function(data) {

						$('#table-item').DataTable().clear().draw();
						data = $.parseJSON(data);

						for(index in data)
						{
							
							
							$('#table-item').DataTable()
									.row.add([
										data[index].itemName,
										data[index].quantity
									]).draw(false);

							
						}
							
						$('#itemsModal').modal('show');
						$("#viewModal").modal('hide');		
					}
			})

			

		}); 

		$(document).on('click', '.view', function(e) {
			
			var id = $(this).data('value');
			
			$.ajax({
					type: 'GET',
					url: '/service-sponsorship/getSponsorsR',
					data: {sID:id},
					success:function(data) {

						var dt = $("#table-sponsor").DataTable();

						$("#table-sponsor").DataTable().clear().draw();
						data = $.parseJSON(data);

						for(index in data)
						{
							$('#serviceName').html(data[index].serviceName);
							var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
							var date = new Date(data[index].dateSponsored);
							var month = date.getMonth();
							var day = date.getDate();
							var year = date.getFullYear();
							var d = months[month] + ' ' + day + ', ' + year;
							
									dt
									.row.add([
										data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
										data[index].contactNumber, 
										data[index].email, 
										d,
										data[index].number,
										'<a href="#" class="btn btn-info viewItems" data-value="'+ data[index].sponsorID +'">View Items</a>'
									]).draw(false);

							
						}

						

						$.ajax({
								type: 'GET',
								url: '/service-sponsorship/getSponsorsN',
								data: {sID:id},
								success:function(data) {

									data = $.parseJSON(data);

									for(index in data)
									{
										
										var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
										var date = new Date(data[index].dateSponsored);
										var month = date.getMonth();
										var day = date.getDate();
										var year = date.getFullYear();
										var d = months[month] + ' ' + day + ', ' + year;
										
										dt
												.row.add([
													data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
													data[index].contactNumber, 
													data[index].email, 
													d,
													data[index].number,
													'<a href="#" class="btn btn-info viewItems" data-value="'+ data[index].sponsorID +'">View Items</a>'
												]).draw(false);

										
									}
										
											
								}
						})				
								
					}
			})

			$('#viewModal').modal('show');

		}); 

		

		$(document).on('click', '.addSponsor', function(e) {
			
			var currentCount = $('.repeat').length;
			var newCount = currentCount + 1;
			var lastDiv = $('.repeat').last();
			var newDiv = lastDiv.clone();
			newDiv.insertAfter(lastDiv);

		}); 

		$(document).on('click', '.remove', function(e) {
			
			if($('.repeat').length!=1){
				$(this).closest('.repeat').remove();
				return false;
			}
			

		}); 

		$(document).on('click', '.submit', function(e) {
			

			$.ajax({
				type: "post",
				url: "{{ url('/service-sponsorship/sponsor') }}", 
				data: {"_token": "{{ csrf_token() }}",
					resiID:$('#resiID').val(),
					sID:$('#serviceID').val(),
					firstName:$('#firstName').val(),
					lastName:$('#lastName').val(),
					email:$('#email').val(),
					contactNumber:$('#contactNumber').val(),
					middleName:$('#middleName').val()}, 
				success: function(data) {

					
					$('#sponsorID').val(data);

					var items = $('input[name="items[]"]').map(function(){
							return this.value;
						}).get();

						var quantities = $('input[name="quantities[]"]').map(function(){
							return this.value;
						}).get();

						for(var i=0;i<items.length;i++)
						{
							for(var x=0;x<quantities.length;x++)
							{
								if(x==i)
								{
									$.ajax({
										type: "post",
										url: "{{ url('/service-sponsorship/sponsorItem') }}", 
										data: {"_token": "{{ csrf_token() }}",
											sponsorID:$('#sponsorID').val(),
											itemName: items[x],
											quantity: quantities[x]}, 
										success: function(data) {	

											$("#sponsorModal").modal("hide");
											$("#frm-sponsor").trigger("reset");
											swal("Success", "Successfully Sponsored!", "success");
											refresh();

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
								}
							}
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

			

			

		}); 

		$(document).on('change', '#resiID', function(e) {
			
			$.ajax({
					type: 'GET',
					url: '/service-sponsorship/getResidentInfo',
					data: {residentPrimeID:this.value},
					success:function(data) {

						data = $.parseJSON(data);

						for(index in data)
						{

							var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
							var date = new Date(data[index].birthDate);
							var month = date.getMonth();
							var day = date.getDate();
							var year = date.getFullYear();
							var d = months[month] + ' ' + day + ', ' + year;

							$('#bday').html(d);
							$('#number').html(data[index].contactNumber);
							$('#email').html(data[index].email);
						}
							
								
					}
			})

		}); 

		$('#switchResident').change(function(){

			if(this.checked){

				$('#residentLayout').html(
					'<div  class="row">'+
						'<div  class="form-group col-xs-6">'+
							'<h6>Resident: </h6><span>'+
							'<select class="select2 form-control" id="resiID" name="resiID" style="width: 100%">'+
							
								'<optgroup id="male" label="Male">'+
								'</optgroup>'+
								'<optgroup id="female" label="Female">'+
								'</optgroup>'+
							'</select></span>'+
						'</div>'+
						'<div style="border: 1px solid grey" class="form-group col-xs-5">'+
							'<h6>Birthday: <i><span id="bday"></span></i></h6>'+
							'<h6>Contact Number: <i><span id="number"></span></i></h6>'+
							'<h6>Email: <i><span id="email"></span></i></h6>'+
						'</div>'+
					'</div>'
				);

				$('#resiID').select2();

				$.ajax({
						type: 'GET',
						url: '/service-sponsorship/getResidents',
						success:function(data) {

							data = $.parseJSON(data);

							for(index in data)
							{
								var male = '';
								var female = '';

								if(data[index].gender == 'M')
								{
									male = male + '<option value= '+ data[index].residentPrimeID + '>'+ data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName + '</option>';
						
								}
								else if(data[index].gender == 'F')
								{
									female = female + '<option value= '+ data[index].residentPrimeID + '>' + data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName + '</option>';
								}

								$('#male').append(male);
								$('#female').append(female);
							}
								
									
						}
				})

				
			}
			else{
				$('#residentLayout').html(
					'<div class="row">'+
						'<div class="form-group col-xs-6 col-md-4">'+
							'<label for="userinput1">First Name</label>'+
							'{!!Form::text('firstName',null,['id'=>'firstName','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5'])!!}'+
						'</div>'+
						'<div class="form-group col-xs-6 col-md-4">'+
							'<label for="userinput2">Middle Name</label>'+
							'{!!Form::text("middleName",null,["id"=>"middleName","class"=>"form-control", "maxlength"=>"30","required"])!!}'+
						'</div>'+
						'<div class="form-group col-xs-6 col-md-4">'+
							'<label for="userinput2">Last Name</label>'+
							'{!!Form::text('lastName',null,['id'=>'lastName','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5'])!!}'+
						'</div>'+
					'</div>'+

					'<div class="row">'+
						'<div class="form-group col-md-6 mb-2">'+
							'<label for="userinput2">Email</label>'+
							'{!!Form::text('email',null,['id'=>'email','class'=>'form-control', 'placeholder'=>'eg.junjun@yahoo.com', 'maxlength'=>'32','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 32 characters', 'minlength'=>'5'])!!}'+
						'</div>'+
						'<div class="form-group col-md-6 mb-2">'+
						'<label for="userinput1">Contact Number</label>'+
						'{!!Form::text('contactNumber',null,['id'=>'contactNumber','class'=>'form-control', 'placeholder'=>'eg.09275223489', 'maxlength'=>'11','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 11 dugits', 'minlength'=>'5'])!!}'+
						'</div>'+
					'</div>'
				);
			}
			

		}); 

		$(".modalClose").click(function() {
			$("#viewModal").modal("show");
		});

		var refresh = function() {
			$.ajax({
				url: "{{ url('/service-sponsorship/refresh') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-service").DataTable().clear().draw();
					data = $.parseJSON(data);

					for (index in data) {
						
						var status;
						var age;
						var date;
						var s;

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var dat = new Date(data[index].fromDate);
						var month = dat.getMonth();
						var day = dat.getDate();
						var year = dat.getFullYear();
						var fd = months[month] + ' ' + day + ', ' + year;

						var tmonths = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var tdat = new Date(data[index].toDate);
						var tmonth = tdat.getMonth();
						var tday = tdat.getDate();
						var tyear = tdat.getFullYear();
						var td = tmonths[tmonth] + ' ' + tday + ', ' + tyear;

						if(data[index].status=='Pending')
						{
							s = '<span class="tag round tag-default tag-info">Pending</span>';
						}
						else if(data[index].status=='On-going')
						{
							s = '<span class="tag round tag-default tag-warning">On-going</span>';
						}
						else
						{
							s = '<span class="tag round tag-default tag-success">Finished</span>';
						}

						if(data[index].fromAge==null)
						{
							age = 'Open';
						}
						else
						{
							age = data[index].fromAge + ' - ' + data[index].toAge + ' yrs. old';
						}

						if(data[index].toDate==null)
						{
							date = fd;
						}
						else
						{
							date = fd  + ' - ' + td;
						}

						$("#table-service").DataTable()
								.row.add([
									data[index].serviceTransactionName, 
									data[index].serviceName, 
									date, 
									age, 
									data[index].number, 
									s,

											'<span class="dropdown">'+
												'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+
												'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
													'<a href="#" class="dropdown-item view" name="btnView" data-value="'+ data[index].serviceTransactionPrimeID +'">View Sponsors</a>'+
													'<a href="#" class="dropdown-item sponsor" name="btnView" data-value="'+ data[index].serviceTransactionPrimeID +'">Sponsor</a>'+
												'</span>'+
											'</span>'
									
								]).draw(false);
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

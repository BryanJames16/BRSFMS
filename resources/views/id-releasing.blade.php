<!-- Parent Template -->
@extends('master.master')

@section('vendor-style')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
@endsection

@section('plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />
@endsection

<!-- CSS Styles -->
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
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/main-card.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/jquery-jvectormap-2.0.3.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/morris.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/unslider.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
@endsection

@section('page-level-css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/components/weather-icons/climacons.min.css') }}" />
@endsection

@section('custom-css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/card-bg.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	ID Releasing
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')
	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(ID_RELEASING);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12 mb-1">
		<h2 class="content-header-title">ID Releasing</h2>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">ID Releasing</a></li>
		<li class="breadcrumb-item"></li>
	</ol>
@endsection

@section('content-body')
    <section id="multi-column">
        <div class="row">
            <div class="col-xs-14">
                <div class="card">
                    <div class="card-header card-head-custom">
						<h4 class="card-title">ID Releasing</h4>
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
                                <!-- Button trigger modal -->
								
                            </p>

							<div class="card-block">
								<ul class="nav nav-tabs nav-linetriangle no-hover-bg nav-justified">
									<li class="nav-item">
										<a class="nav-link active" id="active-tab3" data-toggle="tab" href="#id" aria-controls="active3" aria-expanded="true">Pending</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="link-tab3" data-toggle="tab" href="#reservation" aria-controls="link3" aria-expanded="false">Released</a>
									</li>
								</ul>
								<div class="tab-content px-1 pt-1">
									<div role="tabpanel" class="tab-pane fade active in" id="id" aria-labelledby="active-tab3" aria-expanded="true">
										<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-pending">
											<thead class="thead-custom-bg-red">
												<tr>
													<th>ID</th>
													<th>Resident</th>
													<th>Expiration Date</th>
													<th>Date Issued</th>
													<th>Status</th>
													<th>Actions</th>
												</tr>
											</thead>

											<tbody>
												@foreach($card as $c)
													@if($c -> status == 1)
                                                    @if($c -> released == 0)
                                                        <tr>
                                                            <td>{{ $c -> residentID }}</td>
                                                            <td>{{ $c -> lastName}}, {{$c -> firstName}} {{$c -> middleName}}</td>
                                                            <td>{{ date('F j, Y',strtotime($c -> expirationDate)) }}</td>
                                                            <td>{{ date('F j, Y',strtotime($c -> dateIssued)) }}</td>
                                                            <td><span class="tag round tag-info">Pending</span></td>
                                                            <td>
                                                                <a href="#" class="btn btn-warning release" data-value="{{ $c -> cardID }}">Release</a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @endif
												@endforeach
											</tbody>
										</table>
									</div>
									<div class="tab-pane fade" id="reservation" role="tabpanel" aria-labelledby="link-tab3" aria-expanded="false">
										<table class="table table-striped table-custome-outline-red multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-released">
											<thead class="thead-custom-bg-red">
												<tr>
													<th>ID</th>
													<th>Resident</th>
													<th>Expiration Date</th>
													<th>Date Issued</th>
													<th>Status</th>
													<th>Actions</th>
												</tr>
											</thead>	
											<tbody>
												@foreach($card as $c)
													@if($c -> released == 1 && $c -> status == 1)
                                                    <tr>
														<td>{{ $c -> residentID }}</td>
														<td>{{ $c -> lastName}}, {{$c -> firstName}} {{$c -> middleName}}</td>
														<td>{{ date('F j, Y',strtotime($c -> expirationDate)) }}</td>
														<td>{{ date('F j, Y',strtotime($c -> dateIssued)) }}</td>
														<td><span class="tag round tag-success">Released</span></td>
														<td>
															<a href="#" class="btn btn-info view" data-value="{{ $c -> cardID }}">View ID</a>
														</td>
													</tr>
                                                    @endif
												@endforeach
												
											</tbody>
										</table>
									</div>
								</div>
							</div>

                            <!--Barangay ID Modal -->
						<div class="modal animated bounceInDown text-xs-left" id="idModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-dialog modal-xl" role="document">
								<div class="modal-content">
									<div class="modal-header bg-info white">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2"><i class="icon-bankcard"></i> Barangay ID</h4>
									</div>

									<!-- START MODAL BODY -->
									<div class="modal-body" width='100%'>
											
											
											
											
											<input type="hidden" id="amount" value="{{$util->barangayIDAmount}}"></input>
											<input type="hidden" id="yearsOfExpiration" value="{{$util->yearsOfExpiration}}"></input>
											<input type="hidden" id="hehe"></input>

											<h3 align="center">Preview:</h3>
										
											
											<div class="row" id="mainCard" style="padding-left:50px;">
												
												<br>
												<div class="col-md-6" style="width:40%;padding-top:20px;padding-left:70px" id="cardWrapper">
													
													
													<div style="background-color:lightgrey;width:500px;height:80px;border:1px solid;border-color:rgb(0, 0, 193);border-radius:10px 10px 0px 0px;">
														<img style="float:left;padding-top:10px;padding-left:10px;width:80px;height:60px" src='/storage/upload/{{$util->brgyLogoPath}}'></img>
														<h6 style="text-align:center;color:blue;padding-top:5px">
															REPUBLIC OF THE PHILIPPINES<br>
															CITY OF MANILA<br>
															OFFICE OF THE BARANGAY CHAIRMAN<br>
															{{$util->barangayName}}<br>
														</h6>
													</div>
													
													<div style="border:1px solid;height:20px;width:500px;background-color:rgb(0, 224, 0)">
														<p align="center">Barangay Resident Identification Card</p>
													</div>
													<div style="background-color:lightgrey;position:relative;width:500px;height:180px;border:1px solid;border-color:rgb(0, 0, 193);padding:20px;box-sizing:border-box;border-radius:0px 0px 10px 10px;" id="cardContentContainer">
														
														<div style="width:320px;text-align:center">
															<h2 id="nameID"></h2>
															<br>
															<br>
															<p>
															___________________________<br>
															CARDHOLDER SIGNATURE<br>
															@if($util->expirationID==1)
															Valid until: <span id="validity"></span>
															@endif
															</p>
														</div>

														

														<div style="background-color:white;position:absolute;top:35px;right:25px;width:96px;height:96px;border:1px solid;float:right;">
															<p style="padding-top:25px;font-size:30px" align="center">1 X 1</p>
														</div>

														<div style="position:absolute;top:100px;right:25px;width:96px;height:96px;float:right;">
															<p style="padding-top:30px;font-size:20px" align="center" id="bID"></p>
														</div>

														
													</div>


												</div>
												<br>

												<div class="col-md-6" style="display: table;width:500px;table-layout:fixed;margin-left:100px;">
													<div style="padding:5px;display:table-cell;color:blue;background-color:lightgrey;width:240px;height:208px;border:1px solid;border-color:rgb(0, 0, 193);border-radius:10px 0px 0px 10px;">
														<p style="color:black"><b>
															BIRTHDAY: 
																<span style="color:blue" id="bdayID"></span><br>
															ADDRESS: 
																<span style="color:blue" id="addressID">
																</span><br>
															CONTACT NO.: 
																<span style="color:blue" id="contactNumberID"></span><br>
															<br>
															Parent to be contacted in case of emegency<br>
															NAME: 
																<span style="color:blue" id="emerName"></span><br>
															ADDRESS: 
																<span style="color:blue" id="emerAddress">
																</span><br>
															CONTACT NO.: 
																<span style="color:blue" id="emerNumber"></span></b>
														</p>
													</div>

													<div style="display:table-cell;width:250px;height:208px;border:1px solid;border-color:rgb(0, 0, 193);padding:20px;box-sizing:border-box;border-radius:0px 10px 10px 0px;" id="cardContentContainer">
														<p style="color:black;font-size:12px;"><i>
															Holder is a bonafide constituent of this
															barangay and is entitled to all privilege
															and services holder may require. <br> <br>

															If found please return to the Barangay
															Secretariat, {{$util->barangayName}}, {{ $util->address }}.</i>
														</p>
														
														<p align="center" style="color:black">
															<img src="/storage/upload/{{ $util->signaturePath }}" alt="sign" width="70%" height="30%"><br>
															<span style="font-size:15px"><b>Hon. {{ $chairman->firstName }} {{ substr($chairman->middleName,0,1) }}. {{ $chairman->lastName }}</b></span><br>
															Barangay Chairman
														</p>
													</div>
												</div>
												
												<br>
											
											

											</div>
											<br>
											<div align="center">
													
													<br>
													<button class="btn btn-success" id="release">Release/Print</button>
											</div>

										

										


									</div>
									<!-- End of Modal Body -->
								</div>
							</div>
						</div> 
						<!-- End of Modal -->

                        <!--Barangay ID Modal -->
						<div class="modal animated bounceInDown text-xs-left" id="viewIDModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-dialog modal-xl" role="document">
								<div class="modal-content">
									<div class="modal-header bg-info white">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<h4 class="modal-title" id="myModalLabel2"><i class="icon-bankcard"></i> Barangay ID</h4>
									</div>

									<!-- START MODAL BODY -->
									<div class="modal-body" width='100%'>
											
											
											
											

											<input type="hidden" id="amount" value="{{$util->barangayIDAmount}}"></input>
											<input type="hidden" id="yearsOfExpiration" value="{{$util->yearsOfExpiration}}"></input>
											<input type="hidden" id="hehe"></input>

											
											
											<div class="row" id="mainCard" style="padding-left:50px;">
												
												<br>
												<div class="col-md-6" style="width:40%;padding-top:20px;padding-left:70px" id="cardWrapper">
													
													
													<div style="background-color:lightgrey;width:500px;height:80px;border:1px solid;border-color:rgb(0, 0, 193);border-radius:10px 10px 0px 0px;">
														<img style="float:left;padding-top:10px;padding-left:10px;width:80px;height:60px" src='/storage/upload/{{$util->brgyLogoPath}}'></img>
														<h6 style="text-align:center;color:blue;padding-top:5px">
															REPUBLIC OF THE PHILIPPINES<br>
															CITY OF MANILA<br>
															OFFICE OF THE BARANGAY CHAIRMAN<br>
															{{$util->barangayName}}<br>
														</h6>
													</div>
													
													<div style="border:1px solid;height:20px;width:500px;background-color:rgb(0, 224, 0)">
														<p align="center">Barangay Resident Identification Card</p>
													</div>
													<div style="background-color:lightgrey;position:relative;width:500px;height:180px;border:1px solid;border-color:rgb(0, 0, 193);padding:20px;box-sizing:border-box;border-radius:0px 0px 10px 10px;" id="cardContentContainer">
														
														<div style="width:320px;text-align:center">
															<h2 id="vnameID"></h2>
															<br>
															<br>
															<p>
															___________________________<br>
															CARDHOLDER SIGNATURE<br>
															@if($util->expirationID==1)
															Valid until: <span id="vvalidity"></span>
															@endif
															</p>
														</div>

														

														<div style="background-color:white;position:absolute;top:35px;right:25px;width:96px;height:96px;border:1px solid;float:right;">
															<p style="padding-top:25px;font-size:30px" align="center">1 X 1</p>
														</div>

														<div style="position:absolute;top:100px;right:25px;width:96px;height:96px;float:right;">
															<p style="padding-top:30px;font-size:20px" align="center" id="vbID"></p>
														</div>

														
													</div>


												</div>
												<br>

												<div class="col-md-6" style="display: table;width:500px;table-layout:fixed;margin-left:100px;">
													<div style="padding:5px;display:table-cell;color:blue;background-color:lightgrey;width:240px;height:208px;border:1px solid;border-color:rgb(0, 0, 193);border-radius:10px 0px 0px 10px;">
														<p style="color:black"><b>
															BIRTHDAY: 
																<span style="color:blue" id="vbdayID"></span><br>
															ADDRESS: 
																<span style="color:blue" id="vaddressID">
																</span><br>
															CONTACT NO.: 
																<span style="color:blue" id="vcontactNumberID"></span><br>
															<br>
															Parent to be contacted in case of emegency<br>
															NAME: 
																<span style="color:blue" id="vemerName"></span><br>
															ADDRESS: 
																<span style="color:blue" id="vemerAddress">
																</span><br>
															CONTACT NO.: 
																<span style="color:blue" id="vemerNumber"></span></b>
														</p>
													</div>

													<div style="display:table-cell;width:250px;height:208px;border:1px solid;border-color:rgb(0, 0, 193);padding:20px;box-sizing:border-box;border-radius:0px 10px 10px 0px;" id="cardContentContainer">
														<p style="color:black;font-size:12px;"><i>
															Holder is a bonafide constituent of this
															barangay and is entitled to all privilege
															and services holder may require. <br> <br>

															If found please return to the Barangay
															Secretariat, {{$util->barangayName}}, {{ $util->address }}.</i>
														</p>
														
														<p align="center" style="color:black">
															<img src="/storage/upload/{{ $util -> signaturePath }}" alt="sign" width="70%" height="30%"><br>
															<span style="font-size:15px"><b>Hon. {{ $chairman->firstName }} {{ substr($chairman->middleName,0,1) }}. {{ $chairman->lastName }}</b></span><br>
															Barangay Chairman
														</p>
													</div>
												</div>
												
												<br>
											
											

											</div>
											<br>
											

										

										

									</div>
									<!-- End of Modal Body -->
								</div>
							</div>
						</div> 
						<!-- End of Modal -->
							
							<!-- Modal Area -->
							<div class="modal animated bounceIn text-xs-left" id="idPayModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
								<div class="modal-dialog modal-xs" role="document">
									<div class="modal-content">
										<div class="modal-header bg-info white">
											<button type="button" class="close cancel-view" data-dismiss="modal" aria-label="Close" id="modal-dismis">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel2"><i class="icon-gold2"></i> Barangay ID Payment</h4>
										</div>
										<div class="modal-body dirty-white-card">
											<form id="frm-IDPay">
											<input type="hidden" id="idCollID"></input>

											<h3 align="center">Amount To Pay:</h3> 
											<br>
											<h2 align="center">
												
												₱<input style="width:40%" type="number" value="{{ $util -> barangayIDAmount }}" id="idAmountToPay" disabled></input> 
												
											</h2>
											<br>
											<h3 align="center">Cash: </h3>
											<br>
											<p align="center">
												<input type="text" id="idCash"></input>
											</p> 
											
											<br>
											<br>
											<p align="center">
												<button type="button" class="btn btn-warning mr-1" id="btnIDPay">Pay</button>
											</p>
											</form>
										</div>
									</div>
								</div>
							</div>

							
                        </div>
                    </div>
                </div>

				
            </div>
        </div>
    </section>
@endsection

@section('vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
	<script src="{{ URL::asset('/js/Chart.bundle.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.knob.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/underscore-min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/clndr.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/unslider-min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.steps.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/spinner/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/dateTime/moment-with-locales.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/daterange/daterangepicker.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/validation/form-validation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/wizard-steps.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
@endsection

@section('page-action')
    <script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

        $(document).on('click', '.release', function(e) {
			var id = $(this).data('value');

			$('#hehe').val(id);

			$.ajax({
				type: 'get',
				url: "{{ url('/id-release/getEdit') }}", 
				data: {"cardID":id}, 
				success:function(data)
				{

					data = $.parseJSON(data);

					for (index in data)
					{

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].birthDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

                        var monthss = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var datee = new Date(data[index].expirationDate);
						var monthh = datee.getMonth();
						var dayy = datee.getDate();
						var yearr = datee.getFullYear();
						var dd = months[monthh] + ' ' + dayy + ', ' + yearr;

						var m = data[index].middleName.substring(0,1);

                        $.ajax({
                                type: 'GET',
                                url: '/resident/getMemDet',
                                data: {'familyMemberPrimeID': data[index].memID},
                                success:function(data) {

                                    data = $.parseJSON(data);

                                    for(index in data)
                                    {
                                        $('#emerName').html(data[index].firstName + ' ' + data[index].middleName + ' ' + data[index].lastName);
                                        $('#emerAddress').html(data[index].address);
                                        $('#emerNumber').html(data[index].contactNumber);
                                    }	
                                            
                                }
                        })

						$('#bdayID').html(d);
						$('#nameID').html(data[index].firstName + " " + m + ". " + data[index].lastName);
						$('#contactNumberID').html(data[index].contactNumber);
						$('#addressID').html(data[index].address);
						$('#bID').html(data[index].residentID);
                        $('#validity').html(dd);
						$('#idModal').modal('show');
						
					}
					
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

        $(document).on('click', '.view', function(e) {
			var id = $(this).data('value');

			$('#hehe').val(id);

			$.ajax({
				type: 'get',
				url: "{{ url('/id-release/getEdit') }}", 
				data: {"cardID":id}, 
				success:function(data)
				{

					data = $.parseJSON(data);

					for (index in data)
					{

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].birthDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

                        var monthss = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var datee = new Date(data[index].expirationDate);
						var monthh = datee.getMonth();
						var dayy = datee.getDate();
						var yearr = datee.getFullYear();
						var dd = months[monthh] + ' ' + dayy + ', ' + yearr;

						var m = data[index].middleName.substring(0,1);

                        $.ajax({
                                type: 'GET',
                                url: '/resident/getMemDet',
                                data: {'familyMemberPrimeID': data[index].memID},
                                success:function(data) {

                                    data = $.parseJSON(data);

                                    for(index in data)
                                    {
                                        $('#vemerName').html(data[index].firstName + ' ' + data[index].middleName + ' ' + data[index].lastName);
                                        $('#vemerAddress').html(data[index].address);
                                        $('#vemerNumber').html(data[index].contactNumber);
                                    }	
                                            
                                }
                        })

						$('#vbdayID').html(d);
						$('#vnameID').html(data[index].firstName + " " + m + ". " + data[index].lastName);
						$('#vcontactNumberID').html(data[index].contactNumber);
						$('#vaddressID').html(data[index].address);
						$('#vbID').html(data[index].residentID);
                        $('#vvalidity').html(dd);
						$('#viewIDModal').modal('show');
						
					}
					
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

        $("#release").click(function () {
			
            swal({
                title: "Are you sure you want to release this id?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "RELEASE",
                closeOnConfirm: false
                },
                function() {

                    $.ajax({
                        url: '{{ url("/id-release/release") }}',
                        method: 'POST', 
                        data: {
                            "cardID": $('#hehe').val() 
                        }, 
                        success: function(data) {

                            $('#idModal').modal('hide');

                            refresh();

                            swal("ID Released!",
								'ID was successfully released', 
								"success");

                        }, 
                        error: function (errors) {
                            var message = "Errors: ";
                            var data = errors.responseJSON;
                            for (datum in data) {
                                message += data[datum];
                            }

                            swal("Error", message, "error");
                        }
                    });

                    html2pdf($("#mainCard")[0], {
                        margin: 	  0, 
                        filename:     "BarangayID-" + getStringDateTime() + ".pdf", 
                        image:        { type: 'jpeg', quality: 1 },
                        html2canvas:  { dpi: 300, letterRendering: true },
                        jsPDF:        { unit: 'in', format: [8.6459, 5.2438], orientation: 'portrait' }
                    });
                });
			
		
		});

		
        var refresh = function() {
			$.ajax({
				url: "{{ url('/id-release/refresh') }}", 
				method: "GET", 
				datatype: "json", 
				success: function(data) {

					$("#table-pending").DataTable().clear().draw();
					$("#table-released").DataTable().clear().draw();
                    
                    data = $.parseJSON(data);

					for (index in data) {
						var statusText = "";
						var btn ='';
                        

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].expirationDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

                        var monthss = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var datee = new Date(data[index].dateIssued);
						var monthh = datee.getMonth();
						var dayy = datee.getDate();
						var yearr = datee.getFullYear();
						var dd = months[monthh] + ' ' + dayy + ', ' + yearr;
                        
                        if(data[index].released == 0)
                        {
                            statusText = '<span class="tag round tag-info">Pending</span>';
                            btn = '<a href="#" class="btn btn-warning release" data-value="'+ data[index].cardID +'">Payment</a>';
                        }
                        else
                        {
                            statusText = '<span class="tag round tag-success">Released</span>';
                            btn = '<a href="#" class="btn btn-info view" data-value="'+ data[index].cardID +'">View ID</a>';
                        }
                        
							
                        if(data[index].released == 0){
                            $("#table-pending").DataTable()
                                .row.add([
                                    data[index].residentID, 
                                    data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
                                    d,
                                    dd, 
                                    statusText,
                                    btn
                                ]).draw(false);
                        }
                        else{
                            $("#table-released").DataTable()
                                .row.add([
                                    data[index].residentID, 
                                    data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
                                    d,
                                    dd, 
                                    statusText,
                                    btn
                                ]).draw(false);
                        }

						
					}
				}, 
				error: function(data) {
					swal("Error", "Cannot fetch table data!\n" + errorReport(data), "error");
				}
			});
		};

    </script>
@endsection

@section('template-js')
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/timehandle.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/jspdf.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/html2canvas.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/canvas2image.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/rasterizeHTML.allinone.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/html2pdf.js') }}" type="text/javascript"></script>
@endsection

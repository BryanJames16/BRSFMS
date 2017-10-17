@extends('master.master')

<!-- Preset -->
@section('vendor-style')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
@endsection

@section('plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/icomoon.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/selects/select2.min.css') }}" />	
@endsection

<!-- CSS Styles -->
@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/jquery-jvectormap-2.0.3.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/charts/morris.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/redBuilder.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/datatable.custom.red.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/unslider.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/extensions/long-press.css') }}" />

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/redBuilder.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/main-card.css') }}" />
@endsection

@section('template-css')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
@endsection


<!-- Title of the Page -->
@section('title')
	Query - Service
@endsection


<!-- Set All JavaScript Settings -->
@section('js-setting')
	<script type="text/javascript">
		setSelectedTab(QUERY_SERVICE);
	</script>
@endsection

@section('content-body')
	<section id="multi-column">
		
        <div class="row">
			<div class="col-xs-4">
				<div class="card">
					<div class="card-header card-head-custom">
						<h4 class="card-title">Query for Service</h4>
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
                            <div class="form-body">
                                <div class="row">
                                    <div class="form-group col-md-12 mb-2">
                                        <label for="userinput2">Name</label>
                                        {!! Form::text('serviceName', null, ['id' => 'serviceName','class' => 'form-control border-primary', 'placeholder'=> '']) !!}
                                    </div>
                                    
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput3">From Date</label>
                                        {!! Form::date('fromDate', null, ['id' => 'fromDate','class' => 'form-control border-primary']) !!}
                                    </div>
									<div class="form-group col-md-6 mb-2">
                                        <label for="userinput3">To Date</label>
                                        {!! Form::date('toDate', null, ['id' => 'toDate','class' => 'form-control border-primary']) !!}
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="form-group col-md-6 mb-2">
                                        <label for="userinput3">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="All">All</option>
                                            <option value="On-going">On-going</option>
                                            <option value="Pending">Pending</option>
											<option value="Finished">Finished</option>
                                        </select>
                                    </div>
									<div class="form-group col-md-6 mb-2">
                                        <label for="userinput3">Service</label>
                                        <select class="form-control select2" name="service" id="service">
                                            <option value="All">All</option>
                                            @foreach($service as $serv)
												<option value="{{$serv->primeID}}">{{ $serv->serviceName }}</option>
											@endforeach
                                            
                                        </select>
                                    </div>

                                    
                                </div>


                                <div style="text-align:center">	
                                <p style="text-align:center"<button type="button" class="btn round btn-success query">Query</button></p>
                                </div>

                            </div>
                        </div>
					</div>	
                </div>									
			</div>

            <div class="col-xs-8">
				<div class="card">
					<div class="card-header card-head-custom">
						<h4 class="card-title">Query Result</h4>
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
                        <!-- Resident Tab -->
                        <table class="table table-striped table-custome-outline-red dataex-html5-export" style="font-size:14px;width:100%;" id="table-container">
                            <thead class="thead-custom-bg-red">
                                <tr>
                                    <th>Name</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Age Bracket</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                
                            </tbody>
                        </table>
                        <!-- End of Resident Tab -->
                        </div>
					</div>	
                </div>									
			</div>
		</div>

        <div class="row">
			
		</div>
	</section>

	
@endsection

<!-- Javascript Resources -->
@section('vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
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
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/dateTime/moment-with-locales.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/daterange/daterangepicker.js') }}" type="text/javascript"></script>
	
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jszip.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/pdfmake.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/vfs_fonts.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/buttons.html5.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/buttons.print.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/buttons.colVis.min.js') }}" type="text/javascript"></script>
	
	
	
	<script src="{{ URL::asset('/robust-assets/js/components/forms/validation/form-validation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/wizard-steps.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/jquery.mousewheel.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/jquery.longpress.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/long-press/plugins.js') }}" type="text/javascript"></script>

	
	
	@include('script-resident');
	
	@include('script-family');

	

	<script>
		
	$(document).on('click', '.query', function(e) {
			

            var serviceName = $("#serviceName").val();
			var service = $("#service").val();
			var status = $("#status").val();
			var fDate = $("#fromDate").val();
			var tDate = $("#toDate").val();

			if(service=='All')
            {
                service = '';
            }
			if(status=='All')
            {
                status = '';
            }
        
			$.ajax({
				url: "{{ url('/query/service/submit') }}", 
				method: "GET", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"fromDate": fDate, 
					"toDate": tDate, 
					"status": status, 
					"serviceName": serviceName, 
					"service": service, 
					
				}, 
				success: function(data) {

                    $("#table-container").DataTable().clear().draw();
                    data = $.parseJSON(data);
                    
					for (index in data)
					{
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

						$("#table-container").DataTable()
								.row.add([
									data[index].serviceTransactionName, 
									data[index].serviceName, 
									date, 
									age, 
									s
									
								]).draw(false);
                    }
					
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

@section('template-js')
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/robust-assets/js/components/forms/select/form-select2.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables-extensions/datatable-button/datatable-html5.js') }}" type="text/javascript"></script>
@endsection

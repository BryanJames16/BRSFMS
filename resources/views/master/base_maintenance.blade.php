<!-- Parent Template -->
@extends('master.master')

<!-- CSS Styles -->
@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
@endsection

<!-- Adds the Content to the Main Page -->
@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12 mb-1">
		@yield('inside-content-header')
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		@yield('inside-breadcrumb')
	</ol>
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">@yield('main-card-title')</h4>
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
							<p align="right">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-outline-info btn-lg" id="btnAddModal"  style="width:130px; font-size:13px">
									<i class="icon-edit2"></i> ADD  
								</button>


								
								<!-- Modal -->
								<div class="modal fade text-xs-left" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-dismis">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> @yield('modal-card-title')</h4>
											</div>
											<div ng-app="maintenanceApp" class="modal-body">
												<div class="card-block">
													<div class="card-text">
														
													</div>
													@yield('modal-controller')
													@yield('modal-form-body')

													<div class="form-actions center">
														@yield('modal-form-action')
													</div>					
													@yield('inside-modal-controller')								
												</div>
											</div>

											

											<!-- End of Modal Body -->

										</div>
									</div>
								</div> <!-- End of Modal -->
                    		</p>

                    		<div class="modal fade text-xs-left" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i> @yield('view-modal-card-title')</h4>
											</div>
											<div class="modal-body">
												<div class="card-block">
													<div class="card-text">
														
													</div>

													@yield('view-modal-form-body')

													<div class="form-actions center">
														@yield('view-modal-form-action')
													</div>													
												</div>
											</div>

											<!-- End of Modal Body // table-fixed-column order-column dataex-basic-initialisation-->

										</div>
									</div>
								</div> <!-- End of Modal -->

							<table class="table table-striped table-bordered multi-ordering" style="font-size:14px;width:100%;" id="table-container">
                    			<thead>
                    				<tr>
										@yield('table-head-list')
									</tr>
                    			</thead>

	                    		<tbody>
	                    			@yield('table-body-list')
	                    		</tbody>
	                    	</table>

	                    	@yield('ajax-modal')

	                    	<div class="modal fade text-xs-left" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
								<div class="modal-dialog" id="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>@yield('edit-modal-title')</h4>
										</div>

										<div class="modal-body">
											<div class="card-block">

												@yield('ajax-edit-form')

												<div class="card-text">
													
												
												</div>
													<div class="form-body">
														@yield('edit-modal-body')
													</div>

													<div class="form-actions center">
														@yield('edit-modal-action')
														
													</div>
													{!!Form::close()!!}
											</div>
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

@section('page-vendor-js')
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/spinner/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/validation/form-validation.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
	
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>

	<script>
		$("#btnAddModal").on('click', function() {
			$("#iconModal").modal('show');
		});
	</script>
@endsection

@section('page-level-js')
	<script src="{{URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
@endsection

@extends('master.master')

@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/toggle/bootstrap-switch.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/toggle/switchery.min.css') }}" />
@endsection

@section('vendor-style')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/calendars/fullcalendar.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
@endsection

@section('plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/icomoon.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/forms/selects/select2.min.css') }}" />	
@endsection

@section('template-css')
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/system-assets/css/geometry.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Users
@endsection

@section('js-setting')
	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(USERS);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Users </h2>
		<p class="text-muted mb-0"></p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Chairman</li>
		<li class="breadcrumb-item"><a href="#">Users</a></li>
	</ol>
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Users</h4>
						<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
						<div class="heading-elements">
							<ul class="list-inline mb-0">
								<li><a data-action="reload"><i class="icon-reload"></i></a></li>
								<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="card-body collapse in">
						
						<div class="card-body">
							<div class="card-block">
								<ul class="nav nav-tabs nav-linetriangle no-hover-bg nav-justified">
									<li class="nav-item">
										<a class="nav-link active" id="active-tab3" data-toggle="tab" href="#user" aria-controls="active3" aria-expanded="true">Users</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="link-tab3" data-toggle="tab" href="#pending" aria-controls="link3" aria-expanded="false">Pending User</a>
									</li>
								</ul>
								<div class="tab-content px-1 pt-1">
									<div role="tabpanel" class="tab-pane fade active in" id="user" aria-labelledby="active-tab3" aria-expanded="true">
										<table class="table table-striped table-bordered multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-users">
											<thead>
												<tr>
													<th>Name</th>
													<th>Username</th>
													<th>Position</th>
													<th>Email</th>
													<th>Document Approval</th>
													<th>Actions</th>
												</tr>
											</thead>
                                                @foreach($us as $u)
                                                    <tr align="center">
                                                        <td>{{ $u->lastName }}, {{ $u->firstName }} {{ $u->middleName }}</td>
                                                        <td>{{ $u->name }}</td>
                                                        <td>{{ $u->position }}</td>
                                                        <td>{{ $u->email }}</td>
                                                        @if($u->approval==0)
                                                            <td><input type="checkbox" id="switchery" name="sw" class="switchery" value="{{ $u->id }}"  /></td>
                                                        @else
                                                            <td><input type="checkbox" id="switchery" name="sw" class="switchery" value="{{ $u->id }}" checked/="" /></td>
                                                        @endif
                                                        
                                                        <td>
                                                            <span class="dropdown">
                                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
                                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item edit" name="btnEdit" data-value='{{ $u -> id }}'><i class="icon-pen3"></i> Edit</a>
                                                                    <a href="#" class="dropdown-item delete" name="btnDelete" data-value='{{ $u -> id }}'><i class="icon-trash4"></i> Delete</a>
                                                                </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
											<tbody>
												

											</tbody>
										</table>
									</div>
									<div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="link-tab3" aria-expanded="false">
										<table class="table table-striped table-bordered multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-pending">
											<thead>
												<tr>
													<th>Name</th>
													<th>Username</th>
													<th>Position</th>
													<th>Email</th>
													<th>Actions</th>
												</tr>
											</thead>	
											<tbody>
                                                @foreach($pendings as $u)
                                                    <tr>
                                                        <td>{{ $u->lastName }}, {{ $u->firstName }} {{ $u->middleName }}</td>
                                                        <td>{{ $u->name }}</td>
                                                        <td>{{ $u->position }}</td>
                                                        <td>{{ $u->email }}</td>
                                                        <td><a class="btn btn-success accept" data-value="{{$u->id}}"  >Accept</a>
                                                            <a class="btn btn-danger reject" data-value="{{$u->id}}"  >Reject</a></td>
                                                    </tr>
                                                @endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


	
@endsection

@section('vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
@endsection

@section('template-js')
	
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
	
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
	<!-- <script src="{{ URL::asset('/robust-assets/js/components/forms/validation/form-validation.js') }}" type="text/javascript"></script> -->

	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-checkbox.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/timehandle.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/switch.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/fullcalendar.min.js') }}" type="text/javascript"></script>
	

	<script>
		$(document).on('click', '.accept', function(e) {
			var id = $(this).data('value');
        
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

            swal({
                    title: "Are you sure you want to accept this user?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "ACCEPT",
                    closeOnConfirm: false
                },
                function(){
                    $.ajax({
                        type: "post", 
                        url: "{{ url('users/accept') }}", 
                        data: {id: id},
                        success: function(data) { 
                            swal("Success", "Successfully accepted!", "success");
                            refreshTable();
                            pendingRefresh();
                        }, 
                        error: function(data) {
                            swal("Error", "Failed!", "error");
                        }
                    });
            });



			

		});

        $(document).on('click', '.reject', function(e) {
			var id = $(this).data('value');
        
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

            swal({
                    title: "Are you sure you want to reject this user?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "REJECT",
                    closeOnConfirm: false
                },
                function(){
                    $.ajax({
                        type: "post", 
                        data: {id: id},
                        url: "{{ url('users/reject') }}", 
                        success: function(data) { 
                            swal("Success", "Successfully rejected!", "success");
                            refreshTable();
                            pendingRefresh();
                        }, 
                        error: function(data) {
                            swal("Error", "Failed!", "error");
                        }
                    });
            });

		});


        var refreshTable = function() {
			$.ajax({
				url: "{{ url('/users/refresh') }}",
				type: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-users").DataTable().clear().draw();
					data = $.parseJSON(data);
							
					for (var index in data) {
						var statusText = "";
						if (data[index].approval == 1) {
							statusText = '<input type="checkbox" id="switchery" data-size="sm" data-color="primary" class="switchery" value="'+ data[index].id +'" checked/="" />';
						}
						else {
							statusText = '<input type="checkbox" id="switchery" data-size="sm" data-color="primary" class="switchery" value="'+ data[index].id +'" />';
						}

						$("#table-users").DataTable()
							.row.add([
								data[index].lastName + ", " + data[index].firstName + " " + data[index].middleName, 
								data[index].name, 
								data[index].position, 
								data[index].email,
                                statusText, 
								'<form method="POST" id="' + data[index].id + '" action="/service-type/delete" accept-charset="UTF-8"])!!}' + 
									'<span class="dropdown">' +
										'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>' +
										'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">'+
											'<a href="#" class="dropdown-item edit" name="btnEdit" data-value="' + data[index].id + '"><i class="icon-pen3"></i> Edit</a>' +
											'<a href="#" class="dropdown-item delete" name="btnDelete" data-value="' + data[index].id + '"><i class="icon-trash4"></i> Delete</a>' +
										'</span>' +
									'</span>' +
								'</form>'
							]).draw(true);
					}
				}
			});
		};


        var pendingRefresh = function() {
			$.ajax({
				url: "{{ url('/users/pendingRefresh') }}",
				type: "GET", 
				datatype: "json", 
				success: function(data) {
					$("#table-pending").DataTable().clear().draw();
					data = $.parseJSON(data);
							
					for (var index in data) {

						$("#table-pending").DataTable()
							.row.add([
								data[index].lastName + ", " + data[index].firstName + " " + data[index].middleName, 
								data[index].name, 
								data[index].position, 
								data[index].email,
								'<a class="btn btn-success accept" data-value="'+ data[index].id +'"  >Accept</a>'+
                                '<a class="btn btn-danger reject" data-value="'+ data[index].id +'"  >Reject</a>'

							]).draw(true);
					}
				}
			});
		};

    $('#switchery').change(function(){
        var id = $(this).val();
        alert(id);
    })

	</script>

@endsection

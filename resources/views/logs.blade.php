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
	Logs
@endsection

@section('js-setting')
	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(LOGS);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Logs </h2>
		<p class="text-muted mb-0"></p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Chairman</li>
		<li class="breadcrumb-item"><a href="#">Logs</a></li>
	</ol>
@endsection

@section('content-body')
	

    
<section id="multi-column">
		
        <div class="row">
			
            <div class="col-xs-8">
				<div style="height:550px" class="card">
					<div class="card-header">
						<h4 class="card-title">Logs</h4>
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
                        <div class="default-wheel-speed scroll-example height-450 ps-container ps-theme-default ps-active-y">
                            <section id="timeline" class="timeline-left timeline-wrapper">
                                <h3 class="page-title text-xs-center text-lg-left">Timeline</h3>
                                <ul class="timeline">
                                    <li class="timeline-line"></li>
                                    
                                </ul>

                            <div id="logsTimeline">

                            @foreach($all as $al)

                                <ul class="timeline">
                                    <li class="timeline-line"></li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge">
                                            
                                            @if($al->type=="Resident")
                                                <span class="bg-blue bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Resident">
                                                <i class="icon-man-woman"></i>
                                            @elseif($al->type=="Document")
                                                <span class="bg-grey bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Document">
                                                <i class="icon-book"></i>
                                            @elseif($al->type=="Reservation")
                                                <span class="bg-orange bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Reservation">
                                                <i class="icon-clock3"></i>
                                            @elseif($al->type=="Business")
                                                <span class="bg-green bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Business">
                                                <i class="icon-office"></i>
                                            @elseif($al->type=="Service")
                                                <span class="bg-yellow bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Service">
                                                <i class="icon-plus2"></i>
                                            @elseif($al->type=="Family")
                                                <span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Family">
                                                <i class="icon-home3"></i>
                                            @else
                                                <span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Collection">
                                                <i class="icon-coin-dollar"></i>
                                            @endif
                                        </span>
                                        </div>
                                        <div class="timeline-card card border-grey border-lighten-2">
                                            <div class="card-header">
                                                <h4 class="card-title"><a href="#" data-value="{{ $al->logID }}" class="open">{{ $al->firstName }} {{ $al->lastName }} {{ $al->action }}</a>
                                                    
                                                </h4>
                                                <p class="card-subtitle text-muted pt-1">
                                                    <span class="font-small-3">{{ Carbon\Carbon::parse($al->dateOfAction)->diffForHumans() }}</span>
                                                </p>
                                            </div>
                                            
                                        </div>
                                    </li>
                                </ul>
                            @endforeach

                            </div>

                                
                            </section>
                        </div>
                        </div>
					</div>	
                </div>									
			</div>
            
            
            <div class="col-xs-4">
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
                        <div class="card-block card-dashboard">
                            <div class="list-group">
                                <a href="#" data-value="all" onclick="opencity(event)" class="list-group-item set active">All Users</a>
                                <a href="#" data-value="{{Auth::user()->id}}" onclick="opencity(event)" class="list-group-item set">You</a>
                                @foreach($usah as $usa)
                                    <a href="#" data-value="{{ $usa->id }}" onclick="opencity(event)" class="list-group-item set">{{ $usa->firstName }} {{ $usa->middleName }} {{ $usa->lastName }}</a>
                                @endforeach
                            </div>
                        </div>
					</div>	
                </div>									
			</div>    
		</div>

        <!--Open -->

        <!--Open Modal -->
        <div class="modal fade text-xs-left" id="openM" tabindex="0" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>Details</h4>
                    </div>

                    <!-- START MODAL BODY -->
                    <div class="modal-body" width='100%'>
                        
                        <div id="modalDetails">

                        </div>

                    </div>
                    <!-- End of Modal Body -->

                </div>
            </div>
        </div> 
        <!-- End of Modal -->



	</section>

	
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
	<script src="{{ URL::asset('/robust-assets/js/components/ui/scrollable.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/js/nav-js.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/timehandle.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/switch.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/extensions/fullcalendar.min.js') }}" type="text/javascript"></script>
	

	<script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.set', function(e) {
			var id = $(this).data('value');
        
			if(id=="all")
            {
                $.ajax({
                    type: "get", 
                    url: "{{ url('logs/getLogs') }}", 
                    data: {id: id},
                    success: function(data) { 
                        
                        $('#logsTimeline').html(''); 
                        data = $.parseJSON(data);

                        for (index in data) {
                            
                            var span='';

                            var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                            var date = new Date(data[index].dateOfAction);
                            var month = date.getMonth();
                            var day = date.getDate();
                            var year = date.getFullYear();
                            var d = months[month] + ' ' + day + ', ' + year;

                            var start = data[index].dateOfAction;
                            start = start.toString().substring(11);
                            
                            start = start.match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [start];
                            
                            if(start.length > 1){
                                start = start.slice(1);
                                start[5] = +start[0] < 12 ? ' AM' : ' PM';
                                start[0] = +start[0] % 12 || 12;
                            }

                            var st = start.join('');

                            if(data[index].type=="Resident")
                            {
                                span='<span class="bg-blue bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Resident">'+
                                                '<i class="icon-man-woman"></i>';
                            }
                            else if(data[index].type=="Document")
                            {
                                span='<span class="bg-grey bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Document">'+
                                                '<i class="icon-book"></i>';
                            }
                            else if(data[index].type=="Reservation")
                            {
                                span='<span class="bg-orange bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Reservation">'+
                                                '<i class="icon-clock3"></i>';
                            }
                            else if(data[index].type=="Business")
                            {
                                span='<span class="bg-green bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Business">'+
                                                '<i class="icon-office"></i>';
                            }
                            else if(data[index].type=="Service")
                            {
                                span='<span class="bg-yellow bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Service">'+
                                                '<i class="icon-plus2"></i>';
                            }
                            else if(data[index].type=="Family")
                            {
                                span='<span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Family">'+
                                                '<i class="icon-home3"></i>';
                            }
                            else
                            {
                                span='<span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Collection">'+
                                                '<i class="icon-coin-dollar"></i>';
                            }

                            $('#logsTimeline').append(
                                '<ul class="timeline">'+
                                    '<li class="timeline-line"></li>'+
                                    '<li class="timeline-item">'+
                                        '<div class="timeline-badge">'+
                                            span +
                                        '</span>'+
                                        '</div>'+
                                        '<div class="timeline-card card border-grey border-lighten-2">'+
                                            '<div class="card-header">'+
                                                '<h4 class="card-title"><a href="#" data-value="' + data[index].logID + '" class="open">' + data[index].firstName + ' ' + data[index].lastName + ' ' + data[index].action + '</a>'+
                                                    
                                                '</h4>'+
                                                '<p class="card-subtitle text-muted pt-1">'+
                                                    '<span class="font-small-3">'+ d + ', ' + st +'</span>'+
                                                '</p>'+
                                            '</div>'+
                                            
                                        '</div>'+
                                    '</li>'+
                                '</ul>'
                            );

                        }

                    }, 
                    error: function(data) {
                        swal("Error", "Failed!", "error");
                    }
                });
            }
            else
            {
                $.ajax({
                    type: "get", 
                    url: "{{ url('logs/getUserLogs') }}", 
                    data: {id: id},
                    success: function(data) { 
                        $('#logsTimeline').html('');       
                        data = $.parseJSON(data);

                        for (index in data) {
                            
                            var span='';

                            var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                            var date = new Date(data[index].dateOfAction);
                            var month = date.getMonth();
                            var day = date.getDate();
                            var year = date.getFullYear();
                            var d = months[month] + ' ' + day + ', ' + year;

                            var start = data[index].dateOfAction;
                            start = start.toString().substring(11);
                            
                            start = start.match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [start];
                            
                            if(start.length > 1){
                                start = start.slice(1);
                                start[5] = +start[0] < 12 ? ' AM' : ' PM';
                                start[0] = +start[0] % 12 || 12;
                            }

                            var st = start.join('');

                            if(data[index].type=="Resident")
                            {
                                span='<span class="bg-blue bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Resident">'+
                                                '<i class="icon-man-woman"></i>';
                            }
                            else if(data[index].type=="Document")
                            {
                                span='<span class="bg-grey bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Document">'+
                                                '<i class="icon-book"></i>';
                            }
                            else if(data[index].type=="Reservation")
                            {
                                span='<span class="bg-orange bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Reservation">'+
                                                '<i class="icon-clock3"></i>';
                            }
                            else if(data[index].type=="Business")
                            {
                                span='<span class="bg-green bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Business">'+
                                                '<i class="icon-office"></i>';
                            }
                            else if(data[index].type=="Service")
                            {
                                span='<span class="bg-yellow bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Service">'+
                                                '<i class="icon-plus2"></i>';
                            }
                            else if(data[index].type=="Family")
                            {
                                span='<span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Family">'+
                                                '<i class="icon-home3"></i>';
                            }
                            else
                            {
                                span='<span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Collection">'+
                                                '<i class="icon-coin-dollar"></i>';
                            }

                            $('#logsTimeline').append(
                                '<ul class="timeline">'+
                                    '<li class="timeline-line"></li>'+
                                    '<li class="timeline-item">'+
                                        '<div class="timeline-badge">'+
                                           span +
                                        '</span>'+
                                        '</div>'+
                                        '<div class="timeline-card card border-grey border-lighten-2">'+
                                            '<div class="card-header">'+
                                                '<h4 class="card-title"><a href="#" data-value="' + data[index].logID + '" class="open">' + data[index].firstName + ' ' + data[index].lastName + ' ' + data[index].action + '</a>'+
                                                    
                                                '</h4>'+
                                                '<p class="card-subtitle text-muted pt-1">'+
                                                    '<span class="font-small-3">'+ d + ', ' + st +'</span>'+
                                                '</p>'+
                                            '</div>'+
                                            
                                        '</div>'+
                                    '</li>'+
                                '</ul>'
                            ); 

                        }

                    }, 
                    error: function(data) {
                        swal("Error", "Failed!", "error");
                    }
                });
            }

		});

        $(document).on('click', '.open', function(e) {
			var id = $(this).data('value');
            
            $('#openM').modal('show');
			

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
							statusText = '<input type="checkbox" id="switchery" name="sw" class="switchery" value="'+ data[index].id +'" checked/="" />';
						}
						else {
							statusText = '<input type="checkbox" id="switchery" name="sw" class="switchery" value="'+ data[index].id +'" />';
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

    $('#myList').on('change','#switchery',function(e){
        var id = $(this).val();

        if(this.checked == true)
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/approve') }}", 
                success: function(data) { 
                    console.log('approved');
                    
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        else
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/restrict') }}", 
                success: function(data) { 
                    console.log('restricted');
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        
        
    })

	$('#list').on('change','#switcheryApproval',function(e){
        var id = $(this).val();

        if(this.checked == true)
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/approvalAllow') }}", 
                success: function(data) { 
                    console.log('allowed');
                    
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        else
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/approvalRestrict') }}", 
                success: function(data) { 
                    console.log('restricted');
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        
        
    })

	$('#list').on('change','#switcheryResident',function(e){
        var id = $(this).val();

        if(this.checked == true)
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/residentAllow') }}", 
                success: function(data) { 
                    console.log('allowed');
                    
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        else
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/residentRestrict') }}", 
                success: function(data) { 
                    console.log('restricted');
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        
        
    })

	$('#list').on('change','#switcheryRequest',function(e){
        var id = $(this).val();

        if(this.checked == true)
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/requestAllow') }}", 
                success: function(data) { 
                    console.log('allowed');
                    
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        else
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/requestRestrict') }}", 
                success: function(data) { 
                    console.log('restricted');
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        
        
    })

	$('#list').on('change','#switcheryReservation',function(e){
        var id = $(this).val();

        if(this.checked == true)
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/reservationAllow') }}", 
                success: function(data) { 
                    console.log('allowed');
                    
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        else
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/reservationRestrict') }}", 
                success: function(data) { 
                    console.log('restricted');
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        
        
    })

	$('#list').on('change','#switcheryService',function(e){
        var id = $(this).val();

        if(this.checked == true)
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/serviceAllow') }}", 
                success: function(data) { 
                    console.log('allowed');
                    
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        else
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/serviceRestrict') }}", 
                success: function(data) { 
                    console.log('restricted');
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        
        
    })

	$('#list').on('change','#switcherySponsorship',function(e){
        var id = $(this).val();

        if(this.checked == true)
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/sponsorshipAllow') }}", 
                success: function(data) { 
                    console.log('allowed');
                    
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        else
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/sponsorshipRestrict') }}", 
                success: function(data) { 
                    console.log('restricted');
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        
        
    })

	$('#list').on('change','#switcheryBusiness',function(e){
        var id = $(this).val();

        if(this.checked == true)
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/businessAllow') }}", 
                success: function(data) { 
                    console.log('allowed');
                    
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        else
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/businessRestrict') }}", 
                success: function(data) { 
                    console.log('restricted');
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        
        
    })

	$('#list').on('change','#switcheryCollection',function(e){
        var id = $(this).val();

        if(this.checked == true)
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/collectionAllow') }}", 
                success: function(data) { 
                    console.log('allowed');
                    
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        else
        {
            $.ajax({
                type: "post", 
                data: {id: id},
                url: "{{ url('users/collectionRestrict') }}", 
                success: function(data) { 
                    console.log('restricted');
                }, 
                error: function(data) {
                    swal("Error", "Failed!", "error");
                }
            });
        }
        
        
    })

    function opencity(evt) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("set");
        

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("set");
        for (i = 0; i < tabcontent.length; i++) {
            tablinks[i].classList.remove("active");
        }

        // Show the current tab, and add an "active" class to the link that opened the tab
        evt.currentTarget.classList.add("active");
    }

	</script>

@endsection

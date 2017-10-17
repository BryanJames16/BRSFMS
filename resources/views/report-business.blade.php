@extends("master.base_reports")

<!-- Title of the Page -->
@section('title')
	Reports: Registered Businesses
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')
	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(REPORT_BUSINESS);
	</script>
@endsection

@section('report-name')
    Reports: Registered Businesses
@endsection

@section('card-body')
<div class="card-body collapse in">
    <div class="card-block card-dashboard">
        <div style="border:1px solid black;padding:10px;width:500px;margin:auto" align="center">
            {{ Form::open(['url' => '/reports/collection/fetch', 
                            'method' => 'GET', 
                            'id' => 'GenRep']) }}
            <h4>From(Date Registered):</h4>
            <div style="padding-left:120px">
                
                <div  class="input-group">
                    <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                    {{ Form::text('start-date', null, 
                            ['class' => 'form-control dp-month-year', 
                             'id' => 'min-date-id',
                             'style' => 'width:200px;',
                             'align' => 'center']) }}
                </div>
            </div>

            <h4>To:</h4>
            <div style="padding-left:120px">
                
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                    {{ Form::text('end-date', null, 
                            ['class' => 'form-control dp-month-year', 
                             'id' => 'quota-date-id',
                              'style' => 'width:200px;',
                             'align' => 'center']) }}
                </div>
            </div>
            <br>

            <div>
            <span>    
                
                    <a href="#" class="btn btn-info" id="printRange">Print(Ranged Date)</a>
              
                
                    <a href="#" class="btn btn-info" id="printAll">Print(All)</a><br><br>

                    <a href="#" class="btn btn-warning" id="previewRange">Preview(Ranged Date)</a>
              
                
                    <a href="#" class="btn btn-warning" id="previewAll">Preview(All)</a>
                
            </span>
            </div>

            {{ Form::close() }}
        </div>	

        <br >
        <p >
            <h4 align="center">Preview:</h4>
            <iframe id="iframe" style="width:100%;height:100%" frameborder="1" src="/reports/business/previewAll"></iframe>
        </p>
    </div>
</div>
@endsection


@section('page-level-js')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#quota-date-id").datepicker({maxDate: '0'});

            $("#min-date-id").click(function() {
                if ($("#quota-date-id").val().length = 0) {
                    $("#min-date-id").datepicker({maxDate: '0'});
                }
                else {
                    var qotDat = $("#quota-date-id").val().split("/");
                    $("#min-date-id").datepicker({maxDate: new Date(qotDat[2], qotDat[0], qotDat[1])});
                }
            });

            $("#quota-date-id").click(function() {
                if ($("#min-date-id").val().length = 0) {
                    $("#quota-date-id").datepicker({maxDate: '0'});
                }
                else {
                    var qotDat = $("#min-date-id").val().split("/");
                    $("#quota-date-id").datepicker({minDate: new Date(qotDat[2], qotDat[0], qotDat[1])});
                }
            });
        });

        $(document).on('click', '#printAll', function(e) {

            swal({
                    title: "Are you sure you want to print this report?",
                    text: "Generate pdf",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "DOWNLOAD",
                    closeOnConfirm: false
                    },
                    function() {

                        $.ajax({
                            url: '{{ url("/reports/business/printAll") }}', 
                            method: 'GET', 
                            async: false, 
                            success: function (data) {
                                swal("Successfull", "Download Successful!", "success");
                            }, 
                            error: function (errors) {
                                var message = "Errors: ";
                                var data = errors.responseJSON;
                                for (datum in data) {
                                    message += data[datum];
                                }
                            }
                        });

                    });	
            
            
            
        });

        $(document).on('click', '#printRange', function(e) {

            var splitter = $("#min-date-id").val().split("/");

            var fDate = splitter[2] + '-' + splitter[0] + '-' + splitter[1]; 

            splitter = $("#quota-date-id").val().split("/");

            var tDate= splitter[2] + '-' + splitter[0] + '-' + splitter[1];

            if($("#min-date-id").val()=='' || $("#quota-date-id").val()=='')
            {
                swal("Invalid", "You must set the dates first!", "error");
            }
            else
            {
                swal({
                    title: "Are you sure you want to print this report?",
                    text: "Generate pdf",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "DOWNLOAD",
                    closeOnConfirm: false
                    },
                    function() {

                        $.ajax({
                            url: '{{ url("/reports/business/printRange") }}', 
                            method: 'GET', 
                            data: {
                                'fromDate': fDate,
                                'toDate': tDate
                            }, 
                            success: function (data) {
                                swal("Successfull", "Download Successful!", "success");
                            }, 
                            error: function (errors) {
                                var message = "Errors: ";
                                var data = errors.responseJSON;
                                for (datum in data) {
                                    message += data[datum];
                                }
                            }
                        });

                    });	
            }

            
            
            
            
        });

        $(document).on('click', '#previewRange', function(e) {
            event.preventDefault();

            var splitter = $("#min-date-id").val().split("/");

            var fDate = splitter[2] + '-' + splitter[0] + '-' + splitter[1]; 

            splitter = $("#quota-date-id").val().split("/");

            var tDate= splitter[2] + '-' + splitter[0] + '-' + splitter[1];

            if($("#min-date-id").val()=='' || $("#quota-date-id").val()=='')
            {
                   swal("Invalid", "You must set the dates first!", "error");             

            }
            else{
                $('#iframe').attr('src','/reports/business/previewRange/'+ fDate +'/'+ tDate)
            }

            
          
        });

        $(document).on('click', '#previewAll', function(e) {
            event.preventDefault();

            
            $('#iframe').attr('src','/reports/business/previewAll');
          
        });


    </script>
@endsection

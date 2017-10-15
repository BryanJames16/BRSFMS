@extends("master.base_reports")

<!-- Title of the Page -->
@section('title')
	Reports: Persons With Disability
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')
	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(REPORT_PWD);
	</script>
@endsection

@section('report-name')
    Reports: Persons With Disability
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
                
                    {{ Form::submit('Generate(Range Date)', ['class' => 'btn btn-success']) }}
              
                
                    <a href="#" class="btn btn-info" id="all">Generate(All)</a>
                
            </span>
            </div>

            {{ Form::close() }}
        </div>	

        <br >
        <p >
            <h4 align="center">Preview:</h4>
            <iframe style="width:100%;height:80%" frameborder="1" src="/report/pwd"></iframe>
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

        $(document).on('click', '#all', function(e) {
            $.ajax({
					url: '{{ url("/report/pwd/generate") }}', 
					method: 'GET', 
					async: false, 
					success: function (data) {

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

        $("#GenRep").submit(function(event) {
            event.preventDefault();

            var splitter = $("#min-date-id").val().split("/");
            var minDat = new Date(splitter[2], splitter[0], splitter[1]);
            splitter = $("#quota-date-id").val().split("/");
            var qotDate = new Date(splitter[2], splitter[0], splitter[1]);

            alert(splitter);
            
        });


    </script>
@endsection

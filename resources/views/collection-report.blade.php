@extends("master.base_reports")

<!-- Title of the Page -->
@section('title')
	Reports: Collection
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')
	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(REPORT_COLLECTION);
	</script>
@endsection

@section('report-name')
    Reports: Collection
@endsection

@section('card-body')
<div class="card-body collapse in">
    <div class="card-block card-dashboard">
        <p align="center">
            {{ Form::open(['url' => '/reports/collection/fetch', 
                            'method' => 'GET', 
                            'id' => 'GenRep']) }}

            <div class="col-md-4">
                <h4>From:</h4>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                    {{ Form::text('start-date', null, 
                            ['class' => 'form-control dp-month-year', 
                             'id' => 'min-date-id']) }}
                </div>
            </div>

            <div class="col-md-4">
                <h4>To:</h4>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                    {{ Form::text('end-date', null, 
                            ['class' => 'form-control dp-month-year', 
                             'id' => 'quota-date-id']) }}
                </div>
            </div>

            <div class="col-md-4">
                <h4>Proceed:</h4>
                <div class="input-group">
                    {{ Form::submit('Generate Report', ['class' => 'btn btn-success']) }}
                </div>
            </div>

            {{ Form::close() }}
        </p>	

        <br />
        <br />
        <br />
        <br />

        <p align="center" id="Tabular-Report">
            <div class="tab-content px-1 pt-1">
                <div class="fade in" id="all" aria-labelledby="active-tab3" aria-expanded="true">
                    <table class="table table-striped table-bordered multi-ordering dataTable no-footer" style="font-size:14px;width:100%;" id="table-all">
                        <thead>
                            <tr>
                                <th>Collection ID</th>
                                <th>Collected From</th>
                                <th>Client</th>
                                <th>Date and Time</th>
                                <th>Amount</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </p>
    </div>
</div>
@endsection


@section('page-level-js')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#quota-date-id").datepicker({maxDate: '0'});

            $("#min-date-id").click(function() {
                if ($("#quota-date-id").val().length() = 0) {
                    $("#min-date-id").datepicker({maxDate: '0'});
                }
                else {
                    var qotDat = $("#quota-date-id").val().split("/");
                    $("#min-date-id").datepicker({maxDate: new Date(qotDat[2], qotDat[0], qotDat[1])});
                }
            });

            $("#quota-date-id").click(function() {
                if ($("#min-date-id").val().length() = 0) {
                    $("#quota-date-id").datepicker({maxDate: '0'});
                }
                else {
                    var qotDat = $("#min-date-id").val().split("/");
                    $("#quota-date-id").datepicker({minDate: new Date(qotDat[2], qotDat[0], qotDat[1])});
                }
            });
        });

        $("#GenRep").submit(function(event) {
            event.preventDefault();

            var splitter = $("#min-date-id").val().split("/");
            var minDat = new Date(splitter[2], splitter[0], splitter[1]);
            splitter = $("#quota-date-id").val().split("/");
            var qotDate = new Date(splitter[2], splitter[0], splitter[1]);
        });
    </script>
@endsection

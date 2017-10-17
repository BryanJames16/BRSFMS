@extends("master.base_reports")

<!-- Title of the Page -->
@section('title')
	Reports: Service Sponsors
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')
	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(REPORT_SPONSOR);
	</script>
@endsection

@section('report-name')
    Reports: Service Sponsors
@endsection

@section('card-body')
<div class="card-body collapse in">
    <div class="card-block card-dashboard">
        <div style="border:1px solid black;padding:10px;width:500px;margin:auto" align="center">
            {{ Form::open(['url' => '/reports/collection/fetch', 
                            'method' => 'GET', 
                            'id' => 'GenRep']) }}
            <h4>SERVICE:</h4>
            <div>
                
                <div  class="input-group" align="center">
                    <select class ='select2 form-control' name='type' id="id" style="width:100%">
                        @foreach($services as $s)
                        <option value="{{$s->serviceTransactionPrimeID}}">{{$s->serviceName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            
            <br>

            <div>
            <span>    
                
                    <a href="#" class="btn btn-info" id="print">Print</a>
                
                    <a href="#" class="btn btn-warning" id="preview">Preview</a>
                
            </span>
            </div>

            {{ Form::close() }}
        </div>	

        <br >
        <p >
            <h4 align="center">Preview:</h4>
            <iframe id="iframe" style="width:100%;height:100%" frameborder="1" src=""></iframe>
        </p>
    </div>
</div>
@endsection


@section('page-level-js')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#id').select2();
            $('#iframe').attr('src','/reports/sponsor/preview/'+ $('#id').val());
            
        });

        
        

        $(document).on('click', '#print', function(e) {
            event.preventDefault();
          
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
                        url: '{{ url("/reports/sponsor/print") }}', 
                        method: 'GET', 
                        data: {
                            'id': $('#id').val()
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
            
            
            
            
            
        });

        $(document).on('click', '#preview', function(e) {
            event.preventDefault();
            $('#iframe').attr('src','/reports/sponsor/preview/'+ $('#id').val());
            
        });



    </script>

    
@endsection

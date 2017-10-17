<html>

    <head>
    
        <title>Collection Report</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>


    </head>
    
    <body>
    
        @foreach($regs as $reg)
        <div style="width:900px;height:595px;margin:auto;padding:20px">
            
            
            <div style="float:left;width:100px;height:100px">
                <img id="brgy" src="/storage/upload/{{$util->brgyLogoPath}}" width="100%"></img>
            </div>

            <div style="float:right;width:100px;height:100px">
                <img src="/storage/upload/{{$util->provLogoPath}}" width="100%"></img>
            </div>

            <div align="center" style="float:center;width:500px;margin:auto">
                <h3>Republic of the Philippines<br>
                    District VI, City of Manila<br>
                    {{ $util -> barangayName }} <br>
                    {{ $util -> address }}
                </h3>
                <br>
                <br>
                <br>
                <h1>
                    BARANGAY BUSINESS CLEARANCE
                </h1>
            </div>

            

            <br>
            <br>
            <br>
            <br>

            <div style="font-size:20px;width:600px;text-align:justify;margin:auto">
                <span style="float:left;width:250px;">
                    <label align="left">BBC ID: 072</label>
                </span>
                <span style="float:right;width:300px;text-align:right">
                    <label align="right">Date:{{ date('F j, Y',strtotime($reg ->registrationDate)) }}</label>
                </span>
                
                <br>
                <br>
                <br>
                <p style="text-indent:50px">This is to certify that {{strtoupper($reg->firstName)}} {{substr($reg->middleName,0,1)}}. {{strtoupper($reg->lastName)}}
                    with business name {{strtoupper($reg->originalName)}} with business address {{strtoupper($reg->address)}} has been granted
                    a BUSINESS CLEARANCE to operate the following business/establishment under the Local Government
                    Code, subject to pertinent ordinances, laws and related administrative implementation regulation.
                </p>

                <br>
                <br>

                <div>
                    <label>VALID UNTIL: {{ date('F j, Y',strtotime($reg ->removalDate)) }}</label>
                </div>

                <br>
                <br>

                <div>
                    <label>KIND OF BUSINESS: {{ $reg ->categoryName }}</label>
                </div>
            </div>

            
            
        </div>
    
    
    
    <script src="{{ URL::asset('/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
    </script>

    
    <script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
    
    
    <script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
    
    
	
    @endforeach
    </body>
    

</html>
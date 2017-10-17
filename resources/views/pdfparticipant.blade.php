<html>

    <head>
    
        <title>Service Participants Report</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>


    </head>
    
    <body>
    
  
        <div style="width:900px;height:595px;margin:auto;">
            
            
            <div style="float:left;width:150px;height:150px">
                <img id="brgy" src="{{ public_path('storage/upload/brgy_logo.png')}}" width="100%"></img>
            </div>

            <div style="float:right;width:150px;height:150px">
                <img src="{{ public_path('storage/upload/ManilaSeal.png')}}" width="100%"></img>
            </div>

            <div align="center" style="float:center;width:500px;margin:auto">
                <h5>Republic of the Philippines<br>
                    District VI, City of Manila<br>
                    {{ $util -> barangayName }} <br>
                    {{ $util -> address }}
                </h5>
                <br>
                <br>
                <h3>
                    Service Participants Report
                </h3>
            </div>

            
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

           <div>
                <h2>Service: {{ $name }}</h2>
           </div>
           

           

            <table id="tbl" style="font-size:15px;margin:auto;padding:10px;border-collapse:collapse;width:100%;table-layout:fixed;border:1px solid black">

                <thead style="border:1px solid black;text-align:center;width:100%">
                    <tr>
                        <th style="width:25%;border:1px solid black">Name</th>
                        <th style="width:15%;border:1px solid black">Service</th>
                        <th style="width:20%;border:1px solid black">Date</th>
                        <th style="width:15%;border:1px solid black">Age Bracket</th>
                        <th style="width:10%;border:1px solid black">Participant</th>
                        <th style="width:10%;border:1px solid black">Recipient</th>
                    </tr>
                </thead>
                <tbody id="body" style="text-align:center;width:100%">
                    
                    @foreach($services as $sss)
                        <tr>
                            
                                <td style="border:1px solid black">{{ $sss->serviceTransactionName }}</td>
                                <td style="border:1px solid black">{{ $sss->serviceName }}</td>
                                @if($sss -> toDate==null)
                                    <td style="border:1px solid black">{{ date('F j, Y',strtotime($sss -> fromDate)) }}</td>
                                @else
                                    <td style="border:1px solid black">{{ date('F j, Y',strtotime($sss -> fromDate)) }} - {{ date('F j, Y',strtotime($sss -> toDate)) }}</td>
                                @endif

                                @if($sss->fromAge==null)
                                    <td style="border:1px solid black">Open</td>
                                @else
                                    <td style="border:1px solid black">{{$sss->fromAge}} - {{$sss->toAge}} yrs. old</td>
                                @endif
                                <td style="border:1px solid black">{{ $sss->participant }}</td>
                                
                                @foreach($recipient as $rec)
                                    @if($rec->serviceTransactionPrimeID == $sss->serviceTransactionPrimeID)
                                        <td style="border:1px solid black">{{$rec-> recipient}}</td>
                                    
                                    @endif
                                @endforeach
                            
                        </tr>
                    @endforeach
                    <tr style="width:10%;border:1px solid black">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right">Total Services: </td>
                        <td style="width:10%;border:1px solid black">{{$total}}</td>
                    </tr>
                    <tr style="width:10%;border:1px solid black">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right">Total Participants: </td>
                        <td style="width:10%;border:1px solid black">{{$totalPart}}</td>
                    </tr>
                    <tr style="width:10%;border:1px solid black">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right">Total Recipients: </td>
                        <td style="width:10%;border:1px solid black"> {{$totalRec}}</td>
                    </tr>

                   
                    
                </tbody>

            </table>
            
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
    
    
	

    </body>
    

</html>
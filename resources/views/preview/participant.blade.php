<html>

    <head>
    
        <title>Service Participants Report</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>


    </head>
    
    <body>
    
  
        <div style="width:800px;height:595px;margin:auto;padding:20px">
            
            
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
                <h1>
                    Service Participants Report
                </h1>
            </div>

            
            <br>
            <br>
            <br>
            <br>
            <br>

           <div>
                <h2>Service: {{ $name->serviceName }}</h2>
           </div>
           <div>
                <h2>Date: 
                    @if($name -> toDate==null)
                        {{ date('F j, Y',strtotime($name -> fromDate)) }}
                    @else
                        {{ date('F j, Y',strtotime($name -> fromDate)) }} - {{ date('F j, Y',strtotime($name -> toDate)) }}
                    @endif
                </h2>
           </div>
           <div>
                
                <h2>Age Bracket: 
                @if($name->fromAge==null)
                    Open
                @else
                    {{$name->fromAge}} - {{$name->toAge}} yrs. old
                @endif
                </h2>
           </div>
           

           

            <table id="tbl" style="font-size:15px;margin:auto;padding:10px;border-collapse:collapse;width:100%;table-layout:fixed;border:1px solid black">

                <thead style="border:1px solid black;text-align:center;width:100%">
                    <tr>
                        <th style="width:25%;border:1px solid black">Name</th>
                        <th style="width:10%;border:1px solid black">Gender</th>
                        <th style="width:10%;border:1px solid black">Age</th>
                        <th style="width:20%;border:1px solid black">Address</th>
                        <th style="width:20%;border:1px solid black">Contact Number</th>
                        <th style="width:20%;border:1px solid black">Disabilities</th>
                    </tr>
                    <tr>
                        
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="border:1px solid black">Recipient</th>
                        <th style="border:1px solid black">Quantity</th>

                    </tr>
                    <tr>
                        
                    </tr>
                </thead>
                <tbody id="body" style="text-align:center;width:100%">
                    
                    @foreach($participants as $p)
                        <tr style="border:1px solid black">
                            <td>{{ $p->firstName }} {{ substr($p->middleName,0,1) }}. {{ $p->lastName }}</td>
                            @if($p->gender=='M')
                                <td>Male</td>
                            @else
                                <td>Female</td>
                            @endif
                            <td>{{ Carbon\Carbon::parse($p->birthDate)->diffInYears(Carbon\Carbon::now()) }} yrs. old</td>
                            <td>{{$p->address}}</td>
                            <td>{{$p->contactNumber}}</td>
                            <td>{{$p->disabilities}}</td>
                        </tr>
                        @foreach($recipients as $r)
                        @if($r->participantID == $p->participantID)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $r->recipientName }}</td>
                                <td>{{$r->quantity}}</td>
                            </tr>
                        @endif
                    @endforeach
                    @endforeach
                    
                    <tr style="width:10%;border:1px solid black">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right">Total Participants: </td>
                        <td style="width:10%;border:1px solid black">{{$totalParticipants}}</td>
                    </tr>
                    <tr style="width:10%;border:1px solid black">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right">Total Recipients: </td>
                        <td style="width:10%;border:1px solid black">{{$totalRecipients}}</td>
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
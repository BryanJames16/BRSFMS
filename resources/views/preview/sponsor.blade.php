<html>

    <head>
    
        <title>Service Sponsors Report</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>


    </head>
    
    <body>
    
  
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
                <h1>
                    Service Sponsors Report
                </h1>
            </div>

            
            <br>
            <br>
            <br>

           
            <h4>Service: {{ $name->serviceName }}</h4>
           
           
            <h4>Date: 
                @if($name -> toDate==null)
                    {{ date('F j, Y',strtotime($name -> fromDate)) }}
                @else
                    {{ date('F j, Y',strtotime($name -> fromDate)) }} - {{ date('F j, Y',strtotime($name -> toDate)) }}
                @endif
            </h4>
           
           
                
            <h4>Age Bracket: 
            @if($name->fromAge==null)
                Open
            @else
                {{$name->fromAge}} - {{$name->toAge}} yrs. old
            @endif
            </h4>
           
           

           

            <table id="tbl" style="font-size:15px;margin:auto;padding:10px;border-collapse:collapse;width:100%;table-layout:fixed;border:1px solid black">

                <thead style="border:1px solid black;text-align:center;width:100%">
                    <tr>
                        <th style="width:25%;border:1px solid black">Name</th>
                        <th style="width:20%;border:1px solid black">Email</th>
                        <th style="width:10%;border:1px solid black">Contact Number</th>
                        <th style="width:15%;border:1px solid black">Residency</th>
                        <th style="width:15%;border:1px solid black">Date Sponsored</th>
                    </tr>
                    <tr>
                        
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="border:1px solid black">Item</th>
                        <th style="border:1px solid black">Quantity</th>

                    </tr>
                </thead>
                <tbody id="body" style="text-align:center;width:100%">
                    
                    @foreach($sponsorsRes as $p)
                        <tr style="border:1px solid black">
                            <td>{{ $p->firstName }} {{ substr($p->middleName,0,1) }}. {{ $p->lastName }}</td>
                            <td>{{$p->email}}</td>
                            <td>{{$p->contactNumber}}</td>
                            <td>Resident</td>
                            <td>{{ date('F j, Y',strtotime($p -> dateSponsored)) }}</td>
                        </tr>
                        @foreach($items as $i)
                            @if($i->sponsorID == $p->sponsorID)
                                <tr style="border:1px solid black">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $i->itemName }}</td>
                                    <td>{{ $i->quantity }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    @foreach($sponsorsNonRes as $p)
                        <tr style="border:1px solid black">
                            <td>{{ $p->firstName }} {{ substr($p->middleName,0,1) }}. {{ $p->lastName }}</td>
                            <td>{{$p->email}}</td>
                            <td>{{$p->contactNumber}}</td>
                            <td>Non-Resident</td>
                            <td>{{ date('F j, Y',strtotime($p -> dateSponsored)) }}</td>
                        </tr>
                        @foreach($items as $i)
                            @if($i->sponsorID == $p->sponsorID)
                                <tr style="border:1px solid black">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $i->itemName }}</td>
                                    <td>{{ $i->quantity }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    
                    
                    <tr style="width:10%;border:2px solid black">
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right">Total Sponsors: </td>
                        <td style="width:10%;border:1px solid black">{{$totalSponsors}}</td>
                    </tr>
                    <tr style="width:10%;border:2px solid black">
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right">Total Items: </td>
                        <td style="width:10%;border:1px solid black">{{$totalItems}}</td>
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
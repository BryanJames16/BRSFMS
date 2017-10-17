<html>

    <head>
    
        <title>Registered Businesses Report</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>


    </head>
    
    <body>
    
  
        <div style="width:900px;height:595px;margin:auto;padding:20px">
            
            
            <div style="float:left;width:100px;height:100px;">
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
                    Registered Businesses Report
                </h1>
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

            @if($fromDate != null)
           <div>
                <h2>Date Registered: {{ date('F j, Y',strtotime($fromDate)) }} - {{ date('F j, Y',strtotime($toDate)) }}</h2>
           </div>
           @else
           <div>
                <h2>Date Registered: All</h2>
           </div>
           @endif

           

            <table id="tbl" style="font-size:15px;margin:auto;padding:10px;border-collapse:collapse;width:100%;table-layout:fixed">

                <thead style="border:1px solid black;text-align:center;width:100%">
                    <tr>
                        <th style="width:15%;border:1px solid black">Business ID</th>                        
                        <th style="width:20%;border:1px solid black">Business Name</th>
                        <th style="width:20%;border:1px solid black">Address</th>
                        <th style="width:15%;border:1px solid black">Date Registered</th>
                        <th style="width:20%;border:1px solid black">Owner</th>
                        <th style="width:10%;border:1px solid black">Category</th>
                        <th style="width:15%;border:1px solid black">Expiration Date</th>
                    </tr>
                </thead>
                <tbody id="body" style="text-align:center;width:100%">
                    @foreach($regs as $r)
                        <tr>
                            
                                <td style="border:1px solid black">{{ $r->businessID }}</td>
                                <td style="border:1px solid black">{{ $r->originalName }}</td>
                                <td style="border:1px solid black">{{ $r->address }}</td>
                                <td style="border:1px solid black">{{ date('F j, Y',strtotime($r->registrationDate)) }}</td>
                                <td style="border:1px solid black">{{ $r->firstName }} {{ substr($r->middleName,0,1) }}. {{ $r->lastName }}</td>
                                <td style="border:1px solid black">{{ $r->categoryName }}</td>
                                <td style="border:1px solid black">{{ date('F j, Y',strtotime($r->removalDate)) }}</td>
                            
                        </tr>
                    @endforeach
                    @foreach($regsN as $r)
                        <tr>
                            
                                <td style="border:1px solid black">{{ $r->businessID }}</td>
                                <td style="border:1px solid black">{{ $r->originalName }}</td>
                                <td style="border:1px solid black">{{ $r->address }}</td>
                                <td style="border:1px solid black">{{ date('F j, Y',strtotime($r->registrationDate)) }}</td>
                                <td style="border:1px solid black">{{ $r->firstName }} {{ substr($r->middleName,0,1) }}. {{ $r->lastName }}</td>
                                <td style="border:1px solid black">{{ $r->categoryName }}</td>
                                <td style="border:1px solid black">{{ date('F j, Y',strtotime($r->removalDate)) }}</td>
                            
                        </tr>
                    @endforeach
                    <tr style="border:1px solid black">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right">Total Businesses: </td>
                        <td style="border:1px solid black">{{ $total }}</td>
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
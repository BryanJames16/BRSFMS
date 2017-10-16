<html>

    <head>
    
        <title>Registered Residents Report</title>
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
                    Registered Residents Report
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

            @if($fromDate != null)
           <div>
                <h4>Date Registered: {{ date('F j, Y',strtotime($fromDate)) }} - {{ date('F j, Y',strtotime($toDate)) }}</h4>
           </div>
           @else
           <div>
                <h4>Date Registered: All</h4>
           </div>
           @endif

           

            <table id="tbl" style="font-size:15px;margin:auto;padding:10px;border-collapse:collapse;width:100%;table-layout:fixed">

                <thead style="border:1px solid black;text-align:center;width:100%">
                    <tr>
                        <th style="width:25%;border:1px solid black">Name</th>
                        <th style="width:25%;border:1px solid black">Address</th>
                        <th style="width:15%;border:1px solid black">Contact</th>
                        <th style="width:5%;border:1px solid black">Age</th>
                        <th style="width:8%;border:1px solid black">Gender</th>
                        <th style="width:25%;border:1px solid black">Email</th>
                        <th style="width:20%;border:1px solid black">Date Registered</th>
                    </tr>
                </thead>
                <tbody id="body" style="text-align:center;width:100%">
                    @foreach($residents as $rrr)
                        <tr>
                            
                                <td style="border:1px solid black">{{ $rrr->firstName }} {{ $rrr->middleName }} {{ $rrr->lastName }}</td>
                                <td style="border:1px solid black">{{ $rrr->address }}</td>
                                <td style="border:1px solid black">{{ $rrr->contactNumber }}</td>
                                <td style="border:1px solid black">{{ Carbon\Carbon::parse($rrr->birthDate)->diffInYears(Carbon\Carbon::now()) }}</td>
                                @if($rrr->gender=='M')
                                    <td style="border:1px solid black">Male</td>
                                @else
                                    <td style="border:1px solid black">Female</td>
                                @endif
                                <td style="border:1px solid black">{{ $rrr->email }}</td>
                                <td style="border:1px solid black">{{ date('F j, Y',strtotime($rrr->dateReg)) }}</td>
                            
                        </tr>
                    @endforeach
                    <tr style="border:1px solid black">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right">TOTAL Residents: </td>
                        <td style="border:1px solid black">{{ $total }}</td>
                    </tr>
                    <tr style="border:1px solid black">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right">TOTAL MALE: </td>
                        <td style="border:1px solid black">{{ $totalMale }}</td>
                    </tr>
                    <tr style="border:1px solid black">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right">TOTAL FEMALE: </td>
                        <td style="border:1px solid black">{{ $totalFemale }} </td>
                    </tr>
                    <tr style="border:1px solid black">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align:right">AVERAGE AGE OF RESIDENTS: </td>
                        <td style="border:1px solid black">{{ $ave }} yrs. old</td>
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
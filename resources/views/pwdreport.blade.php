<html>

    <head>
    
        <title>PWD Report</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    </head>
    
    <body onload="aveg()">
    
    @foreach($util as $u)
        <div style="width:900px;height:595px;margin:auto;">
            
            
            <div style="float:left;width:150px;height:150px">
                <img src="{{ public_path('storage/upload/brgy_logo.png')}}" width="100%"></img>
            </div>

            <div style="float:right;width:150px;height:150px">
                <img src="{{ public_path('storage/upload/ManilaSeal.png')}}" width="100%"></img>
            </div>

            <div align="center" style="float:center;width:500px;margin:auto">
                <h5>Republic of the Philippines<br>
                    District VI, City of Manila<br>
                    {{ $u -> barangayName }} <br>
                    {{ $u -> address }}
                </h5>
                <h3>
                    Persons With Disability Report
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

            <table id="tbl" style="font-size:15px;margin:auto;padding:10px;border-collapse:collapse;width:100%;table-layout:fixed">

                <thead style="border:1px solid black;text-align:center;width:100%">
                    <tr>
                        <th style="width:25%;border:1px solid black">Name</th>
                        <th style="width:25%;border:1px solid black">Address</th>
                        <th style="width:15%;border:1px solid black">Contact</th>
                        <th style="width:5%;border:1px solid black">Age</th>
                        <th style="width:8%;border:1px solid black">Gender</th>
                        <th style="width:25%;border:1px solid black">Email</th>
                        <th style="width:20%;border:1px solid black">Disabilities</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;width:100%">
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
                                <td style="border:1px solid black">{{ $rrr->disabilities }}</td>
                            
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right">TOTAL: </td>
                        <td>{{ $total }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right">TOTAL MALE: </td>
                        <td>{{ $totalMale }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right">TOTAL FEMALE: </td>
                        <td>{{ $totalFemale }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right">TOTAL AVERAGE: </td>
                        <td>15</td>
                    </tr>
                </tbody>

            </table>
            
        </div>
    @endforeach

    <a href="#" id="btnGenerate">Generate</a>

    <script src="{{ URL::asset('/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

        $("#btnGenerate").on('click', function () {
            
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

        function aveg(){

            alert('asd');

            

            

        }
    </script>

    </body>
    

</html>
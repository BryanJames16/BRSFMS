<html>

    <head>
    
        <title>PWD Report</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>

        <link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/icomoon.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}" />
    </head>
    
    <body onload="Load()">
    
  
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

            <canvas id="piee" style="width:200px;height:100px" width="200" height="100"></canvas>

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
                                <td style="border:1px solid black">{{ $rrr->disabilities }}</td>
                            
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right">TOTAL PWDs: </td>
                        <td>{{ $total }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right">TOTAL MALE PWD: </td>
                        <td>{{ $totalMale }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right">TOTAL FEMALE PWD: </td>
                        <td>{{ $totalFemale }} </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align:right">AVERAGE AGE OF PWDs: </td>
                        <td>{{ $ave }} yrs. old</td>
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

        function Range(){

            var splitter = $("#min-date-id", window.parent.document).val().split("/");
            

            var fDate = splitter[2] + '-' + splitter[0] + '-' + splitter[1]; 

            splitter = $("#quota-date-id", window.parent.document).val().split("/");

            var tDate= splitter[2] + '-' + splitter[0] + '-' + splitter[1];

            $('#body').html('');

            $.ajax({
                url: '{{ url("/reports/pwd/generateRange") }}', 
                method: 'GET', 
                data:{"fromDate":fDate,
                    "toDate": tDate},
                success: function (data) {

                    data = $.parseJSON(data);
                    console.log(data);

                    for (index in data)
                    {

                        var g = '';

                        if(data[index].gender=='M')
                        {
                            g="Male";
                        }
                        else
                        {
                            g = 'Female';
                        }

                        var now = new Date();
                        var d = new Date(data[index].birthDate);
                        var diff = (d.getTime() - now.getTime()) /1000;
                        
                        diff/= (60 * 60 * 24);
                        var age = Math.abs(Math.round(diff/365.25));
                        
                        $('#body').append(
                            '<tr>'+
                                '<td style="border:1px solid black">'+ data[index].firstName + ' ' + data[index].middleName + ' ' + data[index].lastName + '</td>'+
                                '<td style="border:1px solid black">'+ data[index].address +'</td>'+
                                '<td style="border:1px solid black">'+ data[index].contactNumber +'</td>'+
                                '<td style="border:1px solid black">'+ age +'</td>'+
                                '<td style="border:1px solid black">'+g+'</td>'+
                                '<td style="border:1px solid black">'+ data[index].email +'</td>'+
                                '<td style="border:1px solid black">'+ data[index].disabilities +'</td>'+
                            '</tr>'
                        );

                    }

                }, 
                error: function (errors) {
                    var message = "Errors: ";
                    var data = errors.responseJSON;
                    for (datum in data) {
                        message += data[datum];
                    }
                }
            });

        }
        function Load(){

            var a = $("#piee"),
                b = { responsive: !0, maintainAspectRatio: !1, responsiveAnimationDuration: 500 },
                c = {
                    labels: ["Male", "Female"],
                    datasets: [{
                        label: "My First dataset",
                        data: [2,1],
                        backgroundColor: ["#99B898", "#FECEA8", "#FF847C", "#E84A5F", "#2A363B"]
                    }]
                },
                d = { type: "pie", options: b, data: c };
            new Chart(a, d)

        }
        
    </script>

    
    <script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
    <script src="{{ URL::asset('/robust-assets/js/plugins/charts/chart.min.js') }}" type="text/javascript"></script>
    
    <script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>
    
    <script src="{{ URL::asset('/robust-assets/js/components/charts/chartjs/pie-doughnut/pie.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/charts/chartjs/pie-doughnut/pie-simple.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/robust-assets/js/components/charts/chartjs/pie-doughnut/doughnut.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/charts/chartjs/pie-doughnut/doughnut-simple.js') }}" type="text/javascript"></script>
	

    </body>
    

</html>
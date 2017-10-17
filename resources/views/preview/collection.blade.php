<html>

    <head>
    
        <title>Collection Report</title>
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
                    Collection Report
                </h1>
            </div>

            
            <br>
            <br>

            @if($fromDate != null)
           <div>
                <h2>Payment Date: {{ date('F j, Y',strtotime($fromDate)) }} - {{ date('F j, Y',strtotime($toDate)) }}</h2>
           </div>
           @else
           <div>
                <h2>Payment Date: All</h2>
           </div>
           @endif

           

            <table id="tbl" style="font-size:15px;margin:auto;padding:10px;border-collapse:collapse;width:100%;table-layout:fixed">

                <thead style="border:1px solid black;text-align:center;width:100%">
                    <tr>
                        <th style="width:20%;border:1px solid black">Name</th>
                        <th style="width:20%;border:1px solid black">Collection From</th>
                        <th style="width:15%;border:1px solid black">Residency</th>
                        <th style="width:15%;border:1px solid black">Date of Payment</th>
                        <th style="width:15%;border:1px solid black">OR No.</th>
                        <th style="width:15%;border:1px solid black">Amount</th>
                    </tr>
                </thead>
                <tbody id="body" style="text-align:center;width:100%">
                    @foreach($reserveRes as $coll)
                        <tr>
                                <td style="border:1px solid black">{{ $coll->firstName }} {{ $coll->middleName }} {{ $coll->lastName }}</td>
                            @if($coll->collectionType == '1')
                                <td style="border:1px solid black">Issuance of Barangay ID</td>
                            @elseif($coll->collectionType == '2')
                                <td style="border:1px solid black">Document Request</td>
                            @else
                                <td style="border:1px solid black">Facility Reservation</td>
                            @endif
                                <td style="border:1px solid black">Resident</td>
                                <td style="border:1px solid black">{{ date('F j, Y',strtotime($coll->paymentDate)) }}</td>
                                <td style="border:1px solid black">{{ $coll->collectionID }}</td>
                                <td style="border:1px solid black">{{ $coll->amount }}</td>
                                
                        </tr>
                    @endforeach
                    @foreach($reserveNonRes as $colln)
                        <tr>
                                <td style="border:1px solid black">{{ $colln->name }}</td>
                            @if($colln->collectionType == '1')
                                <td style="border:1px solid black">Issuance of Barangay ID</td>
                            @elseif($colln->collectionType == '2')
                                <td style="border:1px solid black">Document Request</td>
                            @else
                                <td style="border:1px solid black">Facility Reservation</td>
                            @endif
                                <td style="border:1px solid black">Non-Resident</td>
                                <td style="border:1px solid black">{{ date('F j, Y',strtotime($colln->paymentDate)) }}</td>
                                <td style="border:1px solid black">{{ $colln->collectionID }}</td>
                                <td style="border:1px solid black">{{ $colln->amount }}</td>
                                
                        </tr>
                    @endforeach
                    @foreach($collectionReq as $collr)
                        <tr>
                                <td style="border:1px solid black">{{ $collr->firstName }} {{ $collr->middleName }} {{ $collr->lastName }}</td>
                            @if($collr->collectionType == '1')
                                <td style="border:1px solid black">Issuance of Barangay ID</td>
                            @elseif($collr->collectionType == '2')
                                <td style="border:1px solid black">Document Request</td>
                            @else
                                <td style="border:1px solid black">Facility Reservation</td>
                            @endif
                                <td style="border:1px solid black">Resident</td>
                                <td style="border:1px solid black">{{ date('F j, Y',strtotime($collr->paymentDate)) }}</td>
                                <td style="border:1px solid black">{{ $collr->collectionID }}</td>
                                <td style="border:1px solid black">{{ $collr->amount }}</td>
                                
                        </tr>
                    @endforeach
                    @foreach($collectionID as $co)
                        <tr>
                                <td style="border:1px solid black">{{ $co->firstName }} {{ $co->middleName }} {{ $co->lastName }}</td>
                            @if($co->collectionType == '1')
                                <td style="border:1px solid black">Issuance of Barangay ID</td>
                            @elseif($co->collectionType == '2')
                                <td style="border:1px solid black">Document Request</td>
                            @else
                                <td style="border:1px solid black">Facility Reservation</td>
                            @endif
                                <td style="border:1px solid black">Resident</td>
                                <td style="border:1px solid black">{{ date('F j, Y',strtotime($co->paymentDate)) }}</td>
                                <td style="border:1px solid black">{{ $co->collectionID }}</td>
                                <td style="border:1px solid black">{{ $co->amount }}</td>
                                
                        </tr>
                    @endforeach
                    <tr style="border:1px solid black">
                        <td></td>
                        <td></td>
                        <td colspan="3" style="text-align:right">Total: </td>
                        <td style="border:1px solid black">{{$total}}</td>
                    </tr>
                    <tr style="border:1px solid black">
                        <td></td>
                        <td></td>
                        <td colspan="3" style="text-align:right">Total Collections: </td>
                        <td style="border:1px solid black">P{{$totalCollections}}</td>
                    </tr>
                    <tr style="border:1px solid black">
                        <td></td>
                        <td></td>
                        <td colspan="3" style="text-align:right">Total Collection From Barangay ID: </td>
                        <td style="border:1px solid black">P{{$totalCollectionID}}</td>
                    </tr>
                    <tr style="border:1px solid black">
                        <td></td>
                        <td></td>
                        <td colspan="3" style="text-align:right">Total Collection From Document Request:</td>
                        <td style="border:1px solid black">P{{$totalCollectionDocu}}</td>
                    </tr>
                    <tr style="border:1px solid black">
                        <td></td>
                        <td></td>
                        <td colspan="3" style="text-align:right">Total Collection From Reservation:</td>
                        <td style="border:1px solid black">P{{$totalCollectionReservation}}</td>
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
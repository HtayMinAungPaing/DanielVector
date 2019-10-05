<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Admin Panel </title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-2" style="background-color:white; float:left;"> 
                <img src="/images/logo.png" width="200px" height="200px">
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8" style="height:200px; background-color:#000040; color:white;"> 
                <center> <h3> Welcome From Dashboard </h3> </center> 
                <br>
                <center>
                    <table border="0" style="color:white;">
                        <tr>
                            <td> Name: </td>
                            <td> {{$user->name}} </td>
                        </tr>
                        <tr>
                            <td> Your Mail: </td>
                            <td> {{$user->email}} </td>
                        </tr>
                        <tr>
                            <td> Role: </td>
                            <td> {{$useraccount->role}}  </td>
                        </tr>
                        <tr>
                            <td> Balance: </td>
                            <td> {{$userbank->balance}} Kyats from ({{$userbank->cardno}} )</td>
                        </tr>
                    </table>
                </center>
                 <br>
                 <center>
                    @if($useraccount->role=="Doctor")
                    <table border="0" style="color:white;">
                        <tr>
                            <td> <a href="{{ route('bookings.create') }}"> <input type="button" style="background-color:white; color:#000040" value="Create A Booking"> </a> </td>
                            <td> <a href="{{ route('login') }}"> <input type="button" style="background-color:white; color:#000040" value="Back To Home"> </a>  </td>
                        </tr>
                    </table>
                    @else
                    <table border="0" style="color:white;">
                        <tr>
                            <td> <a href="{{ route('bookings.index') }}"> <input type="button" style="background-color:white; color:#000040" value="View Avilable Booking"> </a>  </td>
                            <td> <a href="{{ route('login') }}"> <input type="button" style="background-color:white; color:#000040" value="Back To Home"> </a>  </td>
                        </tr>
                    </table>
                    @endif
                </center>
            </div>
        </div>

        <div class="row">            
            <div class="col-md-12 col-sm-12" style="padding-left:200px; padding-top:50px;">                 
                @if($useraccount->role=="Doctor")
                    Your Posts Lists:
                    <br>
                    <table border="1">
                        <tr>
                            <th> Booking ID: </th>
                            <th> Booked Time: </th>
                            <th> Booked Date: </th>
                            <th> View Post: </th>
                        </tr>
                        
                        @foreach($mybooks as $mybook)
                            <tr>
                                <td> {{$mybook->id}} </td>
                                <td> {{$mybook->time}} </td>
                                <th> {{$mybook->date}} </th>
                                <th> <a href="{{ route('bookings.show',$mybook->id) }}"> View </a> </th>
                            </tr>
                        @endforeach
                    </table>
                    <br>
                    Request Booked Lists:
                @else
                    Your Booked Lists:
                @endif
                <table border="1">
                    <tr>
                        <th> No: </th>
                        <th> Booking ID: </th>
                        @if($useraccount->role=="Doctor")
                        <th> User ID: </th>
                        @else
                        <th> Doctor ID: </th>
                        @endif
                        <th> Booked Time: </th>
                    </tr>
                    
                    @if($useraccount->role=="Doctor")
                        @foreach($dbooks as $dbook)
                    <tr>
                        <td> {{$dbook->id}} </td>
                        <td> {{$dbook->booking_id}} </td>
                        <th> {{$dbook->user_id}} </th>
                        <td> {{$dbook->created_at }} </td>
                    </tr>
                        @endforeach
                    @else
                    @foreach($ubooks as $ubook)
                    <tr>
                        <td> {{$ubook->id}} </td>
                        <td> {{$ubook->booking_id}} </td>
                        <th> {{$ubook->doctor_id}} </th>
                        <td> {{$ubook->created_at}} </td>
                    </tr>
                    @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
</body>
</html>
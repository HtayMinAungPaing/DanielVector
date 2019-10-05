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
                            <td> <a href="{{ route('accounts.index') }}"> <input type="button" style="background-color:white; color:#000040" value="Back To Dashboard"> </a> </td>
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

        <div class="row" style="padding-left:200px;">            
            <form method="POST" action="{{ route('bookings.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right"> Hospital </label>

                    <div class="col-md-6">
                        <select name="hospital" id="hospital">
                            @foreach($hospitals as $hospital)
                                <option value="{{$hospital->id}}"> {{$hospital->name}} </option>
                            @endforeach
                        </select>                            
                    </div>
                </div>

                <br>
                
                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label text-md-right"> Date </label>

                    <div class="col-md-6">
                        <input id="date" name="date" type="date">
                    </div>
                </div>

                <br>

                <div class="form-group row">
                    <label for="time" class="col-md-4 col-form-label text-md-right"> Time </label>

                    <div class="col-md-6">
                        <input id="time"  name="time" type="time">
                    </div>
                </div>
                
                <br>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" style="background-color:#000040; color:white;">
                            {{ __('Post') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#000040; color:white;">{{ ('Booking Post') }} - {{$booking->id }}</div>
                
                <div class="card-body">
                        <div class="form-group row">
                            <table border="0">
                                <tr>
                                    <td> 
                                        <font color="#000040"> <b> Doctor Name: </b> </font> {{$booking->doctorname}}   
                                    </td>
                                    <td> 
                                        &nbsp &nbsp <font color="#000040"> <b> Date: </b> </font> {{$booking->date}}   
                                    </td>
                                </tr>
                                <tr>
                                    <td> 
                                        <font color="#000040"> <b> Doctor Email: </b> </font> {{$doctor->email}}    
                                    </td>
                                    <td> 
                                        &nbsp &nbsp <font color="#000040"> <b> Time: </b> </font> {{$booking->time}}   
                                    </td>
                                </tr>
                                <tr>
                                    <td> 
                                    <font color="#000040" style="padding-left:50px;"> <b> Hospital Name: </b> </font> {{$hospital->name}}
                                    </td>
                                    <td rowspan="2"> 
                                        @if($hospital->address=="Sanchaung")
                                            <iframe style="padding-left:50px; border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15277.62884517206!2d96.12542237018637!3d16.806142856167764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb47775f8a0f%3A0xbc5b8ab1e46ce8e2!2sSanchaung%20Twp%2C%20Yangon!5e0!3m2!1sen!2smm!4v1570102579405!5m2!1sen!2smm" width="400" height="200" frameborder="0" allowfullscreen=""></iframe>
                                        @elseif($hospital->address=="Ahlone")
                                            <iframe style="padding-left:50px; border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15279.340158408182!2d96.11920422018206!3d16.784880758675463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb0c42ade4ed%3A0x79b26ce6cb927657!2sAhlone%2C%20Yangon!5e0!3m2!1sen!2smm!4v1570102884313!5m2!1sen!2smm" width="400" height="200" frameborder="0" allowfullscreen=""></iframe>                                                
                                        @elseif($hospital->address=="North Dagon")
                                            <iframe style="padding-left:50px; border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61084.59612729337!2d96.15662063469021!3d16.886415257072585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c193d7f3d0536f%3A0x153cf26939dc2444!2sNorth%20Dagon%20Twp%2C%20Yangon!5e0!3m2!1sen!2smm!4v1570102915011!5m2!1sen!2smm" width="400" height="200" frameborder="0" allowfullscreen=""></iframe>                                            
                                        @elseif($hospital->address=="Mingalardone")
                                            <iframe style="padding-left:50px; border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122103.76844253024!2d96.06466452526413!3d16.987198867536275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1968c0d68ed35%3A0x2fb11dc1a9ba7458!2sMingaladon%20Twp%2C%20Yangon!5e0!3m2!1sen!2smm!4v1570102950504!5m2!1sen!2smm" width="400" height="200" frameborder="0" allowfullscreen=""></iframe>                                        
                                        @elseif($hospital->address=="Parami")
                                            <iframe style="padding-left:50px; border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30547.37854808571!2d96.14059277929348!3d16.854990789422367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19363d9727571%3A0xd74023cf135d266a!2sParami%20General%20Hospital!5e0!3m2!1sen!2smm!4v1570102986962!5m2!1sen!2smm" width="400" height="200" frameborder="0" allowfullscreen=""></iframe>                                        
                                        @else
                                            <iframe style="padding-left:50px; border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61073.42997001669!2d96.20136528480437!3d16.920883086709207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon!5e0!3m2!1sen!2smm!4v1570102840602!5m2!1sen!2smm" width="400" height="200" frameborder="0" allowfullscreen=""></iframe>                                                
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td> 
                                    <font color="#000040" style="padding-left:50px;"> <b> Hospital Location: </b> </font> {{$hospital->address}}   
                                    </td>
                                </tr>
                            </table>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                @if($useraccount->role=="User")
                                <form method="POST" action="{{ route('bookeds.store') }}">
                                @csrf
                                    <input type="text" name="bookid" id="bookid" value="{{$booking->id}}" hidden>
                                    <button type="submit" class="btn btn-primary" style="background-color:#000040; color:white;">
                                        {{ __('Book Now') }}
                                    </button>
                                </form>         
                                @else
                                <font color="red"> A Doctor Can't Make A Booking </font>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#000040; color:white;"> You're Now Logged In! </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Go To Your Dashboard: <a href="{{ route('accounts.index') }}"> <input type="button" style="background-color:white; color:#000040" value="Go To Dashboard"> </a>  
                </div>
            </div>
        </div>
    </div>
    <br> <br>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h1 style="color:#000040"> <font face="Agency FB"> "Book With Therapy, Meet Your Private Doctor... " </font> </h1>
            <a href="{{ route('bookings.index') }}">
                <input type="button" style="background-color:#000040; color:white; width: 520px; height:30px;" value="Book Now!">
            </a>
        </div>
    </div>
    <br>
    <div class="row" style="background-color:#000040;">
        <div class="col-md-2 col-sm-1 col-xs-2"></div>
        <div class="col-md-8 col-sm-10 col-xs-8" style="padding-top: 30px;">
            <center> 
                <iframe width="100%" height="400px;" src="https://www.youtube.com/embed/8LZJz7GtJA0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </center>
        </div>
        <div class="col-md-2 col-sm-1 col-xs-2"></div>
    </div>
</div>
@endsection


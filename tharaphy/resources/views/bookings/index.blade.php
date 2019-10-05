@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($bookings as $booking)
                <div class="card">
                    <div class="card-header" style="background-color:#000040; color:white;"> 
                        Booking {{$booking->id}} |    
                        Doctor Name {{$booking->doctorname}} |
                        <a href="{{ route('bookings.show',$booking->id) }}">                                
                            <button type="submit" class="btn btn-primary" style="background-color:#000040; color:white;">
                                {{ __('View') }}
                            </button>
                        </a>           
                    </div>     
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

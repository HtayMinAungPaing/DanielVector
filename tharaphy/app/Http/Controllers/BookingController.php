<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Account;
use App\Booked;
use App\Bank;
use App\Hospital;
use Auth;
use DB;
use App\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all(); 
        return view("bookings.index",[
            "bookings" => $bookings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $useraccount = Account::where('user_id', Auth::user()->id)->first();   
        $userbank = Bank::where('user_id', Auth::user()->id)->first(); 
        $user = Auth::user();
        $ubooks = Booked::where('user_id', Auth::user()->id)->get(); 
        $dbooks = Booked::where('doctor_id', Auth::user()->id)->get(); 
        $hospitals = Hospital::all(); 

        return view("bookings.create",[
            "useraccount" => $useraccount,
            "userbank" => $userbank,
            "user" => $user,
            "ubooks" => $ubooks,
            "dbooks" => $dbooks,
            "hospitals" => $hospitals,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = new Booking();

        $booking->doctorname = Auth::user()->name;
        $booking->time = $request->time;
        $booking->date = $request->date;
        $booking->booked = "No";
        $booking->hospital_id = $request->hospital;
        $booking->doctor_id = Auth::user()->id;
        $booking->save();

        $useraccount = Account::where('user_id', Auth::user()->id)->first();   
        $userbank = Bank::where('user_id', Auth::user()->id)->first(); 
        $user = Auth::user();
        $ubooks = Booked::where('user_id', Auth::user()->id)->get(); 
        $dbooks = Booked::where('doctor_id', Auth::user()->id)->get(); 
        $mybooks = Booking::where('doctor_id', Auth::user()->id)->get();

        $userbalance= Bank::where('user_id', Auth::user()->id)->first();
        $admbalance= Bank::where('id', 1)->first();

        DB::table('banks')->where('id', 1)->update(['balance' => (($admbalance->balance)+200)]);
        DB::table('banks')->where('user_id', Auth::user()->id)->update(['balance' => (($userbalance->balance)-200)]);

        return view("accounts.index",[
            "useraccount" => $useraccount,
            "userbank" => $userbank,
            "user" => $user,
            "ubooks" => $ubooks,
            "dbooks" => $dbooks,
            "mybooks" => $mybooks,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $hospital = Hospital::where('id', $booking->hospital_id)->first(); 
        $doctor = User::where('id', $booking->doctor_id)->first(); 
        $useraccount = Account::where('user_id', Auth::user()->id)->first();  

        return view("bookings.show",[
            "booking" => $booking,
            "hospital" => $hospital,
            "doctor" => $doctor,
            "useraccount" => $useraccount,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        



        $event->title = $event->title;
        $event->description = $event->description;
        $event->date = $event->date;
        $event->time = $event->time;
        if($request->requested=="reject"){
            $event->people = ($event->people)-1;
        }else{
            $event->people = ($event->people)+1;
        }
        $event->map_id = $event->map_id;
        $event->save();

        if($request->requested=="reject"){
            $event_users = Event_User::all();
            DB::table('event__users')->where('event_id', $event->id)->where('user_id', Auth::user()->id)->delete();
        }else{            
            $event_user = new Event_User();
            $event_user->event_id = $event->id;
            $event_user->user_id = Auth::user()->id;
            $event_user->save();
        }

        return redirect()->route("events.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}

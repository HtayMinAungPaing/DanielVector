<?php

namespace App\Http\Controllers;

use App\Booked;
use App\Booking;
use App\Account;
use App\Bank;
use App\Hospital;
use Auth;
use DB;
use App\User;
use Illuminate\Http\Request;

class BookedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booked = new Booked();

        $booked->booking_id = $request->bookid;
        $booked->user_id = Auth::user()->id;    
        $doctor = Booking::where('id', $request->bookid)->first(); 
        
        $booked->doctor_id = $doctor->doctor_id;        
        $booked->save();

        $useraccount = Account::where('user_id', Auth::user()->id)->first();   
        $userbank = Bank::where('user_id', Auth::user()->id)->first(); 
        $user = Auth::user();
        $ubooks = Booked::where('user_id', Auth::user()->id)->get(); 
        $dbooks = Booked::where('doctor_id', Auth::user()->id)->get(); 
        $mybooks = Booking::where('doctor_id', Auth::user()->id)->get();

        $userbalance= Bank::where('user_id', Auth::user()->id)->first();
        $admbalance= Bank::where('id', 1)->first();

        DB::table('banks')->where('id', 1)->update(['balance' => (($admbalance->balance)+500)]);
        DB::table('banks')->where('user_id', Auth::user()->id)->update(['balance' => (($userbalance->balance)-200)]);

        return view("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function show(Booked $booked)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function edit(Booked $booked)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booked $booked)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booked $booked)
    {
        //
    }
}

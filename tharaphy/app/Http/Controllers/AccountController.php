<?php

namespace App\Http\Controllers;

use App\Account;
use App\Bank;
use App\Booked;
use App\Booking;
use Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $useraccount = Account::where('user_id', Auth::user()->id)->first();   
        $userbank = Bank::where('user_id', Auth::user()->id)->first(); 
        $user = Auth::user();
        $mybooks = Booking::where('doctor_id', Auth::user()->id)->get(); 
        $ubooks = Booked::where('user_id', Auth::user()->id)->get(); 
        $dbooks = Booked::where('doctor_id', Auth::user()->id)->get(); 

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("accounts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Account();
        $bank = new Bank();

        $account->address = $request->address;
        $account->dob = $request->dob;
        $account->role = $request->role;
        $account->user_id = Auth::user()->id;
        $account->save();

        $bank->cardno = $request->bank;
        $bank->balance = 1000000;
        $bank->cvv = $request->cvv;
        $bank->expdate = $request->exp;
        $bank->user_id = Auth::user()->id;
        $bank->save();

        $useraccount = Account::where('user_id', Auth::user()->id)->first();   
        $userbank = Bank::where('user_id', Auth::user()->id)->first(); 
        $user = Auth::user();
        $ubooks = Booked::where('user_id', Auth::user()->id)->get(); 
        $dbooks = Booked::where('doctor_id', Auth::user()->id)->get(); 
        $mybooks = Booking::where('doctor_id', Auth::user()->id)->get(); 

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
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}

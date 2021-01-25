<?php

namespace App\Http\Controllers\Account;

use Auth;
use App\User;
use App\Country;
use App\ApplicationSetting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->account_type_id == 6) { 
            $countries = Country::get();

            return view('account.setup', compact('countries')); 
        } else { 
            return redirect('/home'); 
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'accountTypeId' => 'required|integer',
            'country' => 'required',
            'firstName' => 'required',
            'city' => 'required',
            'state' => 'required',
            'company' => 'required',
        ]);

        $user = User::find($id);

        $user->email = Auth::user()->email;
        $user->username = Auth::user()->username;
        $user->account_type_id = $request->accountTypeId;
        $user->country = $request->country;
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip_code = $request->zipcode;
        $user->state = $request->state;
        $user->phone_number = $request->phone;
        $user->company_name = $request->company;

        if (ApplicationSetting::find(1)->active) {
            $user->approved = 0;
        } else {
            $user->approved = 1;
        }

        $user->save();

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

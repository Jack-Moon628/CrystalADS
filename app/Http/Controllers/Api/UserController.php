<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Log;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&_]/'],
            'email_list' => ['required', 'integer'],
        ]);

        $user = new User();

        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email_list = $request->email_list;
        $user->account_type_id = 6;
        $user->disabled = 0;
        $user->approved = 0;

        $user->save();

        $log = new Log;

        $log->action_account_id = Auth::user()->id;
        $log->target_account_id = $user->id;
        $log->reason = 'User created';
        $log->log_type_id = 1;

        $log->save();

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = new Log;

        $log->action_account_id = Auth::user()->id;
        $log->target_account_id = $id;
        $log->reason = 'User details viewed';
        $log->log_type_id = 1;

        $log->save();

        $userDetails['user'] = User::find($id)->load('accountType');
        $userDetails['created_at'] = User::find($id)->created_at->diffForHumans();
        $userDetails['updated_at'] = User::find($id)->updated_at->diffForHumans();

        $user = json_encode($userDetails);
        
        return $user;
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
            'email' => 'required',
            'username' => 'required',
            'country' => 'required',
            'firstName' => 'required',
            'city' => 'required',
            'state' => 'required',
            'company' => 'required',
        ]);

        $user = User::find($id);

        $user->email = $request->email;
        $user->username = $request->username;
        $user->country = $request->country;
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zip_code = $request->zipcode;
        $user->state = $request->state;
        $user->phone_number = $request->phone;
        $user->company_name = $request->company;

        $user->save();

        $log = new Log;

        $log->action_account_id = Auth::user()->id;
        $log->target_account_id = $id;
        $log->reason = 'User details updated';
        $log->log_type_id = 3;

        $log->save();

        return true;
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

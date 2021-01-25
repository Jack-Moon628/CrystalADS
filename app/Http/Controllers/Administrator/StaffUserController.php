<?php

namespace App\Http\Controllers\Administrator;

use Auth;
use App\Log;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffUserController extends Controller
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
        $user = User::find($id);

        if ($request->state == "true") {
            $log = new Log;

            $log->action_account_id = Auth::user()->id;
            $log->target_account_id = $id;
            $log->reason = 'User account added to Staff';
            $log->log_type_id = 3;

            $log->save();

            $user->account_type_id = 5;
        } else {
            $log = new Log;

            $log->action_account_id = Auth::user()->id;
            $log->target_account_id = $id;
            $log->reason = 'User account removed from Staff';
            $log->log_type_id = 3;

            $log->save();

            $user->account_type_id = 6;
        }

        $user->save();

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

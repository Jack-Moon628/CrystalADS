<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Log;
use App\User;

class PendingUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('approved', 0)->whereNotNull('account_type_id')->paginate(16);

        return view('administrator.pending-users', compact('users'));
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

        if ($request->status == "true") {
            $log = new Log;

            $log->action_account_id = Auth::user()->id;
            $log->target_account_id = $id;
            $log->reason = 'User approved';
            $log->log_type_id = 4;

            $log->save();

            $user->approved = 1;
        } else {
            $log = new Log;

            $log->action_account_id = Auth::user()->id;
            $log->target_account_id = $id;
            $log->reason = 'User denied';
            $log->log_type_id = 5;

            $log->save();

            $user->approved = 2;
            $user->account_type_id = 4;
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

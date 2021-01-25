<?php

namespace App\Http\Controllers\administrator;

use Auth;
use App\User;
use App\Log;
use App\Permission;
use App\UserPermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPermissionsController extends Controller
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
        $log = new Log;

        $log->action_account_id = Auth::user()->id;
        $log->target_account_id = $id;
        $log->reason = 'User permissions viewed';
        $log->log_type_id = 1;

        $log->save();

        $userDetails['user'] = User::find($id)->load('accountType')->load('userPermissions');

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
        $userPermissions = UserPermission::where('user_id', $id)->get();

        foreach ($userPermissions as $userPermission) {
            $userPermission->delete();
        }

        if (!is_null($request->permissions)) {
            foreach ($request->permissions as $permission) {
                $newPermission = new UserPermission;

                $newPermission->user_id = $id;
                $newPermission->permission_id = $permission;

                $newPermission->save();
            }
        }

        $log = new Log;

        $log->action_account_id = Auth::user()->id;
        $log->target_account_id = $id;
        $log->reason = 'User permissions updated';
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

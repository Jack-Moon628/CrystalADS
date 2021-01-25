<?php

namespace App\Http\Controllers\administrator;

use Auth;
use App\Log;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserSecurityController extends Controller
{
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

    	if ($request->securityDisable) {
            if ($user->disabled) {
                $log = new Log;

                $log->action_account_id = Auth::user()->id;
                $log->target_account_id = $id;
                $log->reason = 'User account enabled';
                $log->log_type_id = 3;

                $log->save();

                $user->disabled = 0;
            } else {
                $log = new Log;

                $log->action_account_id = Auth::user()->id;
                $log->target_account_id = $id;
                $log->reason = 'User account disabled';
                $log->log_type_id = 3;

                $log->save();

                $user->disabled = 1;
            }    
    	}

		if ($request->securityRestrict) {
            if ($user->account_type_id == 4) {
                $log = new Log;

                $log->action_account_id = Auth::user()->id;
                $log->target_account_id = $id;
                $log->reason = 'User account restored';
                $log->log_type_id = 3;

                $log->save();

                $user->account_type_id = 6;
            } else {
                $log = new Log;

                $log->action_account_id = Auth::user()->id;
                $log->target_account_id = $id;
                $log->reason = 'User account restricted';
                $log->log_type_id = 3;

                $log->save();

                $user->account_type_id = 4;
            }    		
        }
    	$user->save();

        return true;
    }
}

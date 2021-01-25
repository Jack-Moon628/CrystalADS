<?php

namespace App\Http\Controllers\api;

use App\Log;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLogsController extends Controller
{
	public function searchEmail($email) {
		if (is_null($email)) { return 'An email is required'; }

		$user = User::where('email', $email)->first();
		$userLogs = Log::where('target_account_id', $user->id)->with('type')->orderBy('created_at', 'desc')->paginate(30);

		return view('administrator.user-logs', compact('userLogs'));
	}
}
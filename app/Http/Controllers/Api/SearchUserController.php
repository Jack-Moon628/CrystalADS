<?php

namespace App\Http\Controllers\Api;


use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SearchUserController extends Controller
{
	public function email($email) {
		if (is_null($email)) { return 'An email is required'; }
		$user = User::where('email', $email)->get(['id', 'email', 'username', 'disabled']);

        $userDetails['user'] = $user;
        $userDetails['accountType'] = User::find($user[0]->id)->accountType->name;

		return $userDetails;
	}
}

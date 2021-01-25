<?php

namespace App\Http\Controllers\Account;

use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AwaitingApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->approved) { 
            return view('account.awaiting-approval'); 
        } else {
            return redirect('dashboard');
        }
    }
}

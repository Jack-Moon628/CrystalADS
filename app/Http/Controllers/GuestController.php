<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('guest.index');
    }

    public function advertisers() {
        return view('guest.advertisers');
    }

    public function publishers() {
        return view('guest.publishers');
    }

    public function company() {
        return view('guest.company');
    }

    public function faq() {
        return view('guest.faq');
    }

    public function disabled() {
        Auth::logout();

        return view('guest.disabled');
    }
}

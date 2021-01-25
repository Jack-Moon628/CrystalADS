<?php

namespace App\Http\Controllers\api;

use App\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterLogsController extends Controller
{
	public function show($id) {
        $logs = Log::where('log_type_id', $id)->orderBy('created_at', 'desc')->paginate(30);

        return view('administrator.filter-logs', compact('logs'));
	}
}

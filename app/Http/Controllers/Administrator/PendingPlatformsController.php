<?php

namespace App\Http\Controllers\administrator;

use Auth;
use App\Log;
use App\Domain;
use App\DomainCategory;
use App\Geoprofile;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendingPlatformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = Domain::where('approved', 0)->with('user')->paginate(16);
        $geoprofiles = Geoprofile::get();

        return view('administrator.pending-platforms', compact('domains', 'geoprofiles'));
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
        $domain = Domain::find($id)->load('user');

        return json_encode($domain);
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
            'status' => 'required',
            'geoprofile_id' => 'required',
        ]);

        $domain = Domain::find($id);
        $geoprofile = Geoprofile::find($request->geoprofile_id);

        if ($request->status == "true") {
            $domainCategory =  new DomainCategory;

            $domainCategory->domain_id = $id;
            $domainCategory->geoprofile_id = $request->geoprofile_id;  

            $domainCategory->save();

            $log = new Log;

            $log->action_account_id = Auth::user()->id;
            $log->target_account_id = $id;
            $log->reason = 'Domain approved and added to Geoprofile: ' . $geoprofile->name;
            $log->log_type_id = 1;

            $log->save();

            $domain->approved = 1;
        } else {
            $log = new Log;

            $log->action_account_id = Auth::user()->id;
            $log->target_account_id = $id;
            $log->reason = 'Domain approval request denied';
            $log->log_type_id = 1;

            $log->save();

            $domain->approved = 2;
        }

        $domain->save();

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

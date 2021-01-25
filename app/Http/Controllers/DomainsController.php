<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Domain;
use App\DomainCategory;

use Illuminate\Http\Request;

class DomainsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = Domain::where('user_id', Auth::user()->id)->paginate(16);

        return view('publisher.domains', compact('domains'));
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
        $request->validate([
            'name' => ['required', 'unique:domains']
        ]);

        $domain = new Domain;

        $domain->user_id = Auth::user()->id;
        $domain->name = $request->name;

        $domain->save();

        return redirect()->back();
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
        $request->validate([
            'name' => ['required'],
            'geoprofileid' => ['required'],
        ]);

        $domain = Domain::find($id);
        $domain->name = $request->name;
        $domain->save();

        $domainCategory = DomainCategory::where('domain_id', $id)->first();
        $domainCategory->geoprofile_id = $request->geoprofileid;
        $domainCategory->save();

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

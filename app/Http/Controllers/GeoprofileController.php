<?php

namespace App\Http\Controllers;

use App\Geoprofile;
use App\DomainCategory;

use Illuminate\Http\Request;

class GeoprofileController extends Controller
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'country_id' => 'required',
            'cpc' => ['required', 'between:0,99.99'],
            'cpm' => ['required', 'between:0,99.99'],
            'revenue_share' => ['required', 'between:0,99.99'],
        ]);

        $profile =  new Geoprofile;

        $profile->name = $request->name;
        $profile->description = $request->description;
        $profile->country_id = $request->country_id;
        $profile->cost_per_click = $request->cpc;
        $profile->cost_per_impression = $request->cpm;
        $profile->revenue_share = $request->revenue_share;

        $profile->save();

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $geoprofile = Geoprofile::with('country')->find($id);
        $domains = DomainCategory::where('geoprofile_id', $id)->with('domain')->get();

        $data = array('geoprofile' => $geoprofile, 'domains' => $domains);

        return $data;
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
            'description' => ['required'],
            'countryid' => ['required'],
            'cpc' => ['required', 'between:0,99.99'],
            'cpm' => ['required', 'between:0,99.99'],
            'revenue_share' => ['required', 'between:0,99.99'],

        ]);

        $geoprofile = Geoprofile::find($id);

        $geoprofile->name = $request->name;
        $geoprofile->description = $request->description;
        $geoprofile->country_id = $request->countryid;
        $geoprofile->cost_per_click = $request->cpc;
        $geoprofile->cost_per_impression = $request->cpm;
        $geoprofile->revenue_share = $request->revenue_share;

        $geoprofile->save();

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
        if ($id == 1) {
            return false;
        }

        $geoprofile = Geoprofile::find($id);
        $domainCategories = DomainCategory::where('geoprofile_id', $id)->get();

        foreach ($domainCategories as $category) {
            $domain = $category;

            $domain->geoprofile_id = 1;

            $domain->save();
        }

        $geoprofile->delete();

        return true;
    }
}

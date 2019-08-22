<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airport;
use App\Company;

class AirportController extends Controller
{
    private $airport, $company;

    public function __construct(Airport $airport, Company $company)
    {
        $this->airport = $airport;
        $this->company = $company;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airports = $this->airport->paginate(8);
        return view('airport.airports', compact('airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('airport.createAirport');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/airports')->withSuccess('Airport has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $airport = $this->airport->with('companies')->findOrFail($id);
        return view('airport.showAirport', compact('airport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airport = $this->airport->with('companies')->findOrfail($id);
        return view('airport.editAirport', compact('airport'));
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
        return redirect('/airports/' . $id)->withSuccess('Airport has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->airport->findOrFail($id)->delete();
        return redirect('/airports')->withSuccess('Airport has been deleted');
    }

    public function assign($id, $company)
    {
        $airport = $this->airport->findOrFail($id);
        $company = $this->company->findOrFail($company);

        if ($airport->companies()->where('company_id', $company->id)->exists()) {
            return redirect('/airports')->withErrors(['error', 'Company already assigned to airport']);
        }
        $airport->companies()->attach($company);
        return redirect('/airports')->with('success', 'Company assigned');
    }

    public function unassign($id, $company)
    {
        $airport = $this->airport->findOrFail($id);
        $company = $this->company->findOrFail($company);

        if (!$airport->companies()->where('company_id', $company->id)->exists()) {
            return redirect('/airports')->with(['error' => 'Company already unassigned from this airport']);
        }
        $airport->companies()->detach($company);
        return redirect('/airports')->with('success', 'Company unassigned');
    }

}

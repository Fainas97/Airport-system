<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportRequest;
use App\Airport;
use App\Company;
use App\Country;

class AirportController extends Controller
{
    private $airport, $company, $country;

    public function __construct(Airport $airport, Company $company, Country $country)
    {
        $this->airport = $airport;
        $this->company = $company;
        $this->country = $country;
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
        $companies = $this->company->get();
        return view('airport.createAirport', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\AirportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirportRequest $request)
    {
        $airport = $this->airport->create($request->validated())
            ->companies()->sync($request->only('companies')['companies']);
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
        $companies = $this->company->get();
        return view('airport.editAirport', compact('airport', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\AirportRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AirportRequest $request, $id)
    {
        $airport = $this->airport->findOrFail($id);
        $airport->update($request->validated());
        $airport->companies()->sync($request->only('companies')['companies']);
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
        $airport = $this->airport->findOrFail($id);
        $airport->companies()->sync([]);
        $airport->delete();
        return redirect('/airports')->withSuccess('Airport has been deleted');
    }
}

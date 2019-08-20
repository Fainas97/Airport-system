<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airport;

class AirportController extends Controller
{
    private $airport;

    public function __construct(Airport $airport)
    {
        $this->airport = $airport;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airports = $this->airport->get();
        return view('airport.airports', compact('airpots'));
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
}

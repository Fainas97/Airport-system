<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Country;

class CountryController extends Controller
{
    private $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = $this->country->paginate(10);
        return view('countries', compact('countries'));
    }

    public function firstReport()
    {
        $title = "Countries Without Companies";
        $countries = $this->country->countriesWithoutCompanies();
        return view('report', compact('countries', 'title'));
    }

    public function secondReport()
    {
        $title = "Countries Without Companies and Airports";
        $countries = $this->country->countriesWithoutCompaniesAirports();
        return view('report', compact('countries', 'title'));
    }
}

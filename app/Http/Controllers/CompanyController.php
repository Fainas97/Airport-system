<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Company;
use App\Country;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $company, $country;

    public function __construct(Company $company, Country $country)
    {
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
        $companies = $this->company->with('country')->paginate(8);
        return view('company.companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = $this->country->get();
        return view('company.createCompany', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $this->company->create($request->validated());
        return redirect('/companies')->withSuccess('Company has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = $this->company->with('country', 'airports')->findOrFail($id);
        return view('company.showCompany', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->company->findOrFail($id);
        $countries = $this->country->get();
        return view('company.editCompany', compact('company', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CompanyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $this->company->findOrFail($id)->update($request->validated());
        return redirect('/companies/' . $id)->withSuccess('Company has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = $this->company->findOrFail($id);
        $company->airports()->sync([]);
        $company->delete();
        return redirect('/companies')->withSuccess('Company has been deleted');
    }

    public function reportView()
    {
        $title = "Selected companies airports";
        $countries = $this->country->get();
        return view('reportFilter', compact('countries', 'title'));
    }

    public function thirdReport(Request $request)
    {
        $countryId = (int)$request->country_id;
        $country = $this->country->findOrFail($countryId);
        $title = $country->name . ' companies airports';
        $airports = $this->company->selectedCountryCompaniesAirports($countryId);
        return view('reportAirports', compact('airports', 'title'));
    }
}

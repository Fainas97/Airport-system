<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Company;
use App\Country;

class CompanyController extends Controller
{
    private $company;
    private $country;

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
     * @param  \Illuminate\Http\CompanyRequest  $request
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
        $company = $this->company->with('country')->findOrFail($id);
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
     * @param  \Illuminate\Http\CompanyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $this->company->findOrFail($id)->update($request->validated());
        return redirect('/companies')->withSuccess('Company has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->company->findOrFail($id)->delete();
        return redirect('/companies')->withSuccess('Company has been deleted');
    }
}

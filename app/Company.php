<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'country_id'];

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function airports()
    {
        return $this->belongsToMany(Airport::class);
    }

    public function selectedCountryCompaniesAirports($country)
    {
        return $this->with('airports')->where('country_id', $country)->paginate(10);
    }
}

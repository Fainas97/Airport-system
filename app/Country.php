<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function countriesWithoutCompanies()
    {
        return $this->leftJoin('companies', function ($join) {
            $join->on('countries.id', '=', 'companies.country_id');
        })
            ->select('countries.name', 'countries.ISO')
            ->whereNull('companies.country_id')
            ->paginate(10);
    }

    public function countriesWithoutCompaniesAirports()
    {
        return $this->leftJoin('companies', function ($join) {
            $join->on('countries.id', '=', 'companies.country_id');
        })
            ->leftJoin('airports', function ($join) {
                $join->on('countries.name', '=', 'airports.country');
            })
            ->select('countries.name', 'countries.ISO')
            ->whereNull('companies.country_id')
            ->whereNull('airports.country')
            ->paginate(10);
    }
}

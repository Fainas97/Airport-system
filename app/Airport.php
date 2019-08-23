<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = [ 'name', 'country', 'lng', 'lat'];

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}

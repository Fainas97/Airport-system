<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}

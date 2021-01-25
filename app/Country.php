<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function geoprofile() {
    	return $this->hasMany('App\Geoprofile', 'country_id', 'id');
    }
}

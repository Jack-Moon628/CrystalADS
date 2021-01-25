<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geoprofile extends Model
{
    public function domains() {
        return $this->hasMany('App\Domain', 'id', 'domain_id');
    }

    public function domainCategories() {
    	return $this->hasMany('App\DamainCategory', 'geoprofile_id', 'id');
    }

    public function country() {
    	return $this->hasOne('App\Country', 'id', 'country_id');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomainCategory extends Model
{
    public function domain() {
        return $this->hasOne('App\Domain', 'id', 'domain_id');
    }

    public function geoprofile() {
        return $this->hasOne('App\Geoprofile', 'id', 'geoprofile_id');
    }
}

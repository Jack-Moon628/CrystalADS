<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function domainCategory() {
        return $this->hasOne('App\DomainCategory', 'domain_id', 'id');
    }
}

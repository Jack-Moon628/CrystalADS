<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
    	'user_id',
    	'value',
    ];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction', 'wallet_id', 'id');
    }
}

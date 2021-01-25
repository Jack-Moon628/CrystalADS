<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
	public function user() {
		return $this->belongsTo('App\User', 'account_type_id', 'id');
	}

	public function menu() {
		return $this->hasOne('App\Menu', 'account_type_id', 'id');
	}

	public function dashboard() {
		return $this->hasOne('App\Dashboard', 'account_type_id', 'id');
	}
}

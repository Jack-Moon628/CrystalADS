<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
	public function accountType() {
		return $this->belongsTo('App\AccountType', 'id', 'account_type_id');
	}
}

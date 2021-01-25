<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	public function accountType() {
		return $this->belongsTo('App\Menu', 'id', 'account_type_id');
	}

	public function items() {
		return $this->hasMany('App\MenuItem', 'menu_id', 'id');
	}
}

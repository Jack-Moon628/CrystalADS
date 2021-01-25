<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
	public function permissionType() {
        return $this->hasOne('App\Permission', 'id', 'permission_id');
	}

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	public function userPermissions() {
        return $this->hasMany('App\UserPermission', 'permission_id', 'id');
	}
}

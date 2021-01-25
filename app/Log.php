<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function actionUser() {
        return $this->hasOne('App\User', 'id', 'action_account_id');
    }

    public function targetUser() {
        return $this->hasOne('App\User', 'id', 'target_account_id');
    }

    public function type() {
        return $this->hasOne('App\LogType', 'id', 'log_type_id');
    }
}

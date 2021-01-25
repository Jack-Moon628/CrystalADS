<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogType extends Model
{
    public function log() {
        return $this->hasMany('App\Log', 'log_type_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function wallet() {
        return $this->hasOne('App\Wallet', 'id', 'wallet_id');
    }

    public function type() {
        return $this->hasOne('App\TransactionType', 'id', 'transaction_type_id');
    }
}

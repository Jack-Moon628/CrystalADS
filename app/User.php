<?php

namespace App;

use App\Wallet;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'username',
        'password', 
        'account_type_id',
        'country', 
        'first_name', 
        'last_name', 
        'address', 
        'city', 
        'zip_code', 
        'state', 
        'phone_number', 
        'company_name',
        'email_list',
        'disabled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function accountType() {
        return $this->hasOne('App\AccountType', 'id', 'account_type_id');
    }

    public function userPermissions() {
        return $this->hasMany('App\UserPermission', 'user_id', 'id');
    }

    public function actionLogs() {
        return $this->hasMany('App\Log', 'action_account_id', 'id');
    }

    public function targetLogs() {
        return $this->hasMany('App\Log', 'target_account_id', 'id');
    }

    public function wallet() {
        return $this->hasOne('App\Wallet', 'user_id', 'id');
    }

    public function domain() {
        return $this->hasMany('App\Domain', 'user_id', 'id');
    }
}

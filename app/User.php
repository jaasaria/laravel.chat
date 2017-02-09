<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','middlename', 'lastname', 'job','about','avatar',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function noti()
    {
        return $this->hasMany('App\Models\tblNoti','notifiable_id');
    }

    public function getFullNameAttribute() {
        return ucwords($this->name) . ' ' . ucwords($this->middlename). ' ' . ucwords($this->lastname);
    }



}

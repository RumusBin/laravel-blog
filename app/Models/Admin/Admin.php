<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;


class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function getNameAttribute($value){
        return ucfirst($value);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
    public function roles()
    {
        return $this->belongsToMany('App\Models\Admin\Role');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\Organization\Auth\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organization extends Authenticatable
{
    
    use Notifiable;

    protected $primaryKey = 'org_id';

    protected $fillable = [
        'org_name', 
        'slug', 
        'email', 
        'phone', 
        'contact_person', 
        'address', 
        'logo', 
        'password', 
        'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

}

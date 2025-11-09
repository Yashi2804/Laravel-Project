<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $table = 'userss';


    protected $fillable = [
        'fname',
        'email',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function courses()
              {
    return $this->hasMany(Course::class);
                  }

}

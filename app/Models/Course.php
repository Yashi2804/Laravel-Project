<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table='courses';




    public function user()
            {
    return $this->belongsTo(User::class);
                       }

}

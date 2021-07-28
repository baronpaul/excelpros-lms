<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    protected $primaryKey = 'course_id';

    protected $fillable = [ 
        'facilitator_id', 
        'program_id', 
        'course_name', 
        'day',
        'completed'
    ];

}

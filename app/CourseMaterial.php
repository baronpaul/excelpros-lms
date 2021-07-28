<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'course_id', 
        'title', 
        'file'
    ];

}

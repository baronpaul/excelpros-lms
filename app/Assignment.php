<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    
    protected $primaryKey = 'assignment_id';

    protected $fillable = [
        'course_id', 
        'title', 
        'slug', 
        'details', 
        'attachments', 
        'submission_date'
    ];

}

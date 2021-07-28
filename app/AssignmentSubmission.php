<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    
    protected $primaryKey = 'submission_id';

    protected $fillable = [
        'assignment_id', 
        'user_id', 
        'uploaded_file'
    ];

}

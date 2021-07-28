<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    
    //protected $primary_key = 'participation_id';

    protected $fillable = [
        'exam_id', 
        'user_id', 
        'started', 
        'started_at', 
        'completed', 
        'completed_at',
        'correct_answers', 
        'score', 
        'attempts', 
        'comments'
    ];

}

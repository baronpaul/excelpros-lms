<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $primaryKey = 'question_id';

    protected $fillable = [
        'collection_id', 
        'question_name', 
        'answer1', 
        'answer2', 
        'answer3', 
        'answer4',
        'answer5', 
        'correct', 
        'max_point'
    ];

}

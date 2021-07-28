<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $primaryKey = 'exam_id';

    protected $fillable = [
        'program_id', 
        'exam_title', 
        'exam_url',
        'exam_type', 
        'exam_description', 
        'number_of_questions', 
        'collection_id', 
        'time_limit', 
        'exam_status',
        'instructions'
    ];
}

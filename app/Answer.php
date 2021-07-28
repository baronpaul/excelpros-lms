<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $primaryKey = 'answer_id';

    protected $fillable = [
        'participation_id', 'question_id', 'response', 'attempt'
    ];
}

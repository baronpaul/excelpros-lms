<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamParticipant extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'exam_id', 
        'user_id',
    ];
}

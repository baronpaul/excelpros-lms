<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $primaryKey = 'participant_id';

    protected $fillable = [
        'user_id', 
        'program_id', 
        'status'
    ];
}

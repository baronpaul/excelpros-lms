<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    protected $primaryKey = 'program_id';

    protected $fillable = [
        'org_id', 
        'program_name', 
        'program_url', 
        'program_description',
        'duration',
        'start_date',
        'end_date',
        'program_status'
    ];
}

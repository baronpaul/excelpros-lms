<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramEvaluation extends Model
{
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'program_id', 
        'user_id', 
        'learned', 
        'will_apply', 
        'additional_training_required', 
        'content_quality_rating', 
        'methodology_rating', 
        'materials_quality_rating',
        'overall_rating',
        'overall_comment'
    ];

}

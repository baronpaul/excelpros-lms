<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilitatorEvaluation extends Model
{
    
    protected $fillable = [
        'program_id', 
        'facilitator_id', 
        'user_id', 
        'topic_rating', 
        'content_knowledge_rating', 
        'content_delivery_style_rating', 
        'time_management_rating', 
        'skill_transfer_capability_rating', 
        'addressing_questions_rating', 
        'overall_rating',
        'overall_comment'
    ];

}

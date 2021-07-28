<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificateIssuance extends Model
{
    
    protected $primaryKey = 'issue_id';

    protected $fillable = [
        'certificate_id',
        'program_id', 
        'participant_id', 
        'issue_date'
    ];

}

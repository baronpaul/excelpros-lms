<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificateTemplate extends Model
{
    
    protected $primaryKey = 'certificate_id';

    protected $fillable = [
        'program_id',
        'style'
    ];

}

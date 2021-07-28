<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $primaryKey = 'collection_id';

    protected $fillable = [
        'collection_title',
        'program_id'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accept extends Model
{
    protected $fillable = [
        'accepts'
    ];

    protected $primaryKey = 'user_id';

}

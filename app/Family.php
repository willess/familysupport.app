<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        'name',
        'country',
        'parents',
        'children',
        'about',
        'supported'
    ];
}

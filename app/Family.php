<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

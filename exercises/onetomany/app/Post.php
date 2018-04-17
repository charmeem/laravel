<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // for mass assignment
    protected $fillable = [
        'title',
        'body'
    ];
}

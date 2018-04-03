<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // By default this model class expects a table named 'posts'

    // Mass asignment configuration for create method
    protected $fillable = [
        'title',
        'content',
        'is_admin'
    ];
}

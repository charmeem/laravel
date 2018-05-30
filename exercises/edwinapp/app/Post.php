<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'photo_id',
        'body'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsto('App\Photo');
}
}

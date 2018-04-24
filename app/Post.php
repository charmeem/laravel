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

    //Inverse Relation- helper function to get the user for a given post
    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }


// Polymorphic - Mamny to many
    public function tags() {
        return $this->morphToMany('App\Tag', 'taggable');
    }

/** Examples of Query scope menipulation
 * Simplifying the long command line in index method of postcontroller
 *   See corresponding code in postcontroller index method
 */
    public function scopeLatest($query) {      // latest will be alias used in index method
        return $query->orderBy('id', 'asc')->get();
    }


}
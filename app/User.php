<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [

        'password', 'remember_token',

        ];

    # Helper function to pull out single post for a given user in one to one relationship

    public function post() {

        return $this->hasOne('\App\Post');

    }

    # Helper function to pull out multiple posts for a given user in one to many relation

    public function posts() {

        return $this->hasMany('\App\Post');

    }

    # helper function to pull out multiple posts for multiple users in many to many relation
    public function roles() {

        return $this->belongsToMany('\App\Role')->withPivot('created_at');

        // by convention pivot table name is role_user but if you have some other name then follow following convention

        //return $this->belongsToMany('\App\Role', 'some_other_table', 'user_id', 'role_id');
    }

    public function photos() {
        return $this->morphMany('App\Photo', 'imageable');
    }
}

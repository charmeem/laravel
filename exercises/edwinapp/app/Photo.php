<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [ 'file' ];

    // image directory that has to be appended in accessor function
    protected $directory = '/images/';

    // Accessor function
    public function getFileAttribute($photo) {
        return $this->directory . $photo;
    }
}

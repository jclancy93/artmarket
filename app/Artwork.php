<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function scopeSearch($query, $term)
    {
        //If a property is passed in, search by that property, else search all props
            return $query
                       ->where('artwork', 'like', "%$term%");
    }

}

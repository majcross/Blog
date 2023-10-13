<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id',
        'photo_id',
        'title',
        'body'



    ];

    public function user(){


        return $this->belongsTo('App\Models\User');


    }



    public function photo(){


        return $this->belongsTo('App\Models\Photo');


    }


    public function category(){


        return $this->belongsTo('App\Models\Category');


    }

    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}

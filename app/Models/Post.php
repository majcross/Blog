<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    use HasFactory, Sluggable;
    

    protected $fillable = [

        'category_id',
        'photo_id',
        'title',
        'body'



    ];

    public function sluggable(): array
{
    return [
        'slug' => [
            'source' => 'title', // The field to generate the slug from
            'onUpdate' => true,  // Regenerate the slug when the source field is updated
        ],
    ];
}

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

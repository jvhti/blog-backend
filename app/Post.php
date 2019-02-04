<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function author()
    {
        return $this->belongsTo('App\User', 'createdBy_user_id');
    }

    public function lastEditor()
    {
        return $this->belongsTo('App\User', 'updatedBy_user_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tags');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function reports()
    {
        return $this->hasMany('App\Report');
    }

}

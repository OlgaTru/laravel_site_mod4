<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function keywords()
    {
        return $this->belongsToMany('App\Keyword');
    }

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    protected $fillable = ['title', 'content', 'description', 'category_id', 'analytics'];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

 /*   public  function  childrenArticles(){
        return $this->hasOne(Article::class, 'category_id');
    }*/

    protected $fillable = ['category'];

}

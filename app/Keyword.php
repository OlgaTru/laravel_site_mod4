<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Keyword extends Model
{
    public $timestamps = false;

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    public $fillable = ['keyword'];
}

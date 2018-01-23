<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Role extends Model
{
    public function users(){
        return $this->belongsToMany('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

public function post(){
    return $this-hasMany('App\post');
}

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
  
protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

public function posts(){
    return $this->belongsToMany(post::class);
}
}

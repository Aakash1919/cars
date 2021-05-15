<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'status'];
    public $timestamps = false;

    public function cars() {
      return $this->hasMany('App\Models\Car');
    }
}

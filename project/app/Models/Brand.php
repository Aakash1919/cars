<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'status'];
    public $timestamps = false;

    public function cars() {
      return $this->hasMany('App\Car');
    }

    public function brand_models() {
      return $this->hasMany('App\Models\BrandModel');
    }
}

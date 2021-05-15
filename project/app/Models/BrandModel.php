<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $fillable = ['brand_id', 'name', 'status'];
    public $timestamps = false;

    public function brand() {
      return $this->belongsTo('App\Models\Brand');
    }

    public function cars() {
      return $this->hasMany('App\Models\Car');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condtion extends Model
{
    protected $fillable = ['name', 'status'];
    public $timestamps = false;

    public function cars() {
      return $this->hasMany('App\Car');
    }
}

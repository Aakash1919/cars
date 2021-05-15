<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $fillable = ['label','value'];
    public $timestamps = false;

    public function user() {
      return $this->belongsTo('App\Models\User');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id', 'plan_id', 'car_id', 'status', 'amount'];

    public function user() {
      return $this->belongsTo('App\Models\User');
    }
    public function car() {
      return $this->belongsTo('App\Models\Car');
    }
    public function plan() {
      return $this->belongsTo('App\Models\Plan');
    }
}

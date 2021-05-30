<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = ['id', 'user_id', 'car_id', 'bid_price', 'status', 'created_at', 'updated_at'];

    public function user() {
      return $this->belongsTo('App\Models\User');
    }

    public function car() {
      return $this->belongsTo('App\Models\Car', 'car_id');
    }
}

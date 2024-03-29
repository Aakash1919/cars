<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['id', 'title', 'stripe_plan_id', 'currency', 'currency_code', 'listing_price', 'price', 'days', 'ads', 'status', 'details'];
    public $timestamps = false;

    public function payments() {
      return $this->hasMany('App\Models\Payment');
    }
}

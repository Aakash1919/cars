<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['category_id', 'gender', 'username', 'first_name', 'last_name', 'email', 'phone', 'about', 'address', 'latitude', 'longitude', 'password', 'stripe_customer_id', 'stripe_subscription_id', 'verification_link', 'email_verified','usertype','trading_name','business_address', 'abn', 'licence'];

    public function cars() {
      return $this->hasMany('App\Models\Car');
    }

    public function payments() {
      return $this->hasMany('App\Models\Payment');
    }

    public function category() {
      return $this->belongsTo('App\Models\Category');
    }

    public function socialsetting() {
      return $this->hasOne('App\Models\Socialsetting');
    }
}

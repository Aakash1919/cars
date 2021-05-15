<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socialsetting extends Model
{
    protected $fillable = ['user_id', 'facebook', 'twitter', 'linkedin', 'f_status', 't_status', 'l_status'];
    public $timestamps = false;
}

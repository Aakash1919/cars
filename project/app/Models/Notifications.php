<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $fillable = ['userid', 'message',  'created_at', 'updated_at', 'status'];
    public $timestamps = false;
}

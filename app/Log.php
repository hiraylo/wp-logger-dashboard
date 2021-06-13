<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['website_name', 'website_url', 'plugin_name', 'plugin_version', 'user', 'status'];


}

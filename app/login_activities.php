<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login_activities extends Model
{
    protected $table = "login_activities";
    protected $fillable = ['user_id', 'ip_address', 'platform_type', 'platform_name', 'platform_version', 'browser_name', 'browser_version'];
}

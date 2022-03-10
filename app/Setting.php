<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'config_key',	
        'config_value',	
        'type'
    ];
}

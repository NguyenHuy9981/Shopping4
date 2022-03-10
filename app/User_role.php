<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    protected $fillable = [
        'user_id',
        'role_id',
    ];
}

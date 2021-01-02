<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Permission extends Model
{
    protected $table = 'user_permission';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'permission_id',
    ];
}

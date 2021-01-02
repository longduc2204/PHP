<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permission';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
    ];


}

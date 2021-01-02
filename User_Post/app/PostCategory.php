<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_category';

    public $timestamps = true;

    protected $fillable = [
        'post_id',
        'category_id',
    ];
}
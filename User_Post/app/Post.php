<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'content',
        'feature_url'
    ];

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'post_category','post_id','category_id');
    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    protected $table = 'category';

    public $timestamps = true;

    protected $fillable = [
        'name',
    ];
    public function posts(){
        return $this->belongsToMany(Post::class,'post_category', 'category_id', 'post_id');
    }
}

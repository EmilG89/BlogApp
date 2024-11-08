<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts() {
        return $this->belongsToMany('App\Model\Post', 'post_categories', 'category_id', 'post_id');
    }

    protected $fillable = [
        'category',
        //'post_id',
    ];
}

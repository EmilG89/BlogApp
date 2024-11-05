<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

     public function categories() {
        return $this->belongsToMany('App\Models\Category', 'post_categories', 'post_id', 'category_id');
    }

    public static $categories = [
        'Travel',
        'Sports',
        'Science',
        'Music',
        'Animals',
        'Food'
    ];

    protected $fillable = [
        'title',
        'message',
        'user_id',
        //'category_id',
    ];

}

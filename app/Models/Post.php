<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user(/* $user_id */) {
        //$user_name = User::where("id", $user_id)->get('name');
        //return $user_name[0]['name'];
        return $this->belongsTo('App\Models\User');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
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
        'category',
        'message',
        'user_id',
        //'category_id',
    ];

}

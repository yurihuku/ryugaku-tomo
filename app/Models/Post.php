<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'title',
        'body',
        'country_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function post_replies(){
        return $this->hasMany(PostReply::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function supports(){
        return $this->hasMany(Support::class);
    }

    public function userLikes(){
        return $this->belongsToMany(User::class, 'likes');
    }

    public function userSupports(){
        return $this->belongsToMany(User::class, 'supports');
    }
}

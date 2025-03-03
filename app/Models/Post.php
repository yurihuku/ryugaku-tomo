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

    public static function getPaginateByLimit($query, int $limit_count = 8){
        return $query->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }


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

    // public function userLikes()
    // {
    //     return $this->belongsToMany(User::class, 'likes')->withPivot('count')->withTimestamps();
    // }

    // //現在ログイン中のユーザーが投稿にした「いいね」を取得する用
    // public function userLike()
    // {
    //     return $this->belongsToMany(User::class, 'likes')->wherePivot('user_id', auth()->id())->withPivot('count')->withTimestamps();
    // }

    public function userSupports(){
        return $this->belongsToMany(User::class, 'supports');
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Country;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'study_abroad_start_date',
        'country_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);   
    }

    public function post_replies(){
        return $this->hasMany(PostReply::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    // public function likes()
    // {
    //     return $this->belongsToMany(Post::class, 'likes')->withPivot('count')->withTimestamps();
    // }

    public function supports(){
        return $this->hasMany(Support::class);
    }
}

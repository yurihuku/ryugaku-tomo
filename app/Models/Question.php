<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'country_id',
        'user_id',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function question_replies(){
        return $this->hasMany(QuestionReply::class);
    }
}

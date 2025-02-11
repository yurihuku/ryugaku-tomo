<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        'question_id',
    ];
    public function  question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

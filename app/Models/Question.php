<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'country_id',
        'user_id',
    ];
    
    // ページ
    // public function getByLimit(int $limit_count = 1){
    //     return $this->orderby('updated_at', 'DESC')->limit($limit_count)->get();
    // }

    // public function getPaginateByLimit(int $limit_count = 1){
    //     return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function question_replies(){
        return $this->hasMany(QuestionReply::class);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

/**
 * Question一覧を表示する
 * 
 * @param Question Questionモデル
 * return array Questionモデルリスト
 */

class QuestionController extends Controller
{
    public function list(Question $question){
        return view('questions.list')->with(['questions' => $question->get()]);
    }
}

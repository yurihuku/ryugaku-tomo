<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Requests\QuestionRequest;

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

    public function show(Question $question){
        return view('questions.show')->with(['question' => $question]);
    }

    public function create(){
        return view('questions.create');
    }

    public function store(Question $question, QuestionRequest $request){
        $input = $request->input('question');
        $input['country_id'] = 1;
        $input['user_id'] = 1;
        $question->fill($input)->save();
        return redirect('/');
    }
}

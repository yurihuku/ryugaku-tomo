<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Question一覧を表示する
 * 
 * @param Question Questionモデル
 * return array Questionモデルリスト
 */

class QuestionController extends Controller
{
    public function index(Question $question, Request $request){
        $user = Auth::user();
        $keyword = $request->input('keyword');

        $questions = $question->where('country_id', $user->country_id);
        if(!empty($keyword)){
            $questions->where('title', 'LIKE', "%{$keyword}%")->orWhere('body', 'LIKE', "%{$keyword}%");
        }
        $questions = $questions->get();
        return view('questions.index')->with(['questions' => $questions, 'keyword' => $keyword]);
    }

    public function show(Question $question){
        return view('questions.show')->with(['question' => $question]);
    }

    public function create(){
        return view('questions.create');
    }

    public function store(Question $question, QuestionRequest $request){
        $user = Auth::user();
        $input = $request->input('question');
        $input['user_id'] = $user->id;
        $input['country_id'] = $user->country_id;
        $question->fill($input)->save();
        return redirect('/questions/' . $question->id);
    }

    public function edit(Question $question){
        return view('questions.edit')->with(['question' => $question]);
    }

    public function update(Question $question, QuestionRequest $request){
        $input = $request->input('question');
        $question->fill($input)->update();
        return redirect('/questions/' . $question->id);
    }

    public function delete(Question $question){
        $question->delete();
        return redirect('/');
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionReplyRequest;
use App\Models\QuestionReply;
use Illuminate\Support\Facades\Auth;

class QuestionReplyController extends Controller
{
    public function reply(QuestionReplyRequest $request){
        $user = Auth::user();
        $input = $request['question_reply'];
        $input['user_id'] = $user->id;
        $question_reply = new QuestionReply();
        $question_reply->fill($input)->save();

        return redirect('/questions/' . $input['question_id']);
    }
}

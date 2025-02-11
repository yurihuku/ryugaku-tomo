<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionReplyRequest;
use App\Models\QuestionReply;


class QuestionReplyController extends Controller
{
    public function reply(QuestionReplyRequest $request){
        $input = $request['question_reply'];
        $input += ['user_id' => 1];
        $question_reply = new QuestionReply();
        $question_reply->fill($input)->save();

        return redirect('/questions/' . $input['question_id']);
    }
}

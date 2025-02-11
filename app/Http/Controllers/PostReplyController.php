<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostReplyRequest;
use App\Models\PostReply;

class PostReplyController extends Controller
{
    public function reply(PostReplyRequest $request){
        $input = $request['post_reply'];
        $input += ['user_id' => 1];
        $post_reply = new PostReply();
        $post_reply->fill($input)->save();

        return redirect('/posts/' . $input['post_id']);
    }
}

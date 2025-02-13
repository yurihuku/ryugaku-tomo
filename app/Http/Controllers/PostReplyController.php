<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostReplyRequest;
use App\Models\PostReply;
use Illuminate\Support\Facades\Auth;

class PostReplyController extends Controller
{
    public function reply(PostReplyRequest $request){
        $user = Auth::user();
        $input = $request['post_reply'];
        $input['user_id'] = $user->id;
        $post_reply = new PostReply();
        $post_reply->fill($input)->save();

        return redirect('/posts/' . $input['post_id']);
    }
}

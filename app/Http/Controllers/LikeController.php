<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likePost(Post $post){
        $user_id = Auth::id();
        $liked_post = $post->likes()->where('user_id', $user_id)->first();
        if(!$liked_post){
            $like = new Like();
            $like->user_id = $user_id;
            $like->post_id = $post->id;
            $like->count = 1;
            $like->save();
        }else{
            if($liked_post->count < 10){
                $post->userLikes()->updateExistingPivot($user_id, [
                    'count' => $liked_post->count + 1,
                ]);
            }else{

                return response()->json(['message' => '押せるのは10回まで!', 400]);
            }
        }

        $likes_count = $post->likes()->sum('count');
        $param = [
            'likesCount' => $likes_count,
        ];
        return response()->json($param);
    }
}

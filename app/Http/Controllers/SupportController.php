<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function supportPost(Post $post){
        $user_id = Auth::id();
        $supportd_post = $post->supports()->where('user_id', $user_id)->first();
        if(!$supportd_post){
            $support = new Support();
            $support->user_id = $user_id;
            $support->post_id = $post->id;
            $support->count = 1;
            $support->save();
        }else{
            if($supportd_post->count < 10){
                $post->usersupports()->updateExistingPivot($user_id, [
                    'count' => $supportd_post->count + 1,
                ]);
            }else{

                return response()->json(['message' => '押せるのは10回まで!', 400]);
            }
        }

        $supports_count = $post->supports()->sum('count');
        $param = [
            'supportsCount' => $supports_count,
        ];
        return response()->json($param);
    }
}

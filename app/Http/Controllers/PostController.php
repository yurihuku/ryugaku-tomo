<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

/**
 * Question一覧を表示する
 * 
 * @param Post Postモデル
 * return array Postモデルリスト
 */

class PostController extends Controller
{
    public function index(Post $post, Request $request){
        $user = Auth::user();
        $keyword = $request->input('keyword');

        $posts = $post->where('country_id', $user->country_id);
        if(!empty($keyword)){
            $posts->where('body', 'LIKE', "%{$keyword}%");
        }
        // $posts = $posts->get();

        $posts = Post::getPaginateByLimit($posts, 8);

        return view('posts.index')->with(['posts' => $posts, 'keyword' => $keyword]);
    }

    public function show(Post $post){
        return view('posts.show')->with(['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Post $post, postRequest $request){
        $user = Auth::user();
        $input = $request->input('post');
        $input['user_id'] = $user->id;
        $input['country_id'] = $user->country_id;
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post){
        if($post->user_id !== auth()->id()){
            return redirect('/posts/' . $post->id)->with('error', 'この投稿は編集できません');
        }
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update(Post $post, postRequest $request){
        $input = $request->input('post');
        $post->fill($input)->update();
        return redirect('/posts/' . $post->id);
    }

    public function delete(Post $post){
        if($post->user_id !== auth()->id()){
            return redirect('/posts/' . $post->id)->with('error', 'この投稿は削除できません');
        }
        $post->delete();
        return redirect('/posts');
    }

}

<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\PostRequest;

// use Illuminate\Http\Request;

/**
 * Question一覧を表示する
 * 
 * @param Post Postモデル
 * return array Postモデルリスト
 */

class PostController extends Controller
{
    public function index(Post $post){
        return view('posts.index')->with(['posts' => $post->get()]);
    }

    public function show(Post $post){
        return view('posts.show')->with(['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Post $post, postRequest $request){
        $input = $request->input('post');
        $input['country_id'] = 1;
        $input['user_id'] = 1;
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post){
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update(Post $post, postRequest $request){
        $input = $request->input('post');
        $input['country_id'] = 1;
        $input['user_id'] = 1;
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function delete(Post $post){
        $post->delete();
        return redirect('/posts');
    }

}

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>留学トモ　質問一覧</title>
</head>
<body>
  <h1>留学トモ悩みコーナー</h1>
  <a href="/posts/create">作成</a>
  <div class="posts">
    @foreach ($posts as $post)
    <div class="post">
      <h2 class="title">
        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
      </h2>
      <p>{{ $post->body }}</p>
      <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="button" onclick="deletepost({{ $post->id }})">削除</button>
      </form>
    </div>
    @endforeach
  </div>
  <script>
    function deletepost(id){
      'use strict'

      if(confirm('本当に削除しますか？')){
        document.getElementById(`form_${id}`).submit();
      }
    }
  </script>
</body>
</html>
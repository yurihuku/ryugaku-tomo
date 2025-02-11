<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>質問内容詳細</title>
</head>

<body>
  <h1 class="title">{{ $post->title }}</h1>
  <div class="content">
    <div class="content__post">
      <h3>質問内容</h3>
      <p>{{ $post->body }}</p>
    </div>
    <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></div>
  </div>
  <form action="/posts/reply" method="POST">
    @csrf
    <div class="comment">
      <input type="text" name="post_reply[comment]" placeholder="コメント入力" value="{{ old('post_reply.comment') }}">
      <input type="hidden" name="post_reply[post_id]" value="{{ $post->id }}">
      <p class="comment_error" style="color:red">{{ $errors->first('post_reply.comment') }}</p>
    </div>
    <input class="cursor-pointer" type="submit" value="返信">
  </form>

  <div class="post_reply">
    @foreach ($post->post_replies as $post_reply)
    <div>
      <p>{{ $post_reply->user->name }}</p>
      <p>{{ $post_reply->comment }}</p>
    </div>
    @endforeach
  </div>

  <footer>
    <a href="/posts">戻る</a>
  </footer>
</body>

</html>  
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
  <footer>
    <a href="/posts">戻る</a>
  </footer>
</body>
</html>
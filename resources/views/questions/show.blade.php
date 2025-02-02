<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>質問内容詳細</title>
</head>
<body>
  <h1 class="title">{{ $question->title }}</h1>
  <div class="content">
    <div class="content__question">
      <h3>質問内容</h3>
      <p>{{ $question->body }}</p>
    </div>
  </div>
  <footer>
    <a href="/">戻る</a>
  </footer>
</body>
</html>
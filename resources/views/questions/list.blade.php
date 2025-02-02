<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>留学トモ　質問一覧</title>
</head>
<body>
  <h1>留学トモQ&A</h1>
  <a href="/questions/create">作成</a>
  <div class="questions">
    @foreach ($questions as $question)
    <div class="question">
      <h2 class="title">
        <a href="/questions/{{ $question->id }}"{{ $question->title }}></a>
      </h2>
      <p>{{ $question->body }}</p>
    </div>
    @endforeach
  </div>
</body>
</html>
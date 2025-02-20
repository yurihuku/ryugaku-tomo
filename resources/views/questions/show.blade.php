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
    <div class="edit"><a href="/questions/{{ $question->id }}/edit">編集</a></div>
  </div>

  <form action="/questions/reply" method="POST">
    @csrf
    <div class="comment">
      <input type="text" name="question_reply[comment]" placeholder="コメント入力" value="{{ old('question_reply.comment') }}">
      <input type="hidden" name="question_reply[question_id]" value="{{ $question->id }}">
      <p class="comment_error" style="color:red">{{ $errors->first('question_reply.comment') }}</p>
    </div>
    <input class="cursor-pointer" type="submit" value="返信">
  </form>

  <div class="question_reply">
    @foreach ($question->question_replies as $question_reply)
    <div>
      <p>{{ $question_reply->user->name }}</p>
      <p>{{ $question_reply->comment }}</p>
    </div>
    @endforeach
  </div>


  <footer>
    <a href="/questions">戻る</a>
  </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集画面</title>
</head>

<body>
  <h1>編集画面</h1>
  <div class="content">
    <form action="/questions/{{ $question->id }}" method="POST">
      @csrf
      @method('PUT')
      <div class="title">
        <h2>タイトル</h2>
        <input type="text" name="question[title]" value="{{ $question->title }}" />
        <p class="title__error" style="color:red">{{ $errors->first('question.title') }}</p>
      </div>
      <div class="body">
        <h2>本文</h2>
        <textarea name="question[body]">{{ $question->body }}</textarea>
        <p class="body__error" style="color:red">{{ $errors->first('question.body') }}</p>
      </div>
      <input type="submit" value="更新" />
    </form>
  </div>
</body>

</html>
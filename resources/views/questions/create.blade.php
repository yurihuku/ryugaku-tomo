<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>質問投稿</title>
</head>

<body>
  <form action="/questions" method="POST">
  @csrf
  <div class="title">
    <h2>タイトル</h2>
    <input type="text" name="question[title]" placeholder="おすすめのスーパーはどれ？" />
    <p class="title__error" style="color:red">{{ $errors->first('question.title') }}</p>
  </div>
  <div class="body">
    <h2>本文</h2>
    <textarea name="question[body]" placeholder="テキサス州に住んでいます。どのスーパーが安いですか？"></textarea>
    <p class="body__error" style="color:red">{{ $errors->first('question.body') }}</p>
  </div>
    <input type="submit" value="保存" />
  </form>
</body>

</html>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>留学トモ　質問一覧</title>
</head>
<body>
  <h1>留学トモQ&A</h1>
  <nav><li><a href="/posts">ツブヤキ</a></li></nav>
  
  <!-- 検索機能 -->
  <div class="search">
    <form action="/questions" method="GET">
    <input type="text" name="keyword" value="{{$keyword}}">
    <input type="submit" value="検索">  
    </form>

  </div>
  <a href="/questions/create">作成</a>
  <div class="questions">
    @foreach ($questions as $question)
    <div class="question">
      <h2 class="title">
        <a href="/questions/{{ $question->id }}">{{ $question->title }}</a>
      </h2>
      <p>{{ $question->body }}</p>
      <form action="/questions/{{ $question->id }}" id="form_{{ $question->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="button" onclick="deleteQuestion({{ $question->id }})">削除</button>
      </form>
    </div>
    @endforeach
  </div>
  <script>
    function deleteQuestion(id){
      'use strict'

      if(confirm('本当に削除しますか？')){
        document.getElementById(`form_${id}`).submit();
      }
    }
  </script>
</body>
</html>
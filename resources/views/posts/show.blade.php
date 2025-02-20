<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
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

  <!-- 共感ボタン -->
  <div class="reactions">
    <div class="like_reaction">
      @auth
      @if (Auth::user()->likes()->where('post_id', $post->id)->exists())
      <ion-icon name="heart" class="like-btn cursor-pointer text-pink-500" id="{{$post->id}}_like"></ion-icon>
      @else
      <ion-icon name="heart-outline" class="like-btn cursor-pointer" id="{{$post->id}}_like"></ion-icon>
      @endif
      <p class="count-num">{{ $post->likes()->sum('count') }}</p>
      @endauth
    </div>
    <div class="support_reaction">
      @auth
      @if (Auth::user()->supports()->where('post_id', $post->id)->exists())
      <ion-icon name="flame" class="support-btn cursor-pointer text-pink-500" id="{{$post->id}}_support"></ion-icon>
      @else
      <ion-icon name="flame-outline" class="support-btn cursor-pointer" id="{{$post->id}}_support"></ion-icon>
      @endif
      <p class="count-num">{{ $post->supports()->sum('count') }}</p>
      @endauth
    </div>
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

  <!-- ioniconインストール -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>
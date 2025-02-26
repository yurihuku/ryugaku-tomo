<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>留学トモ　質問一覧</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('テストヘッダー') }}
      </h2>
    </x-slot>

    <a href="/posts/create" class="fixed bottom-1/4 right-1/10 flex flex-col items-center">
      <ion-icon name="chatbox-ellipses-outline" class="text-3xl"></ion-icon>
      <p>作成</p>
    </a>


    <main class="w-3/5 mx-auto pt-20">
      <h1 class="text-center text-2xl my-8">ツブヤキ</h1>
      <!-- 検索機能 -->
      <div class="search ">
        <div class="text-lg text-gray-400 text-center">みんなのツブヤキを覗く</div>
        <form action="/posts" method="GET" class="flex items-center text-center">
          <input type="text" name="keyword" value="{{$keyword}}" placeholder="キーワードで検索">
          <!-- <input type="submit" value="検索"> -->
          <button type="submit"><ion-icon name="search-outline" size="large"></ion-icon></button>
        </form>
      </div>


      <div class="posts w-4/5 mx-auto space-y-4">
        @foreach ($posts as $post)

        <a href="/posts/{{ $post->id }}">
          <div class="post border border-gray-300 mt-16 p-4 rounded-2xl">
            <!-- titleいるorいらない 、いらないかな-->
            <!-- <h2 class="title">
          <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
        </h2> -->
            <div class="post__user flex gap-2.5 text-xs">
              <p>profile-pic</p>
              <p class="name">{{$post->user->name}}</p>
              <p class="country">{{$post->user->country->name}}</p>
              <p class="start__date">{{$post->user->study_abroad_start_date}} ~</p>
            </div>

            <!-- 表示は150文字までにしたい -->
            <p class="mt-4 text-sm">{{ $post->body }}</p>

            <div class="post__situation mt-6 flex">
              <div class="show__reply flex-1 ml-5 flex items-center gap-0.5">
                <ion-icon name="chatbox-outline"></ion-icon>
                <span class="text-xs">{{ $post->post_replies->count() }}</span>
              </div>

              <div class="flex flex-1 gap-4">
                <div class="show__heart flex items-center gap-0.5">
                  @auth
                  @if (Auth::user()->likes()->where('post_id', $post->id)->exists())
                  <ion-icon name="heart" class="like-btn cursor-pointer text-pink-500" id="{{$post->id}}_like"></ion-icon>
                  @else
                  <ion-icon name="heart-outline" class="like-btn cursor-pointer" id="{{$post->id}}_like"></ion-icon>
                  @endif
                  <p class="count-num text-xs">{{ $post->likes()->sum('count') }}</p>
                  @endauth
                </div>
                <div class="show__flame flex items-center gap-0.5">
                  @auth
                  @if (Auth::user()->supports()->where('post_id', $post->id)->exists())
                  <ion-icon name="flame" class="support-btn cursor-pointer text-pink-500" id="{{$post->id}}_support"></ion-icon>
                  @else
                  <ion-icon name="flame-outline" class="support-btn cursor-pointer" id="{{$post->id}}_support"></ion-icon>
                  @endif
                  <p class="count-num text-xs">{{ $post->supports()->sum('count') }}</p>
                  @endauth
                </div>
              </div>
            </div>


            <!-- <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
          @csrf
          @method('DELETE')
          <button type="button" onclick="deletepost({{ $post->id }})">削除</button>
        </form> -->
          </div>
        </a>
        @endforeach

      </div>
    </main>

    <!-- ioniconインストール -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </x-app-layout>
</body>

</html>
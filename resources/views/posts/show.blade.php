<!-- <!DOCTYPE html> -->
<!-- <html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>質問内容詳細</title>
</head> -->

<!-- <body> -->
  
<x-app-layout>
  <x-slot name="header">
  </x-slot>

  <main class="mx-auto flex w-3/5 flex-wrap pt-10">
    <!-- <h1 class="title">{{ $post->title }}</h1> -->

    <div class="flex-1/2">
      <div class="content border border-gray-300 rounded-xl p-5">
        <div class="post__user flex gap-2.5 text-xs">
          <p>profile-pic</p>
          <p class="name">{{$post->user->name}}</p>
          <p class="country">{{$post->user->country->name}}</p>
          <p class="start__date">{{$post->user->study_abroad_start_date}} ~</p>
        </div>
        <p class="mt-4">{{ $post->body }}</p>
        <p class="mt-4 text-right text-xs">{{$post->created_at}}</p>
        <div class="flex justify-end gap-2">
          <div class="edit"><a href="/posts/{{ $post->id }}/edit"><ion-icon name="pencil-outline"></ion-icon></a></div>
          <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deleteQuestion({{ $post->id }})"><ion-icon name="trash-outline"></ion-icon></button>
          </form>
        </div>
        <!-- <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></div> -->
      </div>

      <!-- 共感ボタン -->
      <div class="reactions flex justify-center gap-2.5 pt-4">
        <div class="like_reaction">
          <div class="flex h-16 w-16 items-center justify-center rounded-xl border" style="background: linear-gradient(0deg, #3b7df8, #4bfaef)"><ion-icon name="heart" class="like-btn cursor-pointer text-white w-14 h-14" id="{{$post->id}}_like"></ion-icon></div>
          <p id="count-num-like" class="text-center">{{ $post->likes()->sum('count') }}</p>
          <p class="mt-1 text-center text-sm">わかる</p>
        </div>

        <div class="support_reaction">
          <div class="flex h-16 w-16 items-center justify-center rounded-xl border" style="background: linear-gradient(0deg, #3b7df8, #4bfaef)"><ion-icon name="flame" class="support-btn cursor-pointer text-white w-12 h-12" id="{{$post->id}}_support"></ion-icon></div>
          <p id="count-num-support" class="text-center">{{ $post->supports()->sum('count') }}</p>
          <p class="mt-1 text-center text-sm">応援する</p>
        </div>
    </div>

    <div class="flex-1/2 sm:p-4 sm:pl-8">
      <h2 class="text-xl font-medium">Comment</h2>
      <form action="/posts/reply" method="POST">
        @csrf
        <div class="comment">
          <div class="flex justify-center">
            <input type="text" name="post_reply[comment]" placeholder="コメント入力" value="{{ old('post_reply.comment') }}">
            <input type="hidden" name="post_reply[post_id]" value="{{ $post->id }}">
          </div>
          <p class="comment_error" style="color:red">{{ $errors->first('post_reply.comment') }}</p>
        </div>
        <input class="cursor-pointer rounded-lg bg-black p-1 text-white" type="submit" value="Comment">
      </form>

      <div class="post_reply mt-4 h-48 overflow-y-scroll divide-y divide-gray-300">
        @foreach ($post->post_replies as $post_reply)
        <div class="reply__content p-4">
          <div class="flex gap-2.5 text-xs">
            <p>profile-pic</p>
            <p>{{ $post_reply->user->name }}</p>
            <p>{{ $post_reply->user->country->name }}</p>
            <p>{{ $post_reply->user->study_abroad_start_date }}</p>
          </div>
          <p class="text-sm mt-2">{{ $post_reply->comment }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </main>

  <footer>
    <a href="/posts" class="fixed bottom-16 left-16"><ion-icon name="chevron-back-circle-outline" size="large"></ion-icon></a>
  </footer>

  <script>
    function deletepost(id) {
      'use strict'

      if (confirm('本当に削除しますか？')) {
        document.getElementById(`form_${id}`).submit();
      }
    }
  </script>

</x-app-layout>

<!-- </body>
     ioniconインストール
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</html> -->
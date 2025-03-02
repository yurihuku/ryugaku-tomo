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
    <h2 class="font-semibold text-xl text-gray-500 leading-tight">
      {{ __('ツブヤキを詳しく') }}
    </h2>
  </x-slot>

  <main class="mx-auto flex flex-wrap w-3/5 pt-10">
    <!-- <h1 class="title">{{ $post->title }}</h1> -->

    <div class="w-96 flex-none">
      <div class="content bg-white border border-gray-300 shadow rounded-md p-5">
        <div class="post__user flex gap-2.5 text-xs">
          <!-- <p>profile-pic</p> -->
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
            <button type="button" onclick="deletePost({{ $post->id }})"><ion-icon name="trash-outline"></ion-icon></button>
          </form>
        </div>
        <!-- <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></div> -->
      </div>

      <!-- 共感ボタン -->
      <div class="reactions flex justify-center gap-5 pt-4">
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
    </div>

    <div class="flex-1/2 sm:p-4 sm:pl-8">
      <form action="/posts/reply" method="POST">
        @csrf
        <label for="comment" class="text-xl font-medium">Comment</label>
        <div class="flex gap-1">
          <div class="comment">
            <input id="comment" type="text" name="post_reply[comment]" placeholder="コメント入力" value="{{ old('post_reply.comment') }}" class="rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <input type="hidden" name="post_reply[post_id]" value="{{ $post->id }}">
          </div>
          <input type="submit" value="送信" class="cursor-pointer rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none active:bg-gray-900">
        </div>
        <p class="comment_error" style="color:red">{{ $errors->first('post_reply.comment') }}</p>
      </form>

      <div class="post_reply mt-4 w-full h-48 overflow-y-scroll shadow bg-white rounded-md">
        @foreach ($post->post_replies as $post_reply)
        <div class="reply__content p-4 border-b border-gray-300">
          <div class="flex gap-2.5 text-xs">
            <!-- <p>profile-pic</p> -->
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
    function deletePost(id) {
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
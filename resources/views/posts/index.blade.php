<!-- <!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>留学トモ　質問一覧</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head> -->

<!-- <body> -->
  <x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-500 leading-tight">
        {{ __('ツブヤキ') }}
      </h2>
    </x-slot>

    <a href="/posts/create" class="fixed bottom-16 right-16 flex flex-col items-center py-5 px-3 border border-gray-300 rounded-lg">
      <span class="bg-white absolute inset-0 opacity-50 rounded-md"></span>
      <ion-icon name="chatbox-ellipses" size="large" class="text-6xl" style="color:#3b7df8"></ion-icon>
      <span style="background:linear-gradient(90deg, #3b7df8, #4bfaef); -webkit-background-clip: text; -webkit-text-fill-color:transparent;">ツブヤク</span>
    </a>


    <main class="w-3/5 mx-auto py-10">
      <h1 class="text-center text-2xl font-medium mb-8">ツブヤキ</h1>
      <!-- 検索機能 -->
      <div class="search__area">
        <div class="text-lg text-gray-400 text-center">みんなのツブヤキを覗く</div>
        <form action="/posts" method="GET">
          <div class="h-10 w-56 mx-auto flex items-center justify-center">
          <input type="text" name="keyword" value="{{$keyword}}" placeholder="キーワードで検索" class="border border-gray-600 rounded-l-md h-full flex px-3 text-gray-700">
          <button type="submit" class="border border-gray-600 rounded-r-md cursor-pointer h-full px-3 bg-gray-800 tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none active:bg-gray-900 inset-0"><ion-icon name="search-outline" style="place-items: center;" class="text-xl"></ion-icon></button>
          </div>
        </form>
      </div>


      <div class="posts w-4/5 min-w-72 mx-auto mt-6">
        @foreach ($posts as $post)

        <a href="/posts/{{ $post->id }}">
          <div class="post bg-white border border-gray-300 hover:border-indigo-500 hover:ring-indigo-500 mt-6 p-4 rounded-2xl">
            <div class="post__user flex gap-2.5 text-xs">
              <!-- <p>profile-pic</p> -->
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
                  <ion-icon name="heart" class="like-btn cursor-pointer" style="background:linear-gradient(0deg, #3b7df8, #4bfaef); -webkit-background-clip: text; -webkit-text-fill-color:transparent;" id="{{$post->id}}_like"></ion-icon>
                  @else
                  <ion-icon name="heart-outline" class="like-btn cursor-pointer" id="{{$post->id}}_like"></ion-icon>
                  @endif
                  <p class="count-num text-xs">{{ $post->likes()->sum('count') }}</p>
                  @endauth
                </div>
                <div class="show__flame flex items-center gap-0.5">
                  @auth
                  @if (Auth::user()->supports()->where('post_id', $post->id)->exists())
                  <ion-icon name="flame" class="support-btn cursor-pointer" style="background:linear-gradient(0deg, #3b7df8, #4bfaef); -webkit-background-clip: text; -webkit-text-fill-color:transparent;" id="{{$post->id}}_support"></ion-icon>
                  @else
                  <ion-icon name="flame-outline" class="support-btn cursor-pointer" id="{{$post->id}}_support"></ion-icon>
                  @endif
                  <p class="count-num text-xs">{{ $post->supports()->sum('count') }}</p>
                  @endauth
                </div>
              </div>
            </div>


          </div>
        </a>
        @endforeach
        <div class="paginate">
          {{ $posts->links() }}
        </div>

      </div>
    </main>

    <!-- ioniconインストール -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </x-app-layout>
<!-- </body>

</html> -->
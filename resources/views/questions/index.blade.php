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
      <p>留学Q&A</p>
    </x-slot>

    <!-- 位置を調整したい -->
    <a href="/questions/create" class="fixed bottom-1/4 right-1/10 flex flex-col items-center">
      <!-- ioniconの色が変えられない -->
      <ion-icon name="create-outline" class="text-3xl" style="background:linear-gradient(0deg, #3b7df8, #4bfaef); -webkit-background-clip: text; -webkit-text-fill-color:transparent;"></ion-icon>
      <span style="background:linear-gradient(0deg, #3b7df8, #4bfaef); -webkit-background-clip: text; -webkit-text-fill-color:transparent;">質問する？</span>
    </a>


    <main class="w-3/5 mx-auto pt-40 bg-white">
      <h1 class="text-center my-8 text-2xl font-medium">留学Q&A</h1>
      <!-- 検索機能 -->
      <div class="search__area">
        <div class="text-lg text-gray-400 text-center">過去のQ&Aから解決</div>
        <!-- フォーム内に虫眼鏡アイコン入れてEnterキーによりsubmit・または検索ボタンを虫眼鏡アイコンにする-->


        <!-- <div class="border border-black flex items-center h-10 justify-center"> -->
        <form action="/questions" method="GET" class="text-center border border-black flex items-center h-10 justify-center">
          <input type="text" name="keyword" value="{{$keyword}}" class="rounded-3xl" style="border:solid 1px #4bfaef">
          <!-- <input type="submit" value="検索"> -->
          <button type="submit"><ion-icon name="search-outline" size="large"></ion-icon></button>
        </form>
        <!-- </div> -->



      </div>


      <div class="mt-16">
        <div class="questions__title">
          <p class="shadow-md border-1 border-gray-200 border-b-0 p-2">みんなのQ&A</p>
        </div>
        <div class="questions">
          @foreach ($questions as $question)
          <div class="flex p-2 hover:bg:gray:200">
            <h2 class="title">
              <!-- 初めの15文字だけ見せたい -->
              <a href="/questions/{{ $question->id }}">{{ $question->title }}</a>
            </h2>
            <!-- 日付だけ見せたい。時間いらない -->
            <p class="ml-auto">{{$question->created_at}}</p>
          </div>
          @endforeach
        </div>
        <!-- ページ -->
        <!-- <div class="paginate">{{ $questions->links() }}</div> -->
      </div>
    </main>
    <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->
  </x-app-layout>
</body>

</html>
<!-- <!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>留学トモ　質問一覧</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body> -->
<x-app-layout>
  <x-slot name="header">
    <p class="font-semibold text-xl text-gray-500 leading-tight">留学Q&A</p>
  </x-slot>

  <a href="/questions/create" class="fixed bottom-16 right-16 flex flex-col items-center py-5 px-2 border border-gray-300 rounded-lg">
    <span class="bg-white absolute inset-0 opacity-50 rounded-md"></span>
    <ion-icon name="create" size="large" class="text-6xl" style="color:#3b7df8"></ion-icon>
    <span style="background:linear-gradient(90deg, #3b7df8, #4bfaef); -webkit-background-clip: text; -webkit-text-fill-color:transparent;">質問する？</span>
  </a>


  <main class="w-3/5 mx-auto py-10">
    <h1 class="text-center text-2xl font-medium mb-8">留学Q&A</h1>
    <!-- 検索機能 -->
    <div class="search__area">
      <div class="text-lg text-gray-400 text-center">過去のQ&Aから解決</div>
      <form action="/questions" method="GET">
        <div class="h-10 w-56 mx-auto flex items-center justify-center">
          <input type="text" name="keyword" value="{{$keyword}}" placeholder="キーワードで検索" class="border border-gray-600 rounded-l-md h-full flex px-3 text-gray-700">
          <button type="submit" class="border border-gray-600 rounded-r-md cursor-pointer h-full px-3 bg-gray-800 tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none active:bg-gray-900 inset-0"><ion-icon name="search-outline" style="place-items: center;" class="text-xl"></ion-icon></button>
        </div>
      </form>
    </div>


    <div class="mt-16 bg-white rounded-md">
      <div class="questions__title">
        <p class="shadow-md border-1 border-gray-200 border-b-0 p-2">みんなのQ&A</p>
      </div>
      <div class="questions">
        @foreach ($questions as $question)
        <div class="flex p-2 hover:bg-gray-200">
          <h2 class="title">
            <!-- 初めの15文字だけ見せたい -->
            <a href="/questions/{{ $question->id }}">{{ $question->title }}</a>
          </h2>
          <!-- 日付だけ見せたい。時間いらない -->
          <p class="ml-auto">{{$question->created_at}}</p>
        </div>
        @endforeach
      </div>
      <div class="paginate">
        <div>
          {{ $questions->links() }}
        </div>
      </div>
    </div>
  </main>
  <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->
  <!-- </x-app-layout>
</body>

</html> -->
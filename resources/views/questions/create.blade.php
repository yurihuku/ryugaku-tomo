<!-- <!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>質問投稿</title>
</head>

<body> -->
<x-app-layout>
  <x-slot name="header">
    <p class="font-semibold text-xl text-gray-500 leading-tight" >留学Q&A　質問投稿</p>
  </x-slot>

  <div class="py-12 sm:w-3/5 mx-auto">
    <form action="/questions" method="POST" class="mx-auto border border-gray-300 bg-white p-4 shadow sm:rounded-lg sm:p-8 space-y-6">
      @csrf
      <p class="text-sm text-gray-600">あなたの質問を投稿する</p>
      <div class="title">
        <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
        <input id="title" type="text" name="question[title]" placeholder="最大50文字　例：おすすめの○○はどれ？" class="w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
        <p class="title__error" style="color:red">{{ $errors->first('question.title') }}</p>
      </div>
      <div class="body">
        <label for="body" class="block text-sm font-medium text-gray-700">本文</label>
        <textarea id="body" name="question[body]" placeholder="最大1000文字　例：△△州に住んでいます。オススメの○○はどれですか？" class="w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
        <p class="body__error" style="color:red">{{ $errors->first('question.body') }}</p>
      </div>
      <input type="submit" value="投稿" class="inline-flex items-center rounded-md border border-transparent bg-gray-800 w-full px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none active:bg-gray-900" />
    </form>
  </div>
</x-app-layout>
<!-- </body>

</html> -->
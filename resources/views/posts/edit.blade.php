<!-- <!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集画面</title>
</head> -->

<body>
  <x-app-layout>
    <x-slot name="header">
      <p class="font-semibold text-xl text-gray-500 leading-tight">あなたのツブヤキ 編集</p>
    </x-slot>


    <!-- <h1>編集画面</h1> -->
    <div class="py-12 sm:w-3/5 mx-auto">
      <form action="/posts/{{ $post->id }}" method="POST" class="mx-auto border border-gray-300 bg-white p-4 shadow sm:rounded-lg sm:p-8 space-y-6">
        @csrf
        @method('PUT')
        <!-- <div class="title">
        <h2>タイトル</h2>
        <input type="text" name="post[title]" value="{{ $post->title }}" />
        <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
      </div> -->
        <p class="text-sm text-gray-600">あなたのツブヤキを編集する</p>
        <div class="body">
          <label for="body" class="block text-sm font-medium text-gray-700">本文</label>
          <textarea id="body" name="post[body]" class="w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $post->body }}</textarea>
          <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
        </div>
        <input type="submit" value="更新" class="inline-flex items-center rounded-md border border-transparent bg-gray-800 w-full px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none active:bg-gray-900"/>
      </form>
    </div>

  </x-app-layout>
  <!-- </body>

</html> -->
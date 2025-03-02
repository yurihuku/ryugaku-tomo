<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>質問内容詳細</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-500 leading-tight">
        {{ __('留学Q&Aを詳しく') }}
      </h2>
    </x-slot>

    <main class="w-3/5 mx-auto pt-10 pb-10">
      <div class="flex border-b border-gray-300 pb-2.5">
        <div class="w-40 flex-none">
          <h2 class="font-medium text-xl">Question</h2>
        </div>
        <div class="flex-1">
          <h2 class="font-medium text-xl">{{ $question->title }}</h2>
          <div class="flex gap-2.5 mt-6 text-xs">
            <!-- <p>profile-pic</p> -->
            <p class="name">{{$question->user->name}}</p>
            <p class="country">{{$question->user->country->name}}</p>
            <p class="start__date">{{$question->user->study_abroad_start_date}} ~</p>
          </div>
          <p class="mt-4">{{ $question->body }}</p>
          <p class="mt-4 text-right text-xs">{{$question->created_at}}</p>
          <div class="flex justify-end gap-2">
            <div class="edit"><a href="/questions/{{ $question->id }}/edit"><ion-icon name="pencil-outline"></ion-icon></a></div>
            <form action="/questions/{{ $question->id }}" id="form_{{ $question->id }}" method="post">
              @csrf
              @method('DELETE')
              <button type="button" onclick="deleteQuestion({{ $question->id }})"><ion-icon name="trash-outline"></ion-icon></button>
            </form>
          </div>
        </div>
      </div>

      <!-- Answer -->
      <div class="flex mt-8">
        <div class="w-40 flex-none">
          <h2 class="font-medium text-xl">Answer</h2>
        </div>
        <div class="flex-1">
          <!--入力フォームと送信ボタンを横並びにしたい -->
          <form action="/questions/reply" method="POST">
            @csrf
            <div class="flex gap-1">
              <div class="comment">
                <input type="text" name="question_reply[comment]" placeholder="コメント入力" value="{{ old('question_reply.comment') }}" class="rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <input type="hidden" name="question_reply[question_id]" value="{{ $question->id }}">
              </div>
              <input type="submit" value="返信" class="cursor-pointer rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none active:bg-gray-900">
            </div>
            <p class="comment_error" style="color:red">{{ $errors->first('question_reply.comment') }}</p>
          </form>

        <div class="mt-8 space-y-10">
          @foreach ($question->question_replies as $question_reply)
          <div>
            <div class="flex gap-2.5 text-xs">
              <!-- <p>profile-pic</p> -->
              <p>{{ $question_reply->user->name }}</p>
              <p>{{ $question_reply->user->country->name }}</p>
              <p>{{ $question_reply->user->study_abroad_start_date }}</p>
            </div>

            <p class="mt-4">{{ $question_reply->comment }}</p>
            <p class="mt-4 text-right text-xs">{{ $question_reply->created_at }}</p>
          </div>
          @endforeach
        </div>
        </div>
      </div>

      <footer>
        <a href="/"><ion-icon name="chevron-back-circle-outline" size="large"></ion-icon></a>
      </footer>

      </main>


    <script>
      function deleteQuestion(id) {
        'use strict'

        if (confirm('本当に削除しますか？')) {
          document.getElementById(`form_${id}`).submit();
        }
      }
    </script>

    <!-- ioniconインストール -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </x-app-layout>
</body>

</html>
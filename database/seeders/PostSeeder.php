<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'ryugaku@us.com')->first();
        for ($i = 0; $i < 20; $i++) {
            DB::table('posts')->insert(
                [
                    'body' => 'これは例のツブヤキです。ユーザーは留学生活で感じたことや体験したこと、または気持ち等を吐き出すことができます。ユーザーはわかるボタン・応援ボタンを1人1つの投稿につき10回まで押すことができます。',
                    'country_id' => $user->country_id,
                    'user_id' => $user->id,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DateTime;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'ryugaku@us.com')->first();
        for ($i = 0; $i < 20; $i++) {
            DB::table('questions')->insert(
                [
                    'title' => 'これは例のタイトルです。',
                    'body' => 'これは例の質問本文です。ユーザーは互いに質問し合い回答し合います。',
                    'country_id' => $user->country_id,
                    'user_id' => $user->id,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ]
            );
        }
    }
}

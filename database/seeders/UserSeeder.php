<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => '留学太郎',
                    'email' => 'ryugaku@us.com',
                    'password' => Hash::make('ryugakutomo'),
                    'study_abroad_start_date' => '2023-01-01',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'country_id' => 1,
                ],
                [
                    'name' => 'テストユーザー',
                    'email' => 'test@us.com',
                    'password' => Hash::make('ryugakupass'),
                    'study_abroad_start_date' => '2025-01-01',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'country_id' => 1,
                ],

            ]
        );
    }
}

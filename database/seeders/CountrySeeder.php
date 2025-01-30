<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->insert([
            'name' => 'アメリカ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('countries')->insert([
            'name' => 'イギリス',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('countries')->insert([
            'name' => 'オーストラリア',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('countries')->insert([
            'name' => 'カナダ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('countries')->insert([
            'name' => 'タイ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('countries')->insert([
            'name' => '台湾',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('countries')->insert([
            'name' => '中国',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('countries')->insert([
            'name' => 'ドイツ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('countries')->insert([
            'name' => 'ニュージーランド',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('countries')->insert([
            'name' => 'フィリピン',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('countries')->insert([
            'name' => 'フランス',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('countries')->insert([
            'name' => 'マレーシア',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('countries')->insert([
            'name' => '韓国',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}

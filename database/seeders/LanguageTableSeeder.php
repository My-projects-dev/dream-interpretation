<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('languages')->delete();


        \DB::table('languages')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'language' => 'Arabic',
                    'lang_code' => 'ar',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-15 12:08:18',
                ),
            1 =>
                array (
                    'id' => 2,
                    'language' => 'Azerbaijani',
                    'lang_code' => 'az',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-15 12:08:18',
                ),
            2 =>
                array (
                    'id' => 3,
                    'language' => 'English',
                    'lang_code' => 'en',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-15 12:08:18',
                ),
            3 =>
                array (
                    'id' => 4,
                    'language' => 'Hindi',
                    'lang_code' => 'hi',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-15 12:08:18',
                ),
            4 =>
                array (
                    'id' => 5,
                    'language' => 'Russian',
                    'lang_code' => 'ru',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-15 12:08:18',
                ),
            5 =>
                array (
                    'id' => 6,
                    'language' => 'Turkish',
                    'lang_code' => 'tr',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-15 12:08:18',
                ),
        ));
    }
}

<?php

namespace Database\Seeders;
use App\Models\Word;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('words')->insert([
            ['word' => 'example'],
            ['word' => 'laravel'],
            ['word' => 'database'],
            ['word' => 'seeder'],
            ['word' => 'eloquent'],
        ]);
    }

}

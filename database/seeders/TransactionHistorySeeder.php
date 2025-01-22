<?php

namespace Database\Seeders;
use App\Models\TransactionHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('transaction_histories')->insert([
            [
                'user_id' => 1,
                'point' => 100,
                'inOrOut' => 'in',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'point' => 50,
                'inOrOut' => 'out',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'point' => 30,
                'inOrOut' => 'in',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

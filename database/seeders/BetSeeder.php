<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('bets')->insert([
                'name' => 'Pool Game',
                'players'=> 0,
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
    }
}

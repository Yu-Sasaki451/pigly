<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeightTargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $userid =  DB::table('users')->value('id');

        DB::table('weight_targets')->insert([
            [
                'user_id' => $userid,
                'target_weight' => '45.1',
            ]
        ]);
    }
}

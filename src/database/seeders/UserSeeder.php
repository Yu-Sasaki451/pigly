<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = now();

        DB::table('users')->insert([
            [
                'name' => 'Luffy',
                'email' => 'onepiece@test.com',
                'password' => bcrypt('5656gear5'),
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}

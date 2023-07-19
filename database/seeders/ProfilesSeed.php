<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'id' => 1,
            'name' => "Admin",
        ]);
        DB::table('profiles')->insert([
            'id' => 2,
            'name' => "User",
        ]);
    }
}

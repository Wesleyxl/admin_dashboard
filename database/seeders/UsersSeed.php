<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'profile_id' => 1,
            'name' => "Wesley Alves",
            'email' => "wesley@email.com",
            'password' => Hash::make('teste@123'),
        ]);
    }
}

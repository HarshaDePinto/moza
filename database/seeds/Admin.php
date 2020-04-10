<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Harsha De Pinto',
            'email' => 'designerdepinto@gmail.com',
            'password' => Hash::make('123'),
            'role_id' => 1,
            'is_active' => 1,
            'position' => 'Director',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('roles')->insert([
            'name' => 'ADMIN',
            'id' => 1

        ]);

        DB::table('roles')->insert([
            'name' => 'STAFF',
            'id' => 2

        ]);
    }
}

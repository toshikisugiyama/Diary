<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name' => 'testuser1',
          'email' => 'test_user1@email.com',
          'password' => bcrypt('password'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
    }
}

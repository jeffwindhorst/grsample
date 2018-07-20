<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('asdfasdf'),
            'is_admin' => false,
        ]);
    }
}

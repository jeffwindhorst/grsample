<?php

use Illuminate\Database\Seeder;

class UsersAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jeff Windhorst',
            'email' => 'jeffwindhorst@gmail.com',
            'password' => bcrypt('asdfasdf'),
            'is_admin' => true,
        ]);
    }
}

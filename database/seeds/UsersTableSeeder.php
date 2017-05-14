<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ //,
            'name' => 'admin',
            'email' => 'admin@salonpas.com',
            'password' => bcrypt('adminadmin'),
            'user_id' => 0,
            'role' => 'admin'
        ]);
    }
}

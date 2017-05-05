<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 5;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('customers')->insert([ //,
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName,
                'address' => $faker->address,
                'email' => $faker->email,
                'request_status' => 'pending',
                'password' => bcrypt('customer')
            ]);
        }
    }
}

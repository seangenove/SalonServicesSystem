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
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'address' => $faker->address,
                'email' => $faker->email,
                'requestStatus' => 'pending',
                'password' => bcrypt('customer')
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class ServiceProvidersTableSeeder extends Seeder
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
            DB::table('service_providers')->insert([ //,
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName,
                'contact_number' => '09353785487',
                'description' => 'N/A',
                'email' => $faker->email,
                'status' => 'inactive',
                'request_status' => 'pending',
                'password' => bcrypt('serviceprovider'),
                'category_id' => '1'
            ]);
        }
    }
}

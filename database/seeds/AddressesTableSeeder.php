<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('addresses')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

        // Addresses
        for ($i = 0; $i < 200; $i++) {
            $expirationDate = $faker->date('Y-m-d', '+ 1 year');

            DB::table('addresses')->insert([
                'street1' => $faker->buildingNumber . ' ' . $faker->streetName,
                'street2' => $faker->secondaryAddress,
                'city' => $faker->city,
                'state' => $faker->state,
                'postal_code' => $faker->postcode,
                'country' => $faker->country,
                'note' => $faker->sentence,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}

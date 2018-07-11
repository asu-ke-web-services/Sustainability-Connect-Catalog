<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
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
        DB::table('notes')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

        // Notes
        for ($i = 0; $i < 200; $i++) {
            $expirationDate = $faker->date('Y-m-d', '+ 1 year');

            DB::table('notes')->insert([
                'body' => $faker->sentence,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use SCCatalog\Models\OrganizationType;
use SCCatalog\Models\OrganizationStatus;

class OrganizationNotesTableSeeder extends Seeder
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
        DB::table('note_organization')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('note_organization')->insert([
                'organization_id' => $i + 1,
                'user_id' => $faker->numberBetween(50, 80),
                'note_id' => $i + 1,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}

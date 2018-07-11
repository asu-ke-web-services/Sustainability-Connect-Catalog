<?php

use Illuminate\Database\Seeder;
use SCCatalog\Models\OpportunityType;

class OpportunityTypesTableSeeder extends Seeder
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
        DB::table('opportunity_types')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

		// Pre-fill Opportunity Type options

        $opportunity_types = OpportunityType::firstOrNew([
            'slug' => 'project',
        ]);
        if (!$opportunity_types->exists) {
            $opportunity_types->fill([
            	'order' => 1,
                'name' => 'Project',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $opportunity_types = OpportunityType::firstOrNew([
            'slug' => 'internship',
        ]);
        if (!$opportunity_types->exists) {
            $opportunity_types->fill([
            	'order' => 2,
                'name' => 'Internship',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }
    }
}

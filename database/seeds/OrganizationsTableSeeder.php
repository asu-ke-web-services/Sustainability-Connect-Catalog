<?php

use Illuminate\Database\Seeder;
use SCCatalog\Models\OrganizationType;
use SCCatalog\Models\OrganizationStatus;

class OrganizationsTableSeeder extends Seeder
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
        DB::table('organization_statuses')->truncate();
        DB::table('organization_types')->truncate();
        DB::table('organizations')->truncate();
        DB::table('addresses')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

        // Pre-fill Organization Status options

        $organization_statuses = OrganizationStatus::firstOrNew([
            'slug' => 'inactive',
        ]);
        if (!$organization_statuses->exists) {
            $organization_statuses->fill([
            	'order' => 1,
                'name' => 'Inactive',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $organization_statuses = OrganizationStatus::firstOrNew([
            'slug' => 'active',
        ]);
        if (!$organization_statuses->exists) {
            $organization_statuses->fill([
            	'order' => 2,
                'name' => 'Active',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }


		// Pre-fill Organization Type options

        $organization_types = OrganizationType::firstOrNew([
            'slug' => 'government',
        ]);
        if (!$organization_types->exists) {
            $organization_types->fill([
            	'order' => 1,
                'name' => 'Government',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $organization_types = OrganizationType::firstOrNew([
            'slug' => 'non-governmental-ngo',
        ]);
        if (!$organization_types->exists) {
            $organization_types->fill([
            	'order' => 2,
                'name' => 'Non-Governmental (NGO)',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $organization_types = OrganizationType::firstOrNew([
            'slug' => 'non-profit',
        ]);
        if (!$organization_types->exists) {
            $organization_types->fill([
            	'order' => 3,
                'name' => 'Non-Profit',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }

        $organization_types = OrganizationType::firstOrNew([
            'slug' => 'Corporation',
        ]);
        if (!$organization_types->exists) {
            $organization_types->fill([
            	'order' => 4,
                'name' => 'Corporation',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ])->save();
        }



        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('organizations')->insert([
                'organization_type_id' => $faker->numberBetween(1, 3),
                'organization_status_id' => 1,
                'name' => $faker->company,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);

            DB::table('addresses')->insert([
                'addressable_id' => $i + 1,
                'addressable_type' => 'Organization',
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


            DB::table('notes')->insert([
                'noteable_id' => $i + 1,
                'noteable_type' => 'Organization',
                'user_id' => 1,
                'body' => $faker->sentence,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}

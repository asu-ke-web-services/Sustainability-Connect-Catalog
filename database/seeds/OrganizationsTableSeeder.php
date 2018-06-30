<?php

use Illuminate\Database\Seeder;
use App\Models\OrganizationType;
use App\Models\OrganizationStatus;

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
        DB::table('organizations')->truncate();
        DB::table('organizations_addresses')->truncate();
        DB::table('organizations_notes')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


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
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
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
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
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
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
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
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
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
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
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
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ])->save();
        }



        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('organizations')->insert([
                'organization_type_id' => $faker->numberBetween(1, 3),
                'organization_status_id' => 1,
                // 'type' => $faker->randomElement(['partner' ,'gdr_host']),
                'name' => $faker->company,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ]);

            DB::table('organizations_addresses')->insert([
                'organization_id' => $i + 1,
                'address_id' => $i + 1,
                'primary' => $faker->boolean(90),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            DB::table('organizations_notes')->insert([
                'organization_id' => $faker->numberBetween(1, 200),
                'user_id' => $faker->numberBetween(301, 320),
                'note_body' => $faker->text,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'created_by' => $faker->numberBetween(1, 80),
                'updated_by' => $faker->numberBetween(1, 80),
            ]);
        }
    }
}

<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Lookup\OrganizationType;
use SCCatalog\Models\Lookup\OrganizationStatus;
use SCCatalog\Models\Organization\Organization;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organization::withoutSyncingToSearch(function () {
            // Pre-fill Organization Status options

            $organization_statuses = OrganizationStatus::firstOrNew([
                'slug' => 'inactive',
            ]);
            if (!$organization_statuses->exists) {
                $organization_statuses->fill([
                    'order' => 1,
                    'name' => 'Inactive',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
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
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
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
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
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
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
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
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 1,
                    'updated_by' => 1,
                ])->save();
            }

            $organization_types = OrganizationType::firstOrNew([
                'slug' => 'corporation',
            ]);
            if (!$organization_types->exists) {
                $organization_types->fill([
                    'order' => 4,
                    'name' => 'Corporation',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 1,
                    'updated_by' => 1,
                ])->save();
            }

            $starterOrgs = [
                [
                    'ids' => [10],
                    'name' => 'Mitchell Park Neighborhood Association',
                    'type' => '3',
                    'status' => '2',
                    'note' => '',
                ],
                [
                    'ids' => [11, 14, 70, 255, 267],
                    'name' => 'Campus Sustainability',
                    'type' => '1',
                    'status' => '2',
                    'note' => '',
                ],
                [
                    'ids' => [187],
                    'name' => 'ASU Research Park',
                    'type' => '1',
                    'status' => '2',
                    'note' => '',
                ],
                [
                    'ids' => [260],
                    'name' => 'Recycled City',
                    'type' => '4',
                    'status' => '2',
                    'note' => 'http://www.recycledcity.com/',
                ],
                [
                    'ids' => [268],
                    'name' => 'REAP',
                    'type' => '3',
                    'status' => '2',
                    'note' => 'About REAP:

<p>Reentry and Preparedness (REAP) is an Arizona nonprofit 501(c)(3) with legal status as of 2009.&nbsp; Its purpose is to increase economic and social viability among those people living on Native American reservations and other indigenous peoples who are redeveloping a relationship with family and tribal members after a long absence such as prison or jail or veteran status, recovering from long term unemployment, or other stressful situations.</p>

<p>REAP&rsquo;s intention is to develop training and other support for establishing worker owned cooperatives and team job skills for greenhouse construction and operation, fresh food production and distribution to through schools and other wholesale and retail consumers on and just outside indigenous lands.&nbsp;</p>',
                ],
                [
                    'ids' => [270],
                    'name' => 'Keller Williams East Valley',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [271],
                    'name' => 'The Nature Conservancy',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [274],
                    'name' => 'Clark Park Community Garden',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [275],
                    'name' => 'Salt River Project',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [277, 296, 334],
                    'name' => 'International Rescue Committee',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [278],
                    'name' => 'Sole Purpose Flip Flops',
                    'type' => '4',
                    'status' => '',
                    'note' => 'Sharon Kreiger',
                ],
                [
                    'ids' => [279, 329, 330, 376, 395],
                    'name' => 'City of Tempe, AZ',
                    'type' => '1',
                    'status' => '',
                    'note' => 'Cassandra Mac, Managment Assistant, City of Tempe Environmental Services',
                ],
                [
                    'ids' => [279],
                    'name' => 'City of Ketchum, ID',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [280, 317],
                    'name' => 'Local First Arizona',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [281],
                    'name' => 'Drury Design Arts',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [282],
                    'name' => 'Frank Lloyd Wright Foundation',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [288, 389],
                    'name' => 'Stern Produce',
                    'type' => '4',
                    'status' => '',
                    'note' => 'Kristen Osgood<br />kosgood@sternproduce.com',
                ],
                [
                    'ids' => [289],
                    'name' => 'Long Way Home',
                    'type' => '3',
                    'status' => '',
                    'note' => 'Long Way Home\'s (https://www.lwhome.org) mission as a registered US 501(c)3 is to use sustainable design and materials to construct self-sufficient schools that promote education, employment and environmental stewardship.

Our vision is to empower communities to break the cycle of poverty through innovative solutions to local challenges.',
                ],
                [
                    'ids' => [290],
                    'name' => 'Oasis Park',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [291, 292],
                    'name' => 'The Farm at South Mountain',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [293],
                    'name' => 'Stardust Non-Profit Building Supplies',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [295],
                    'name' => 'USAID',
                    'type' => '2',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [297],
                    'name' => 'The Verde Front | Friends of Verde River Greenway',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [298],
                    'name' => 'Mountainside Middle School',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [299],
                    'name' => 'Maricopa County Parks and Recreation',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [306],
                    'name' => 'US Forest Service',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [306],
                    'name' => 'Arizona Department of Game & Fish',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [308, 309],
                    'name' => 'Aramark',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [311, 342, 353],
                    'name' => 'Changemaker Central',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [312],
                    'name' => 'Sierra Club',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [312, 385],
                    'name' => 'City of Phoenix',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [313],
                    'name' => 'Tempe Academy of International Studies',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [316],
                    'name' => 'DesignSpaceAfrica (DSA)',
                    'type' => '4',
                    'status' => '',
                    'note' => 'http://www.designspaceafrica.com/',
                ],
                [
                    'ids' => [280, 317],
                    'name' => 'Local First Arizona',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [327],
                    'name' => 'Coronado High School',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [328],
                    'name' => 'HDR, Inc.',
                    'type' => '4',
                    'status' => '',
                    'note' => 'http://www.hdrinc.com/',
                ],
                [
                    'ids' => [329,],
                    'name' => 'National League of Cities',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [331],
                    'name' => 'Maricopa County Food Coalition',
                    'type' => '3',
                    'status' => '',
                    'note' => 'https://marcofoodcoalition.org/',
                ],
                [
                    'ids' => [332],
                    'name' => 'Escalante Community Center',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [332],
                    'name' => 'Victory Acres',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [339],
                    'name' => 'Native American Connections',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [346],
                    'name' => 'Climate Resilience Consulting',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [350],
                    'name' => 'Pharos',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [351],
                    'name' => 'Town of Gilbert Environmental Compliance Program',
                    'type' => '1',
                    'status' => '',
                    'note' => 'https://www.gilbertaz.gov/departments/public-works/environmental-compliance',
                ],
                [
                    'ids' => [353],
                    'name' => 'Borderlands Food Bank',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [355],
                    'name' => 'Engrained',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [364],
                    'name' => 'Balboa Park Cultural Partnership',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [365],
                    'name' => 'Watershed Protection Department',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [368],
                    'name' => 'Tragedy Assistance Program for Survivors (TAPS)',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [371],
                    'name' => 'Elders of the Tonalea Chapter of the Navajo Nation',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [380],
                    'name' => 'Deborah Mathews',
                    'type' => '2',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [386],
                    'name' => 'Arizona Sustainability Alliance',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'ids' => [387],
                    'name' => 'Stryker Sustainability Solutions',
                    'type' => '4',
                    'status' => '',
                    'note' => 'http://sustainability.stryker.com/',
                ]
            ];


            foreach ($starterOrgs as $organization) {
                $newOrganization = Organization::create([
                    'organization_type_id' => $organization['type'],
                    'organization_status_id' => 2,
                    'name' => $organization['name'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);

                DB::table('notes')->insert([
                    'noteable_id' => $newOrganization->id,
                    'noteable_type' => 'Organization',
                    'user_id' => 1,
                    'body' => $organization['note'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);

                foreach ($organization['ids'] as $order => $opportunity_id) {
                    DB::table('opportunities_organizations')->insert([
                        'opportunity_id' => $opportunity_id,
                        'organization_id' => $newOrganization->id,
                        'opportunity_order' => 1,
                        'organization_order' => $order + 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'created_by' => 1,
                        'updated_by' => 1,
                    ]);
                }

            }

        });
    }
}

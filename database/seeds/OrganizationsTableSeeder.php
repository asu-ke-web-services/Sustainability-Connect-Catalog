<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Note\Note;
use SCCatalog\Models\Lookup\OrganizationType;
use SCCatalog\Models\Lookup\OrganizationStatus;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Models\Opportunity\Project;
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
            Project::withoutSyncingToSearch(function () {
                Internship::withoutSyncingToSearch(function () {
                    // Pre-fill Organization Status options

                    $organization_statuses = OrganizationStatus::firstOrNew([
                'slug' => 'inactive',
            ]);
                    if (!$organization_statuses->exists) {
                        $organization_statuses->fill([
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
                    'name' => 'Corporation',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => 1,
                    'updated_by' => 1,
                ])->save();
                    }

                    $starterOrgs = [
                [
                    'project_ids' => [10],
                    'name' => 'Mitchell Park Neighborhood Association',
                    'type' => '3',
                    'status' => '2',
                    'note' => '',
                ],
                [
                    'project_ids' => [11, 14, 70, 255, 267],
                    'name' => 'Campus Sustainability',
                    'type' => '1',
                    'status' => '2',
                    'note' => '',
                ],
                [
                    'project_ids' => [187],
                    'name' => 'ASU Research Park',
                    'type' => '1',
                    'status' => '2',
                    'note' => '',
                ],
                [
                    'project_ids' => [260],
                    'name' => 'Recycled City',
                    'type' => '4',
                    'status' => '2',
                    'note' => 'http://www.recycledcity.com/',
                ],
                [
                    'project_ids' => [268],
                    'name' => 'REAP',
                    'type' => '3',
                    'status' => '2',
                    'note' => 'About REAP:

<p>Reentry and Preparedness (REAP) is an Arizona nonprofit 501(c)(3) with legal status as of 2009.&nbsp; Its purpose is to increase economic and social viability among those people living on Native American reservations and other indigenous peoples who are redeveloping a relationship with family and tribal members after a long absence such as prison or jail or veteran status, recovering from long term unemployment, or other stressful situations.</p>

<p>REAP&rsquo;s intention is to develop training and other support for establishing worker owned cooperatives and team job skills for greenhouse construction and operation, fresh food production and distribution to through schools and other wholesale and retail consumers on and just outside indigenous lands.&nbsp;</p>',
                ],
                [
                    'project_ids' => [270],
                    'name' => 'Keller Williams East Valley',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'internship_ids' => [405,463,468,342],
                    'project_ids' => [271],
                    'name' => 'The Nature Conservancy',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [274],
                    'name' => 'Clark Park Community Garden',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [275],
                    'name' => 'Salt River Project',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'internship_ids' => [119,231,283,284,455,456,457],
                    'project_ids' => [277, 296, 334],
                    'name' => 'International Rescue Committee',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [278],
                    'name' => 'Sole Purpose Flip Flops',
                    'type' => '4',
                    'status' => '',
                    'note' => 'Sharon Kreiger',
                ],
                [
                    'project_ids' => [279, 329, 330, 376, 395],
                    'name' => 'City of Tempe, AZ',
                    'type' => '1',
                    'status' => '',
                    'note' => 'Cassandra Mac, Management Assistant, City of Tempe Environmental Services',
                ],
                [
                    'project_ids' => [279],
                    'name' => 'City of Ketchum, ID',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'internship_ids' => [300,301,390,427,446,449,502],
                    'project_ids' => [280, 317],
                    'name' => 'Local First Arizona',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [281],
                    'name' => 'Drury Design Arts',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [282],
                    'name' => 'Frank Lloyd Wright Foundation',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [288, 389],
                    'name' => 'Stern Produce',
                    'type' => '4',
                    'status' => '',
                    'note' => 'Kristen Osgood<br />kosgood@sternproduce.com',
                ],
                [
                    'project_ids' => [289],
                    'name' => 'Long Way Home',
                    'type' => '3',
                    'status' => '',
                    'note' => 'Long Way Home\'s (https://www.lwhome.org) mission as a registered US 501(c)3 is to use sustainable design and materials to construct self-sufficient schools that promote education, employment and environmental stewardship.

Our vision is to empower communities to break the cycle of poverty through innovative solutions to local challenges.',
                ],
                [
                    'project_ids' => [290],
                    'name' => 'Oasis Park',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'internship_ids' => [375,395,414,422],
                    'project_ids' => [291, 292],
                    'name' => 'The Farm at South Mountain',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [293],
                    'name' => 'Stardust Non-Profit Building Supplies',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [295],
                    'name' => 'USAID',
                    'type' => '2',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [297],
                    'name' => 'The Verde Front | Friends of Verde River Greenway',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [298],
                    'name' => 'Mountainside Middle School',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [299],
                    'name' => 'Maricopa County Parks and Recreation',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [306],
                    'name' => 'US Forest Service',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'internship_ids' => [182,254],
                    'project_ids' => [306],
                    'name' => 'Arizona Department of Game & Fish',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'internship_ids' => [210,349,408,471,501],
                    'project_ids' => [308, 309],
                    'name' => 'Sun Devil Dining / Aramark',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [311, 342, 353],
                    'name' => 'Changemaker Central',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [312],
                    'name' => 'Sierra Club',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [312, 385],
                    'name' => 'City of Phoenix',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [313],
                    'name' => 'Tempe Academy of International Studies',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [316],
                    'name' => 'DesignSpaceAfrica (DSA)',
                    'type' => '4',
                    'status' => '',
                    'note' => 'http://www.designspaceafrica.com/',
                ],
                [
                    'project_ids' => [327],
                    'name' => 'Coronado High School',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [328],
                    'name' => 'HDR, Inc.',
                    'type' => '4',
                    'status' => '',
                    'note' => 'http://www.hdrinc.com/',
                ],
                [
                    'project_ids' => [329],
                    'name' => 'National League of Cities',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [331],
                    'name' => 'Maricopa County Food Coalition',
                    'type' => '3',
                    'status' => '',
                    'note' => 'https://marcofoodcoalition.org/',
                ],
                [
                    'project_ids' => [332],
                    'name' => 'Escalante Community Center',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [332],
                    'name' => 'Victory Acres',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'internship_ids' => [269,376],
                    'project_ids' => [339],
                    'name' => 'Native American Connections',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [346],
                    'name' => 'Climate Resilience Consulting',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [350],
                    'name' => 'Pharos',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'internship_ids' => [338,398,513,131],
                    'project_ids' => [351],
                    'name' => 'Town of Gilbert Environmental Compliance Program',
                    'type' => '1',
                    'status' => '',
                    'note' => 'https://www.gilbertaz.gov/departments/public-works/environmental-compliance',
                ],
                [
                    'project_ids' => [353],
                    'name' => 'Borderlands Food Bank',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [355],
                    'name' => 'Engrained',
                    'type' => '4',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [364],
                    'name' => 'Balboa Park Cultural Partnership',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [365],
                    'name' => 'Watershed Protection Department',
                    'type' => '1',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [368],
                    'name' => 'Tragedy Assistance Program for Survivors (TAPS)',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [371],
                    'name' => 'Elders of the Tonalea Chapter of the Navajo Nation',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [380],
                    'name' => 'Deborah Mathews',
                    'type' => '2',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'project_ids' => [386],
                    'name' => 'Arizona Sustainability Alliance',
                    'type' => '3',
                    'status' => '',
                    'note' => '',
                ],
                [
                    'internship_ids' => [366],
                    'project_ids' => [387],
                    'name' => 'Stryker Sustainability Solutions',
                    'type' => '4',
                    'status' => '',
                    'note' => 'http://sustainability.stryker.com/',
                ],

                [
                    'internship_ids' => [345,352],
                    'name' => 'A New Leaf',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [352,227],
                    'name' => 'Mesa Community Action Network (MesaCAN)',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [428,477],
                    'name' => 'AASHE: Association for the Advancement of Sustaina',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [319],
                    'name' => 'ACCION',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [367],
                    'name' => 'Affordable Energy Solutions',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [430],
                    'name' => 'Akamai Technologies',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [299,360],
                    'name' => 'Ameresco',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [126],
                    'name' => 'American Conservation Experience',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [243],
                    'name' => 'APS',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [368,382,413],
                    'name' => 'Arizona Center for Nature Conservation',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [232],
                    'name' => 'Arizona Community Tree Council',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [334,392,393],
                    'name' => 'Arizona Department of Environmental Quality (ADEQ)',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [271,285],
                    'name' => 'Arizona Department of Transportation',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [206,287,351,396,336,337],
                    'name' => 'Arizona Department of Water Resources (ADWR)',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [309,394,443],
                    'name' => 'Arizona Forward',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [296],
                    'name' => 'Arizona Geological Survey',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [516],
                    'name' => 'Arizona Humanities',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [374],
                    'name' => 'Arizona Interfaith Power & Light',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [289],
                    'name' => 'Arizona Municipal Water Users Association',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [479],
                    'name' => 'Arizona Worm Farm',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [51],
                    'name' => 'Assoc. of Energy Professionals',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [295,523],
                    'name' => 'ASU College of Public Programs',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [47],
                    'name' => 'ASU Recycling Program',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [335],
                    'name' => 'ASU School of Politics & Global Studies',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [281,282,369,370,517,524,157],
                    'name' => 'Audubon Arizona',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [31],
                    'name' => 'Arizona State Parks',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [90],
                    'name' => 'AzBAS',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [20],
                    'name' => 'Better Farm',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [44],
                    'name' => 'blueEnergy',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [424],
                    'name' => 'Bright Power, Inc (LOCATED IN NEW YORK CITY)',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [188,498],
                    'name' => 'Broadmor Elementary School',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [297],
                    'name' => 'Brooks Community School / Arizona Microgreens',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [264],
                    'name' => 'Bureau of Reclamation',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [346],
                    'name' => 'Cardno',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [333],
                    'name' => 'Center for Engagement & Training in Science & Society',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [265],
                    'name' => 'Center for Housing Policy',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [286],
                    'name' => 'Central Arizona Conservation Alliance',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [359,417],
                    'name' => 'Central Arizona Project (CAP)',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [307],
                    'name' => 'Chelsea Group Limited',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [484],
                    'name' => 'CITIFARMS LLC',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [308],
                    'name' => 'City of Apache Junction',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [215],
                    'name' => 'City of Chandler',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [358],
                    'name' => 'City of Flagstaff',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [99,294,429],
                    'name' => 'City of Glendale',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [327,328],
                    'name' => 'City of Glendale, Environmental Resources Group',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [221,290,291,399,400,466,467,520],
                    'name' => 'City of Goodyear',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [339],
                    'name' => 'City of Goodyear, Water Resources',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [205,303],
                    'name' => 'City of Mesa',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [275,276],
                    'name' => 'City of Mesa, Development and Sustainability',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [155],
                    'name' => 'City of Peoria',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [144,235,280,292,340,404,411,434],
                    'name' => 'City of Phoenix',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [311,462],
                    'name' => 'City of Phoenix, Aviation Department',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [268,318,353,438,439],
                    'name' => 'City of Phoenix, Housing Department',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [253,325,326],
                    'name' => 'City of Phoenix, Neighborhood Services',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [228,256],
                    'name' => 'City of Phoenix, Office of Environmental Programs',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [361],
                    'name' => 'City of Phoenix, Parks & Recreation Dept',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [217],
                    'name' => 'City of Phoenix, Transportation Division',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [522],
                    'name' => 'City of Phoenix, Water Services',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [470],
                    'name' => 'City of Phoenix, Office of Arts and Culture',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [487,507,508,510],
                    'name' => 'City of Phoenix, Office of Environmental Programs',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [380,298],
                    'name' => 'City of Phoenix, Office of Mayor Greg Stanton',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [312,509,493,415],
                    'name' => 'City of Phoenix, Office of Sustainability',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [310],
                    'name' => 'City of Phoenix, Parks & Aviation Departments',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [363,492],
                    'name' => 'City of Phoenix, Public Works Dept',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [435,440,453,461,481],
                    'name' => 'City of Phoenix, Sustainability & Environ programs',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [518],
                    'name' => 'City of Scottsdale, Water Conservation',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [371],
                    'name' => 'City of Scottsdale, Office of Environmental Initia',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [293,362,391,420,436,437,482,515],
                    'name' => 'City of Tempe',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [279,305,329,331,377,454],
                    'name' => 'City of Tempe, Public Works Department',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [204],
                    'name' => 'City of Tempe Recycles',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [465],
                    'name' => 'City of Tempe, Water Conservation',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [519],
                    'name' => 'City of Tempe, Water Utilities',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [384,499],
                    'name' => 'City of Tempe, City Manager\'s Office',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [386],
                    'name' => 'City of Tempe, Solid Waste & Recycling Services',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [266,209],
                    'name' => 'Clean Cities Coalition',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [356],
                    'name' => 'Clinton Foundation',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [245],
                    'name' => 'Coca-Cola Company',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [57,418],
                    'name' => 'Dell Regulatory Compliance',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [354],
                    'name' => 'Department of Energy, Vehicle Technologies Program',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [24],
                    'name' => 'Department of the Interior',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [139,202,230],
                    'name' => 'Desert Botanical Garden',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [407],
                    'name' => 'Desert Heights Preparatory Academy',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [189],
                    'name' => 'Desert Marigold School',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [94],
                    'name' => 'Discovery Triangle Development Corp.',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [278],
                    'name' => 'Dixon Golf',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [423],
                    'name' => 'DLR Group',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [168],
                    'name' => 'DMD eCycling',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [178],
                    'name' => 'Ecology Explorers',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [489],
                    'name' => 'Environment America',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [233],
                    'name' => 'Environment Arizona',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [397],
                    'name' => 'Environmental Defense Fund, Inc.',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [511],
                    'name' => 'Environmental Education Exchange',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [521,348,402,403],
                    'name' => 'Flood Control District of Maricopa County',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [365],
                    'name' => 'Garden Pool',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [464],
                    'name' => 'Town of Gilbert, Water Conservation',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [259,260],
                    'name' => 'Grand Canyon National Park',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [229],
                    'name' => 'Green Ideas, Inc.',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [488],
                    'name' => 'HandsOn Greater Phoenix',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [488],
                    'name' => 'Boys & Girls Club of Metro Phoenix',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [63,267,302,419,478],
                    'name' => 'Honeywell Aerospace',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [497],
                    'name' => 'Housing Authority of Maricopa County',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [129],
                    'name' => 'Hudson Baylor',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [262],
                    'name' => 'Huntsman Corporation',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [320],
                    'name' => 'Intel',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [460],
                    'name' => 'Isagenix International LLC',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [304],
                    'name' => 'Jepco Recycling Resources',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [496],
                    'name' => 'Kamehameha Schools',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [500],
                    'name' => 'Keep Arizona Beautiful',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [350,381],
                    'name' => 'Keep Phoenix Beautiful',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [77],
                    'name' => 'Kimley-Horn',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [242],
                    'name' => 'Kyrene de la Esperanza Elementary School',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [433],
                    'name' => 'Liberty Wildlife',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [505],
                    'name' => 'Maricopa Association of Governments (MAG)',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [379,410,441,474,475,277],
                    'name' => 'Maricopa County, Department of Air Quality',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [431,483],
                    'name' => 'Maricopa County, Food Systems Coalition',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [272],
                    'name' => 'Microchip Technology',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [75,273],
                    'name' => 'MillerCoors',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [494],
                    'name' => 'MindClick',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [244],
                    'name' => 'National Park Service',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [315],
                    'name' => 'Nautilus Solar',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [344],
                    'name' => 'Neighborhood Economic Development Corporation',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [495],
                    'name' => 'Newtown CDC',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [448],
                    'name' => 'Osborn School District',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [313],
                    'name' => 'Park & Co',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [220],
                    'name' => 'PepsiCo HSE',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [425,525],
                    'name' => 'Phoenix Art Museum',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [203],
                    'name' => 'Phoenix Baptist Hospital',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [442],
                    'name' => 'Phoenix Convention Center',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [332],
                    'name' => 'Phoenix Public Market',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [504,382,413],
                    'name' => 'Phoenix Zoo',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [255,485,486],
                    'name' => 'Pierce Energy Planning (PEP)',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [316],
                    'name' => 'Plan-It Geo',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [263,175],
                    'name' => 'Project CURE',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [270],
                    'name' => 'Project Rising PHX',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [250,251],
                    'name' => 'Rocky Mountain Institute',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [406,447],
                    'name' => 'Roosevelt Early Childhood Family Resource Center',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [416,225],
                    'name' => 'Roosevelt Row / Growhouse Garden',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [226,444,445],
                    'name' => 'Roosevelt Row Community Development Corporation',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [388],
                    'name' => 'Roosevelt School District Center of Sustainability',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [306],
                    'name' => 'Scottsdale Country Day School',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [222],
                    'name' => 'SCS Engineers',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [469],
                    'name' => 'Sierra Club - Grand Canyon Chapter',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [274,288,341,476],
                    'name' => 'Sonoran Institute',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [459],
                    'name' => 'NRG',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [458,503,330],
                    'name' => 'Sprouts Farmers Market',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [450],
                    'name' => 'SRP',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [512],
                    'name' => 'Strategic Solar Energy, LLC (PowerParasol)',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [383],
                    'name' => 'Sustainability Partners, LLC',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [258,409],
                    'name' => 'Swette Center for Environmental Biotechnology',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [385],
                    'name' => 'Swift Youth Foundation',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [357,389],
                    'name' => 'Tempe City Council, Councilmember Lauren Kuby',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [401],
                    'name' => 'Tempe Community Action Agency, Clark Park Farmers',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [200],
                    'name' => 'Tempe CSA',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [491],
                    'name' => 'The Arizona State Land Department, Water Rights Service',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [372],
                    'name' => 'The Orme School',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [238],
                    'name' => 'The Sustainability Consortium',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [343],
                    'name' => 'Tierra Resource Consultants',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [412,452,472,473],
                    'name' => 'Trees Matter',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [347],
                    'name' => 'Trellis',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [364],
                    'name' => 'U of A Water Resource Research Center',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [241],
                    'name' => 'U-Haul Corporate Sustainability',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [355],
                    'name' => 'U. S. Government / White House',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [451],
                    'name' => 'U.S. Department of Energy',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [212,246,247,248,249],
                    'name' => 'U of A Cooperative Extension Services',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [426],
                    'name' => 'VALI Homes LLC',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [252,261,373,432,480],
                    'name' => 'Valley Metro',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [314,317],
                    'name' => 'Valley of the Sun Clean Cities Coalition (VSCCC)',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [321,322,323,324],
                    'name' => 'Valley Permaculture Alliance',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [257],
                    'name' => 'Vans',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [514],
                    'name' => 'Varies (AZ State Legislature, Governor\'s Office)',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [378,506],
                    'name' => 'Vitalyst Health Foundation',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [237],
                    'name' => 'Walton Sustainability Solutions Extension Services',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [490],
                    'name' => 'West Pharmaceutical Services',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [421],
                    'name' => 'WestWater Research, LLC',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [133],
                    'name' => 'White House Council on Environmental Quality',
                    'type' => '1',
                    'status' => '2',
                ],

                [
                    'internship_ids' => [127],
                    'name' => 'Windward Education & Research Ctr',
                    'type' => null,
                    'status' => '2',
                ],

                [
                    'internship_ids' => [97],
                    'name' => 'You Change',
                    'type' => null,
                    'status' => '2',
                ],
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

                        if (isset($organization['note'])) {
                            $newNote = Note::create([
                        'notable_id' => $newOrganization->id,
                        'notable_type' => 'Organization',
                        'user_id' => 1,
                        'body' => $organization['note'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'created_by' => 1,
                        'updated_by' => 1,
                    ]);
                        }

                        if (isset($organization['project_ids'])) {
                            foreach ($organization['project_ids'] as $order => $project_id) {
                                $project = Project::find($project_id);
                                if ($project) {
                                    $project->organization_id = $newOrganization->id;
                                    $project->save();
                                }
                            }
                        }

                        if (isset($organization['internship_ids'])) {
                            foreach ($organization['internship_ids'] as $order => $internship_id) {
                                $internship = Internship::find($internship_id);
                                if ($internship) {
                                    $internship->organization_id = $newOrganization->id;
                                    $internship->save();
                                }
                            }
                        }
                    }
                });
            });
        });
    }
}

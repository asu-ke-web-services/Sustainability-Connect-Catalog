<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use SCCatalog\Models\Auth\User;

/**
 * Class OpportunityUsersTableSeeder.
 */
class OpportunityUsersTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $old_user_relationships = DB::connection('old')->table('project_user_relationships')->get();

        foreach ($old_user_relationships as $relationship) {

            switch ($relationship->type) {
                case 'interested':
                    $relationship_type_id = 2;
                    break;
                case 'coordinator':
                    $relationship_type_id = 4;
                    break;
                case 'participant':
                    $relationship_type_id = 3;
                    break;
                case 'Practitioner Mentor':
                    $relationship_type_id = 5;
                    break;
                case 'Academic Mentor':
                    $relationship_type_id = 6;
                    break;
                case 'favorite':
                    $relationship_type_id = 1;
                    break;
            }

            DB::table('opportunity_user')->insert([
                'opportunity_id'       => $relationship->project_id,
                'user_id'              => $relationship->user_id,
                'relationship_type_id' => $relationship_type_id ?? null,
                'comments'             => $relationship->note,
                'approved'             => 1 - $relationship->pending,
                'created_at'           => null,
                'updated_at'           => $relationship->updated,
                'created_by'           => null,
                'updated_by'           => null,
            ]);
        }
    }
}

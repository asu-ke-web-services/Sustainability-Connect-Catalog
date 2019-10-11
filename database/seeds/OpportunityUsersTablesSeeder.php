<?php

use Illuminate\Database\Seeder;

/**
 * Class OpportunityUsersTablesSeeder.
 */
class OpportunityUsersTablesSeeder extends Seeder
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

            DB::table('project_user')->insert([
                'project_id' => $relationship->project_id,
                'user_id' => $relationship->user_id,
                'relationship_type_id' => $relationship_type_id ?? null,
                'comments' => $relationship->note,
                'approved' => 1 - $relationship->pending,
                'created_at' => null,
                'updated_at' => $relationship->updated,
                'created_by' => null,
                'updated_by' => null,
            ]);
        }

        $old_user_relationships = DB::connection('old')->table('internship_user_relationships')->get();

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

            $this->disableForeignKeys();

            DB::table('internship_user')->insert([
                'internship_id' => $relationship->internship_id,
                'user_id' => $relationship->user_id,
                'relationship_type_id' => $relationship_type_id ?? null,
                'comments' => $relationship->note,
                'approved' => 1 - $relationship->pending,
                'created_at' => null,
                'updated_at' => $relationship->updated,
                'created_by' => null,
                'updated_by' => null,
            ]);

            $this->enableForeignKeys();
        }
    }
}

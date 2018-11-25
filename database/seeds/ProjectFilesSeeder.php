<?php

use Illuminate\Database\Seeder;
use SCCatalog\Models\Opportunity\Project;

class ProjectFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Import old ProjectFiles data

        Project::withoutSyncingToSearch(function () {

            $old_project_files = DB::connection('old')->table('project_file_attachments')->get();

            foreach ($old_project_files as $old_file) {

                $project = Project::find($old_file->project_id);

                if (1 != $old_file->deleted && $project) {

                    $pathToFile = $old_file->server_filename;
                    $pathToFile = '/var/www/database/uploads/' . $pathToFile;

                    if (file_exists($pathToFile)) {
                        $project->addMedia($pathToFile)
                            ->preservingOriginal()
                            ->usingName($old_file->title)
                            ->usingFileName($old_file->orig_filename)
                            ->sanitizingFileName(function($fileName) {
                                return strtolower(str_replace(['#', '/', '\\', ' ', ',', ';', '!'], '-', $fileName));
                            })
                            ->withCustomProperties([
                                'type'       => $old_file->type,
                                'visibility' => $old_file->visibility,
                                'pending'    => $old_file->pending,
                                'deleted'    => $old_file->deleted,
                            ])
                            ->toMediaCollection();
                    }

                }

            }
        });

    }
}

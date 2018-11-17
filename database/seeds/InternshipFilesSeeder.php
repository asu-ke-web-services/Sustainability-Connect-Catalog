<?php

use Illuminate\Database\Seeder;
use SCCatalog\Models\Opportunity\Internship;

class InternshipFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Import old InternshipFiles data

        Internship::withoutSyncingToSearch(function () {

            $old_internship_files = DB::connection('old')->table('internship_file_attachments')->get();

            foreach ($old_internship_files as $old_file) {

                $internship = Internship::find($old_file->internship_id);

                if ($internship) {

                    $pathToFile = $old_file->server_filename;
                    $pathToFile = '/var/www/database/uploads/' . $pathToFile;

                    if (1 != $old_file->deleted && file_exists($pathToFile)) {

                        $internship->addMedia($pathToFile)
                            ->preservingOriginal()
                            ->usingName($old_file->title)
                            ->usingFileName($old_file->orig_filename)
                            ->sanitizingFileName(function($fileName) {
                                return strtolower(str_replace(['#', '/', '\\', ' ', ',', ';', '!'], '-', $fileName));
                            })
                            ->withCustomProperties([
                                'type'       => $old_file->type,
                                // 'visibility' => $old_file->visibility,
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

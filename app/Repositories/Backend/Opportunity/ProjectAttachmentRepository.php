<?php

namespace SCCatalog\Repositories\Backend\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Models\Opportunity\Project;

/**
 * Class ProjectAttachmentRepository
 */
class ProjectAttachmentRepository
{
    /**
     * Create a new file attachment for a project in the database.
     *
     * @param Project $project
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function create(Project $project, array $data)
    {
        return DB::transaction(function () use ($project, $data) {

            $media = $project->addMedia($data['file'])
                ->preservingOriginal()
                ->usingName($data['name'])
                ->sanitizingFileName(function($fileName) {
                    return strtolower(str_replace(['#', '/', '\\', ' ', ',', ';', '!'], '-', $fileName));
                })
                ->withCustomProperties([
                    'type'       => $data['type'],
                    'visibility' => $data['visibility'],
                    'pending'    => $data['pending'],
                ])
                ->toMediaCollection();

            event(new AttachmentAddedToProject($project, $media));

            return $project;
        });
    }

    /**
     * Update a file attachment for a project in the database.
     *
     * @param Project $project
     * @param int $mediaId
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
//    public function update(Project $project, int $mediaId, array $data)
//    {
//        return DB::transaction(function () use ($project, $mediaId, $data) {
//
//            $media = $project->updateMedia($data['file'])
//                ->preservingOriginal()
//                ->usingName($data['name'])
//                ->sanitizingFileName(function($fileName) {
//                    return strtolower(str_replace(['#', '/', '\\', ' ', ',', ';', '!'], '-', $fileName));
//                })
//                ->withCustomProperties([
//                    'type'       => $data['type'],
//                    'visibility' => $data['visibility'],
//                    'pending'    => $data['pending'],
//                ])
//                ->toMediaCollection();
//
//            event(new AttachmentAddedToProject($project, $media));
//
//            return $project;
//        });
//    }

    /**
     * Delete an attachment from a project in the database.
     *
     * @param Project $project
     * @param int $mediaId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function deleteById(Project $project, int $mediaId)
    {
        return DB::transaction(function () use ($project, $mediaId) {

            $project->deleteMedia($mediaId);

            event(new AttachmentRemovedFromProject($project, $mediaId));

            return $project;
        });
    }
}

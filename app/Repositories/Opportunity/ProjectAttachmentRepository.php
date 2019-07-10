<?php

namespace SCCatalog\Repositories\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Models\Opportunity\Project;
use Spatie\MediaLibrary\Media;

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
    public function store(Project $project, array $data)
    {
        return DB::transaction(function () use ($project, $data) {
            if (isset($data['file_attachment'])) {
                $project->addMedia($data['file_attachment'])
                    ->withCustomProperties([
                        'type' => $data['attachment_type'] ?? 'other',
                        'visibility' => $data['attachment_status'] ?? 'private',
                        // 'pending'    => 0,
                        'deleted' => 0,
                    ])
                    ->toMediaCollection();

                // event(new ProjectAttachmentUploaded($project));
            }

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
    public function update(Project $project, Media $media, array $data)
    {
        return DB::transaction(function () use ($project, $media, $data) {
            $media->setCustomProperty('type', $data['attachment_type'] ?? 'other');
            $media->setCustomProperty('visibility', $data['attachment_status'] ?? 'private');
            $media->save();

            // event(new AttachmentAddedToProject($project, $media));

            return $project;
        });
    }

    /**
     * Delete an attachment from a project in the database.
     *
     * @param Project $project
     * @param Media $media
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function delete(Project $project, Media $media)
    {
        return DB::transaction(function () use ($project, $media) {
            $project->deleteMedia($media->id);

            // event(new AttachmentRemovedFromProject($project, $media));

            return $project;
        });
    }
}

<?php

namespace SCCatalog\Repositories\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Models\Opportunity\Internship;
use Spatie\MediaLibrary\Media;

/**
 * Class InternshipAttachmentRepository
 */
class InternshipAttachmentRepository
{
    /**
     * Create a new file attachment for a internship in the database.
     *
     * @param Internship $internship
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function store(Internship $internship, array $data)
    {
        return DB::transaction(function () use ($internship, $data) {

            if (isset($data['file_attachment'])) {
                $internship->addMedia($data['file_attachment'])
                    ->withCustomProperties([
                        'type'       => $data['attachment_type'] ?? 'other',
                        'visibility' => $data['attachment_status'] ?? 'private',
                        // 'pending'    => 0,
                        'deleted'    => 0,
                    ])
                    ->toMediaCollection();

                // event(new InternshipAttachmentUploaded($internship));
            }

            return $internship;
        });
    }

    /**
     * Update a file attachment for a internship in the database.
     *
     * @param Internship $internship
     * @param int $mediaId
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(Internship $internship, Media $media, array $data)
    {
        return DB::transaction(function () use ($internship, $media, $data) {

            $media->setCustomProperty('type', $data['attachment_type'] ?? 'other');
            $media->setCustomProperty('visibility', $data['attachment_status'] ?? 'private');
            $media->save();

            // event(new AttachmentAddedToInternship($internship, $media));

            return $internship;
        });
    }

    /**
     * Delete an attachment from a internship in the database.
     *
     * @param Internship $internship
     * @param Media $media
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function delete(Internship $internship, Media $media)
    {
        return DB::transaction(function () use ($internship, $media) {

            $internship->deleteMedia($media->id);

            event(new AttachmentRemovedFromInternship($internship, $media));

            return $internship;
        });
    }
}

<?php

namespace SCCatalog\Repositories\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Models\Note\Note;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class InternshipNoteRepository
 */
class InternshipNoteRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Note::class;
    }

    /**
     * Create a new note for a internship in the database.
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
            $note = $this->model->create($data);
            $internship->notes()->save($note);

            return $internship;
        });
    }

    /**
     * Update a file attachment for a internship in the database.
     *
     * @param Internship $internship
     * @param Note    $note
     * @param array   $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function update(Internship $internship, Note $note, array $data)
    {
        return DB::transaction(function () use ($internship, $note, $data) {
            $note = $this->model->update($data);

            // event(new AttachmentAddedToInternship($internship, $media));

            return $internship;
        });
    }

    /*
     * Delete an attachment from a internship in the database.
     *
     * @param Internship $internship
     * @param Note   $note
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    // public function delete(Internship $internship, Note $note)
    // {
    //     return DB::transaction(function () use ($internship, $note) {
    //
    //         $internship->notes()->detach($note);
    //
    //         event(new AttachmentRemovedFromInternship($internship, $media));
    //
    //         return $internship;
    //     });
    // }
}

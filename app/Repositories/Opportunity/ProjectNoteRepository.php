<?php

namespace SCCatalog\Repositories\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Models\Note\Note;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class ProjectNoteRepository
 */
class ProjectNoteRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Note::class;
    }

    /**
     * Create a new note for a project in the database.
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

            // $note = new Note($data);
            // $note->notables()->associate($project)->save();

            $note = $this->model->create($data);
            // $note = Note::create($data);
            $project->notes()->save($note);

            return $project;
        });
    }

    /**
     * Update a file attachment for a project in the database.
     *
     * @param Project $project
     * @param Note    $note
     * @param array   $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function update(Project $project, Note $note, array $data)
    {
        return DB::transaction(function () use ($project, $note, $data) {
            $note = $this->model->update($data);

            // event(new AttachmentAddedToProject($project, $media));

            return $project;
        });
    }

    /*
     * Delete an attachment from a project in the database.
     *
     * @param Project $project
     * @param Note   $note
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    // public function delete(Project $project, Note $note)
    // {
    //     return DB::transaction(function () use ($project, $note) {
    //
    //         $project->notes()->detach($note);
    //
    //         event(new AttachmentRemovedFromProject($project, $media));
    //
    //         return $project;
    //     });
    // }
}

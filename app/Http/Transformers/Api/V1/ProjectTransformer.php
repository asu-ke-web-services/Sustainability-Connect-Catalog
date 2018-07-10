<?php

namespace SCCatalog\Http\Transformers\Api\V1;

use League\Fractal\TransformerAbstract;
use SCCatalog\Models\Project;

/**
 * Class ProjectTransformer.
 *
 * @package namespace SCCatalog\Transformers;
 */
class ProjectTransformer extends TransformerAbstract
{
    /**
     * Transform the Project entity.
     *
     * @param \SCCatalog\Models\Project $project
     *
     * @return array
     */
    public function transform(Project $project)
    {
        return [
            'id'                         => (int) $project->id,
            'title'                      => $project->opportunity->title,
            'altTitle'                   => $project->opportunity->alt_title,
            'slug'                       => $project->opportunity->slug,
            'startDate'                  => $project->opportunity->start_date,
            'endDate'                    => $project->opportunity->end_date,
            'listingExpires'             => $project->opportunity->listing_expires,
            'applicationDeadline'        => $project->opportunity->application_deadline,
            'applicationDeadlineText'    => $project->opportunity->application_deadline_text,
            'status'                     => $project->opportunity->status,
            'hidden'                     => $project->opportunity->hidden,
            'description'                => $project->opportunity->description,
            'parentOpportunity'          => $project->opportunity->parentOpportunity,
            'organization'               => $project->opportunity->organization,
            'addresses'                  => $project->opportunity->addresses,
            'primaryAddress'             => $project->opportunity->primaryAddress,
            'ownerUser'                  => $project->opportunity->ownerUser,
            'submittingUser'             => $project->opportunity->submittingUser,
            'compensation'               => $project->compensation,
            'responsibilities'           => $project->responsibilities,
            'learningOutcomes'           => $project->learning_outcomes,
            'sustainabilityContribution' => $project->sustainability_contribution,
            'qualifications'             => $project->qualifications,
            'applicationInstructions'    => $project->application_instructions,
            'implementationPaths'        => $project->implementation_paths,
            'budgetType'                 => $project->budget_type,
            'budgetAmount'               => $project->budget_amount,
            'programLead'                => $project->program_lead,
            'successStory'               => $project->success_story,
            'libraryCollection'          => $project->library_collection,
            'createdAt'                  => $project->opportunity->created_at,
            'updatedAt'                  => $project->opportunity->updated_at,
            'deletedAt'                  => $project->opportunity->deleted_at,
            'createdBy'                  => $project->opportunity->created_by,
            'updatedBy'                  => $project->opportunity->updated_by,
            'deletedBy'                  => $project->opportunity->deleted_by
        ];
    }
}

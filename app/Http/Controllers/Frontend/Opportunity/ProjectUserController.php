<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\ProjectApplicantRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\ProjectFollowerRequest;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Frontend\Lookup\RelationshipTypeRepository;
use SCCatalog\Repositories\Frontend\Opportunity\ProjectUserRepository;

/**
 * Class ProjectUserController.
 */
class ProjectUserController extends Controller
{
    /**
     * @var  ProjectUserRepository
     */
    private $projectUserRepository;

    /**
     * @var  RelationshipTypeRepository
     */
    private $relationshipTypeRepository;

    /**
     * ProjectController constructor.
     *
     * @param ProjectUserRepository $projectUserRepository
     * @param RelationshipTypeRepository $relationshipTypeRepository
     */
    public function __construct(ProjectUserRepository $projectUserRepository, RelationshipTypeRepository $relationshipTypeRepository)
    {
        $this->projectUserRepository = $projectUserRepository;
        $this->relationshipTypeRepository = $relationshipTypeRepository;
    }

    /**
     * Apply to join Project.
     *
     * @param ProjectApplicantRequest $request
     * @param Project                $project
     * @return
     * @throws \Throwable
     */
    public function apply(ProjectApplicantRequest $request, Project $project)
    {
        $relationship = $this->relationshipTypeRepository->getByColumn('applicant', 'slug');
        $this->projectUserRepository->apply($project, $request->user(), ['relationship_type_id' => $relationship->id]);

        return redirect()->route('frontend.opportunity.project.show_public', $project)
            ->withFlashSuccess('Successfully submitted project application');
    }

    /**
     * Cancel application to join Project.
     *
     * @param ProjectApplicantRequest $request
     * @param Project                $project
     * @return
     * @throws \Throwable
     */
    public function cancelApplication(ProjectApplicantRequest $request, Project $project)
    {
        $relationship = $this->relationshipTypeRepository->getByColumn('applicant', 'slug');
        $this->projectUserRepository->cancelApplication($project, $request->user(), ['relationship_type_id' => $relationship->id]);

        return redirect()->route('frontend.opportunity.project.show_public', $project)
            ->withFlashSuccess('Successfully cancelled project application');
    }

    /**
     * Follow Project.
     *
     * @param ProjectFollowerRequest $request
     * @param Project                $project
     * @return
     * @throws \Throwable
     */
    public function follow(ProjectFollowerRequest $request, Project $project)
    {
        $relationship = $this->relationshipTypeRepository->getByColumn('follower', 'slug');
        $this->projectUserRepository->follow($project, $request->user(), ['relationship_type_id' => $relationship->id]);

        return redirect()->route('frontend.opportunity.project.show_public', $project)
            ->withFlashSuccess('Successfully followed project');
    }

    /**
     * Remove user from Project.
     *
     * @param ProjectFollowerRequest $request
     * @param Project                $project
     * @return
     * @throws \Throwable
     */
    public function unfollow(ProjectFollowerRequest $request, Project $project)
    {
        $relationship = $this->relationshipTypeRepository->getByColumn('follower', 'slug');
        $this->projectUserRepository->unfollow($project, $request->user(), ['relationship_type_id' => $relationship->id]);

        return redirect()->route('frontend.opportunity.project.show_public', $project)
            ->withFlashSuccess('Successfully unfollowed project');
    }
}

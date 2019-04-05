<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\ManageProjectUserRequest;
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

        return redirect()->route('frontend.opportunity.project.public.show', $project)
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

        return redirect()->route('frontend.opportunity.project.public.show', $project)
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

        return redirect()->route('frontend.opportunity.project.public.show', $project)
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

        return redirect()->route('frontend.opportunity.project.public.show', $project)
            ->withFlashSuccess('Successfully unfollowed project');
    }

    /**
     * Add user to Project.
     *
     * @param ManageProjectUserRequest $request
     * @param Project $project
     * @param User $user
     * @return
     */
    public function add(ManageProjectUserRequest $request, Project $project, User $user)
    {
        // $project = $this->projectRepository->getById($request->input('project_id'));
        // $user = $this->userRepository->getById($request->input('user_id'));

        $project = $this->projectUserRepository->create(
            $project,
            $user,
            $request->only([
                'relationship_type_id',
                'comment',
            ])
        );

        return redirect()->back()->withFlashSuccess('User added successfully');
    }

    /**
     * Approve user's request to join Project.
     *
     *
     * @param ManageProjectUserRequest $request
     * @param Project $project
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(ManageProjectUserRequest $request, Project $project, User $user)
    {
        $project = $this->projectUserRepository->update(
            $project,
            $user,
            $request->only([
                'relationship_type_id',
                'comment',
            ])
        );

        return redirect()->back()->withFlashSuccess('User relationship updated successfully');
    }

    /**
     * Remove user relationship from Project.
     *
     * @param ManageProjectUserRequest $request
     * @param Project $project
     * @param User $user
     * @return
     */
    public function delete(ManageProjectUserRequest $request, Project $project, User $user)
    {
        dd($project);

        $project = $this->projectUserRepository->delete(
            $project,
            $user,
            $request->only([
                'relationship_type_id',
            ])
        );

        return redirect()->back()->withFlashSuccess('User removed successfully');
    }
}

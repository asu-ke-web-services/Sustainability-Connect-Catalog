<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\EditUserRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreUserRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\RemoveUserRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\ProjectApplicantRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\ProjectFollowerRequest;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Frontend\Auth\UserRepository;
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
     * @var  UserRepository
     */
    private $userRepository;

    /**
     * ProjectController constructor.
     *
     * @param ProjectUserRepository      $projectUserRepository
     * @param RelationshipTypeRepository $relationshipTypeRepository
     * @param UserRepository             $userRepository
     */
    public function __construct(
        ProjectUserRepository $projectUserRepository,
        RelationshipTypeRepository $relationshipTypeRepository,
        UserRepository $userRepository
    ) {
        $this->projectUserRepository = $projectUserRepository;
        $this->relationshipTypeRepository = $relationshipTypeRepository;
        $this->userRepository = $userRepository;
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
     * @param EditUserRequest           $request
     * @param Project                    $project
     * @param RelationshipTypeRepository $relationshipTypeRepository
     * @param UserRepository             $userRepository
     * @return
     * @throws \Throwable
     */
    public function add(
        EditUserRequest $request,
        Project $project,
        RelationshipTypeRepository $relationshipTypeRepository,
        UserRepository $userRepository

    ) {
        return view('frontend.opportunity.project.private.user.add')
            ->withProject($project)
            ->with('relationships', $relationshipTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray());
    }

    /**
     * Store user relationship in Project.
     *
     *
     * @param StoreUserRequest $request
     * @param Project          $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function store(StoreUserRequest $request, Project $project)
    {
        $user = $this->userRepository->getById($request->input('user_id'));

        $this->projectUserRepository->attach(
            $project,
            $user,
            $request->only([
                'relationship_type_id',
                'comments',
            ])
        );

        return redirect()->route('frontend.opportunity.project.private.show', $project)->withFlashSuccess('User relationship updated successfully');
    }

    /**
     * Edit user attached to Project.
     *
     * @param EditUserRequest            $request
     * @param Project                    $project
     * @param User                       $user
     * @param RelationshipTypeRepository $relationshipTypeRepository
     * @param UserRepository             $userRepository
     * @return
     */
    public function edit(
        EditUserRequest $request,
        Project $project,
        User $user,
        RelationshipTypeRepository $relationshipTypeRepository,
        UserRepository $userRepository

    ) {
        return view('frontend.opportunity.project.private.user.edit')
            ->withProject($project)
            ->withUser($user)
            ->with('relationships', $relationshipTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray());
    }

    /**
     * Approve user's request to join Project.
     *
     *
     * @param StoreUserRequest $request
     * @param Project          $project
     * @param User             $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(StoreUserRequest $request, Project $project, User $user)
    {

        $this->projectUserRepository->update(
            $project,
            $user,
            $request->only([
                'relationship_type_id',
                'comments',
            ])
        );

        return redirect()->route('frontend.opportunity.project.private.show', $project)->withFlashSuccess('User relationship updated successfully');
    }

    /**
     * Remove user relationship from Project.
     *
     * @param RemoveUserRequest $request
     * @param Project          $project
     * @param User             $user
     * @return
     */
    public function delete(RemoveUserRequest $request, Project $project, User $user)
    {
        // dd($project);

        $project = $this->projectUserRepository->detach(
            $project,
            $user,
            $request->only([
                'relationship_type_id',
            ])
        );

        return redirect()->route('frontend.opportunity.project.private.show', $project)->withFlashSuccess('User removed successfully');
    }
}

<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageProjectUserRequest;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Auth\Backend\UserRepository;
use SCCatalog\Repositories\Opportunity\ProjectUserRepository;
use SCCatalog\Repositories\Opportunity\ProjectRepository;
use SCCatalog\Repositories\Lookup\RelationshipTypeRepository;

/**
 * Class ProjectUserController.
 */
class ProjectUserController extends Controller
{
    /**
     * @var  ProjectRepository
     */
    private $projectRepository;

    /**
     * @var  ProjectUserRepository
     */
    private $projectUserRepository;

    /**
     * @var  UserRepository
     */
    private $userRepository;

    /**
     * ProjectController constructor.
     *
     * @param ProjectRepository $projectRepository
     * @param ProjectUserRepository $projectUserRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        ProjectRepository $projectRepository,
        ProjectUserRepository $projectUserRepository,
        UserRepository $userRepository
    ) {
        $this->projectRepository = $projectRepository;
        $this->projectUserRepository = $projectUserRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Add user to Project.
     *
     * @param ManageProjectUserRequest $request
     * @param Project $project
     * @param RelationshipTypeRepository $relationshipTypeRepository
     * @param UserRepository             $userRepository
     * @return
     */
    public function add(
        ManageProjectUserRequest $request,
        Project $project,
        RelationshipTypeRepository $relationshipTypeRepository,
        UserRepository $userRepository
    ) {
        return view('backend.opportunity.project.user.add')
            ->withProject($project)
            ->with('relationships', $relationshipTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray());
    }

    /**
     * Store user relationship in Project.
     *
     * @param ManageProjectUserRequest $request
     * @param Project          $project
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function store(ManageProjectUserRequest $request, Project $project)
    {
        $user = $this->userRepository->getById($request->input('user_id'));

        $project = $this->projectUserRepository->attach(
            $project,
            $user,
            $request->only([
                'relationship_type_id',
                'comment',
            ])
        );

        return redirect()->route('admin.opportunity.project.show', $project)->withFlashSuccess('User added successfully');
    }

    /**
     * Edit user attached to Project.
     *
     * @param ManageProjectUserRequest            $request
     * @param Project                    $project
     * @param User                       $user
     * @param RelationshipTypeRepository $relationshipTypeRepository
     * @param UserRepository             $userRepository
     * @return
     */
    public function edit(
        ManageProjectUserRequest $request,
        Project $project,
        User $user,
        RelationshipTypeRepository $relationshipTypeRepository,
        UserRepository $userRepository

    ) {
        return view('backend.opportunity.project.user.edit')
            ->withProject($project)
            ->withUser($user)
            ->with('relationships', $relationshipTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray());
    }

    /**
     * Update user relationship with Project.
     *
     *
     * @param ManageProjectUserRequest $request
     * @param Project          $project
     * @param User             $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(ManageProjectUserRequest $request, Project $project, User $user)
    {
        $this->projectUserRepository->update(
            $project,
            $user,
            $request->only([
                'relationship_type_id',
                'comments',
            ])
        );

        return redirect()->route('admin.opportunity.project.show', $project)->withFlashSuccess('User relationship updated successfully');
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
        $project = $this->projectUserRepository->detach(
            $project,
            $user,
            $request->only([
                'relationship_type_id',
            ])
        );

        return redirect()->route('admin.opportunity.project.show', $project)->withFlashSuccess('User removed successfully');
    }
}

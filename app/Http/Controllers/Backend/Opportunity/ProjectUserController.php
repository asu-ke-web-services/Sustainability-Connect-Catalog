<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\OpportunityUser\ManageProjectUserRequest;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Backend\Auth\UserRepository;
use SCCatalog\Repositories\Backend\Opportunity\ProjectUserRepository;
use SCCatalog\Repositories\Backend\Opportunity\ProjectRepository;

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
    )
    {
        $this->projectRepository = $projectRepository;
        $this->projectUserRepository = $projectUserRepository;
        $this->userRepository = $userRepository;
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

        return redirect()->route('admin.backend.opportunity.user.added')
            ->withFlashSuccess('User added successfully');
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

        return redirect()->route('admin.backend.opportunity.user.updated')
            ->withFlashSuccess('User approved successfully');
    }

    /**
     * Remove user relationship from Project.
     *
     * @param ManageProjectUserRequest $request
     * @param Project $project
     * @param User $user
     * @return
     */
    public function remove(ManageProjectUserRequest $request, Project $project, User $user)
    {
        $project = $this->projectUserRepository->delete(
            $project,
            $user,
            $request->only([
                'relationship_type_id',
            ])
        );

        return redirect()->route('admin.backend.opportunity.project.index')
            ->withFlashSuccess('User removed successfully');
    }
}

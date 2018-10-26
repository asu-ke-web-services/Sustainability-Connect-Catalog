<?php

namespace SCCatalog\Http\Controllers\Backend;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Backend\Auth\UserRepository;
use SCCatalog\Repositories\Backend\Opportunity\InternshipRepository;
use SCCatalog\Repositories\Backend\Opportunity\ProjectRepository;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @var Project
     */
    private $project;

    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * @var InternshipRepository
     */
    private $internshipRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * DashboardController constructor.
     *
     * @param Project              $project
     * @param InternshipRepository $internshipRepository
     * @param ProjectRepository    $projectRepository
     * @param UserRepository       $userRepository
     */
    public function __construct(Project $project, InternshipRepository $internshipRepository, ProjectRepository $projectRepository, UserRepository $userRepository)
    {
        $this->project = $project;
        $this->projectRepository = $projectRepository;
        $this->internshipRepository = $internshipRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.dashboard')
            ->with('projectsTotal', $this->projectRepository->where('opportunityable_type', 'Project')->count())
            ->with('internshipsTotal', $this->internshipRepository->where('opportunityable_type', 'Internship')->count())
            ->with('activeUsersTotal', $this->userRepository->count())
            ->with('projectsUnderReview', $this->project::with('opportunity')->inReview()->get())
            ->with('newUsersToReview', $this->userRepository->where('access_validated', 0)->get())
            // ->with('activeProjectMembers', $this->userRepository->getActiveOpportunityMembersPaginated(25, 'application_deadline', 'asc'));
            ->with('activeProjectMembers', $this->userRepository->has('projects')->get()->load('opportunities'));
    }
}

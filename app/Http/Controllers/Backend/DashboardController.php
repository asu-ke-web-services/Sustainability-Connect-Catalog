<?php

namespace SCCatalog\Http\Controllers\Backend;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Backend\Auth\UserRepository;
use SCCatalog\Repositories\Backend\Opportunity\InternshipRepository;
use SCCatalog\Repositories\Backend\Opportunity\ProjectRepository;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
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
     * @param InternshipRepository $internshipRepository
     * @param ProjectRepository    $projectRepository
     * @param UserRepository       $userRepository
     */
    public function __construct(InternshipRepository $internshipRepository, ProjectRepository $projectRepository, UserRepository $userRepository)
    {
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
            ->with('projectsUnderReview', $this->projectRepository->where([
                ['opportunityable_type', 'Project'],
                ['review_status_id', 3],
            ]))
            ->with('internshipsTotal', $this->internshipRepository->where('opportunityable_type', 'Internship')->count())
            ->with('activeUsersTotal', $this->userRepository->count())
            ->with('newUsersToReview', $this->userRepository->where([
                ['reviewed', 0],
            ]))
            ->with('activeProjectMembers', $this->opportunityUserRepository->where([
                ['reviewed', 0],
            ]));
    }
}

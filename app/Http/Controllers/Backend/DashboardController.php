<?php

namespace SCCatalog\Http\Controllers\Backend;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Auth\Backend\UserRepository;
use SCCatalog\Repositories\Opportunity\InternshipRepository;
use SCCatalog\Repositories\Opportunity\ProjectRepository;

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
            ->with('activeProjectsCount', $this->projectRepository->getActiveCount())
            ->with('completedProjectsCount', $this->projectRepository->getCompletedCount())
            ->with('activeInternshipsCount', $this->internshipRepository->getActiveCount())
            ->with('activeUsersCount', $this->userRepository->getActiveCount())
            ->with('projectsUnderReview', $this->projectRepository->getProposalReviewsPaginated(100, 'created_at', 'asc'))
            ->with('newUsersToReview', $this->userRepository->getNeedsAffiliationReviewPaginated(100, '', 'created_at', 'asc'));
    }
}

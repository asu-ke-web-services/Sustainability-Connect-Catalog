<?php

namespace SCCatalog\Http\Controllers\Backend\Report;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Auth\Backend\UserRepository;
use SCCatalog\Repositories\Opportunity\ProjectRepository;

/**
 * Class ProjectReportController.
 */
class ProjectReportController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * ProjectReportController constructor.
     *
     * @param ProjectRepository    $projectRepository
     * @param UserRepository       $userRepository
     */
    public function __construct(ProjectRepository $projectRepository, UserRepository $userRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getActiveUsers()
    {
        return view('backend.report.project.active_users')
            ->with('activeProjectMembers', $this->userRepository->has('participatingInProjects')->get())
            ->with('defaultOrderBy', 'created_at')
            ->with('defaultSort', 'asc');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getProposalReviews()
    {
        return view('backend.report.project.in_review')
            ->with('projectsInReview', $this->projectRepository->getProposalReviewsPaginated(1000, 'created_at', 'asc'))
            ->with('defaultOrderBy', 'created_at')
            ->with('defaultSort', 'asc');
    }
}

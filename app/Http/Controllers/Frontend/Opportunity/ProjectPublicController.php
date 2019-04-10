<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\ViewProjectRequest;
use SCCatalog\Repositories\Opportunity\ProjectRepository;
use SCCatalog\Models\Opportunity\Project;

/**
 * Class ProjectPublicController.
 */
class ProjectPublicController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * ProjectPublicController constructor.
     *
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Display a listing of the Projects.
     *
     * @param ViewProjectRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index_active(ViewProjectRequest $request)
    {
        $userAccessAffiliations = [];
        $canViewRestricted = false;

        if (null !== auth()->user()) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toArray();

            $canViewRestricted = auth()->user()->hasPermissionTo('read all projects');
        }

        return view("frontend.opportunity.project.public.active.index")
            ->withProjects($this->projectRepository->getActivePaginated(200, 'application_deadline_at', 'asc'))
            ->with('pageTitle', 'Projects')
            ->with('userAccessAffiliations', $userAccessAffiliations)
            ->with('canViewRestricted', $canViewRestricted)
            ->with('defaultOrderBy', 'application_deadline_at')
            ->with('defaultSort', 'asc');
    }

    /**
     * Display a listing of the Projects.
     *
     * @param ViewProjectRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index_completed(ViewProjectRequest $request)
    {
        $userAccessAffiliations = [];
        $canViewRestricted = false;

        if (null !== auth()->user()) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toArray();

            $canViewRestricted = auth()->user()->hasPermissionTo('read all projects');
        }

        return view("frontend.opportunity.project.public.completed.index")
            ->withProjects($this->projectRepository->getCompletedPaginated(200, 'opportunity_start_at', 'desc'))
            ->with('pageTitle', 'Past Projects')
            ->with('userAccessAffiliations', $userAccessAffiliations)
            ->with('canViewRestricted', $canViewRestricted)
            ->with('defaultOrderBy', 'opportunity_start_at')
            ->with('defaultSort', 'desc');
    }

    /**
     * Display the specified Project.
     *
     * @param ViewProjectRequest $request
     * @param Project            $user
     *
     * @return \Illuminate\View\View
     */
    public function show(ViewProjectRequest $request, $id)
    {
        $project = $this->projectRepository
            ->with([
                'addresses',
                'notes',
                'status',
                'organization',
                'supervisorUser',
                'submittingUser',
                'affiliations',
                'categories',
                'keywords',
                'followers',
                'applicants',
            ])
            ->getById($id);

        $userAccessAffiliations = false;
        $canViewRestricted = false;
        $isFollowed = false;
        $isApplicationSubmitted = false;

        if (auth()->user() !== null) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toJson();

            $canViewRestricted = auth()->user()->hasPermissionTo('read all internships');

            $followedProjects = auth()->user()->followedProjects
                ->map(function ($project) {
                    return $project['id'];
                })->toArray();

            $isFollowed = in_array($id, $followedProjects);

            $appliedProjects = auth()->user()->projectApplications
                ->map(function ($project) {
                    return $project['id'];
                })->toArray();

            $isApplicationSubmitted = in_array($id, $appliedProjects);
        }

        return view('frontend.opportunity.project.public.show')
            ->withProject($project)
            ->with('type', 'Project')
            ->with('pageTitle', $project->name)
            ->with('userAccessAffiliations', $userAccessAffiliations)
            ->with('canViewRestricted', $canViewRestricted)
            ->with('isFollowed', $isFollowed)
            ->with('isApplicationSubmitted', $isApplicationSubmitted);
    }
}

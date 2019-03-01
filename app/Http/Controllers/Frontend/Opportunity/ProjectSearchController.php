<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use JavaScript;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Frontend\Opportunity\ProjectCreated;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreProjectRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\ViewProjectRequest;
use SCCatalog\Repositories\Frontend\Auth\UserRepository;
use SCCatalog\Repositories\Frontend\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Frontend\Lookup\BudgetTypeRepository;
use SCCatalog\Repositories\Frontend\Lookup\CategoryRepository;
use SCCatalog\Repositories\Frontend\Lookup\KeywordRepository;
use SCCatalog\Repositories\Frontend\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Frontend\Lookup\OpportunityReviewStatusRepository;
use SCCatalog\Repositories\Frontend\Opportunity\ProjectRepository;
use SCCatalog\Repositories\Frontend\Organization\OrganizationRepository;

/**
 * Class ProjectSearchController.
 */
class ProjectSearchController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * ProjectController constructor.
     *
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Display a listing of the active Projects.
     *
     * @param ViewProjectRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchActive(ViewProjectRequest $request)
    {
        $userAccessAffiliations = [];
        $canViewRestricted = false;

        if ( null !== auth()->user() ) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toArray();

            $canViewRestricted = auth()->user()->hasPermissionTo('read all projects');
        }

        return view('frontend.opportunity.project.search_active')
            ->withProjects($this->projectRepository->getActivePaginated(25, 'application_deadline_at', 'asc'))
            ->with('userAccessAffiliations', $userAccessAffiliations)
            ->with('canViewRestricted', $canViewRestricted)
            ->with('defaultOrderBy', 'application_deadline_at')
            ->with('defaultSort', 'asc');
    }

    /**
     * Display a listing of Completed Projects.
     *
     * @param ViewProjectRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchCompleted(ViewProjectRequest $request)
    {
        $userAccessAffiliations = [];
        $canViewRestricted = false;

        if ( null !== auth()->user() ) {
            $userAccessAffiliations = auth()->user()->accessAffiliations
                ->map(function ($affiliation) {
                    return $affiliation['slug'];
                })->toArray();

            $canViewRestricted = auth()->user()->hasPermissionTo('read all projects');
        }

        return view('frontend.opportunity.project.search_completed')
            ->withProjects($this->projectRepository->getCompletedPaginated(25, 'application_deadline_at', 'asc'))
            ->with('userAccessAffiliations', $userAccessAffiliations)
            ->with('canViewRestricted', $canViewRestricted)
            ->with('defaultOrderBy', 'application_deadline_at')
            ->with('defaultSort', 'asc');
    }
}

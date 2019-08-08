<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\EditFullProjectRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreFullProjectRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\ViewProjectRequest;
use SCCatalog\Repositories\Auth\Frontend\UserRepository;
use SCCatalog\Repositories\Lookup\AffiliationRepository;
use SCCatalog\Repositories\Lookup\BudgetTypeRepository;
use SCCatalog\Repositories\Lookup\CategoryRepository;
use SCCatalog\Repositories\Lookup\KeywordRepository;
use SCCatalog\Repositories\Lookup\OpportunityStatusRepository;
use SCCatalog\Repositories\Lookup\OpportunityReviewStatusRepository;
use SCCatalog\Repositories\Opportunity\ProjectAttachmentRepository;
use SCCatalog\Repositories\Opportunity\ProjectRepository;
use SCCatalog\Repositories\Organization\OrganizationRepository;
use SCCatalog\Models\Lookup\AttachmentStatus;
use SCCatalog\Models\Lookup\AttachmentType;
use SCCatalog\Models\Opportunity\Project;
use Spatie\MediaLibrary\Media;

/**
 * Class ProjectPrivateController.
 */
class ProjectPrivateController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * @var ProjectAttachmentRepository
     */
    private $projectAttachmentRepository;

    /**
     * ProjectPrivateController constructor.
     *
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository, ProjectAttachmentRepository $projectAttachmentRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->projectAttachmentRepository = $projectAttachmentRepository;
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

        $attachments = $project->getMedia();

        return view('frontend.opportunity.project.private.show')
            ->withProject($project)
            ->withAttachments($attachments)
            ->with('pageTitle', $project->name);
    }

    /**
     * Display the print-version of the specified Project.
     *
     * @param ViewProjectRequest $request
     * @param Project          $project
     *
     * @return \Illuminate\View\View
     */
    public function print(ViewProjectRequest $request, Project $project)
    {
        $project->loadMissing(
            'addresses',
            'notes',
            'status',
            'organization',
            'supervisorUser',
            'submittingUser',
            'affiliations',
            'categories',
            'keywords',
            'users',
            'createdByUser',
            'updatedByUser'
        );

        $attachments = $project->getMedia();

        return view('frontend.opportunity.project.private.print')
            ->withProject($project)
            ->withAttachments($attachments);
    }

    /**
     * Show the form for creating a new, full Project.
     *
     * @param EditFullProjectRequest $request
     * @param BudgetTypeRepository $budgetTypeRepository
     * @param AffiliationRepository $affiliationRepository
     * @param CategoryRepository $categoryRepository
     * @param KeywordRepository $keywordRepository
     * @param OpportunityRepository $opportunityRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OpportunityReviewStatusRepository $opportunityReviewStatusRepository
     * @param OrganizationRepository $organizationRepository
     * @param UserRepository $userRepository
     *
     * @return \Illuminate\View\View
     */
    public function create(
        EditFullProjectRequest $request,
        AffiliationRepository $affiliationRepository,
        AttachmentStatus $attachmentStatusRepository,
        AttachmentType $attachmentTypeRepository,
        BudgetTypeRepository $budgetTypeRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OpportunityReviewStatusRepository $opportunityReviewStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository
    ) {
        return view('frontend.opportunity.project.private.create')
            ->with('formMode', 'create')
            ->with('affiliations', $affiliationRepository->whereIn('opportunity_type_id', [1, 2])->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('budgetTypes', $budgetTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('opportunityReviewStatuses', $opportunityReviewStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('attachmentStatuses', $attachmentStatusRepository->get()->pluck('name', 'slug')->toArray())
            ->with('attachmentTypes', $attachmentTypeRepository->get()->pluck('name', 'slug')->toArray());
    }

    /**
     * Store a newly created Project in storage.
     *
     * @param $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store($request)
    {
        $project = $this->projectRepository->create($request);
        $project = $this->projectAttachmentRepository->store($project, $request->all());

        return redirect()->route('frontend.opportunity.project.private.show', $project)
            ->withFlashSuccess(__('Project successfully created'));
    }

    /**
     * Show the form for updating a full, new Project.
     *
     * @param EditFullProjectRequest $request
     * @param BudgetTypeRepository $budgetTypeRepository
     * @param AffiliationRepository $affiliationRepository
     * @param CategoryRepository $categoryRepository
     * @param KeywordRepository $keywordRepository
     * @param OpportunityRepository $opportunityRepository
     * @param OpportunityStatusRepository $opportunityStatusRepository
     * @param OpportunityReviewStatusRepository $opportunityReviewStatusRepository
     * @param OrganizationRepository $organizationRepository
     * @param UserRepository $userRepository
     *
     * @return \Illuminate\View\View
     */
    public function edit(
        EditFullProjectRequest $request,
        AffiliationRepository $affiliationRepository,
        BudgetTypeRepository $budgetTypeRepository,
        CategoryRepository $categoryRepository,
        KeywordRepository $keywordRepository,
        OpportunityStatusRepository $opportunityStatusRepository,
        OpportunityReviewStatusRepository $opportunityReviewStatusRepository,
        OrganizationRepository $organizationRepository,
        UserRepository $userRepository,
        Project $project
    ) {
        $project->loadMissing(
            'addresses',
            'notes',
            'status',
            'organization',
            'supervisorUser',
            'submittingUser',
            'affiliations',
            'categories',
            'keywords',
            'users'
        );

        if (0 === count($project->addresses)) {
            $project->addresses = null;
        }

        if (0 === count($project->notes)) {
            $project->notes = null;
        }

        if (0 === count($project->affiliations)) {
            $project->affiliations = null;
        }

        if (0 === count($project->categories)) {
            $project->categories = null;
        }

        if (0 === count($project->keywords)) {
            $project->keywords = null;
        }

        if (0 === count($project->users)) {
            $project->users = null;
        }

        return view('frontend.opportunity.project.private.edit')
            ->with('formMode', 'edit')
            ->with('project', $project)
            ->with('affiliations', $affiliationRepository->whereIn('opportunity_type_id', [1, 2])->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('budgetTypes', $budgetTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('categories', $categoryRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('keywords', $keywordRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('organizations', $organizationRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray())
            ->with('opportunityStatuses', $opportunityStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('opportunityReviewStatuses', $opportunityReviewStatusRepository->where('opportunity_type_id', 2)->get(['id', 'name'])->pluck('name', 'id')->toArray());
    }

    /**
     * Update a Project in storage.
     *
     * @param StoreFullProjectRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function update(StoreFullProjectRequest $request, Project $project)
    {
        $project = $this->projectRepository->update($project, $request->all());

        return redirect()->route('frontend.opportunity.project.private.show', $project)
            ->withFlashSuccess(__('Project successfully updated'));
    }
}

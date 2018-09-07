<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Events\Backend\Opportunity\OpportunityCreatedEvent;
use SCCatalog\Events\Backend\Opportunity\OpportunityUpdatedEvent;
use SCCatalog\Events\Backend\Opportunity\OpportunityDeletedEvent;
use SCCatalog\Http\Requests\Backend\Opportunity\OpportunityRequest;
use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;

/**
 * Class OpportunityController.
 */
class OpportunityController extends Controller
{
    /**
     * @var OpportunityRepository
     */
    private $opportunityRepository;

    /**
     * OpportunityController constructor.
     *
     * @param OpportunityRepository $opportunityRepository
     */
    public function __construct(OpportunityRepository $opportunityRepository)
    {
        $this->opportunityRepository = $opportunityRepository;
    }

    /**
     * Display a listing of the Opportunity.
     *
     * @param ManageOpportunityRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ViewOpportunityRequest $request)
    {
        return view('opportunity.index')
            ->withOpportunities($this->opportunityRepository->paginate(25));
    }

    /**
     * Show the form for creating a new Opportunity.
     *
     * @param ManageOpportunityRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function create(ManageOpportunityRequest $request)
    {
        return view('opportunity.create');
    }

    /**
     * Store a newly created Opportunity in storage.
     *
     * @param OpportunityRequest $request
     *
     * @return \Illuminate\View\View
     * @throws \Throwable
     */
    public function store(OpportunityRequest $request)
    {
        $this->opportunityRepository->create($request->only(
            'field1',
            'field2',
        ));

        event(new OpportunityCreatedEvent($opportunity));

        return redirect()->route('opportunity.index')
            ->withFlashSuccess(__('Opportunity created successfully'));
    }

    /**
     * Display the specified Opportunity.
     *
     * @param ManageOpportunityRequest $request
     * @param Opportunity            $user
     *
     * @return \Illuminate\View\View
     */
    public function show(ManageOpportunityRequest $request, Opportunity $opportunity)
    {
        return view('opportunity.show')
            ->withOpportunities($opportunity);
    }

    /**
     * Show the form for editing the specified Opportunity.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(ManageOpportunityRequest $request, Opportunity $opportunity)
    {
        return view('opportunity.edit')
            ->withOpportunity($opportunity);
    }

    /**
     * Update the specified Opportunity in storage.
     *
     * @param  int                 $id
     * @param OpportunityRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function update(OpportunityRequest $request, Opportunity $opportunity)
    {
        $opportunity = $this->opportunityRepository->updateById($opportunity->id, $request->only(
            'field1',
            'field2'
        ));

        event(new OpportunityUpdatedEvent($opportunity));

        return redirect()->route('opportunity.index')
            ->withFlashSuccess(__('Opportunity updated successfully'));
    }

    /**
     * Remove the specified Opportunity from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function destroy(ManageOpportunityRequest $request, Opportunity $opportunity)
    {
        $this->opportunityRepository->deleteById($opportunity->id);
        return redirect()->route('opportunity.index')
            ->withFlashSuccess('Opportunity deleted successfully');


        $opportunity = $this->opportunityRepository->getById($id);
        $this->opportunityRepository->deleteById($id);

        event(new OpportunityDeletedEvent($opportunity));

        return redirect()->route('opportunity.index')
            ->withFlashSuccess('Opportunity deleted successfully');
    }
}

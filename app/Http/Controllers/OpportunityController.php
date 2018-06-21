<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOpportunityRequest;
use App\Http\Requests\UpdateOpportunityRequest;
use App\Repositories\OpportunityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OpportunityController extends AppBaseController
{
    /** @var  OpportunityRepository */
    private $opportunityRepository;

    public function __construct(OpportunityRepository $opportunityRepo)
    {
        $this->opportunityRepository = $opportunityRepo;
    }

    /**
     * Display a listing of the Opportunity.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->opportunityRepository->pushCriteria(new RequestCriteria($request));
        $opportunities = $this->opportunityRepository->all();

        return view('opportunities.index')
            ->with('opportunities', $opportunities);
    }

    /**
     * Show the form for creating a new Opportunity.
     *
     * @return Response
     */
    public function create()
    {
        return view('opportunities.create');
    }

    /**
     * Store a newly created Opportunity in storage.
     *
     * @param CreateOpportunityRequest $request
     *
     * @return Response
     */
    public function store(CreateOpportunityRequest $request)
    {
        $input = $request->all();

        $opportunity = $this->opportunityRepository->create($input);

        Flash::success('Opportunity saved successfully.');

        return redirect(route('opportunities.index'));
    }

    /**
     * Display the specified Opportunity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $opportunity = $this->opportunityRepository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Opportunity not found');

            return redirect(route('opportunities.index'));
        }

        return view('opportunities.show')->with('opportunity', $opportunity);
    }

    /**
     * Show the form for editing the specified Opportunity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $opportunity = $this->opportunityRepository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Opportunity not found');

            return redirect(route('opportunities.index'));
        }

        return view('opportunities.edit')->with('opportunity', $opportunity);
    }

    /**
     * Update the specified Opportunity in storage.
     *
     * @param  int              $id
     * @param UpdateOpportunityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOpportunityRequest $request)
    {
        $opportunity = $this->opportunityRepository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Opportunity not found');

            return redirect(route('opportunities.index'));
        }

        $opportunity = $this->opportunityRepository->update($request->all(), $id);

        Flash::success('Opportunity updated successfully.');

        return redirect(route('opportunities.index'));
    }

    /**
     * Remove the specified Opportunity from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $opportunity = $this->opportunityRepository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Opportunity not found');

            return redirect(route('opportunities.index'));
        }

        $this->opportunityRepository->delete($id);

        Flash::success('Opportunity deleted successfully.');

        return redirect(route('opportunities.index'));
    }
}

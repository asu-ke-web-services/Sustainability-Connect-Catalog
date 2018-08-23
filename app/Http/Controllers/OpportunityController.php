<?php

namespace SCCatalog\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Response;
use SCCatalog\Contracts\Repositories\OpportunityRepositoryContract as OpportunityRepository;
use SCCatalog\Http\Requests\CreateOpportunityRequest;
use SCCatalog\Http\Requests\FollowOpportunityRequest;
use SCCatalog\Http\Requests\UnfollowOpportunityRequest;
use SCCatalog\Http\Requests\UpdateOpportunityRequest;
use SCCatalog\Http\Requests;
// use SCCatalog\Jobs\Opportunity\CreateOpportunityJob;
// use SCCatalog\Jobs\Opportunity\FollowOpportunityJob;
// use SCCatalog\Jobs\Opportunity\UnfollowOpportunityJob;
// use SCCatalog\Jobs\Opportunity\UpdateOpportunityJob;
use SCCatalog\Validators\OpportunityValidator;
use SCCatalog\Models\Category;
use SCCatalog\Models\Keyword;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\Organization;
use SCCatalog\Models\User;

/**
 * Class OpportunityController.
 *
 * @package namespace SCCatalog\Http\Controllers;
 */
class OpportunityController extends Controller
{
    /**
     * @var  OpportunityRepository
     */
    private $repository;

    /**
     * @var OpportunityValidator
     */
    protected $validator;

    /**
     * OpportunityController constructor.
     *
     *     Note for future maintainers: the Repository Contract is referenced here, and Laravel injects
     *     the Eloquent Repository because we registered the binding between the
     *     contract and implementation in Providers\AppServiceProvider
     *
     * @param OpportunityRepository $repository
     * @param OpportunityValidator $validator
     */
    public function __construct(OpportunityRepository $repository, OpportunityValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->repository->pushCriteria(new RequestCriteria($request));
        $opportunities = $this->repository->with(['opportunityable'])->all();

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
     * Store a newly created resource in storage.
     *
     * @param OpportunityCreateRequest $request
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateOpportunityRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $opportunity = $this->repository->create($request->all());

            $response = [
                'message' => 'Opportunity created.',
                'data'    => $post->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            Flash::success('Opportunity saved successfully.');

            return redirect()->back()->with('message', $response['message']);
            // OR: return redirect(route('opportunities.index'));

        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $opportunity = $this->repository->with(['opportunityable'])->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Opportunity not found');

            return redirect(route('opportunities.index'));
        }

        return view('opportunities.show')->with('opportunity', $opportunity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Opportunity not found');

            return redirect(route('opportunities.index'));
        }

        return view('opportunities.edit')->with('opportunity', $opportunity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int                      $id
     * @param OpportunityUpdateRequest $request
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateOpportunityRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $opportunity = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Opportunity updated.',
                'data'    => $opportunity->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            Flash::success('Opportunity updated successfully.');

            return redirect()->back()->with('message', $response['message']);
            // OR: return redirect(route('opportunities.index'));

        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }

        // $opportunity = $this->repository->findWithoutFail($id);

        // if (empty($opportunity)) {
        //     Flash::error('Opportunity not found');

        //     return redirect(route('opportunities.index'));
        // }

        // $opportunity = $this->repository->update($request->all(), $id);

        // Flash::success('Opportunity updated successfully.');

        // return redirect(route('opportunities.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        // $deleted = $this->repository->delete($id);

        // if (request()->wantsJson()) {

        //     return response()->json([
        //         'message' => 'Opportunity deleted.',
        //         'deleted' => $deleted,
        //     ]);
        // }

        // return redirect()->back()->with('message', 'Opportunity deleted.');


        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Opportunity not found');

            return redirect(route('opportunities.index'));
        }

        $this->repository->delete($id);

        Flash::success('Opportunity deleted successfully.');

        return redirect(route('opportunities.index'));
    }

    /**
     * Duplicate opportunity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function clone($id, DuplicateOpportunityRequest $request)
    {
        $user = Auth::user();
        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        DuplicateOpportunity::dispatch($opportunity, $user);

        Flash::success('Successfully duplicated opportunity.');

        return redirect(route('projects.index'));
    }

    /**
     * Archive opportunity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function archive($id, ArchiveOpportunityRequest $request)
    {
        $user = Auth::user();
        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        ArchiveOpportunity::dispatch($opportunity, $user);

        Flash::success('Successfully archived opportunity.');

        return redirect(route('projects.index'));
    }

}

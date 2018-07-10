<?php

namespace SCCatalog\Http\Controllers;


use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Response;
use SCCatalog\Http\Requests\OpportunityCreateRequest;
use SCCatalog\Http\Requests\OpportunityUpdateRequest;
use SCCatalog\Http\Requests;
use SCCatalog\Contracts\Repositories\OpportunityRepositoryContract as OpportunityRepository;
use SCCatalog\Validators\OpportunityValidator;

/**
 * Class OpportunityController.
 *
 * @package namespace SCCatalog\Http\Controllers\Frontend;
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
     *     Laravel note: the Repository Contract is referenced here, and Laravel injects
     *     the Repository implementation because we registered the binding between the
     *     contract and repo in Providers\AppServiceProvider
     *
     * @param OpportunityRepository $repository
     * @param OpportunityValidator $validator
     */
    public function __construct(OpportunityRepository $repository, OpportunityValidator $validator)
    {
        $this->opportunities = $repository;
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
        $this->opportunities->pushCriteria(new RequestCriteria($request));
        $opportunities = $this->opportunities->all();

        // if (request()->wantsJson()) {

        //     return response()->json([
        //         'data' => $posts,
        //     ]);
        // }

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
    public function store(OpportunityCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $opportunity = $this->opportunities->create($request->all());

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
        $opportunity = $this->opportunities->findWithoutFail($id);

        // if (request()->wantsJson()) {
        //     // TODO: handle empty response (add message?)
        //     return response()->json([
        //         'data' => $post,
        //     ]);
        // }

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
        $opportunity = $this->opportunities->findWithoutFail($id);

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
    public function update($id, OpportunityUpdateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $opportunity = $this->opportunities->update($request->all(), $id);

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

        // $opportunity = $this->opportunities->findWithoutFail($id);

        // if (empty($opportunity)) {
        //     Flash::error('Opportunity not found');

        //     return redirect(route('opportunities.index'));
        // }

        // $opportunity = $this->opportunities->update($request->all(), $id);

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
        // $deleted = $this->opportunities->delete($id);

        // if (request()->wantsJson()) {

        //     return response()->json([
        //         'message' => 'Opportunity deleted.',
        //         'deleted' => $deleted,
        //     ]);
        // }

        // return redirect()->back()->with('message', 'Opportunity deleted.');


        $opportunity = $this->opportunities->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Opportunity not found');

            return redirect(route('opportunities.index'));
        }

        $this->opportunities->delete($id);

        Flash::success('Opportunity deleted successfully.');

        return redirect(route('opportunities.index'));
    }
}

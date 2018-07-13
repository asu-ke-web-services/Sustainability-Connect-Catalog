<?php

namespace SCCatalog\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Response;
use SCCatalog\Http\Requests\OrganizationCreateRequest;
use SCCatalog\Http\Requests\OrganizationUpdateRequest;
use SCCatalog\Http\Requests;
use SCCatalog\Contracts\Repositories\OrganizationRepositoryContract as OrganizationRepository;
use SCCatalog\Validators\OrganizationValidator;

class OrganizationController extends Controller
{
    /** @var  OrganizationRepository */
    private $organizations;

    /**
     * @var OrganizationValidator
     */
    protected $validator;

    /**
     * OrganizationController constructor.
     *
     *     Laravel note: the Repository Contract is referenced here, and Laravel injects
     *     the Repository implementation because we registered the binding between the
     *     contract and repo in Providers\AppServiceProvider
     *
     * @param OrganizationRepository $repository
     * @param OrganizationValidator $validator
     */
    public function __construct(OrganizationRepository $repository, OrganizationValidator $validator)
    {
        $this->organizations = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the Organization.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->organizations->pushCriteria(new RequestCriteria($request));
        $organizations = $this->organizations->all();

        return view('organizations.index')
            ->with('organizations', $organizations);
    }

    /**
     * Show the form for creating a new Organization.
     *
     * @return Response
     */
    public function create()
    {
        return view('organizations.create');
    }

    /**
     * Store a newly created Organization in storage.
     *
     * @param OrganizationCreateRequest $request
     *
     * @return Response
     */
    public function store(OrganizationCreateRequest $request)
    {
        $input = $request->all();

        $organization = $this->organizations->create($input);

        Flash::success('Organization saved successfully.');

        return redirect(route('organizations.index'));
    }

    /**
     * Display the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $organization = $this->organizations->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        return view('organizations.show')->with('organization', $organization);
    }

    /**
     * Show the form for editing the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $organization = $this->organizations->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        return view('organizations.edit')->with('organization', $organization);
    }

    /**
     * Update the specified Organization in storage.
     *
     * @param  int                      $id
     * @param OrganizationUpdateRequest $request
     *
     * @return Response
     */
    public function update($id, OrganizationUpdateRequest $request)
    {
        $organization = $this->organizations->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $organization = $this->organizations->update($request->all(), $id);

        Flash::success('Organization updated successfully.');

        return redirect(route('organizations.index'));
    }

    /**
     * Remove the specified Organization from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $organization = $this->organizations->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $this->organizations->delete($id);

        Flash::success('Organization deleted successfully.');

        return redirect(route('organizations.index'));
    }
}

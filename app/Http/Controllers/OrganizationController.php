<?php

namespace SCCatalog\Http\Controllers;

use SCCatalog\Http\Requests\OrganizationCreateRequest;
use SCCatalog\Http\Requests\OrganizationUpdateRequest;
use SCCatalog\Contracts\Repositories\OrganizationRepositoryContract as OrganizationRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrganizationController extends Controller
{
    /** @var  OrganizationRepository */
    private $repository;

    public function __construct(OrganizationRepository $repo)
    {
        $this->repository = $repo;
    }

    /**
     * Display a listing of the Organization.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->repository->pushCriteria(new RequestCriteria($request));
        $organizations = $this->repository->all();

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
    public function store( OrganizationCreateRequest $request)
    {
        $input = $request->all();

        $organization = $this->repository->create($input);

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
        $organization = $this->repository->findWithoutFail($id);

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
        $organization = $this->repository->findWithoutFail($id);

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
    public function update( $id, OrganizationUpdateRequest $request)
    {
        $organization = $this->repository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $organization = $this->repository->update($request->all(), $id);

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
        $organization = $this->repository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $this->repository->delete($id);

        Flash::success('Organization deleted successfully.');

        return redirect(route('organizations.index'));
    }
}

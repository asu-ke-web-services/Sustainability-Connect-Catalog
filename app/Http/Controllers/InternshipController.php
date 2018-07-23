<?php

namespace SCCatalog\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Response;
use SCCatalog\Criteria\InternshipCriteria;
use SCCatalog\Http\Controllers\OpportunityController;
// use SCCatalog\Http\Requests\CreateOpportunityRequest;
// use SCCatalog\Http\Requests\InternshipCreateRequest;
// use SCCatalog\Http\Requests\InternshipUpdateRequest;
use SCCatalog\Contracts\Repositories\OpportunityRepositoryContract as OpportunityRepository;
// use SCCatalog\Contracts\Repositories\InternshipRepositoryContract as InternshipRepository;
// use SCCatalog\Http\Requests\UpdateOpportunityRequest;
// use SCCatalog\Models\Internship;
use SCCatalog\Validators\OpportunityValidator;
// use SCCatalog\Validators\InternshipValidator;

class InternshipController extends OpportunityController
{
    /**
     * @var OpportunityRepository
     */
    private $repository;

    /**
     * @var OpportunityValidator
     */
    protected $validator;


    public function __construct(OpportunityRepository $repository, OpportunityValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the Internship.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->repository->pushCriteria(new RequestCriteria($request));
        $this->repository->pushCriteria(InternshipCriteria::class);
        $opportunities = $this->repository->with(['opportunityable'])->all();

        return view('internships.index')
            ->with('opportunities', $opportunities);
    }

    /**
     * Show the form for creating a new Internship.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $keywords = Keyword::pluck('name', 'id');
        $parentOpportunities = Opportunity::pluck('title', 'id');
        $organizations = Organization::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('internships.create', [
            'categories' => $categories,
            'keywords' => $keywords,
            'organizations' => $organizations,
            'parentOpportunities' => $parentOpportunities,
            'organizations' => $organizations,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created Internship in storage.
     *
     * @param InternshipCreateRequest $request
     *
     * @return Response
     */
    public function store(InternshipCreateRequest $request)
    {
        $input = $request->all();

        $internship = $this->repository->create($input);

        Flash::success('Internship saved successfully.');

        return redirect(route('internships.index'));
    }

    /**
     * Display the specified Internship.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $this->repository->pushCriteria(InternshipCriteria::class);
        $opportunity = $this->repository->with(['opportunityable'])->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        return view('internships.show')->with('opportunity', $opportunity);
    }

    /**
     * Show the form for editing the specified Internship.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $internship = $this->repository->findWithoutFail($id);

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        return view('internships.edit')->with('internship', $internship);
    }

    /**
     * Update the specified Internship in storage.
     *
     * @param  int                    $id
     * @param InternshipUpdateRequest $request
     *
     * @return Response
     */
    public function update($id, InternshipUpdateRequest $request)
    {
        $internship = $this->repository->findWithoutFail($id);

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        $internship = $this->repository->update($request->all(), $id);

        Flash::success('Internship updated successfully.');

        return redirect(route('internships.index'));
    }

    /**
     * Remove the specified Internship from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $internship = $this->repository->findWithoutFail($id);

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        $this->repository->delete($id);

        Flash::success('Internship deleted successfully.');

        return redirect(route('internships.index'));
    }
}

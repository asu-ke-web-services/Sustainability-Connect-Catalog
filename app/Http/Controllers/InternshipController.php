<?php

namespace SCCatalog\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Response;
use SCCatalog\Http\Requests\CreateOpportunityRequest;
use SCCatalog\Http\Requests\InternshipCreateRequest;
use SCCatalog\Http\Requests\InternshipUpdateRequest;
use SCCatalog\Contracts\Repositories\InternshipRepositoryContract as InternshipRepository;
use SCCatalog\Http\Requests\UpdateOpportunityRequest;
use SCCatalog\Models\Internship;
use SCCatalog\Validators\InternshipValidator;

class InternshipController extends Controller
{
    /**
     * @var  InternshipRepository
     */
    private $internships;

    /**
     * @var InternshipValidator
     */
    protected $validator;


    public function __construct(InternshipRepository $repository, InternshipValidator $validator)
    {
        $this->internships = $repository;
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
        $this->internships->pushCriteria(new RequestCriteria($request));
        $internships = $this->internships->with(['opportunity'])->paginate($limit = null, $columns = ['*']);

        return view('internships.index')
            ->with('internships', $internships);
    }

    /**
     * Show the form for creating a new Internship.
     *
     * @return Response
     */
    public function create()
    {
        return view('internships.create');
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

        $internship = $this->internships->create($input);

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
        $internship = $this->internships->findWithoutFail($id);

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        return view('internships.show')->with('internship', $internship);
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
        $internship = $this->internships->findWithoutFail($id);

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
        $internship = $this->internships->findWithoutFail($id);

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        $internship = $this->internships->update($request->all(), $id);

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
        $internship = $this->internships->findWithoutFail($id);

        if (empty($internship)) {
            Flash::error('Internship not found');

            return redirect(route('internships.index'));
        }

        $this->internships->delete($id);

        Flash::success('Internship deleted successfully.');

        return redirect(route('internships.index'));
    }
}

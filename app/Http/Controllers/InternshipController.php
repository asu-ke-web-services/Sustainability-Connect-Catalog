<?php

namespace SCCatalog\Http\Controllers;

use SCCatalog\Http\Requests\CreateInternshipRequest;
use SCCatalog\Http\Requests\UpdateInternshipRequest;
use SCCatalog\Support\Contracts\Repository\InternshipRepositoryContract as InternshipRepository;
use SCCatalog\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InternshipController extends AppBaseController
{
    /** @var  InternshipRepository */
    private $repository;

    public function __construct(InternshipRepository $repo)
    {
        $this->repository = $repo;
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
        $internships = $this->repository->all();

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
     * @param CreateInternshipRequest $request
     *
     * @return Response
     */
    public function store(CreateInternshipRequest $request)
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
        $internship = $this->repository->findWithoutFail($id);

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
     * @param  int              $id
     * @param UpdateInternshipRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInternshipRequest $request)
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

<?php

namespace SCCatalog\Http\Controllers\Backend\Lookup;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Lookup\StudentDegreeLevelRequest;
use SCCatalog\Http\Requests\Backend\Lookup\ManageLookupRequest;
use SCCatalog\Repositories\Backend\Lookup\StudentDegreeLevelRepository;

/**
 * Class StudentDegreeLevelController.
 */
class StudentDegreeLevelController extends Controller
{
    /**
     * @var StudentDegreeLevelRepository
     */
    private $repository;

    /**
     * StudentDegreeLevelController constructor.
     *
     * @param StudentDegreeLevelRepository $repository
     */
    public function __construct(StudentDegreeLevelRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the StudentDegreeLevel.
     *
     * @param ManageLookupRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLookupRequest $request)
    {
        return view('backend.lookup.student_degree_level.index')
            ->with('student_degree_levels', $this->repository->paginate(15));
    }

    /**
     * Show the form for creating a new StudentDegreeLevel.
     *
     * @param ManageLookupRequest $request
     *
     * @return mixed
     */
    public function create(ManageLookupRequest $request)
    {
        return view('backend.lookup.student_degree_level.create');
    }

    /**
     * Store a newly created StudentDegreeLevel in storage.
     *
     * @param StudentDegreeLevelRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StudentDegreeLevelRequest $request)
    {
        $this->repository->create($request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.student_degree_level.index')
            ->withFlashSuccess(__('StudentDegreeLevel created successfully'));
    }

    /**
     * Show the form for editing the specified StudentDegreeLevel.
     *
     * @param ManageLookupRequest $request
     * @param int                 $id
     *
     * @return mixed
     */
    public function edit(ManageLookupRequest $request, $id)
    {
        $student_degree_level = $this->repository->getById($id);

        return view('backend.lookup.student_degree_level.edit')
            ->with('student_degree_level', $student_degree_level);
    }

    /**
     * Update the specified StudentDegreeLevel in storage.
     *
     * @param StudentDegreeLevelRequest $request
     * @param int             $id
     *
     * @return mixed
     * @throws \SCCatalog\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(StudentDegreeLevelRequest $request, $id)
    {
        $this->repository->updateById($id, $request->only(
            'order',
            'name'
        ));

        return redirect()->route('admin.lookup.student_degree_level.index')
            ->withFlashSuccess(__('StudentDegreeLevel updated successfully'));
    }

    /**
     * Remove the specified StudentDegreeLevel from storage.
     *
     * @param ManageLookupRequest $request
     * @param int                 $id
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageLookupRequest $request, $id)
    {
        $this->repository->deleteById($id);

        return redirect()->route('admin.lookup.student_degree_level.index')
            ->withFlashSuccess('StudentDegreeLevel deleted successfully');
    }
}

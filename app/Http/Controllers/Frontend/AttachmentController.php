<?php

namespace SCCatalog\Http\Controllers\Frontend;

use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Response;
use SCCatalog\Http\Requests\AttachmentCreateRequest;
use SCCatalog\Http\Requests\AttachmentUpdateRequest;
use SCCatalog\Contracts\Repositories\AttachmentRepositoryContract as AttachmentRepository;
use SCCatalog\Validators\AttachmentValidator;

class AttachmentController extends Controller
{
    /**
     * @var AttachmentRepository
     */
    private $attachments;

    /**
     * @var AttachmentValidator
     */
    protected $validator;

    /**
     * AttachmentController constructor.
     *
     * @param AttachmentRepository $repository
     * @param AttachmentValidator $validator
     */
    public function __construct(AttachmentRepository $repository, AttachmentValidator $validator)
    {
        $this->attachments = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the Attachments.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->attachments->pushCriteria(new RequestCriteria($request));
        $attachments = $this->attachments->with(['opportunity'])->paginate($limit = null, $columns = ['*']);

        return view('attachments.index')
            ->with('attachments', $attachments);
    }

    /**
     * Show the form for creating a new Attachment.
     *
     * @return Response
     */
    public function create()
    {
        return view('attachments.create');
    }

    /**
     * Store a newly created Attachment in storage.
     *
     * @param AttachmentCreateRequest $request
     *
     * @return Response
     */
    public function store(AttachmentCreateRequest $request)
    {
        $input = $request->all();

        $attachment = $this->attachments->create($input);

        Flash::success('Attachment saved successfully.');

        return redirect(route('attachments.index'));
    }

    /**
     * Display the specified Attachment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $attachment = $this->attachments->findWithoutFail($id);

        if (empty($attachment)) {
            Flash::error('Attachment not found');

            return redirect(route('attachments.index'));
        }

        return view('attachments.show')->with('attachment', $attachment);
    }

    /**
     * Show the form for editing the specified Attachment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $attachment = $this->attachments->findWithoutFail($id);

        if (empty($attachment)) {
            Flash::error('Attachment not found');

            return redirect(route('attachments.index'));
        }

        return view('attachments.edit')->with('attachment', $attachment);
    }

    /**
     * Update the specified Attachment in storage.
     *
     * @param  int                 $id
     * @param AttachmentUpdateRequest $request
     *
     * @return Response
     */
    public function update($id, AttachmentUpdateRequest $request)
    {
        $attachment = $this->attachments->findWithoutFail($id);

        if (empty($attachment)) {
            Flash::error('Attachment not found');

            return redirect(route('attachments.index'));
        }

        $attachment = $this->attachments->update($request->all(), $id);

        Flash::success('Attachment updated successfully.');

        return redirect(route('attachments.index'));
    }

    /**
     * Remove the specified Attachment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $attachment = $this->attachments->findWithoutFail($id);

        if (empty($attachment)) {
            Flash::error('Attachment not found');

            return redirect(route('attachments.index'));
        }

        $this->attachments->delete($id);

        Flash::success('Attachment deleted successfully.');

        return redirect(route('attachments.index'));
    }
}

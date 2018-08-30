<?php

namespace SCCatalog\Http\Controllers\Frontend;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\AttachmentCreateRequest;
use SCCatalog\Http\Requests\AttachmentUpdateRequest;
use SCCatalog\Repositories\Frontend\AttachmentRepository;

/**
 * Class AttachmentController.
 */
class AttachmentController extends Controller
{
    /**
     * @var AttachmentRepository
     */
    private $repository;

    /**
     * AttachmentController constructor.
     *
     * @param AttachmentRepository $repository
     */
    public function __construct(AttachmentRepository $repository)
    {
        $this->repository = $repository;
    }
}

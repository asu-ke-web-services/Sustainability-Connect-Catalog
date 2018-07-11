<?php

namespace SCCatalog\Http\Controllers\Api\V1;


use Flugg\Responder\Traits\RespondsWithJson;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use SCCatalog\Models\Internship;
use SCCatalog\Repositories\InternshipRepository;
use SCCatalog\Http\Controllers\Api\V1\ApiBaseController;
use SCCatalog\Http\Transformers\V1\InternshipTransformer;

/**
 * Class InternshipAPIController
 * @package namespace SCCatalog\Http\Controllers\Api\V1
 */

class InternshipAPIController extends ApiBaseController
{
    use RespondsWithJson;

    /**
     * @var  InternshipRepository
     */
    private $repository;

    /**
     * @var InternshipValidator
     */
    protected $validator;

    /**
     * InternshipApiController constructor.
     *
     * @param InternshipRepository $repository
     * @param InternshipValidator $validator
     */
    public function __construct(InternshipRepository $repository, InternshipValidator $validator)
    {
        $this->internships = $repository;
        $this->validator  = $validator;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/internships",
     *      summary="Get a listing of the internships.",
     *      tags={"Internship"},
     *      description="Get all internships",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Internship")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->internships->pushCriteria(new RequestCriteria($request));
        $this->internships->pushCriteria(new LimitOffsetCriteria($request));
        $internships = $this->internships->all();

        return $this->successResponse($internships);
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/internships/{id}",
     *      summary="Display the specified internship",
     *      tags={"Internship"},
     *      description="Get Internship",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of internship",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Internship"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /**
         * @var Internship $internship
         */
        $internship = $this->internships->findWithoutFail($id);

        if (empty($internship)) {
            return $this->errorResponse('Internship not found');
        }

        return $this->successResponse($internship);
    }
}

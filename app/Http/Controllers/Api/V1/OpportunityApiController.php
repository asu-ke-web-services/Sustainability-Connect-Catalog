<?php

namespace SCCatalog\Http\Controllers\Api\V1;

use Flugg\Responder\Traits\RespondsWithJson;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use SCCatalog\Models\Opportunity;
use SCCatalog\Repositories\OpportunityRepository;
use SCCatalog\Http\Controllers\Api\V1\ApiBaseController;
use SCCatalog\Http\Transformers\V1\OpportunityTransformer;

/**
 * Class OpportunityAPIController
 * @package namespace SCCatalog\Http\Controllers\Api\V1
 */

class OpportunityAPIController extends ApiBaseController
{
    use RespondsWithJson;

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
     * @param OpportunityRepository $repository
     * @param OpportunityValidator $validator
     */
    public function __construct(OpportunityRepository $repository, OpportunityValidator $validator)
    {
        $this->opportunities = $repository;
        $this->validator  = $validator;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/opportunities",
     *      summary="Get a listing of the Opportunities.",
     *      tags={"Opportunity"},
     *      description="Get all Opportunities",
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
     *                  @SWG\Items(ref="#/definitions/Opportunity")
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
        $this->opportunities->pushCriteria(new RequestCriteria($request));
        $this->opportunities->pushCriteria(new LimitOffsetCriteria($request));
        $opportunities = $this->opportunities->all();

        return $this->successResponse($opportunities);
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/opportunities/{id}",
     *      summary="Display the specified Opportunity",
     *      tags={"Opportunity"},
     *      description="Get Opportunity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Opportunity",
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
     *                  ref="#/definitions/Opportunity"
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
         * @var Opportunity $opportunity
         */
        $opportunity = $this->opportunities->findWithoutFail($id);

        if (empty($opportunity)) {
            return $this->errorResponse('Opportunity not found');
        }

        return $this->successResponse($opportunity);
    }
}

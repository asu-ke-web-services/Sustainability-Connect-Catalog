<?php

namespace SCCatalog\Http\Controllers\Api\V1;


use Flugg\Responder\Traits\RespondsWithJson;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use SCCatalog\Models\Category;
use SCCatalog\Repositories\CategoryRepository;
use SCCatalog\Http\Controllers\Api\V1\ApiBaseController;
use SCCatalog\Http\Transformers\V1\CategoryTransformer;

/**
 * Class CategoryAPIController
 * @package namespace SCCatalog\Http\Controllers\Api\V1
 */

class CategoryAPIController extends ApiBaseController
{
    use RespondsWithJson;

    /**
     * @var  CategoryRepository
     */
    private $repository;

    /**
     * @var CategoryValidator
     */
    protected $validator;

    /**
     * CategoryApiController constructor.
     *
     * @param CategoryRepository $repository
     * @param CategoryValidator $validator
     */
    public function __construct(CategoryRepository $repository, CategoryValidator $validator)
    {
        $this->categories = $repository;
        $this->validator  = $validator;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/categories",
     *      summary="Get a listing of the categories.",
     *      tags={"Category"},
     *      description="Get all categories",
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
     *                  @SWG\Items(ref="#/definitions/Category")
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
        $this->categories->pushCriteria(new RequestCriteria($request));
        $this->categories->pushCriteria(new LimitOffsetCriteria($request));
        $categories = $this->categories->all();

        return $this->successResponse($categories);
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/categories/{id}",
     *      summary="Display the specified category",
     *      tags={"Category"},
     *      description="Get Category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of category",
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
     *                  ref="#/definitions/Category"
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
         * @var Category $category
         */
        $category = $this->categories->findWithoutFail($id);

        if (empty($category)) {
            return $this->errorResponse('Category not found');
        }

        return $this->successResponse($category);
    }
}

<?php

namespace SCCatalog\Http\Controllers\Api\V1;


use Flugg\Responder\Traits\RespondsWithJson;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use SCCatalog\Models\Project;
use SCCatalog\Repositories\ProjectRepository;
use SCCatalog\Http\Controllers\Api\V1\ApiBaseController;
use SCCatalog\Http\Transformers\V1\ProjectTransformer;

/**
 * Class ProjectAPIController
 * @package namespace SCCatalog\Http\Controllers\Api\V1
 */

class ProjectAPIController extends ApiBaseController
{
    use RespondsWithJson;

    /**
     * @var  ProjectRepository
     */
    private $repository;

    /**
     * @var ProjectValidator
     */
    protected $validator;

    /**
     * ProjectApiController constructor.
     *
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->projects = $repository;
        $this->validator  = $validator;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/projects",
     *      summary="Get a listing of the projects.",
     *      tags={"Project"},
     *      description="Get all projects",
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
     *                  @SWG\Items(ref="#/definitions/Project")
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
        $this->projects->pushCriteria(new RequestCriteria($request));
        $this->projects->pushCriteria(new LimitOffsetCriteria($request));
        $projects = $this->projects->all();

        return $this->successResponse($projects);
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/projects/{id}",
     *      summary="Display the specified project",
     *      tags={"Project"},
     *      description="Get Project",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of project",
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
     *                  ref="#/definitions/Project"
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
         * @var Project $project
         */
        $project = $this->projects->findWithoutFail($id);

        if (empty($project)) {
            return $this->errorResponse('Project not found');
        }

        return $this->successResponse($project);
    }
}

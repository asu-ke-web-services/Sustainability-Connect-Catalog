<?php

namespace SCCatalog\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Response;
use SCCatalog\Contracts\Repositories\OpportunityRepositoryContract as OpportunityRepository;
use SCCatalog\Http\Requests\CreateOpportunityRequest;
use SCCatalog\Http\Requests\FollowOpportunityRequest;
use SCCatalog\Http\Requests\UnfollowOpportunityRequest;
use SCCatalog\Http\Requests\UpdateOpportunityRequest;
use SCCatalog\Http\Requests;

use SCCatalog\Jobs\Opportunity\FollowOpportunityJob;
use SCCatalog\Jobs\Opportunity\UnfollowOpportunityJob;
use SCCatalog\Jobs\Opportunity\RequestToJoinOpportunity;
use SCCatalog\Jobs\Opportunity\ApproveRequestToJoinOpportunity;
use SCCatalog\Jobs\Opportunity\AddUserToOpportunity;

use SCCatalog\Validators\OpportunityValidator;
use SCCatalog\Models\Category;
use SCCatalog\Models\Keyword;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\Organization;
use SCCatalog\Models\User;

/**
 * Class OpportunityController.
 *
 * @package namespace SCCatalog\Http\Controllers;
 */
class OpportunityController extends Controller
{
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
     *     Note for future maintainers: the Repository Contract is referenced here, and Laravel injects
     *     the Eloquent Repository because we registered the binding between the
     *     contract and implementation in Providers\AppServiceProvider
     *
     * @param OpportunityRepository $repository
     * @param OpportunityValidator $validator
     */
    public function __construct(OpportunityRepository $repository, OpportunityValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Add current user as Project follower.
     *
     * @param int $id
     *
     * @return Response
     */
    public function follow($id)
    {
        $user = Auth::user();

        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        FollowOpportunity::dispatch($opportunity, $user)

        Flash::success('Project followed successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Add current user as Project follower.
     *
     * @param int $id
     *
     * @return Response
     */
    public function unfollow($id)
    {
        $user = Auth::user();

        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        UnfollowOpportunity::dispatch($opportunity, $user)

        Flash::success('Project followed successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Add current user to Project as applicant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function requestToJoin($id)
    {
        $user = Auth::user();

        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        RequestToJoinOpportunity::dispatch($opportunity, $user)

        Flash::success('Successfully submitted request.');

        return redirect(route('projects.index'));
    }

    /**
     * Approve user's request to join Project.
     *
     * @param int $id
     *
     * @return Response
     */
    public function approveRequestToJoin($id, ApproveRequestToJoinRequest $request)
    {
        $user = $request->user;
        $relationship = $request->relationship;

        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        ApproveRequestToJoinOpportunity::dispatch($opportunity, $user, $relationship)

        Flash::success('Successfully approved user.');

        return redirect(route('projects.index'));
    }

    /**
     * Add user to Project.
     *
     * @param int $id
     *
     * @return Response
     */
    public function addUser($id, AddUserToOpportunityRequest $request)
    {
        $opportunity = $this->repository->findWithoutFail($id);
        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $user = User::findWithoutFail($request->user_id);
        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('projects.index'));
        }

        $relationship = RelationshipType::findWithoutFail($request->relationship_slug);
        if (empty($relationship)) {
            Flash::error('Opportunity Relationship Type not found');

            return redirect(route('projects.index'));
        }

        AddUserToOpportunity::dispatch($opportunity, $user, $relationship)

        Flash::success('Successfully approved user.');

        return redirect(route('projects.index'));
    }

}

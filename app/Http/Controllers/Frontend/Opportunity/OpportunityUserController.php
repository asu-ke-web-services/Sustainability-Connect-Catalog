<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Models\Opportunity;
use SCCatalog\Models\Organization;
use SCCatalog\Models\User;
use SCCatalog\Repositories\Frontend\Opportunity\OpportunityRepository;

/**
 * Class OpportunityUserController.
 */
class OpportunityUserController extends Controller
{
    /**
     * @var  OpportunityRepository
     */
    private $repository;

    /**
     * OpportunityController constructor.
     *
     * @param OpportunityRepository $repository
     */
    public function __construct(OpportunityRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Add current user as Project follower.
     *
     * @param int $id
     *
     * @return
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
        event(new UserFollowedOpportunityEvent($opportunity, $user));

        Flash::success('Project followed successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Add current user as Project follower.
     *
     * @param int $id
     *
     * @return
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
        event(new UserUnfollowedOpportunityEvent($opportunity, $user));

        Flash::success('Project followed successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Add current user to Project as applicant.
     *
     * @param int $id
     *
     * @return
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
        event(new UserRequestedToJoinOpportunityEvent($opportunity, $user));

        Flash::success('Successfully submitted request.');

        return redirect(route('projects.index'));
    }

    /**
     * Approve user's request to join Project.
     *
     * @param int $id
     *
     * @return
     */
    public function approveRequestToJoin($id, Request $request)
    {
        $user = $request->user;
        $relationship = $request->relationship;

        $opportunity = $this->repository->findWithoutFail($id);

        if (empty($opportunity)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        ApproveRequestToJoinOpportunity::dispatch($opportunity, $user, $relationship)
        event(new UserRequestToJoinOpportunityApprovedEvent($opportunity, $user, $relationship));

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
    public function addUser($id, Request $request)
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
        event(new UserAddedToOpportunityEvent($opportunity, $user, $relationship));

        Flash::success('Successfully approved user.');

        return redirect(route('projects.index'));
    }

}

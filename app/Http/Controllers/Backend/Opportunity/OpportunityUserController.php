<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;

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
     * Approve user's request to join Opportunity.
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

        ApproveRequestToJoinOpportunity::dispatch($opportunity, $user, $relationship);
        event(new UserRequestToJoinOpportunityApprovedEvent($opportunity, $user, $relationship));

        Flash::success('Successfully approved user.');

        return redirect(route('projects.index'));
    }

    /**
     * Add user to Opportunity.
     *
     * @param int $id
     *
     * @return
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

        AddUserToOpportunity::dispatch($opportunity, $user, $relationship);
        event(new UserAddedToOpportunityEvent($opportunity, $user, $relationship));

        Flash::success('Successfully approved user.');

        return redirect(route('projects.index'));
    }

}

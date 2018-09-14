<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\OpportunityUser\OpportunityUserRequest;
use SCCatalog\Jobs\RemoveUserFromOpportunity;
use SCCatalog\Repositories\Backend\Auth\UserRepository;
use SCCatalog\Repositories\Backend\Lookup\RelationshipTypeRepository;
use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;

/**
 * Class OpportunityUserController.
 */
class OpportunityUserController extends Controller
{
    /**
     * @var  OpportunityRepository
     */
    private $opportunityRepository;

    /**
     * @var  RelationshipTypeRepository
     */
    private $relationshipRepository;

    /**
     * @var  UserRepository
     */
    private $userRepository;

    /**
     * OpportunityController constructor.
     *
     * @param OpportunityRepository $opportunityRepository
     * @param UserRepository $userRepository
     * @param RelationshipTypeRepository $relationshipRepository
     */
    public function __construct(OpportunityRepository $opportunityRepository, UserRepository $userRepository, RelationshipTypeRepository $relationshipRepository)
    {
        $this->opportunityRepository = $opportunityRepository;
        $this->relationshipRepository = $relationshipRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Approve user's request to join Opportunity.
     *
     *
     * @param OpportunityUserRequest $request
     * @param int $opportunityId
     * @param int $userId
     * @param int $relationshipId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function approveRequestToJoin(OpportunityUserRequest $request, $opportunityId, $userId, $relationshipId)
    {
        $opportunity = $this->opportunityRepository->getById($opportunityId);
        $user = $this->userRepository->getById($userId);
        $relationship = $this->relationshipRepository->getById($relationshipId);

        ApproveUserJoiningOpportunity::dispatch($opportunity, $user, $relationship);
        event(new UserApprovedForOpportunity($opportunity, $user, $relationship));

        return redirect()->route('admin.backend.opportunity.project.index')
            ->withFlashSuccess('User approved successfully');
    }

    /**
     * Add user to Opportunity.
     *
     * @param OpportunityUserRequest $request
     * @param int $opportunityId
     * @param int $userId
     * @param int $relationshipId
     * @return
     */
    public function addUser(OpportunityUserRequest $request, $opportunityId, $userId, $relationshipId)
    {
        $opportunity = $this->opportunityRepository->getById($opportunityId);
        $user = $this->userRepository->getById($userId);
        $relationship = $this->relationshipRepository->getById($relationshipId);

        AddUserToOpportunity::dispatch($opportunity, $user, $relationship);
        event(new UserAddedToOpportunity($opportunity, $user, $relationship));

        return redirect()->route('admin.backend.opportunity.project.index')
            ->withFlashSuccess('User added successfully');
    }

    /**
     * Remove user from Opportunity.
     *
     * @param OpportunityUserRequest $request
     * @param int $opportunityId
     * @param int $userId
     * @return
     */
    public function removeUser(OpportunityUserRequest $request, $opportunityId, $userId)
    {
        $opportunity = $this->opportunityRepository->getById($opportunityId);
        $user = $this->userRepository->getById($userId);

        RemoveUserFromOpportunity::dispatch($opportunity, $user);
        event(new UserRemovedFromOpportunity($opportunity, $user));

        return redirect()->route('admin.backend.opportunity.project.index')
            ->withFlashSuccess('User removed successfully');
    }

}

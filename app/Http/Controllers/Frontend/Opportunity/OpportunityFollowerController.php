<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\OpportunityFollowerRequest;
use SCCatalog\Repositories\Frontend\Auth\UserRepository;
use SCCatalog\Repositories\Frontend\Lookup\RelationshipTypeRepository;
use SCCatalog\Repositories\Frontend\Opportunity\OpportunityRepository;

/**
 * Class OpportunityFollowerController.
 */
class OpportunityFollowerController extends Controller
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
     * Follow Opportunity.
     *
     * @param OpportunityFollowerRequest $request
     * @param int $opportunityId
     * @param int $userId
     * @param int $relationshipId
     * @return
     */
    public function follow(OpportunityFollowerRequest $request, $opportunityId, $userId)
    {
        $opportunity = $this->opportunityRepository->getById($opportunityId);
        $user = $this->userRepository->getById($userId);
        $relationship = $this->relationshipRepository->getBySlug('follower');

        AddFollowerToOpportunity::dispatch($opportunity, $user, $relationship);
        event(new FollowerAddedToOpportunity($opportunity, $user, $relationship));

        return redirect()->route('admin.backend.opportunity.project.index')
            ->withFlashSuccess('Follower added successfully');
    }

    /**
     * Remove user from Opportunity.
     *
     * @param OpportunityFollowerRequest $request
     * @param int $opportunityId
     * @param int $userId
     * @return
     */
    public function removeFollower(OpportunityFollowerRequest $request, $opportunityId, $userId)
    {
        $opportunity = $this->opportunityRepository->getById($opportunityId);
        $user = $this->userRepository->getById($userId);

        RemoveFollowerFromOpportunity::dispatch($opportunity, $user);
        event(new FollowerRemovedFromOpportunity($opportunity, $user));

        return redirect()->route('admin.backend.opportunity.project.index')
            ->withFlashSuccess('Follower removed successfully');
    }

}

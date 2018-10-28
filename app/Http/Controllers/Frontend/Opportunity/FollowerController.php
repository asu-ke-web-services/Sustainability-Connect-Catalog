<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\FollowerRequest;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Opportunity;
use SCCatalog\Repositories\Frontend\Lookup\RelationshipTypeRepository;
use SCCatalog\Repositories\Frontend\Opportunity\OpportunityUserRepository;

/**
 * Class FollowerController.
 */
class FollowerController extends Controller
{
    /**
     * @var  OpportunityUserRepository
     */
    private $opportunityUserRepository;

    /**
     * @var  RelationshipTypeRepository
     */
    private $relationshipTypeRepository;

    /**
     * OpportunityController constructor.
     *
     * @param OpportunityUserRepository $opportunityUserRepository
     * @param RelationshipTypeRepository $relationshipTypeRepository
     */
    public function __construct(OpportunityUserRepository $opportunityUserRepository, RelationshipTypeRepository $relationshipTypeRepository)
    {
        $this->opportunityUserRepository = $opportunityUserRepository;
        $this->relationshipTypeRepository = $relationshipTypeRepository;
    }

    /**
     * Follow Opportunity.
     *
     * @param FollowerRequest $request
     * @param Opportunity     $opportunity
     * @return
     * @throws \Throwable
     */
    public function follow(FollowerRequest $request, Opportunity $opportunity)
    {
        $relationship = $this->relationshipTypeRepository->getByColumn('follower', 'slug');
        $this->opportunityUserRepository->follow($opportunity, $request->user(), ['relationship_type_id' => $relationship->id]);

        return redirect()->route('frontend.project.show', $opportunity)
            ->withFlashSuccess('Successfully followed opportunity');
    }

    /**
     * Remove user from Opportunity.
     *
     * @param FollowerRequest $request
     * @param Opportunity     $opportunity
     * @return
     * @throws \Throwable
     */
    public function unfollow(FollowerRequest $request, Opportunity $opportunity)
    {
        $relationship = $this->relationshipTypeRepository->getByColumn('follower', 'slug');
        $this->opportunityUserRepository->unfollow($opportunity, $request->user(), ['relationship_type_id' => $relationship->id]);

        return redirect()->route('frontend.project.show', $opportunity)
            ->withFlashSuccess('Successfully unfollowed opportunity');
    }
}

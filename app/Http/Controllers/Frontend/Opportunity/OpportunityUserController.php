<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use Illuminate\Support\Facades\Auth;
use SCCatalog\Events\UserFollowedOpportunityEvent;
use SCCatalog\Events\UserRequestedToJoinOpportunityEvent;
use SCCatalog\Events\UserUnfollowedOpportunityEvent;
use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Jobs\FollowOpportunity;
use SCCatalog\Jobs\RequestToJoinOpportunity;
use SCCatalog\Jobs\UnfollowOpportunity;
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

        $opportunity = $this->repository->getById($id);

        FollowOpportunity::dispatch($opportunity, $user);
        event(new UserFollowedOpportunityEvent($opportunity, $user));

        // Flash::success('Project followed successfully.');

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

        $opportunity = $this->repository->getById($id);

        UnfollowOpportunity::dispatch($opportunity, $user);
        event(new UserUnfollowedOpportunityEvent($opportunity, $user));

        // Flash::success('Project followed successfully.');

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

        $opportunity = $this->repository->getById($id);

        RequestToJoinOpportunity::dispatch($opportunity, $user);
        event(new UserRequestedToJoinOpportunityEvent($opportunity, $user));

        // Flash::success('Successfully submitted request.');

        return redirect(route('projects.index'));
    }
}

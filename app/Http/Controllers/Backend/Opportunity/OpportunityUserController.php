<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\OpportunityUser\ManageOpportunityUserRequest;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Opportunity;
use SCCatalog\Repositories\Backend\Auth\UserRepository;
use SCCatalog\Repositories\Backend\Opportunity\OpportunityUserRepository;
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
     * @var  OpportunityUserRepository
     */
    private $opportunityUserRepository;

    /**
     * @var  UserRepository
     */
    private $userRepository;

    /**
     * OpportunityController constructor.
     *
     * @param OpportunityRepository $opportunityRepository
     * @param OpportunityUserRepository $opportunityUserRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        OpportunityRepository $opportunityRepository,
        OpportunityUserRepository $opportunityUserRepository,
        UserRepository $userRepository
    )
    {
        $this->opportunityRepository = $opportunityRepository;
        $this->opportunityUserRepository = $opportunityUserRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Add user to Opportunity.
     *
     * @param ManageOpportunityUserRequest $request
     * @param Opportunity $opportunity
     * @param User $user
     * @return
     */
    public function add(ManageOpportunityUserRequest $request, Opportunity $opportunity, User $user)
    {
        // $opportunity = $this->opportunityRepository->getById($request->input('opportunity_id'));
        // $user = $this->userRepository->getById($request->input('user_id'));

        $opportunity = $this->opportunityUserRepository->create(
            $opportunity,
            $user,
            $request->only([
                'relationship_type_id',
                'comment',
            ])
        );

        return redirect()->route('admin.backend.opportunity.user.added')
            ->withFlashSuccess('User added successfully');
    }

    /**
     * Approve user's request to join Opportunity.
     *
     *
     * @param ManageOpportunityUserRequest $request
     * @param Opportunity $opportunity
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(ManageOpportunityUserRequest $request, Opportunity $opportunity, User $user)
    {
        $opportunity = $this->opportunityUserRepository->update(
            $opportunity,
            $user,
            $request->only([
                'relationship_type_id',
                'comment',
            ])
        );

        return redirect()->route('admin.backend.opportunity.user.updated')
            ->withFlashSuccess('User approved successfully');
    }

    /**
     * Remove user relationship from Opportunity.
     *
     * @param ManageOpportunityUserRequest $request
     * @param Opportunity $opportunity
     * @param User $user
     * @return
     */
    public function remove(ManageOpportunityUserRequest $request, Opportunity $opportunity, User $user)
    {
        $opportunity = $this->opportunityUserRepository->delete(
            $opportunity,
            $user,
            $request->only([
                'relationship_type_id',
            ])
        );

        return redirect()->route('admin.backend.opportunity.project.index')
            ->withFlashSuccess('User removed successfully');
    }
}

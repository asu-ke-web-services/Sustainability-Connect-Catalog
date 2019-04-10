<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\EditUserRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\StoreUserRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\RemoveUserRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\InternshipApplicantRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\InternshipFollowerRequest;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Auth\Frontend\UserRepository;
use SCCatalog\Repositories\Lookup\RelationshipTypeRepository;
use SCCatalog\Repositories\Opportunity\InternshipUserRepository;

/**
 * Class InternshipUserController.
 */
class InternshipUserController extends Controller
{
    /**
     * @var  InternshipUserRepository
     */
    private $internshipUserRepository;

    /**
     * @var  RelationshipTypeRepository
     */
    private $relationshipTypeRepository;

    /**
     * @var  UserRepository
     */
    private $userRepository;

    /**
     * InternshipController constructor.
     *
     * @param InternshipUserRepository      $internshipUserRepository
     * @param RelationshipTypeRepository $relationshipTypeRepository
     * @param UserRepository             $userRepository
     */
    public function __construct(
        InternshipUserRepository $internshipUserRepository,
        RelationshipTypeRepository $relationshipTypeRepository,
        UserRepository $userRepository
    ) {
        $this->internshipUserRepository = $internshipUserRepository;
        $this->relationshipTypeRepository = $relationshipTypeRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Apply to join Internship.
     *
     * @param InternshipApplicantRequest $request
     * @param Internship                $internship
     * @return
     * @throws \Throwable
     */
    public function apply(InternshipApplicantRequest $request, Internship $internship)
    {
        $relationship = $this->relationshipTypeRepository->getByColumn('applicant', 'slug');
        $this->internshipUserRepository->apply($internship, $request->user(), ['relationship_type_id' => $relationship->id]);

        return redirect()->route('frontend.opportunity.internship.public.show', $internship)
            ->withFlashSuccess('Successfully submitted internship application');
    }

    /**
     * Cancel application to join Internship.
     *
     * @param InternshipApplicantRequest $request
     * @param Internship                $internship
     * @return
     * @throws \Throwable
     */
    public function cancelApplication(InternshipApplicantRequest $request, Internship $internship)
    {
        $relationship = $this->relationshipTypeRepository->getByColumn('applicant', 'slug');
        $this->internshipUserRepository->cancelApplication($internship, $request->user(), ['relationship_type_id' => $relationship->id]);

        return redirect()->route('frontend.opportunity.internship.public.show', $internship)
            ->withFlashSuccess('Successfully cancelled internship application');
    }

    /**
     * Follow Internship.
     *
     * @param InternshipFollowerRequest $request
     * @param Internship                $internship
     * @return
     * @throws \Throwable
     */
    public function follow(InternshipFollowerRequest $request, Internship $internship)
    {
        $relationship = $this->relationshipTypeRepository->getByColumn('follower', 'slug');
        $this->internshipUserRepository->follow($internship, $request->user(), ['relationship_type_id' => $relationship->id]);

        return redirect()->route('frontend.opportunity.internship.public.show', $internship)
            ->withFlashSuccess('Successfully followed internship');
    }

    /**
     * Remove user from Internship.
     *
     * @param InternshipFollowerRequest $request
     * @param Internship                $internship
     * @return
     * @throws \Throwable
     */
    public function unfollow(InternshipFollowerRequest $request, Internship $internship)
    {
        $relationship = $this->relationshipTypeRepository->getByColumn('follower', 'slug');
        $this->internshipUserRepository->unfollow($internship, $request->user(), ['relationship_type_id' => $relationship->id]);

        return redirect()->route('frontend.opportunity.internship.public.show', $internship)
            ->withFlashSuccess('Successfully unfollowed internship');
    }

    /**
     * Add user to Internship.
     *
     * @param EditUserRequest           $request
     * @param Internship                    $internship
     * @param RelationshipTypeRepository $relationshipTypeRepository
     * @param UserRepository             $userRepository
     * @return
     * @throws \Throwable
     */
    public function add(
        EditUserRequest $request,
        Internship $internship,
        RelationshipTypeRepository $relationshipTypeRepository,
        UserRepository $userRepository

    ) {
        return view('frontend.opportunity.internship.private.user.add')
            ->withInternship($internship)
            ->with('relationships', $relationshipTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray());
    }

    /**
     * Store user relationship in Internship.
     *
     *
     * @param StoreUserRequest $request
     * @param Internship          $internship
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function store(StoreUserRequest $request, Internship $internship)
    {
        $user = $this->userRepository->getById($request->input('user_id'));

        $this->internshipUserRepository->attach(
            $internship,
            $user,
            $request->only([
                'relationship_type_id',
                'comments',
            ])
        );

        return redirect()->route('frontend.opportunity.internship.private.show', $internship)->withFlashSuccess('User relationship updated successfully');
    }

    /**
     * Edit user attached to Internship.
     *
     * @param EditUserRequest            $request
     * @param Internship                    $internship
     * @param User                       $user
     * @param RelationshipTypeRepository $relationshipTypeRepository
     * @param UserRepository             $userRepository
     * @return
     */
    public function edit(
        EditUserRequest $request,
        Internship $internship,
        User $user,
        RelationshipTypeRepository $relationshipTypeRepository,
        UserRepository $userRepository

    ) {
        return view('frontend.opportunity.internship.private.user.edit')
            ->withInternship($internship)
            ->withUser($user)
            ->with('relationships', $relationshipTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray());
    }

    /**
     * Approve user's request to join Internship.
     *
     *
     * @param StoreUserRequest $request
     * @param Internship          $internship
     * @param User             $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(StoreUserRequest $request, Internship $internship, User $user)
    {

        $this->internshipUserRepository->update(
            $internship,
            $user,
            $request->only([
                'relationship_type_id',
                'comments',
            ])
        );

        return redirect()->route('frontend.opportunity.internship.private.show', $internship)->withFlashSuccess('User relationship updated successfully');
    }

    /**
     * Remove user relationship from Internship.
     *
     * @param RemoveUserRequest $request
     * @param Internship          $internship
     * @param User             $user
     * @return
     */
    public function delete(RemoveUserRequest $request, Internship $internship, User $user)
    {
        // dd($internship);

        $internship = $this->internshipUserRepository->detach(
            $internship,
            $user,
            $request->only([
                'relationship_type_id',
            ])
        );

        return redirect()->route('frontend.opportunity.internship.private.show', $internship)->withFlashSuccess('User removed successfully');
    }
}

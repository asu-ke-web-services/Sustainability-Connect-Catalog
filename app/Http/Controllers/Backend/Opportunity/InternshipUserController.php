<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\Opportunity\ManageInternshipUserRequest;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Auth\Backend\UserRepository;
use SCCatalog\Repositories\Opportunity\InternshipUserRepository;
use SCCatalog\Repositories\Opportunity\InternshipRepository;
use SCCatalog\Repositories\Lookup\RelationshipTypeRepository;

/**
 * Class InternshipUserController.
 */
class InternshipUserController extends Controller
{
    /**
     * @var  InternshipRepository
     */
    private $internshipRepository;

    /**
     * @var  InternshipUserRepository
     */
    private $internshipUserRepository;

    /**
     * @var  UserRepository
     */
    private $userRepository;

    /**
     * InternshipController constructor.
     *
     * @param InternshipRepository $internshipRepository
     * @param InternshipUserRepository $internshipUserRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        InternshipRepository $internshipRepository,
        InternshipUserRepository $internshipUserRepository,
        UserRepository $userRepository
    ) {
        $this->internshipRepository = $internshipRepository;
        $this->internshipUserRepository = $internshipUserRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Add user to Internship.
     *
     * @param ManageInternshipUserRequest           $request
     * @param Internship                    $internship
     * @param RelationshipTypeRepository $relationshipTypeRepository
     * @param UserRepository             $userRepository
     * @return
     * @throws \Throwable
     */
    public function add(
        ManageInternshipUserRequest $request,
        Internship $internship,
        RelationshipTypeRepository $relationshipTypeRepository,
        UserRepository $userRepository

    ) {
        return view('backend.opportunity.internship.user.add')
            ->withInternship($internship)
            ->with('relationships', $relationshipTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray());
    }

    /**
     * Store user relationship in Internship.
     *
     *
     * @param ManageInternshipUserRequest $request
     * @param Internship          $internship
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function store(ManageInternshipUserRequest $request, Internship $internship)
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

        return redirect()->route('admin.opportunity.internship.show', $internship)->withFlashSuccess('User added successfully');
    }

    /**
     * Edit user attached to Internship.
     *
     * @param ManageInternshipUserRequest            $request
     * @param Internship                    $internship
     * @param User                       $user
     * @param RelationshipTypeRepository $relationshipTypeRepository
     * @param UserRepository             $userRepository
     * @return
     */
    public function edit(
        ManageInternshipUserRequest $request,
        Internship $internship,
        User $user,
        RelationshipTypeRepository $relationshipTypeRepository,
        UserRepository $userRepository

    ) {
        return view('backend.opportunity.internship.user.edit')
            ->withInternship($internship)
            ->withUser($user)
            ->with('relationships', $relationshipTypeRepository->get(['id', 'name'])->pluck('name', 'id')->toArray())
            ->with('users', $userRepository->get(['id', 'first_name', 'last_name'])->pluck('full_name', 'id')->toArray());
    }

    /**
     * Update user relationship with Internship.
     *
     *
     * @param ManageInternshipUserRequest $request
     * @param Internship          $internship
     * @param User             $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(ManageInternshipUserRequest $request, Internship $internship, User $user)
    {
        $this->internshipUserRepository->update(
            $internship,
            $user,
            $request->only([
                'relationship_type_id',
                'comments',
            ])
        );

        return redirect()->route('admin.opportunity.internship.show', $internship)->withFlashSuccess('User relationship updated successfully');
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

        return redirect()->route('admin.opportunity.internship.show', $internship)->withFlashSuccess('User removed successfully');
    }
}

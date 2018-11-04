<?php

namespace SCCatalog\Http\Controllers\Backend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Backend\OpportunityUser\ManageInternshipUserRequest;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Backend\Auth\UserRepository;
use SCCatalog\Repositories\Backend\Opportunity\InternshipUserRepository;
use SCCatalog\Repositories\Backend\Opportunity\InternshipRepository;

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
    )
    {
        $this->internshipRepository = $internshipRepository;
        $this->internshipUserRepository = $internshipUserRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Add user to Internship.
     *
     * @param ManageInternshipUserRequest $request
     * @param Internship $internship
     * @param User $user
     * @return
     */
    public function add(ManageInternshipUserRequest $request, Internship $internship, User $user)
    {
        // $internship = $this->internshipRepository->getById($request->input('internship_id'));
        // $user = $this->userRepository->getById($request->input('user_id'));

        $internship = $this->internshipUserRepository->create(
            $internship,
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
     * Approve user's request to join Internship.
     *
     *
     * @param ManageInternshipUserRequest $request
     * @param Internship $internship
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(ManageInternshipUserRequest $request, Internship $internship, User $user)
    {
        $internship = $this->internshipUserRepository->update(
            $internship,
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
     * Remove user relationship from Internship.
     *
     * @param ManageInternshipUserRequest $request
     * @param Internship $internship
     * @param User $user
     * @return
     */
    public function remove(ManageInternshipUserRequest $request, Internship $internship, User $user)
    {
        $internship = $this->internshipUserRepository->delete(
            $internship,
            $user,
            $request->only([
                'relationship_type_id',
            ])
        );

        return redirect()->route('admin.backend.opportunity.internship.index')
            ->withFlashSuccess('User removed successfully');
    }
}

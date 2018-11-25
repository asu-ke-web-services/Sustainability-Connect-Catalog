<?php

namespace SCCatalog\Http\Controllers\Frontend\Opportunity;

use SCCatalog\Http\Controllers\Controller;
use SCCatalog\Http\Requests\Frontend\Opportunity\InternshipApplicantRequest;
use SCCatalog\Http\Requests\Frontend\Opportunity\InternshipFollowerRequest;
use SCCatalog\Models\Auth\User;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Frontend\Lookup\RelationshipTypeRepository;
use SCCatalog\Repositories\Frontend\Opportunity\InternshipUserRepository;

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
     * InternshipController constructor.
     *
     * @param InternshipUserRepository $internshipUserRepository
     * @param RelationshipTypeRepository $relationshipTypeRepository
     */
    public function __construct(InternshipUserRepository $internshipUserRepository, RelationshipTypeRepository $relationshipTypeRepository)
    {
        $this->internshipUserRepository = $internshipUserRepository;
        $this->relationshipTypeRepository = $relationshipTypeRepository;
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

        return redirect()->route('frontend.opportunity.internship.show', $internship)
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

        return redirect()->route('frontend.opportunity.internship.show', $internship)
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

        return redirect()->route('frontend.opportunity.internship.show', $internship)
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

        return redirect()->route('frontend.opportunity.internship.show', $internship)
            ->withFlashSuccess('Successfully unfollowed internship');
    }
}

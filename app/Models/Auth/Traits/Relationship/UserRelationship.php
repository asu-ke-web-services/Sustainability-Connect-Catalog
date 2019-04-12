<?php

namespace SCCatalog\Models\Auth\Traits\Relationship;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use SCCatalog\Models\System\Session;
use SCCatalog\Models\Auth\SocialAccount;
use SCCatalog\Models\Auth\PasswordHistory;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function organization(): BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Organization\Organization::class, 'organization_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userType(): BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\UserType::class, 'user_type_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function studentDegreeLevel(): BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\StudentDegreeLevel::class, 'student_degree_level_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function followedProjects(): BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Project::class, 'project_user')
            ->whereIn('opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
                7, // Closed
            ])
            ->withTimestamps()
            ->withPivot('relationship_type_id', 'comments')
            ->wherePivotIn('relationship_type_id', [
                1, // Follower
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function followedInternships(): BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Internship::class, 'internship_user')
            ->withTimestamps()
            ->withPivot('relationship_type_id', 'comments')
            ->wherePivotIn('relationship_type_id', [
                1, // Follower
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function projectApplications(): BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Project::class, 'project_user')
            // ->whereIn('opportunity_status_id', [
            //     3, // Seeking Champion
            //     4, // Recruiting Participants
            //     5, // Positions Filled
            //     6, // In Progress
            //     7, // Closed
            // ])
            ->withTimestamps()
            ->withPivot('relationship_type_id', 'comments')
            ->wherePivotIn('relationship_type_id', [
                2, // Applicant
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function internshipApplications(): BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Internship::class, 'internship_user')
            ->whereIn('opportunity_status_id', [
                9, // Active
            ])
            ->withTimestamps()
            ->withPivot('relationship_type_id', 'comments')
            ->wherePivotIn('relationship_type_id', [
                2, // Applicant
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function participatingInProjects(): BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Project::class, 'project_user')
            ->whereIn('opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6, // In Progress
                7, // Completed
            ])
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [
                3, // Participant
                4, // Manager
                5, // Practitioner Mentor
                6,  // Academic Mentor
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function participatingInInternships(): BelongsToMany
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Internship::class, 'internship_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [
                3, // Participant
                4, // Manager
                5, // Practitioner Mentor
                6,  // Academic Mentor
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function submittedProjects(): HasMany
    {
        return $this->hasMany(\SCCatalog\Models\Opportunity\Project::class, 'created_by')
            ->whereIn('review_status_id', [
                1, // Needs Review
                2, // Review in Progress
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function submittedInternships(): HasMany
    {
        return $this->hasMany(\SCCatalog\Models\Opportunity\Internship::class, 'created_by')
            ->whereIn('opportunity_status_id', [
                9, // Active
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function addresses(): MorphMany
    {
        return $this->morphMany(\SCCatalog\Models\Address\Address::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function notes(): MorphMany
    {
        return $this->morphMany(\SCCatalog\Models\Note\Note::class, 'notable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function affiliations(): MorphToMany
    {
        return $this->morphToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliationable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function accessAffiliations(): MorphToMany
    {
        return $this->morphToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliationable')
            ->where([
                ['access_control', 1],
            ]);
    }
}

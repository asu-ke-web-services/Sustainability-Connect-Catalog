<?php

namespace SCCatalog\Models\Auth\Traits\Relationship;

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
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function organization()
    {
        return $this->belongsTo(\SCCatalog\Models\Organization\Organization::class, 'organization_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userType()
    {
        return $this->belongsTo(\SCCatalog\Models\Reference\UserType::class, 'user_type_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function studentDegreeLevel()
    {
        return $this->belongsTo(\SCCatalog\Models\Reference\StudentDegreeLevel::class, 'student_degree_level_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function followedProjects()
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
    public function followedInternships()
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
    public function projectApplications()
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
    public function internshipApplications()
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
    public function participatingInProjects()
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
    public function participatingInInternships()
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
    public function submittedProjects()
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
    public function submittedInternships()
    {
        return $this->hasMany(\SCCatalog\Models\Opportunity\Internship::class, 'created_by')
            ->whereIn('opportunity_status_id', [
                9, // Active
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function addresses()
    {
        return $this->morphMany(\SCCatalog\Models\Address\Address::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function notes()
    {
        return $this->morphMany(\SCCatalog\Models\Note\Note::class, 'notable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function affiliations()
    {
        return $this->morphToMany(\SCCatalog\Models\Reference\Affiliation::class, 'affiliationable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function accessAffiliations()
    {
        return $this->morphToMany(\SCCatalog\Models\Reference\Affiliation::class, 'affiliationable')
            ->where([
                ['access_control', 1],
            ]);
    }
}

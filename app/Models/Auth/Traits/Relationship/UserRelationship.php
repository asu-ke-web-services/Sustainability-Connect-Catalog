<?php

namespace SCCatalog\Models\Auth\Traits\Relationship;

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
    public function organization()
    {
        return $this->belongsTo(\SCCatalog\Models\Organization\Organization::class)->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userType()
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\UserType::class, 'user_type_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function studentDegreeLevel()
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\UserType::class)->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function followedProjects()
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Project::class)
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
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Internship::class)
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
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Project::class)
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
                2, // Applicant
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function internshipApplications()
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Internship::class)
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
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Project::class)
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
                6  // Academic Mentor
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function participatingInInternships()
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Internship::class)
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [
                3, // Participant
                4, // Manager
                5, // Practitioner Mentor
                6  // Academic Mentor
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function addresses() : MorphMany
    {
        return $this->morphMany(\SCCatalog\Models\Address\Address::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function notes() : MorphMany
    {
        return $this->morphMany(\SCCatalog\Models\Note\Note::class, 'notable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function affiliations() : MorphToMany
    {
        return $this->morphToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliationable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function accessAffiliations() : MorphToMany
    {
        return $this->morphToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliationable')
            ->where([
                ['access_control', 1],
            ]);
    }
}

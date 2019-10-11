<?php

namespace SCCatalog\Models\Opportunity\Traits\Relationship;

/**
 * Trait InternshipRelationship.
 */
trait InternshipRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\SCCatalog\Models\Reference\OpportunityStatus::class, 'opportunity_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    // public function parentOpportunity()
    // {
    //     return $this->belongsTo(\SCCatalog\Models\Opportunity\Opportunity::class)->withDefault();
    // }

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
    public function supervisorUser()
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'supervisor_user_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function submittingUser()
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'submitting_user_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'internship_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function activeMembers()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'internship_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [2, 3, 4, 5]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function followers()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'internship_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivot('relationship_type_id', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function applicants()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'internship_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivot('relationship_type_id', 2);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function participants()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'internship_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivot('relationship_type_id', 3);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function mentors()
    {
        return $this->belongsToMany(\SCCatalog\Models\Auth\User::class, 'internship_user')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [4, 5]);
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function categories()
    {
        return $this->morphToMany(\SCCatalog\Models\Reference\Category::class, 'categorisable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     **/
    public function keywords()
    {
        return $this->morphToMany(\SCCatalog\Models\Reference\Keyword::class, 'keywordable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function createdByUser()
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function updatedByUser()
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'updated_by');
    }
}

<?php

namespace SCCatalog\Models\Auth\Traits\Relationship;

use SCCatalog\Models\System\Session;
use SCCatalog\Models\Auth\SocialAccount;
use SCCatalog\Models\Auth\PasswordHistory;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function organization()
    {
        return $this->belongsTo(\SCCatalog\Models\Organization\Organization::class, 'organization_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function studentDegreeLevel()
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\StudentDegreeLevel::class, 'student_degree_level_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userType()
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\UserType::class, 'user_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function affiliations()
    {
        return $this->belongsToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliation_opportunity')->withTimestamps();
    }

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
}

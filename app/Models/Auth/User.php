<?php

namespace SCCatalog\Models\Auth;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use SCCatalog\Models\Auth\Traits\Attribute\UserAttribute;
use SCCatalog\Models\Auth\Traits\Method\UserMethod;
use SCCatalog\Models\Auth\Traits\Relationship\UserRelationship;
use SCCatalog\Models\Auth\Traits\Scope\UserScope;
use SCCatalog\Models\Auth\Traits\SendUserPasswordReset;
use SCCatalog\Models\Traits\Uuid;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 */
class User extends Authenticatable
{
    use BlameableTrait,
        HasRoles,
        Notifiable,
        Searchable,
        SendUserPasswordReset,
        SoftDeletes,
        UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope,
        Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'avatar_type',
        'avatar_location',
        'password',
        'password_changed_at',
        'active',
        'confirmation_code',
        'confirmed',
        'timezone',
        'last_login_at',
        'last_login_ip',
        'login_name',
        'user_type_id',
        'asurite',
        'student_degree_level_id',
        'degree_program',
        'graduation_date',
        'phone',
        'research_interests',
        'department',
        'organization_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['last_login_at', 'deleted_at'];

    /**
     * The dynamic attributes from mutators that should be returned with the user object.
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'confirmed' => 'boolean',
    ];


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
    public function affiliations()
    {
        return $this->belongsToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliation_user')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function accessAffiliations()
    {
        return $this->belongsToMany(\SCCatalog\Models\Lookup\Affiliation::class, 'affiliation_user')
            ->where('access_control', 1)
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function followedOpportunities()
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Opportunity::class, 'opportunity_user')
            ->whereIn('opportunities.opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6  // In Progress
            ])
            ->withTimestamps()
            ->withPivot('relationship_type_id', 'comments')
            ->wherePivotIn('relationship_type_id', [
                1, // Follower
            ])
            ->orderBy('opportunities.opportunityable_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function opportunityApplications()
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Opportunity::class, 'opportunity_user')
            ->whereIn('opportunities.opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6  // In Progress
            ])
            ->withTimestamps()
            ->withPivot('relationship_type_id', 'comments')
            ->wherePivotIn('relationship_type_id', [
                2, // Applicant
            ])
            ->orderBy('opportunities.opportunityable_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function opportunities()
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Opportunity::class, 'opportunity_user')
            ->whereIn('opportunities.opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6  // In Progress
            ])
            ->withTimestamps()
            ->withPivot('relationship_type_id', 'comments')
            ->wherePivotIn('relationship_type_id', [
                3, // Particiapnt
                4, // Manager
                5, // Practitioner Mentor
                6  // Academic Mentor
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function projects()
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Opportunity::class, 'opportunity_user')
            ->whereIn('opportunities.opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6  // In Progress
            ])
            ->filterByType('Project')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [
                3, // Particiapnt
                4, // Manager
                5, // Practitioner Mentor
                6  // Academic Mentor
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function internships()
    {
        return $this->belongsToMany(\SCCatalog\Models\Opportunity\Opportunity::class, 'opportunity_user')
            ->whereIn('opportunities.opportunity_status_id', [
                3, // Seeking Champion
                4, // Recruiting Participants
                5, // Positions Filled
                6  // In Progress
            ])
            ->filterByType('Internship')
            ->withPivot('relationship_type_id', 'comments')
            ->withTimestamps()
            ->wherePivotIn('relationship_type_id', [
                3, // Particiapnt
                4, // Manager
                5, // Practitioner Mentor
                6  // Academic Mentor
            ]);
    }

    public function shouldBeSearchable()
    {
        return false;
    }
}

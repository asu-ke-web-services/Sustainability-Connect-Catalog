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
    use HasRoles,
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


    public function shouldBeSearchable()
    {
        return false;
    }
}

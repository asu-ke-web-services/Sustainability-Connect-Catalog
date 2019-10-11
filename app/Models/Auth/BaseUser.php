<?php

namespace SCCatalog\Models\Auth;

use SCCatalog\Models\Traits\Uuid;
use Altek\Eventually\Eventually;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Altek\Accountant\Contracts\Recordable;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;
use SCCatalog\Models\Auth\Traits\SendUserPasswordReset;
use Altek\Accountant\Recordable as RecordableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 */
abstract class BaseUser extends Authenticatable implements Recordable
{
    use HasRoles,
        Eventually,
        Impersonate,
        Notifiable,
        RecordableTrait,
        Searchable,
        SendUserPasswordReset,
        SoftDeletes,
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
        'to_be_logged_out',
        'access_validated',
        'asurite',
        'asurite_login',
        'user_type_id',
        'student_degree_level_id',
        'degree_program',
        'graduation_date',
        'phone',
        'research_interests',
        'department',
        'organization_id',
    ];

    /**
     * The dynamic attributes from mutators that should be returned with the user object.
     * @var array
     */
    protected $appends = [
        'full_name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'asurite' => 'boolean',
        'confirmed' => 'boolean',
        'to_be_logged_out' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'last_login_at',
        'password_changed_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Return true or false if the user can impersonate another user.
     *
     * @param void
     * @return  bool
     */
    public function canImpersonate()
    {
        return $this->isAdmin();
    }

    /**
     * Return true or false if the user can be impersonated.
     *
     * @param void
     * @return  bool
     */
    public function canBeImpersonated()
    {
        return $this->id !== 1;
    }

    /**
     * Return true or false if the user should be indexed for search.
     *
     * @param void
     * @return  bool
     */
    public function shouldBeSearchable()
    {
        return true;
    }

    /**
     * Return array of customized properties to be stored in search index.
     *
     * @param void
     * @return  array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['userType'] = e($this->userType->name);

        // Index Location Cities
        $array['addresses'] = '';
        foreach ($this->addresses as $address) {
            $array['addresses'] .= e($address['city']) . ' ' . e($address['state']);
        }

        // Index Affiliations
        $array['affiliations'] = $this->affiliations->map(function ($data) {
            return e($data['name']);
        })->toArray();

        // Index AccessAffiliations
        $array['accessAffiliations'] = $this->affiliations->where('access_control', true)->map(function ($data) {
            return [
                'name' => e($data['name']),
                'slug' => e($data['slug']),
            ];
        })->toArray();

        return $array;
    }

}

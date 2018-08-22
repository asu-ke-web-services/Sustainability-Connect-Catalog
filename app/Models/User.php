<?php

namespace SCCatalog\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use BlameableTrait;
    use CrudTrait;
    use HasRoles;
    use Notifiable;
    use Searchable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_token',
        'first_name',
        'last_name',
        'login_name',
        'type',
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
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function shouldBeSearchable()
    {
        return true;
    }

}

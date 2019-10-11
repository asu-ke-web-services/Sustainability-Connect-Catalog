<?php

namespace SCCatalog\Models\Auth;

use SCCatalog\Models\Auth\Traits\Scope\UserScope;
use SCCatalog\Models\Auth\Traits\Method\UserMethod;
use SCCatalog\Models\Auth\Traits\Attribute\UserAttribute;
use SCCatalog\Models\Auth\Traits\Relationship\UserRelationship;

/**
 * Class User.
 */
class User extends BaseUser
{
    use UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope;
}

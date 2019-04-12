<?php

namespace SCCatalog\Models\Auth;

use SCCatalog\Models\Auth\Traits\Method\RoleMethod;
use SCCatalog\Models\Auth\Traits\Attribute\RoleAttribute;

/**
 * Class Role.
 */
class Role extends \Spatie\Permission\Models\Role
{
    use RoleAttribute,
        RoleMethod;
}

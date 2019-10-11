<?php

namespace SCCatalog\Models\Auth\Traits\Attribute;

use Illuminate\Support\Facades\Hash;

/**
 * Trait UserAttribute.
 */
trait UserAttribute
{
    /**
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        // If password was accidentally passed in already hashed, try not to double hash it
        if (
            (\strlen($password) === 60 && preg_match('/^\$2y\$/', $password)) ||
            (\strlen($password) === 95 && preg_match('/^\$argon2i\$/', $password))
        ) {
            $hash = $password;
        } else {
            $hash = Hash::make($password);
        }

        // Note: Password Histories are logged from the \SCCatalog\Observer\User\UserObserver class
        $this->attributes['password'] = $hash;
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->last_name
            ? $this->first_name.' '.$this->last_name
            : $this->first_name;
    }

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->full_name;
    }

    /**
     * @return mixed
     */
    public function getPictureAttribute()
    {
        return $this->getPicture();
    }

    /**
     * @return string
     */
    public function getRolesLabelAttribute()
    {
        $roles = $this->getRoleNames()->toArray();

        if (\count($roles)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item);
            }, $roles));
        }

        return 'N/A';
    }

    /**
     * @return string
     */
    public function getPermissionsLabelAttribute()
    {
        $permissions = $this->getDirectPermissions()->toArray();

        if (\count($permissions)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item['name']);
            }, $permissions));
        }

        return 'N/A';
    }

    /**
     * @return string
     */
    public function getConfirmedLabelAttribute()
    {
        if ($this->isConfirmed()) {
            if ($this->id != 1 && $this->id != auth()->id()) {
                return '<a href="' . route(
                    'admin.auth.user.unconfirm',
                    $this
                ) . '" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.access.users.unconfirm') . '" name="confirm_item"><span class="badge badge-success" style="cursor:pointer">' . __('labels.general.yes') . '</span></a>';
            }

            return '<span class="badge badge-success">' . __('labels.general.yes') . '</span>';
        }

        return '<a href="' . route('admin.auth.user.confirm', $this) . '" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.access.users.confirm') . '" name="confirm_item"><span class="badge badge-danger" style="cursor:pointer">' . __('labels.general.no') . '</span></a>';
    }

    /**
     * @return string
     */
    public function getShowIsearchButtonAttribute()
    {
        if (false !== $this->getAsuEID()) {
            return '<a href="https://isearch.asu.edu/profile/' . $this->getAsuEID() . '" data-toggle="tooltip" data-placement="top" title="iSearch Profile" class="btn btn-info" target = "_blank">i</a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getReviewActionButtonsAttribute()
    {
        return '
        <div class="btn-group" role="group" aria-label="' . __('labels.backend.access.users.user_actions') . '">
            ' . $this->show_button . '
            ' . $this->show_isearch_button . '
            ' . $this->edit_button . '
        </div>';
    }
}

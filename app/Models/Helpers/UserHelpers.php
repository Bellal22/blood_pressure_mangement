<?php

namespace App\Models\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

trait UserHelpers
{
    /**
     * Determine whether the user type is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->type == User::ADMIN_TYPE;
    }

    /**
     * Determine whether the user type is nurse.
     *
     * @return bool
     */
    public function isNurse()
    {
        return $this->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user type is doctor.
     *
     * @return bool
     */
    public function isDoctor()
    {
        return $this->type == User::CUSTOMER_TYPE;
    }

    /**
     * Set the user type.
     *
     * @return $this
     */
    public function setType($type)
    {
        if (Gate::allows('updateType', $this)
            && in_array($type, array_keys(trans('users.types')))) {
            $this->forceFill([
                'type' => $type,
            ])->save();
        }

        return $this;
    }

    /**
     * Determine whether the user can access dashboard.
     *
     * @return bool
     */
    public function canAccessDashboard()
    {
        return $this->isAdmin() || $this->isNurse();
    }

    /**
     * The user profile image url.
     *
     * @return bool
     */
    public function getAvatar()
    {
        return $this->getFirstMediaUrl('avatars');
    }
}

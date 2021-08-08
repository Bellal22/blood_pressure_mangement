<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Nurse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Access\HandlesAuthorization;
use Laraeast\LaravelSettings\Facades\Settings;

class NursePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any nurses.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.nurses');
    }

    /**
     * Determine whether the user can view the nurse.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Nurse $nurse
     * @return mixed
     */
    public function view(User $user, Nurse $nurse)
    {
        return $user->isAdmin()
            || $user->is($nurse)
            || $user->hasPermissionTo('manage.nurses');
    }

    /**
     * Determine whether the user can create nurses.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.nurses');
    }

    /**
     * Determine whether the user can update the nurse.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Nurse $nurse
     * @return mixed
     */
    public function update(User $user, Nurse $nurse)
    {
        return (
                $user->isAdmin()
                || $user->is($nurse)
                || $user->hasPermissionTo('manage.nurses')
            )
            && ! $this->trashed($nurse);
    }

    /**
     * Determine whether the user can update the type of the nurse.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Nurse $nurse
     * @return mixed
     */
    public function updateType(User $user, Nurse $nurse)
    {
        return $user->isAdmin()
            && $user->isNot($nurse)
            || $user->hasPermissionTo('manage.nurses');
    }

    /**
     * Determine whether the user can delete the nurse.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Nurse $nurse
     * @return mixed
     */
    public function delete(User $user, Nurse $nurse)
    {
        return (
                $user->isAdmin()
                && $user->isNot($nurse)
                || $user->hasPermissionTo('manage.nurses')
            )
            && ! $this->trashed($nurse);
    }

    /**
     * Determine whether the user can view trashed nurses.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return (
                $user->isAdmin()
                || $user->hasPermissionTo('manage.nurses')
            )
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view trashed nurse.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Nurse $nurse
     * @return mixed
     */
    public function viewTrash(User $user, Nurse $nurse)
    {
        return $this->view($user, $nurse) && $this->trashed($nurse);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Nurse $nurse
     * @return mixed
     */
    public function restore(User $user, Nurse $nurse)
    {
        return (
                $user->isAdmin()
                || $user->hasPermissionTo('manage.nurses')
            )
            && $this->trashed($nurse);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Nurse $nurse
     * @return mixed
     */
    public function forceDelete(User $user, Nurse $nurse)
    {
        return (
                $user->isAdmin()
                && $user->isNot($nurse)
                || $user->hasPermissionTo('manage.nurses')
            )
            && $this->trashed($nurse)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given nurse is trashed.
     *
     * @param $nurse
     * @return bool
     */
    public function trashed($nurse)
    {
        return $this->hasSoftDeletes()
            && method_exists($nurse, 'trashed')
            && $nurse->trashed();
    }

    /**
     * Determine wither the model use soft deleting trait.
     *
     * @return bool
     */
    public function hasSoftDeletes()
    {
        return in_array(
            SoftDeletes::class,
            array_keys((new \ReflectionClass(Nurse::class))->getTraits())
        );
    }
}

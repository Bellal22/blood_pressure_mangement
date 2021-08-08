<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Access\HandlesAuthorization;
use Laraeast\LaravelSettings\Facades\Settings;

class DoctorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any doctors.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.doctors');
    }

    /**
     * Determine whether the user can view the doctor.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Doctor $doctor
     * @return mixed
     */
    public function view(User $user, Doctor $doctor)
    {
        return $user->isAdmin()
            || $user->is($doctor)
            || $user->hasPermissionTo('manage.doctors');
    }

    /**
     * Determine whether the user can create doctors.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.doctors');
    }

    /**
     * Determine whether the user can update the doctor.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Doctor $doctor
     * @return mixed
     */
    public function update(User $user, Doctor $doctor)
    {
        return (
                $user->isAdmin()
                || $user->is($doctor)
                || $user->hasPermissionTo('manage.doctors')
            )
            && ! $this->trashed($doctor);
    }

    /**
     * Determine whether the user can update the type of the doctor.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Doctor $doctor
     * @return mixed
     */
    public function updateType(User $user, Doctor $doctor)
    {
        return $user->isAdmin() && $user->isNot($doctor) || $user->hasPermissionTo('manage.doctors');
    }

    /**
     * Determine whether the user can delete the doctor.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Doctor $doctor
     * @return mixed
     */
    public function delete(User $user, Doctor $doctor)
    {
        return (
                $user->isAdmin()
                && $user->isNot($doctor)
                || $user->hasPermissionTo('manage.doctors')
            )
            && ! $this->trashed($doctor);
    }

    /**
     * Determine whether the user can view trashed doctors.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return (
                $user->isAdmin()
                || $user->hasPermissionTo('manage.doctors')
            )
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view trashed doctor.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Doctor $doctor
     * @return mixed
     */
    public function viewTrash(User $user, Doctor $doctor)
    {
        return $this->view($user, $doctor) && $this->trashed($doctor);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Doctor $doctor
     * @return mixed
     */
    public function restore(User $user, Doctor $doctor)
    {
        return (
                $user->isAdmin()
                || $user->hasPermissionTo('manage.doctors')
            )
            && $this->trashed($doctor);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Doctor $doctor
     * @return mixed
     */
    public function forceDelete(User $user, Doctor $doctor)
    {
        return (
                $user->isAdmin()
                && $user->isNot($doctor)
                || $user->hasPermissionTo('manage.doctors')
            )
            && $this->trashed($doctor)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given doctor is trashed.
     *
     * @param $doctor
     * @return bool
     */
    public function trashed($doctor)
    {
        return $this->hasSoftDeletes() && method_exists($doctor, 'trashed') && $doctor->trashed();
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
            array_keys((new \ReflectionClass(Doctor::class))->getTraits())
        );
    }
}

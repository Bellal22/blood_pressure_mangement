<?php

namespace Tests;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Nurse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laraeast\LaravelSettings\Facades\Settings;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        // first include all the normal setUp operations
        parent::setUp();

        // now re-register all the roles and permissions (clears cache and reloads relations)
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();

        $this->seed(RolesAndPermissionsSeeder::class);

        Settings::set('delete_forever', true);
    }

    /**
     * Set the currently logged in admin for the application.
     *
     * @param null $driver
     * @return \App\Models\Admin
     */
    public function actingAsAdmin($driver = null)
    {
        $admin = Admin::factory()->create();

        $this->be($admin, $driver);

        return $admin;
    }

    /**
     * Set the currently logged in nurse for the application.
     *
     * @param null $driver
     * @return \App\Models\Nurse
     */
    public function actingAsNurse($driver = null)
    {
        $nurse = Nurse::factory()->create();

        $this->be($nurse, $driver);

        return $nurse;
    }

    /**
     * Set the currently logged in doctor for the application.
     *
     * @param null $driver
     * @return \App\Models\Doctor
     */
    public function actingAsDoctor($driver = null)
    {
        $doctor = Doctor::factory()->create();

        $this->be($doctor, $driver);

        return $doctor;
    }

    /**
     * Determine wither the model use soft deleting trait.
     *
     * @param $model
     * @return bool
     */
    public function useSoftDeletes($model)
    {
        return in_array(
            SoftDeletes::class,
            array_keys((new \ReflectionClass($model))->getTraits())
        );
    }
}

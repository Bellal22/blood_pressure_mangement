<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Doctor;

class DoctorTest extends TestCase
{
    /** @test */
    public function it_can_display_list_of_doctors()
    {
        $this->actingAsAdmin();

        Doctor::factory()->create(['name' => 'Ahmed']);

        $response = $this->get(route('dashboard.doctors.index'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_doctor_details()
    {
        $this->actingAsAdmin();

        $doctor = Doctor::factory()->create(['name' => 'Ahmed']);

        $response = $this->get(route('dashboard.doctors.show', $doctor));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_doctor_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.doctors.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('doctors.actions.create'));
    }

    /** @test */
    public function it_can_create_doctors()
    {
        $this->actingAsAdmin();

        $doctorsCount = Doctor::count();

        $response = $this->postJson(
            route('dashboard.doctors.store'),
            Doctor::factory()->raw([
                'name' => 'Doctor',
                'password' => 'password',
                'password_confirmation' => 'password',
            ])
        );

        $response->assertRedirect();

        $this->assertEquals(Doctor::count(), $doctorsCount + 1);
    }

    /** @test */
    public function it_can_display_doctor_edit_form()
    {
        $this->actingAsAdmin();

        $doctor = Doctor::factory()->create();

        $response = $this->get(route('dashboard.doctors.edit', $doctor));

        $response->assertSuccessful();

        $response->assertSee(trans('doctors.actions.edit'));
    }

    /** @test */
    public function it_can_update_doctors()
    {
        $this->actingAsAdmin();

        $doctor = Doctor::factory()->create();

        $response = $this->put(
            route('dashboard.doctors.update', $doctor),
            Doctor::factory()->raw([
                'name' => 'Doctor',
                'password' => 'password',
                'password_confirmation' => 'password',
            ])
        );

        $response->assertRedirect();

        $doctor->refresh();

        $this->assertEquals($doctor->name, 'Doctor');
    }

    /** @test */
    public function it_can_delete_doctor()
    {
        $this->actingAsAdmin();

        $doctor = Doctor::factory()->create();

        $doctorsCount = Doctor::count();

        $response = $this->delete(route('dashboard.doctors.destroy', $doctor));
        $response->assertRedirect();

        $this->assertEquals(Doctor::count(), $doctorsCount - 1);
    }
    /** @test */
    public function it_can_display_trashed_doctors()
    {
        if (! $this->useSoftDeletes($model = Doctor::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Doctor::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.doctors.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_doctor_details()
    {
        if (! $this->useSoftDeletes($model = Doctor::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $doctor = Doctor::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.doctors.trashed.show', $doctor));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }
    /** @test */
    public function it_can_restore_deleted_doctor()
    {
        if (! $this->useSoftDeletes($model = Doctor::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $doctor = Doctor::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.doctors.restore', $doctor));

        $response->assertRedirect();

        $this->assertNull($doctor->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_doctor()
    {
        if (! $this->useSoftDeletes($model = Doctor::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $doctor = Doctor::factory()->create(['deleted_at' => now()]);

        $doctorCount = Doctor::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.doctors.forceDelete', $doctor));

        $response->assertRedirect();

        $this->assertEquals(Doctor::withoutTrashed()->count(), $doctorCount - 1);
    }

    /** @test */
    public function it_can_filter_doctors_by_name()
    {
        $this->actingAsAdmin();

        Doctor::factory()->create(['name' => 'Ahmed']);

        Doctor::factory()->create(['name' => 'Mohamed']);

        $this->get(route('dashboard.doctors.index', [
            'name' => 'ahmed',
        ]))
            ->assertSuccessful()
            ->assertSee('Ahmed')
            ->assertDontSee('Mohamed');
    }

    /** @test */
    public function it_can_filter_doctors_by_email()
    {
        $this->actingAsAdmin();

        Doctor::factory()->create([
            'name' => 'FooBar1',
            'email' => 'user1@demo.com',
        ]);

        Doctor::factory()->create([
            'name' => 'FooBar2',
            'email' => 'user2@demo.com',
        ]);

        $this->get(route('dashboard.doctors.index', [
            'email' => 'user1@',
        ]))
            ->assertSuccessful()
            ->assertSee('FooBar1')
            ->assertDontSee('FooBar2');
    }

    /** @test */
    public function it_can_filter_doctors_by_phone()
    {
        $this->actingAsAdmin();

        Doctor::factory()->create([
            'name' => 'FooBar1',
            'phone' => '123',
        ]);

        Doctor::factory()->create([
            'name' => 'FooBar2',
            'email' => '456',
        ]);

        $this->get(route('dashboard.doctors.index', [
            'phone' => '123',
        ]))
            ->assertSuccessful()
            ->assertSee('FooBar1')
            ->assertDontSee('FooBar2');
    }
}

<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Nurse;

class NurseTest extends TestCase
{
    /** @test */
    public function it_can_display_list_of_nurses()
    {
        $this->actingAsAdmin();

        Nurse::factory()->create(['name' => 'Ahmed']);

        $response = $this->get(route('dashboard.nurses.index'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_nurse_details()
    {
        $this->actingAsAdmin();

        $nurse = Nurse::factory()->create(['name' => 'Ahmed']);

        $response = $this->get(route('dashboard.nurses.show', $nurse));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_nurse_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.nurses.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('nurses.actions.create'));
    }

    /** @test */
    public function it_can_create_nurses()
    {
        $this->actingAsAdmin();

        $nursesCount = Nurse::count();

        $response = $this->postJson(
            route('dashboard.nurses.store'),
            [
                'name' => 'Nurse',
                'email' => 'nurse@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(Nurse::count(), $nursesCount + 1);
    }

    /** @test */
    public function it_can_display_nurse_edit_form()
    {
        $this->actingAsAdmin();

        $nurse = Nurse::factory()->create();

        $response = $this->get(route('dashboard.nurses.edit', $nurse));

        $response->assertSuccessful();

        $response->assertSee(trans('nurses.actions.edit'));
    }

    /** @test */
    public function it_can_update_nurses()
    {
        $this->actingAsAdmin();

        $nurse = Nurse::factory()->create();

        $response = $this->put(
            route('dashboard.nurses.update', $nurse),
            [
                'name' => 'Nurse',
                'email' => 'nurse@demo.com',
                'phone' => '123456789',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $nurse->refresh();

        $this->assertEquals($nurse->name, 'Nurse');
    }

    /** @test */
    public function it_can_delete_nurse()
    {
        $this->actingAsAdmin();

        $nurse = Nurse::factory()->create();

        $nursesCount = Nurse::count();

        $response = $this->delete(route('dashboard.nurses.destroy', $nurse));
        $response->assertRedirect();

        $this->assertEquals(Nurse::count(), $nursesCount - 1);
    }

    /** @test */
    public function it_can_display_trashed_nurses()
    {
        if (! $this->useSoftDeletes($model = Nurse::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        Nurse::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.nurses.trashed'));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_display_trashed_nurse_details()
    {
        if (! $this->useSoftDeletes($model = Nurse::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $nurse = Nurse::factory()->create(['deleted_at' => now(), 'name' => 'Ahmed']);

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.nurses.trashed.show', $nurse));

        $response->assertSuccessful();

        $response->assertSee('Ahmed');
    }

    /** @test */
    public function it_can_restore_deleted_nurse()
    {
        if (! $this->useSoftDeletes($model = Nurse::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $nurse = Nurse::factory()->create(['deleted_at' => now()]);

        $this->actingAsAdmin();

        $response = $this->post(route('dashboard.nurses.restore', $nurse));

        $response->assertRedirect();

        $this->assertNull($nurse->refresh()->deleted_at);
    }

    /** @test */
    public function it_can_force_delete_nurse()
    {
        if (! $this->useSoftDeletes($model = Nurse::class)) {
            $this->markTestSkipped("The '$model' doesn't use soft deletes trait.");
        }

        $nurse = Nurse::factory()->create(['deleted_at' => now()]);

        $nurseCount = Nurse::withTrashed()->count();

        $this->actingAsAdmin();

        $response = $this->delete(route('dashboard.nurses.forceDelete', $nurse));

        $response->assertRedirect();

        $this->assertEquals(Nurse::withoutTrashed()->count(), $nurseCount - 1);
    }

    /** @test */
    public function it_can_filter_nurses_by_name()
    {
        $this->actingAsAdmin();

        Nurse::factory()->create(['name' => 'Ahmed']);

        Nurse::factory()->create(['name' => 'Mohamed']);

        $this->get(route('dashboard.nurses.index', [
            'name' => 'ahmed',
        ]))
            ->assertSuccessful()
            ->assertSee('Ahmed')
            ->assertDontSee('Mohamed');
    }

    /** @test */
    public function it_can_filter_nurses_by_email()
    {
        $this->actingAsAdmin();

        Nurse::factory()->create([
            'name' => 'FooBar1',
            'email' => 'user1@demo.com',
        ]);

        Nurse::factory()->create([
            'name' => 'FooBar2',
            'email' => 'user2@demo.com',
        ]);

        $this->get(route('dashboard.nurses.index', [
            'email' => 'user1@',
        ]))
            ->assertSuccessful()
            ->assertSee('FooBar1')
            ->assertDontSee('FooBar2');
    }

    /** @test */
    public function it_can_filter_nurses_by_phone()
    {
        $this->actingAsAdmin();

        Nurse::factory()->create([
            'name' => 'FooBar1',
            'phone' => '123',
        ]);

        Nurse::factory()->create([
            'name' => 'FooBar2',
            'email' => '456',
        ]);

        $this->get(route('dashboard.nurses.index', [
            'phone' => '123',
        ]))
            ->assertSuccessful()
            ->assertSee('FooBar1')
            ->assertDontSee('FooBar2');
    }
}

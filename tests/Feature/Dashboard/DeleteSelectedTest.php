<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Doctor;

class DeleteSelectedTest extends TestCase
{
    /** @test */
    public function it_can_delete_multiple_models()
    {
        $this->actingAsAdmin();

        $doctors = Doctor::factory()->count(10)->create();

        $this->assertEquals(10, $doctors->count());

        $response = $this->delete(route('dashboard.delete.selected'), [
            'type' => Doctor::class,
            'resources' => trans('doctors.plural'),
            'items' => $doctors->pluck('id')->toArray(),
        ]);

        $response->assertRedirect();

        $this->assertEquals(0, Doctor::count());
    }
}

<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;

class AccessTest extends TestCase
{
    public function test_dashboard_authorization()
    {
        $this->actingAsDoctor();

        $response = $this->get(route('dashboard.home'));

        $response->assertForbidden();

        $this->actingAsNurse();

        $response = $this->get(route('dashboard.home'));

        $response->assertSuccessful();

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.home'));

        $response->assertSuccessful();
    }
}

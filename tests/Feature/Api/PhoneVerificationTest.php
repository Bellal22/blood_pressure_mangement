<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Doctor;
use App\Models\Verification;
use App\Events\VerificationCreated;
use Illuminate\Support\Facades\Event;

class PhoneVerificationTest extends TestCase
{
    /** @test */
    public function it_can_determine_if_the_authenticated_user_password_is_correct()
    {
        $this->postJson(route('api.password.check'), [
            'password' => 'password',
        ])->assertStatus(401);

        $doctor = $this->actingAsDoctor();

        $this->postJson(route('api.password.check'), [
            'password' => '123456',
        ])->assertJsonValidationErrors(['password']);

        $response = $this->postJson(route('api.password.check'), [
            'password' => 'password',
        ])->assertSuccessful();

        $this->assertEquals($response->json('data.name'), $doctor->name);
    }

    /** @test */
    public function it_can_send_or_resend_the_phone_verification_code()
    {
        $this->actingAsDoctor();

        Event::fake();

        Doctor::factory(['phone' => '123456789'])->create();

        $this->postJson(route('api.verification.send'), [
            'phone' => '123456',
        ])->assertSuccessful();

        Event::assertDispatched(VerificationCreated::class);
    }

    /** @test */
    public function it_can_verify_the_phone_number()
    {
        $doctor = $this->actingAsDoctor();

        Event::fake();

        Verification::create([
            'user_id' => $doctor->id,
            'phone' => '12345678',
            'code' => 'foobar',
        ]);

        $this->assertEquals(Verification::count(), 1);

        $this->postJson(route('api.verification.verify'), [
            'code' => 'foo',
        ])->assertJsonValidationErrors(['code']);

        $this->travelTo(now()->addMinutes(5));

        $this->postJson(route('api.verification.verify'), [
            'code' => 'foobar',
        ])->assertJsonValidationErrors(['code']);

        $this->travelBack();

        $this->postJson(route('api.verification.verify'), [
            'code' => 'foobar',
        ])->assertSuccessful();

        $this->assertEquals(Verification::count(), 0);

        $this->assertNotNull($doctor->refresh()->phone_verified_at);
        $this->assertEquals($doctor->phone, '12345678');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Verification;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Events\VerificationCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RegisterController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Handle a login request to the application.
     *
     * @param \App\Http\Requests\Api\RegisterRequest $request
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function register(RegisterRequest $request)
    {
        switch ($request->type) {
            case User::CUSTOMER_TYPE:
            default:
                $user = $this->createDoctor($request);
                break;
        }

        if ($request->hasFile('avatar')) {
            $user->addMediaFromRequest('avatar')
                ->toMediaCollection('avatars');
        }

        event(new Registered($user));

        $this->sendVerificationCode($user);

        return $user->getResource()->additional([
            'token' => $user->createTokenForDevice(
                $request->header('user-agent')
            ),
            'message' => trans('verification.sent'),
        ]);
    }

    /**
     * Create new doctor to register to the application.
     *
     * @param \App\Http\Requests\Api\RegisterRequest $request
     * @return \App\Models\Doctor
     */
    public function createDoctor(RegisterRequest $request)
    {
        $doctor = new Doctor();

        $doctor
            ->forceFill($request->only('phone', 'type'))
            ->fill($request->allWithHashedPassword())
            ->save();

        return $doctor;
    }

    /**
     * Send the phone number verification code.
     *
     * @param \App\Models\User $user
     * @throws \Illuminate\Validation\ValidationException
     * @return void
     */
    protected function sendVerificationCode(User $user): void
    {
        if (! $user || $user->phone_verified_at) {
            throw ValidationException::withMessages([
                'phone' => [trans('verification.verified')],
            ]);
        }

        $verification = Verification::updateOrCreate([
            'user_id' => $user->id,
            'phone' => $user->phone,
        ], [
            'code' => rand(1111, 9999),
        ]);

        event(new VerificationCreated($verification));
    }
}

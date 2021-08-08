<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\App\Models\NotificationModel[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\AdminFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Query\Builder|Admin onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Admin withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Admin withoutTrashed()
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Doctor
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\App\Models\NotificationModel[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\DoctorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor newQuery()
 * @method static \Illuminate\Database\Query\Builder|Doctor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Doctor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Doctor withoutTrashed()
 */
	class Doctor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Feedback
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\FeedbackFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newQuery()
 * @method static \Illuminate\Database\Query\Builder|Feedback onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback unread()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Feedback withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Feedback withoutTrashed()
 */
	class Feedback extends \Eloquent implements \App\Models\Contracts\NotificationTarget {}
}

namespace App\Models{
/**
 * App\Models\NotificationModel
 *
 * @property string $id
 * @property string $type
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property array $data
 * @property int|null $user_id
 * @property int|null $feedback_id
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Feedback|null $feedback
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $notifiable
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection|static[] all($columns = ['*'])
 * @method static \Illuminate\Notifications\DatabaseNotificationCollection|static[] get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseNotification read()
 * @method static \Illuminate\Database\Eloquent\Builder|DatabaseNotification unread()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel whereFeedbackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationModel whereUserId($value)
 */
	class NotificationModel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ResetPasswordCode
 *
 * @property int $id
 * @property string $username
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereUsername($value)
 */
	class ResetPasswordCode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ResetPasswordToken
 *
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereUserId($value)
 */
	class ResetPasswordToken extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $key
 * @property string|null $locale
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 */
	class Setting extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Nurse
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\App\Models\NotificationModel[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\NurseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse newQuery()
 * @method static \Illuminate\Database\Query\Builder|Nurse onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nurse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Nurse withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Nurse withoutTrashed()
 */
	class Nurse extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\App\Models\NotificationModel[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Verification
 *
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property int $user_id
 * @property string $phone
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Verification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Verification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Verification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereUserId($value)
 */
	class Verification extends \Eloquent {}
}


@include('dashboard.errors')
{{ BsForm::text('name') }}
{{ BsForm::text('email') }}
{{ BsForm::text('phone') }}
{{ BsForm::password('password') }}
{{ BsForm::password('password_confirmation') }}

@if(auth()->user()->isAdmin())
    <fieldset>
        <legend>@lang('permissions.plural')</legend>
        @foreach(config('permission.supported') as $permission)
            {{ BsForm::checkbox('permissions[]')
                    ->value($permission)
                    ->label(trans(str_replace('manage.', '', $permission.'.permission')))
                    ->checked(isset($nurse) && $nurse->hasPermissionTo($permission)) }}
        @endforeach
    </fieldset>
@endif

@isset($nurse)
    {{ BsForm::image('avatar')->collection('avatars')->files($nurse->getMediaResource('avatars')) }}
@else
    {{ BsForm::image('avatar')->collection('avatars') }}
@endisset

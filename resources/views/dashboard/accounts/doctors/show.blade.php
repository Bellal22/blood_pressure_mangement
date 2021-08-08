<x-layout :title="$doctor->name" :breadcrumbs="['dashboard.doctors.show', $doctor]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('doctors.attributes.name')</th>
                <td>{{ $doctor->name }}</td>
            </tr>
            <tr>
                <th width="200">@lang('doctors.attributes.email')</th>
                <td>{{ $doctor->email }}</td>
            </tr>
            <tr>
                <th width="200">@lang('doctors.attributes.phone')</th>
                <td>
                    @include('dashboard.accounts.doctors.partials.flags.phone')
                </td>
            </tr>
            <tr>
                <th width="200">@lang('doctors.attributes.avatar')</th>
                <td>
                    @if($doctor->getFirstMedia('avatars'))
                        <file-preview :media="{{ $doctor->getMediaResource('avatars') }}"></file-preview>
                    @else
                        <img src="{{ $doctor->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $doctor->name }}">
                    @endif
                </td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.accounts.doctors.partials.actions.edit')
            @include('dashboard.accounts.doctors.partials.actions.delete')
            @include('dashboard.accounts.doctors.partials.actions.restore')
            @include('dashboard.accounts.doctors.partials.actions.forceDelete')
        @endslot
    @endcomponent
</x-layout>

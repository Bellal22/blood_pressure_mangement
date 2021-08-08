<x-layout :title="$nurse->name" :breadcrumbs="['dashboard.nurses.show', $nurse]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('nurses.attributes.name')</th>
                <td>{{ $nurse->name }}</td>
            </tr>
            <tr>
                <th width="200">@lang('nurses.attributes.email')</th>
                <td>{{ $nurse->email }}</td>
            </tr>
            <tr>
                <th width="200">@lang('nurses.attributes.phone')</th>
                <td>
                    @include('dashboard.accounts.nurses.partials.flags.phone')
                </td>
            </tr>
            <tr>
                <th width="200">@lang('nurses.attributes.avatar')</th>
                <td>
                    @if($nurse->getFirstMedia('avatars'))
                        <file-preview :media="{{ $nurse->getMediaResource('avatars') }}"></file-preview>
                    @else
                        <img src="{{ $nurse->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $nurse->name }}">
                    @endif
                </td>
            </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('dashboard.accounts.nurses.partials.actions.impersonate')
            @include('dashboard.accounts.nurses.partials.actions.edit')
            @include('dashboard.accounts.nurses.partials.actions.delete')
            @include('dashboard.accounts.nurses.partials.actions.restore')
            @include('dashboard.accounts.nurses.partials.actions.forceDelete')
        @endslot
    @endcomponent
</x-layout>

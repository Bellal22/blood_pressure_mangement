<x-layout :title="trans('nurses.plural')" :breadcrumbs="['dashboard.nurses.index']">
    @include('dashboard.accounts.nurses.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('nurses.actions.list') ({{ count_formatted($nurses->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete
                            type="{{ \App\Models\Nurse::class }}"
                            :resource="trans('nurses.plural')"></x-check-all-delete>

                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        @include('dashboard.accounts.nurses.partials.actions.create')
                        @include('dashboard.accounts.nurses.partials.actions.trashed')
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('nurses.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('nurses.attributes.email')</th>
            <th>@lang('nurses.attributes.phone')</th>
            <th>@lang('nurses.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($nurses as $nurse)
            <tr>
                <td>
                    <x-check-all-item :model="$nurse"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.nurses.show', $nurse) }}"
                       class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('dashboard.accounts.nurses.partials.flags.svg')
                            </span>
                        <img src="{{ $nurse->getAvatar() }}"
                             alt="Product 1"
                             class="img-circle img-size-32 mr-2">
                        {{ $nurse->name }}
                    </a>
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $nurse->email }}
                </td>
                <td>
                    @include('dashboard.accounts.nurses.partials.flags.phone')
                </td>
                <td>{{ $nurse->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.nurses.partials.actions.impersonate')
                    @include('dashboard.accounts.nurses.partials.actions.edit')
                    @include('dashboard.accounts.nurses.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('nurses.empty')</td>
            </tr>
        @endforelse

        @if($nurses->hasPages())
            @slot('footer')
                {{ $nurses->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>

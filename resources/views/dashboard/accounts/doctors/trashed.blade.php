<x-layout :title="trans('doctors.trashed')" :breadcrumbs="['dashboard.doctors.trashed']">
    @include('dashboard.accounts.doctors.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('doctors.actions.list') ({{ count_formatted($doctors->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete
                        type="{{ \App\Models\Doctor::class }}"
                        :resource="trans('doctors.plural')"></x-check-all-force-delete>
                <x-check-all-restore
                        type="{{ \App\Models\Doctor::class }}"
                        :resource="trans('doctors.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th>
                <x-check-all></x-check-all>
            </th>
            <th>@lang('doctors.attributes.name')</th>
            <th class="d-none d-md-table-cell">@lang('doctors.attributes.email')</th>
            <th>@lang('doctors.attributes.phone')</th>
            <th>@lang('doctors.attributes.created_at')</th>
            <th style="width: 160px">...</th>
        </tr>
        </thead>
        <tbody>
        @forelse($doctors as $doctor)
            <tr>
                <td>
                    <x-check-all-item :model="$doctor"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.doctors.trashed.show', $doctor) }}"
                       class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('dashboard.accounts.doctors.partials.flags.svg')
                            </span>
                        <img src="{{ $doctor->getAvatar() }}"
                             alt="Product 1"
                             class="img-circle img-size-32 mr-2">
                        {{ $doctor->name }}
                    </a>
                </td>

                <td class="d-none d-md-table-cell">
                    {{ $doctor->email }}
                </td>
                <td>
                    @include('dashboard.accounts.doctors.partials.flags.phone')
                </td>
                <td>{{ $doctor->created_at->format('Y-m-d') }}</td>

                <td style="width: 160px">
                    @include('dashboard.accounts.doctors.partials.actions.show')
                    @include('dashboard.accounts.doctors.partials.actions.restore')
                    @include('dashboard.accounts.doctors.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('doctors.empty')</td>
            </tr>
        @endforelse

        @if($doctors->hasPages())
            @slot('footer')
                {{ $doctors->links() }}
            @endslot
        @endif
    @endcomponent
</x-layout>

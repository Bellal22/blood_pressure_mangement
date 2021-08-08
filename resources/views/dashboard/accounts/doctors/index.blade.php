<x-layout :title="trans('doctors.plural')" :breadcrumbs="['dashboard.doctors.index']">
    @include('dashboard.accounts.doctors.partials.filter')

    @component('dashboard::components.table-box')

        @slot('title')
            @lang('doctors.actions.list') ({{ count_formatted($doctors->total()) }})
        @endslot

        <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete
                            type="{{ \App\Models\Doctor::class }}"
                            :resource="trans('doctors.plural')"></x-check-all-delete>

                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        @include('dashboard.accounts.doctors.partials.actions.create')
                        @include('dashboard.accounts.doctors.partials.actions.trashed')
                    </div>
                </div>
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
                    <a href="{{ route('dashboard.doctors.show', $doctor) }}"
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
                    @include('dashboard.accounts.doctors.partials.actions.edit')
                    @include('dashboard.accounts.doctors.partials.actions.delete')
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

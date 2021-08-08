@can('create', \App\Models\Doctor::class)
    <a href="{{ route('dashboard.doctors.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('doctors.actions.create')
    </a>
@endcan

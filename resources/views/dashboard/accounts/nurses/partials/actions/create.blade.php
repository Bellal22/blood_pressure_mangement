@can('create', \App\Models\Nurse::class)
    <a href="{{ route('dashboard.nurses.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('nurses.actions.create')
    </a>
@endcan

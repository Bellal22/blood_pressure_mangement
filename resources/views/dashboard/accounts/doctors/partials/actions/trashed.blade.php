@can('viewAnyTrash', \App\Models\Doctor::class)
    <a href="{{ route('dashboard.doctors.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('doctors.trashed')
    </a>
@endcan

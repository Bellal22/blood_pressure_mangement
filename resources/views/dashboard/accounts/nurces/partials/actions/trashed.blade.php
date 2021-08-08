@can('viewAnyTrash', \App\Models\Nurse::class)
    <a href="{{ route('dashboard.nurses.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('nurses.trashed')
    </a>
@endcan

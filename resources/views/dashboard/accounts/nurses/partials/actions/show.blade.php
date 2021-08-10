@if(method_exists($nurse, 'trashed') && $nurse->trashed())
    @can('view', $nurse)
        <a href="{{ route('dashboard.nurses.trashed.show', $nurse) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $nurse)
        <a href="{{ route('dashboard.nurses.show', $nurse) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif
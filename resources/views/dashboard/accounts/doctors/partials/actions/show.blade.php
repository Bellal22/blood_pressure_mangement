@if(method_exists($doctor, 'trashed') && $doctor->trashed())
    @can('view', $doctor)
        <a href="{{ route('dashboard.doctors.trashed.show', $doctor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $doctor)
        <a href="{{ route('dashboard.doctors.show', $doctor) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif
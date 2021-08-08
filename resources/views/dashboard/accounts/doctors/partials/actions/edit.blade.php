@can('update', $doctor)
    <a href="{{ route('dashboard.doctors.edit', $doctor) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-user-edit"></i>
    </a>
@endcan

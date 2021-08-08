@if($doctor)
    @if(method_exists($doctor, 'trashed') && $doctor->trashed())
        <a href="{{ route('dashboard.doctors.trashed.show', $doctor) }}" class="text-decoration-none text-ellipsis">
            {{ $doctor->name }}
        </a>
    @else
        <a href="{{ route('dashboard.doctors.show', $doctor) }}" class="text-decoration-none text-ellipsis">
            {{ $doctor->name }}
        </a>
    @endif
@else
    ---
@endif
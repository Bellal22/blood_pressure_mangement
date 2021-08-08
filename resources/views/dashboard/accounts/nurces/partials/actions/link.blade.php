@if($nurse)
    @if(method_exists($nurse, 'trashed') && $nurse->trashed())
        <a href="{{ route('dashboard.nurses.trashed.show', $nurse) }}" class="text-decoration-none text-ellipsis">
            {{ $nurse->name }}
        </a>
    @else
        <a href="{{ route('dashboard.nurses.show', $nurse) }}" class="text-decoration-none text-ellipsis">
            {{ $nurse->name }}
        </a>
    @endif
@else
    ---
@endif
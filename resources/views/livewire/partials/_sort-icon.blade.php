@if ($sortField === $field)
    @if ($sortDirection === 'asc')
        &#9650; {{-- up arrow --}}
    @else
        &#9660; {{-- down arrow --}}
    @endif
@endif

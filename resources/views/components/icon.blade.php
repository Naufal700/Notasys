@props(['name'])

@switch($name)
    @case('home')
        <svg {{ $attributes }} fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3" />
        </svg>
    @break
    @case('users')
        <svg {{ $attributes }} fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5V9H2v11h5m10-11V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v4" />
        </svg>
    @break
    @case('document')
        <svg {{ $attributes }} fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M7 21h10V7H7v14zM3 7h18" />
        </svg>
    @break
    @case('folder')
        <svg {{ $attributes }} fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 7h5l2 3h11v10H3V7z" />
        </svg>
    @break
    @case('calendar')
        <svg {{ $attributes }} fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3M4 11h16M4 19h16" />
        </svg>
    @break
    @case('currency-dollar')
        <svg {{ $attributes }} fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8c-2.5 0-4 1.5-4 3.5S9.5 15 12 15s4-1.5 4-3.5S14.5 8 12 8z" />
        </svg>
    @break
    @case('user-cog')
        <svg {{ $attributes }} fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 12c2.5 0 4-1.5 4-3.5S14.5 5 12 5s-4 1.5-4 3.5S9.5 12 12 12z" />
        </svg>
    @break
@endswitch

<header>
    {{-- @if(Auth::guard('user')->check())
        @include('layouts._partials.navigation-logged-in')
    @endif --}}
    @include('layouts._partials.navigation')
</header>

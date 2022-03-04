<x-layouts.backoffice>

    @if(auth()->user()->isAdmin())
        @include('backoffice.pages.home.partials.admin-dashboard')
    @else
        @include('backoffice.pages.home.partials.user-dashboard')
    @endif

</x-layouts.backoffice>

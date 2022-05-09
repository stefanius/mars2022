<x-layouts.backoffice>
    <x-slot name="menuBarLeft">
        <h1 class="navbar-item title">{{ __('Edition')  }}: {{ \App\Models\Season::activeSeason()->edition }}</h1>
    </x-slot>

    @if(auth()->user()->isAdmin())
        @include('backoffice.pages.home.partials.admin-dashboard')
    @else
        @include('backoffice.pages.home.partials.user-dashboard')
    @endif

</x-layouts.backoffice>

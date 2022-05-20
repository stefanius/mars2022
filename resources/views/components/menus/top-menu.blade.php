<div id="navMenu" class="navbar-menu">
    <div class="navbar-start">
        @foreach($items as $item)
            @if ($item->showItem)
                <a class="navbar-item @if($item->active) is-active @endif" href="{{ $item->route }}">
                    {{ __($item->name) }}
                </a>
            @endif
        @endforeach
    </div>

    <div class="navbar-end">
        <div class="mt-3 space-y-1">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</div>

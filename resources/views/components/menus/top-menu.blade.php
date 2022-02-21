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
    </div>
</div>

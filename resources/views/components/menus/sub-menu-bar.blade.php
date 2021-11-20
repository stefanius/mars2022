<nav class="navbar is-white">
    <div class="container">
        <div class="navbar-menu">
            <div class="navbar-start">
                @if (isset($menuBarLeft))
                    {{ $menuBarLeft }}
                @endif()
            </div>

            <div class="navbar-end">
                @if (isset($menuBarRight))
                    {{ $menuBarRight }}
                @endif()
            </div>
        </div>
    </div>
</nav>

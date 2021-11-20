@if ($paginator->hasPages())

    <nav class="pagination is-centered" role="navigation" aria-label="pagination">

        @if ($paginator->onFirstPage())
            <a class="pagination-previous" disabled>
                {{ __('Previous') }}
            </a>
        @else
            <a wire:click="previousPage" class="pagination-previous">
                {{ __('Previous') }}
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a wire:click="nextPage" class="pagination-next">
                {{ __('Next') }}
            </a>
        @else
            <a class="pagination-next" disabled>
                {{ __('Next') }}
            </a>
        @endif

        <ul class="pagination-list">

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="pagination-ellipsis">&hellip;</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page === $paginator->currentPage())
                            <li>
                                <a wire:click="gotoPage({{ $page }})" class="pagination-link is-current" aria-label="Page {{ $page }}"
                                   aria-current="page">{{ $page }}</a>
                            </li>
                        @else
                            <li>
                                <a wire:click="gotoPage({{ $page }})" class="pagination-link"
                                   aria-label="Goto page {{ $page }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

        </ul>
    </nav>
@endif

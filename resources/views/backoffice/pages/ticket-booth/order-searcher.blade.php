<x-layouts.backoffice>
    <x-slot name="menuBarLeft">
        <a class="navbar-item is-active" href="{{ action('Backoffice\TicketBooth\TicketBoothController@orderSearcher') }}">
            <span>{{ __('Search Order') }}</span>
        </a>

        <a class="navbar-item" href="{{ action('Backoffice\TicketBooth\TicketBoothController@sales') }}">
            <span>{{ __('Sales') }}</span>
        </a>

        <a class="navbar-item" href="{{ action('Backoffice\TicketBooth\TicketBoothController@preorder') }}">
            <span>{{ __('Pre Order') }}</span>
        </a>

        <a class="navbar-item" href="{{ action('Backoffice\TicketBooth\TicketBoothController@medals') }}">
            <span>{{ __('Medals') }}</span>
        </a>
    </x-slot>

    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-two-thirds">
                        <div class="box">
                            <div class="columns is-centered">
                                <div class="column is-four-fifths">
                                    <section class="section">
                                        <div class="is-align-content-center">
                                            <strong>{{ __('Enter the ordernumber') }}</strong> <br/><br/>
                                            <livewire:order-searcher></livewire:order-searcher>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.backoffice>

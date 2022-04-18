<x-layouts.backoffice>
    <section class="section">
        <div class="columns">
            <div class="column is-3">
                <div class="card @if($order->isGroup()) has-background-danger-light @else has-background-info-light @endif">
                    <h1 class="title is-centered has-text-centered">{{ $order->order_number }}</h1>
                    <h2 class="subtitle is-centered has-text-centered">
                        @if($order->isGroup())
                            {{ __('Group') }}
                        @else
                            {{ __('Individual') }}
                        @endif
                    </h2>
                </div>
            </div>

            <div class="column is-3">
                <div class="card @if($order->isGroup()) has-background-danger-light @else has-background-info-light @endif">
                    <h1 class="title is-centered has-text-centered">{{ $order->numberOfAttendees() }}</h1>
                    <h2 class="subtitle is-centered has-text-centered">{{ __('Attendees') }}</h2>
                </div>
            </div>

            <div class="column is-3">
                <div class="card @if($order->isGroup()) has-background-danger-light @else has-background-info-light @endif">
                    <h1 class="title is-centered has-text-centered">{{ $order->numberOfMedals() }}</h1>
                    <h2 class="subtitle is-centered has-text-centered">{{ __('Medals') }}</h2>
                </div>
            </div>

            <div class="column is-3">
                <div class="card @if($order->isGroup()) has-background-danger-light @else has-background-info-light @endif">
                    <h1 class="title is-centered has-text-centered">
                        @if($order->isFinished())
                            {{ __('Finished') }}
                        @elseif($order->isStarted())
                            {{ __('Started') }}
                        @elseif($order->isPaid())
                            {{ __('Paid') }}
                        @else
                            {{ __('New') }}
                        @endif
                    </h1>
                    <h2 class="subtitle is-centered has-text-centered">{{ __('Stage') }}</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="column is-12">

            <livewire:order-actions
                :order="$order"
            ></livewire:order-actions>
        </div>

        <br/>

        <div class="columns">

            @includeWhen(auth()->user()->isAdmin(), 'backoffice.pages.orders.partials.details')

            @include('backoffice.pages.orders.partials.orderlines')


        </div>

    </section>
</x-layouts.backoffice>

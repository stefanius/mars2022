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
            <div class="column is-4">
                <div class="card">
                    <div class="">
                        <strong>{{ __('Order Number') }}</strong> {{ $order->order_number }} <br/>
                        @if(auth()->user()->isAdmin())
                            <strong>{{ __('Organization') }}</strong> {{ $order->organization }} <br/>
                            <strong>{{ __('Name') }}</strong> {{ $order->name }} <br/>
                            <strong>{{ __('Email') }}</strong> {{ $order->email }} <br/>
                            <strong>{{ __('Phone') }}</strong> {{ $order->phone }} <br/>
                        @endif
                        <strong>{{ __('Paid At') }}</strong> {{ $order->paid_at }} <br/>
                        <strong>{{ __('Started At') }}</strong> {{ $order->started_at }} <br/>
                        <strong>{{ __('Finished At') }}</strong> {{ $order->finished_at }} <br/>
                        <strong>{{ __('Printed At') }}</strong> {{ $order->printed_at }} <br/>
                        <strong>{{ __('Created At') }}</strong> {{ $order->created_at }} <br/>

                        @if($order->mollie_payment_id)
                            <hr>
                            <strong>{{ __('Mollie Payment ID') }}</strong> {{ $order->mollie_payment_id }} <br/>
                        @endif
                    </div>
                </div>
            </div>

            <div class="column is-8">
                <div class="card">
                    <div class="">
                        <table class="table is-striped is-fullwidth">
                            <tr>
                                <th>{{ __('Medal') }}</th>
                                <th>{{ __('Quantity') }}</th>
                            </tr>

                            @foreach($order->orderLines as $line)
                                <tr>
                                    <td>{{ $line->ticket->name }}</td>
                                    <td>{{ $line->quantity}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-layouts.backoffice>

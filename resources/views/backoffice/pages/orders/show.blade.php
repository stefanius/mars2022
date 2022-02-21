<x-layouts.backoffice>
    <div class="p-5">
        <div class="column is-12">

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Orders') }}
                </h2>
            </x-slot>

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
                        <strong>{{ __('Organization') }}</strong> {{ $order->organization }} <br/>
                        <strong>{{ __('Name') }}</strong> {{ $order->name }} <br/>
                        @if(auth()->user()->isAdmin())
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
                                <th>{{ __('Ticket') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Total') }}</th>
                            </tr>

                            @foreach($order->orderLines as $line)
                                <tr>
                                    <td>{{ $line->ticket->name }}</td>
                                    <td>{{ $line->amount}}</td>
                                    <td>{{ $line->totalAmount}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layouts.backoffice>

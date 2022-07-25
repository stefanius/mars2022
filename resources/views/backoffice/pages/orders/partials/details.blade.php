
    <div class="column is-4">
        <div class="card">
            <div class="">
                <strong>{{ __('Order Number') }}</strong> {{ $order->order_number }} <br/>
                @if(auth()->user()->isAdmin())
                    <strong>{{ __('Organisation') }}</strong> {{ $order->organisation }} <br/>
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

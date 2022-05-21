<x-layouts.register>
    <div class="columns">
        <div class="column">
            <h1 class="title">{{ __("Payment failed") }}</h1>
            <strong>{{ __('Reason') }}: {{ __($order->mollie_payment_status) }} </strong></br>

            <p>
                @if($order->molliePaymentExpired())
                    {{ __('Your payment request is expired. There is nothing charged and your order is still open. If you still want to pay this order use the "Retry" button below.') }}
                @elseif($order->molliePaymentFailed())
                    {{ __('Your payment request has failed. There is nothing charged and your order is still open. If you still want to pay this order use the "Retry" button below.') }}
                @elseif($order->molliePaymentCanceled())
                    {{ __('Your payment request has canceled. There is nothing charged and your order is still open. If you still want to pay this order use the "Retry" button below.') }}
                @endif
            </p>
        </div>
    </div>

    <div class="columns">
        <div class="column">
            <div class="field is-grouped is-grouped-right">
                <a href="{{ action('payment.retry', ['hash' => $order->hash, 'order' => $order->id, 'locale' => $order->locale]) }}" class="button button is-medium is-success">
                    {{ __("Retry payment") }}
                </a>
            </div>
        </div>
    </div>
</x-layouts.register>

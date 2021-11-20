<div>
    <div class="card">
        <div class="columns">
            <div class="column is-4 has-text-centered has-addons-centered">
                <button wire:click="start" class="button is-fullwidth is-primary" @if($order->isStarted()) disabled @endif>{{ __('Start') }}</button>
            </div>

            <div class="column is-4 has-text-centered has-addons-centered">
                <button class="button is-fullwidth is-primary">{{ __('Print details') }}</button>
            </div>

            <div class="column is-4 has-text-centered has-addons-centered">
                <button wire:click="finish" class="button is-fullwidth is-primary" @if($order->isFinished()) disabled @endif>{{ __('Finish') }}</button>
            </div>
        </div>
    </div>
</div>

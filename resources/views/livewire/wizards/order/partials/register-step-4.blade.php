<div class="columns">
    <div class="column">
        <h3 class="title">{{ __('Your ordernumber') }}</h3>
        <p>{{ __('Below is your ordernumber. Write it on a paper, take a picture or simply try to memmorize it. You need this number by our cashier.') }}</p>

        <h1 class="title has-text-centered is-size-1">{{ optional($order)->order_number }}</h1>

        <button wire:click="fresh" class="button is-primary is-fullwidth" type="submit">{{ __('Start new order') }}</button>
    </div>
</div>

<div class="columns">
    <div class="column">
        <strong>{{ __("Check your order") }}</strong>
    </div>
</div>

<div class="columns">
    <div class="column">
        <strong>{{ __("Customer Details") }}</strong> <br/>
        <span>{{ $firstName }} {{ $lastName }}</span> <br/>
        <span>{{ $email }}</span> <br/>

        @if ($organization)
            <span>{{ $organization }}</span> <br/>
        @endif

        @if ($phone)
            <span>{{ $phone }}</span> <br/>
        @endif

        <hr>
        {{ __('Distance') }}: {{ $this->selectedDistance->name }} <br/>
    </div>
</div>

<div class="columns">
    <div class="column">

        @foreach($this->tickets as $ticket)
            <span><strong>Medaile: {{ $ticket['ticket']->name }}</strong> € {{ $ticket['ticket']->amount_pre_order }} * {{ $ticket['quantity'] }} = € {{ $ticket['total_decimal'] }}</span> <br/>
        @endforeach

        <span><strong>{{ __("Total") }}:</strong> € {{ $this->grandTotalDecimal }}</span>
    </div>
</div>

<div class="field is-grouped is-grouped-right">
    <button wire:click="submit" type="submit" class="button button is-medium is-success">
        {{ __("Checkout") }}
    </button>
</div>

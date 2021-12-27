<div class="columns">
    <div class="column">
        {{ __("Check your order") }}
    </div>
</div>

<div class="columns">
    <div class="column">
        <h1>{{ __("Customer Details") }}</h1>
        <strong>{{ $firstName }} {{ $lastName }}</strong> <br/>
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

        <span><strong>Totaal:</strong> € {{ $this->grandTotalDecimal }}</span>
    </div>
</div>

<div class="field is-grouped is-grouped-right">
    <button wire:click="submit" type="submit" class="button button is-medium is-success">
        {{ "Checkout" }}
    </button>
</div>

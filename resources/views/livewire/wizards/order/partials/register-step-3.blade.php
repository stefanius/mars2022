<div class="columns">
    <div class="column">
        <strong>{{ __("Check your order") }}</strong>
    </div>
</div>

<div class="columns">
    <div class="column">
        <a wire:click="firstPage">
            {{__('Edit order details')}}
        </a>

        <br/>
        <br/>

        <strong>{{ __("Customer Details") }}</strong> <br/>
        <span>{{ $firstName }} {{ $lastName }}</span> <br/>
        <span>{{ $email }}</span> <br/>

        @if ($organisation)
            <span>{{ $organisation }}</span> <br/>
        @endif

        @if ($phone)
            <span>{{ $phone }}</span> <br/>
        @endif

        <hr>
        {{ __('Distance') }}: {{ $this->selectedDistance->name }} <br/>

    </div>
</div>

<table class="table is-striped">
    <thead>
      <tr>
        <th>{{ __('Medal') }}</th>
        <th>{{ __('Quantity') }}</th>
        <th>{{ __('Amount') }}</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>{{ __('Total') }}</th>
        <th></th>
        <th>€ {{ number_format($this->grandTotalDecimal, 2) }}</th>
      </tr>
    </tfoot>
    <tbody>
        @foreach($this->tickets as $ticket)
            <tr>
                <td>{{ $ticket['ticket']->name }}  @if($ticket['half_price']) * @endif </td>
                <td>{{ $ticket['quantity'] }}</td>
                <td>€ {{ number_format($ticket['total_decimal'], 2) }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>

  <span>{{ __('*) There is a discount for this orderline. You should show your Ooievaarspas, Westlandpas or Zoetermeerpas at the desk.') }}</span>

<div class="field is-grouped is-grouped-right">
    <button wire:click="submit" type="submit" class="button button is-medium is-success">
        {{ __("Checkout") }}
    </button>
</div>

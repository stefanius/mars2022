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

<div class="columns">
    <div class="column">
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
                <th>€ {{ $this->grandTotalDecimal }}</th>
              </tr>
            </tfoot>
            <tbody>
                @foreach($this->tickets as $ticket)
                    <tr>
                        <td>{{ $ticket['ticket']->name }}</td>
                        <td>{{ $ticket['quantity'] }}</td>
                        <td>€ {{ $ticket['total_decimal'] }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>

<div class="field is-grouped is-grouped-right">
    <button wire:click="submit" type="submit" class="button button is-medium is-success">
        {{ __("Checkout") }}
    </button>
</div>

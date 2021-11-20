<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <section>
        <section>
            <h3 class="font-bold text-2xl">Controlleer je bestelling</h3>
            <p class="text-gray-600 pt-2">Kijk je gegevens nog even na. Dat is belangrijk zodat wij je de bevestiging naar je kunnen mailen en zodat de betaling klopt.</p>
    </section>

    <section class="mt-10">
        <div class="flex flex-col">
            <h1>Klantgegevens</h1>
            <strong>{{ $firstName }} {{ $lastName }}</strong>
            <span>{{ $email }}</span>

            @if ($organization)
                <span>{{ $organization }}</span>
            @endif

            @if ($phone)
                <span>{{ $phone }}</span>
            @endif

            <hr>
            Afstand: {{ $this->selectedDistance->name }} <br/>

            @if($this->selectedDistance->long_distance)
                Dit is een lange afstand
            @endif
        </div>
    </section>

    <section class="mt-10">
        <div class="flex flex-col">
            @foreach($this->tickets as $ticket)
                <span><strong>Medaile: {{ $ticket['ticket']->name }}</strong> € {{ $ticket['ticket']->amount_order }} * {{ $ticket['quantity'] }} = € {{ $ticket['total_decimal'] }}</span>
            @endforeach

            <span><strong>Totaal:</strong> € {{ $this->grandTotalDecimal }}</span>
        </div>

        <div class="field">
            <button wire:click="submit" class="button is-primary is-fullwidth" type="submit">{{ __('Save') }}</button>
        </div>
    </section>
</main>

<main class="is-vertical">
    <section>
        <section>
            <h3 class="font-bold text-2xl">Wat wil je precies hebben</h3>
            <p class="text-gray-600 pt-2">Geef aan met hoeveel personen je gaat lopen en of ze een medaile willen. Geef dan uiteraard ook aan voor de hoeveelste keer je gaat lopen. Als je een Ooievaarspas hebt geven wij een korting.</p>
    </section>

    @if($errors->count())
        <section class="mt-10">
            <div class="min-w-full text-center">
                <span class="text-red-700 text-opacity-100 text-2xl">{{ $errors->first() }}</span>
            </div>
        </section>
    @endif

    <section class="mt-10">

        <div class="flex flex-col" >

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <div class="mb-6 pt-3 rounded">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Afstand *</label>
                    </div>
                </div>
                <div>

                </div>
                <div>
                    <select wire:model="distance" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                        <option selected hidden>Kies</option>
                        @foreach($distances as $distance)
                            <option value="{{ $distance->id }}">{{ $distance->name }}</option>
                        @endforeach()
                    </select>
                </div>
            </div>

        </div>
    </section>

    <hr/>

    <section class="mt-10">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <th>
                    {{ __('Medal') }}
                </th>

                <th>
                    {{ __('Amount') }}
                </th>

                <th>
                    {{ __('Discount') }}
                </th>
            </thead>

            <tbody>
            @for ($i = 0; $i < 7; $i++)
                <tr>
                    <td>
                        <select wire:model="ticketType.{{ $i }}" id="ticket_type_{{ $i }}" class="input">
                            @foreach($ticketTypes as $ticketType)
                                <option value="{{ $ticketType->id }}">{{ $ticketType->name }}</option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <input wire:model="ticketCount.{{ $i }}" id="ticket_count_{{ $i }}" type="text" class="input">
                    </td>

                    <td>
                        <input wire:model="halfPrice.{{ $i }}" id="half_price_{{ $i }}" type="checkbox" value="1" class="checkbox">
                    </td>
                </tr>

            @endfor
            </tbody>
        </table>

        <div class="field">
            <button wire:click="next" class="button is-primary is-fullwidth" type="submit">Volgende</button>
        </div>
    </section>
</main>

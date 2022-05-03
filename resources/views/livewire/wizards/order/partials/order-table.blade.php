<table class="table">
    <thead>
    <tr>
        <th width="50%">{{ __("Medal") }}</th>
        <th width="50%">{{ __("Amount") }}</th>
        <th width="50%">{{ __("Discount") }}</th>
    </tr>
    </thead>

    <tbody>
    @for ($i = $start; $i < $start + 6; $i++)
        <tr>
            <td>
                <select wire:model="ticketType.{{ $i }}" id="ticket_type_{{ $i }}" class="input">
                    <option selected hidden>{{ __("Choose") }}</option>

                    @foreach($ticketTypes as $ticketType)
                        <option value="{{ $ticketType->id }}">{{ __($ticketType->name) }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input wire:model="ticketCount.{{ $i }}" id="ticket_count_{{ $i }}" type="number" class="input">
            </td>

            <td>
                <input wire:model="halfPrice.{{ $i }}" id="half_price_{{ $i }}" type="checkbox" value="1" class="checkbox">
            </td>
        </tr>

        @error('ticketType.' . $i)
            <tr>
                <td colspan="3">
                    <span class="help is-danger">
                        {{ $message }}
                    </span>
                </td>
            </tr>
        @enderror

        @error('ticketCount.' . $i)
            <tr>
                <td colspan="3">
                    <span class="help is-danger">
                        {{ $message }}
                    </span>
                </td>
            </tr>
        @enderror

    @endfor
    </tbody>
</table>

<table class="table">
    <thead>
    <tr>
        <th width="50%">{{ __("Medal") }}</th>
        <th width="50%">{{ __("Amount") }}</th>
    </tr>
    </thead>

    <tbody>
    @for ($i = $start; $i < $start + 6; $i++)
        <tr>
            <td>
                <select wire:model.debounce.lazy="ticketType.{{ $i }}" id="ticket_type_{{ $i }}" class="input">
                    <option selected hidden>{{ __("Choose") }}</option>
                    <option> - </option>
                    @foreach($ticketTypes as $ticketType)
                        <option value="{{ $ticketType->id }}">{{ __($ticketType->name) }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input wire:model.debounce.lazy="ticketCount.{{ $i }}" id="ticket_count_{{ $i }}" type="number" class="input">
            </td>
        </tr>

        @error('ticketType.' . $i)
            <tr>
                <td colspan="2">
                    <span class="help is-danger">
                        {{ $message }}
                    </span>
                </td>
            </tr>
        @enderror

        @error('ticketCount.' . $i)
            <tr>
                <td colspan="2">
                    <span class="help is-danger">
                        {{ $message }}
                    </span>
                </td>
            </tr>
        @enderror

    @endfor
    </tbody>
</table>

@error('ticketType')
    <span class="help is-danger">
        {{ $message }}
    </span>
@enderror

@error('ticketCount')
    <span class="help is-danger">
        {{ $message }}
    </span>
@enderror

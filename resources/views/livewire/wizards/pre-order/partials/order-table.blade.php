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
            <td width="50%">
                <select wire:model="ticketType.{{ $i }}" id="ticket_type_{{ $i }}" class="input">
                    @foreach($ticketTypes as $ticketType)
                        <option value="{{ $ticketType->id }}">{{ __($ticketType->name) }}</option>
                    @endforeach
                </select>
            </td>
            <td width="50%">
                <input wire:model="ticketCount.{{ $i }}" id="ticket_count_{{ $i }}" type="number" class="input">
            </td>
        </tr>
    @endfor
    </tbody>
</table>

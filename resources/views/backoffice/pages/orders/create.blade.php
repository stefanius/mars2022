<x-layouts.backoffice>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <form role="form" method="post" action="{{ action('Backoffice\Orders\OrdersController@store') }}">
        @csrf
        <input name="season_id" type="hidden" value="{{ \App\Models\Season::activeSeason()->id }}">

        <div class="columns">
            <div class="column is-half">
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">{{ __("First Name") }} *</label>
                            <div class="control is-clearfix">
                                <input wire:model="firstName" type="text" maxlength="70" name="first_name" required="required" class="input">
                            </div>

                            <span class="help is-danger">
                                @error('first_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field">
                            <label class="label">{{ __("Last Name") }} *</label>
                            <div class="control is-clearfix">
                                <input wire:model="lastName" type="text" maxlength="70" name="last_name" required="required" class="input">
                            </div>

                            <span class="help is-danger">
                                @error('last_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">{{ __("Email") }} *</label>
                            <div class="control is-clearfix">
                                <input wire:model="email"  type="text" maxlength="100" name="email" required="required" class="input">
                            </div>

                            <span class="help is-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>

                <hr/>

                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">{{ __("Organisation") }} *</label>
                            <div class="control is-clearfix">
                                <input wire:model="organisation" type="text" maxlength="100" name="organisation" class="input" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">{{ __("Phone") }}</label>
                            <div class="control is-clearfix">
                                <input wire:model="phone"  type="text" maxlength="100" name="phone" class="input">
                            </div>
                            <p class="help">.</p>
                        </div>
                    </div>
                </div>

            </div>

            <div style="border-left:1px solid #000;height:500px"></div>

            <div class="column is-half">
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <div class="field">
                                <label class="label">{{ __("Day") }} *</label>
                                <div class="control is-clearfix">
                                    <select name="day_id" required="required" class="input">
                                        <option selected hidden>{{ __("Choose") }}</option>
                                        @foreach($days as $day)
                                            <option value="{{ $day->id }}">{{ __($day->name) }}</option>
                                        @endforeach()
                                    </select>
                                </div>

                                <span class="help is-danger">
                                    @error('day')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label">{{ __("Distance") }} *</label>
                            <div class="control is-clearfix">
                                <select name="distance_id" required="required" class="input">
                                    <option selected hidden>{{ __("Choose") }}</option>
                                    @foreach($distances as $distance)
                                        <option value="{{ $distance->id }}">{{ __($distance->name) }} KM</option>
                                    @endforeach()
                                </select>
                            </div>

                            <span class="help is-danger">
                                @error('distance')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-two-fifths">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __("Medal") }}</th>
                                <th>{{ __("Amount") }}</th>
                                <th>{{ __("Discount") }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @for ($i = 1; $i < 6; $i++)
                                <tr>
                                    <td>
                                        <select name="ticketType[{{ $i }}] id="ticket_type_{{ $i }}" class="input" style="width: 80px;">
                                            <option selected hidden value="0">{{ __("Choose") }}</option>

                                            @foreach($ticketTypes as $ticketType)
                                                <option value="{{ $ticketType->id }}">{{ __($ticketType->name) }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input name="ticketCount[{{ $i }}]" id="ticket_count_{{ $i }}" type="number" class="input">
                                    </td>

                                    <td>
                                        <input name="halfPrice[{{ $i }}]" id="half_price_{{ $i }}" type="checkbox" value="1" class="checkbox">
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

                    </div>
                </div>
            </div>
        </div>

        <div class="field is-grouped is-grouped-right">
            <button wire:click="next" type="submit" class="button button is-medium is-success">
                {{ __("Save") }}
            </button>
        </div>
    </form>
</x-layouts.backoffice>

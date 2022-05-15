<div class="columns">
    <div class="column">
        <div class="field">
            <div class="field">
                <label class="label">{{ __("Day") }} *</label>
                <div class="control is-clearfix">
                    <select wire:model="day" name="day" required="required" class="input">
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
                <select wire:model="distance" name="distance" required="required" class="input">
                    <option selected hidden>{{ __("Choose") }}</option>
                    @foreach($distances as $distance)
                        <option value="{{ $distance->id }}">{{ __($distance->name) }}</option>
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
    <div class="column is-12">
        {{ __('Choose the medal you want to recieve or choose "none" for attendees who wants to participate without a reward.') }}
    </div>
</div>
<div class="columns">
    @if(Agent::isMobile())
        <div class="column is-one-quarter">

        </div>

        <div class="column is-half">
            @include('livewire.wizards.pre-order.partials.order-table', ['start' => 0])
        </div>

        <div class="column is-one-quarter">

        </div>
    @else
        <div class="column is-one-third">
            @include('livewire.wizards.pre-order.partials.order-table', ['start' => 0])
        </div>

        <div class="column is-one-third">

        </div>

        <div class="column is-one-third">
            @include('livewire.wizards.pre-order.partials.order-table',  ['start' => 10])
        </div>
    @endif
</div>

<div class="field is-grouped is-grouped-right">
    <button wire:click="next" type="submit" class="button button is-medium is-success">
        {{ __("Next") }}
    </button>
</div>

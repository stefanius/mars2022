<div class="columns">
    <div class="column">
        <div class="field">
            <label class="label">{{ __("First Name") }} *</label>
            <div class="control is-clearfix">
                <input wire:model="firstName" type="text" maxlength="70" required="required" name="first_name" class="input">
            </div>

            <span class="help is-danger">
                @error('firstName')
                    {{ $message }}
                @enderror
            </span>

            <span class="help">
                {{ __('Fill in your name so our cashier can find your order.') }}
            </span>
        </div>
    </div>

    <div class="column">
        <div class="field">
            <label class="label">{{ __("Last Name") }} *</label>
            <div class="control is-clearfix">
                <input wire:model="lastName" type="text" maxlength="70" required="required" name="last_name" class="input">
            </div>

            <span class="help is-danger">
                @error('lastName')
                    {{ $message }}
                @enderror
            </span>
        </div>
    </div>
</div>

<div class="columns">
    <div class="column">
        <div class="field">
            <label class="label">{{ __("Email") }}</label>
            <div class="control is-clearfix">
                <input wire:model="email"  type="text" maxlength="100" name="email" class="input">
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
            <label class="label">{{ __("Organisation") }}</label>
            <div class="control is-clearfix">
                <input wire:model="organisation" type="text" maxlength="100" name="organisation" class="input">
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

<div class="columns">
    <div class="column">
        <div class="field">
            <div class="control is-clearfix">
                <input wire:model="termsOfService" type="checkbox" name="terms_of_service" class="checkbox"> {!! __("I agree with the <a href=\":url\" target=\"__BLANK\">terms of service</a>.", ['url' => 'https://www.duinenmars.nl/algemene-voorwaarden']) !!}
            </div>
            <span class="help is-danger">
                @error('termsOfService')
                    {{ $message }}
                @enderror
            </span>
            <div class="control is-clearfix">
                <input wire:model="mailConsent" type="checkbox" name="mail_consent" class="checkbox"> {{ __("I consent to recieve future information of this event by email.") }}
            </div>
        </div>
    </div>
</div>

<div class="field is-grouped is-grouped-right">
    <button wire:click="next" type="submit" class="button button is-medium is-success">
        {{ __("Next") }}
    </button>
</div>

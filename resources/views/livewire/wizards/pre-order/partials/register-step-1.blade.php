<div class="columns">
    <div class="column">
        <div class="field">
            <label class="label">{{ __("First Name") }} *</label>
            <div class="control is-clearfix">
                <input wire:model="firstName" type="text" maxlength="70" name="first_name" required="required" class="input">
            </div>

            <span class="help is-danger">
                @error('firstName')
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
            <label class="label">{{ __("Organization") }}</label>
            <div class="control is-clearfix">
                <input wire:model="organization" type="text" maxlength="100" name="organization" class="input">
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

<div class="field is-grouped is-grouped-right">
    <button wire:click="next" type="submit" class="button button is-medium is-success">
        {{ __("Next") }}
    </button>
</div>

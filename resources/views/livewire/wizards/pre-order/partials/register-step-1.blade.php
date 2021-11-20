<div class="columns">
    <div class="column">
        <div class="field">
            <label class="label">{{ "First Name" }} *</label>
            <div class="control is-clearfix">
                <input wire:model="firstName" type="text" maxlength="70" name="first_name" required="required" class="input">
            </div>
        </div>
    </div>

    <div class="column">
        <div class="field">
            <label class="label">{{ "Last Name" }} *</label>
            <div class="control is-clearfix">
                <input wire:model="lastName" type="text" maxlength="70" name="first_name" required="required" class="input">
            </div>
        </div>
    </div>
</div>

<div class="columns">
    <div class="column">
        <div class="field">
            <label class="label">{{ "Email" }} *</label>
            <div class="control is-clearfix">
                <input wire:model="email"  type="text" maxlength="100" name="first_name" required="required" class="input">
            </div>
        </div>
    </div>
</div>

<hr/>

<div class="columns">
    <div class="column">
        <div class="field">
            <label class="label">{{ "Organization" }}</label>
            <div class="control is-clearfix">
                <input wire:model="organization" type="text" maxlength="100" name="first_name" class="input">
            </div>
        </div>
    </div>
</div>

<div class="columns">
    <div class="column">
        <div class="field">
            <label class="label">{{ "Phone" }}</label>
            <div class="control is-clearfix">
                <input wire:model="phone"  type="text" maxlength="100" name="first_name" class="input">
            </div>
            <p class="help">.</p>
        </div>
    </div>
</div>

<div class="field is-grouped is-grouped-right">
    <button wire:click="next" type="submit" class="button button is-medium is-success">
        {{ "Next" }}
    </button>
</div>

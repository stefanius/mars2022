<main class="is-vertical">
    <section>
        <h3 class="font-bold text-2xl">Vertel ons wie je bent</h3>
        <p class="text-gray-600 pt-2">Het is niet verplicht, maar als je wilt kan je je contactgegevens achterlaten. Zo houden wij je op de hoogte via de mail voor het laatate nieuws over de Duinenmars.</p>
    </section>

    <section class="mt-10">
            <div class="field">
                <label class="label">{{ __('First Name') }}</label>
                <div class="control">
                    <input class="input" wire:model="firstName" type="text" id="first_name">
                </div>
            </div>

            <div class="field">
                <label class="label">{{ __('Last Name') }}</label>
                <div class="control">
                    <input class="input" wire:model="lastName" type="text" id="last_name">
                </div>
            </div>

            <div class="field">
                <label class="label">{{ __('Email') }}</label>
                <div class="control">
                    <input class="input" wire:model="email" type="text" id="email">
                </div>
            </div>

            <hr/>

            <div class="field">
                <label class="label">{{ __('Organization') }}</label>
                <div class="control">
                    <input class="input" wire:model="organization" type="text" id="organization">
                </div>
            </div>

            <div class="field">
                <label class="label">{{ __('Phone') }}</label>
                <div class="control">
                    <input class="input" wire:model="phone" type="text" id="phone">
                </div>
            </div>

            <div class="field">
                <button wire:click="next" class="button is-primary is-fullwidth" type="submit">Volgende</button>
            </div>
    </section>
</main>

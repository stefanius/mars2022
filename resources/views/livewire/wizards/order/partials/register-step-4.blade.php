<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <section>
        <section>
            <h3 class="font-bold text-2xl">Je inschrijfnummer</h3>
            <p class="text-gray-600 pt-2">Hieronder is je inschrijfnummer. Onthoudt dit nummer, maak een foto of schrijf het op. Je hebt dit straks nodig bij de kassa.</p>
    </section>

    <section class="mt-10">
        <div class="flex flex-col">
            <div class="min-w-full text-center">
                <div class="mb-6 pt-3 rounded">
                    <span class="text-center text-9xl">{{ optional($order)->order_number }}</span>
                </div>
            </div>

            <div class="field">
                <button wire:click="fresh" class="button is-primary is-fullwidth" type="submit">{{ __('Nieuwe inschrijving starten') }}</button>
            </div>
        </div>
    </section>
</main>

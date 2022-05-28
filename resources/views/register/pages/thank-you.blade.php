<x-layouts.register>
    <div class="columns">
        <div class="column">
            <h1 class="title">{{ __("Thank you!") }}</h1>
            <p>{{ __("Thank you for your order. Your should receive an email with your order details. This email is also your ticket to start the Duinenmars.") }}</p>
        </div>
    </div>

    <div class="columns">
        <div class="column">
            <p>{!! __("Feel free to go back to our <a href=\"https://www.duinenmars.nl\">website</a> or start a <a href=\":newOrderUrl\">new order</a>.", ['newOrderUrl' => $newOrderUrl]) !!}</p>
        </div>
    </div>
</x-layouts.register>

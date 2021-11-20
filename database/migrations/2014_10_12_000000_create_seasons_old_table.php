<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonsOldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons_old', function (Blueprint $table) {
            $table->id();
            $table->integer('edition'); // The number of the mars

            $table->integer('ticket_price'); // Ticket price in cents
            $table->integer('ticket_price_with_medal'); // Ticket price in cents - with medal
            $table->integer('ticket_price_discount'); // Ticket price in cents (price of cheaper tickets)
            $table->integer('ticket_price_with_medal_discount'); // Ticket price in cents - with medal (price of cheaper tickets)

            $table->dateTime('subscription_period_starts_at'); // The start date of the subscription period
            $table->dateTime('subscription_period_ends_at'); // The end date of the subscription period

            $table->dateTime('early_bird_period_starts_at'); // The start of the early bird period
            $table->dateTime('early_bird_period_ends_at'); // The end of the early bird period

            $table->dateTime('event_starts_at'); // The start of the event
            $table->dateTime('event_ends_at'); // The end of the event

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
    }
}

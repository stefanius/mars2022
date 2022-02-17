<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();

            $table->text('name');

            $table->boolean('show_on_pre_order')->default(false);
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->nullable();
            $table->string('mollie_payment_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('organization')->nullable();
            $table->string('phone')->nullable();

            $table->string('locale')->nullable();

            $table->timestamp('paid_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('printed_at')->nullable();
            $table->timestamp('finished_at')->nullable();

            $table->unsignedBigInteger('distance_id');
            $table->foreign('distance_id')->references('id')->on('distances');

            $table->unsignedBigInteger('day_id');
            $table->foreign('day_id')->references('id')->on('days');

            $table->unsignedBigInteger('season_id');
            $table->foreign('season_id')->references('id')->on('seasons');

            $table->timestamps();
        });

        Schema::create('order_lines', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

            $table->unsignedBigInteger('ticket_type_id');
            $table->foreign('ticket_type_id')->references('id')->on('ticket_types');

            $table->boolean('half_price');
            $table->integer('quantity');
            $table->integer('amount');
            $table->integer('total_amount');

            $table->timestamps();
        });

        \App\Models\Day::create(['id' => \Carbon\Carbon::MONDAY, 'name' => 'Monday']);
        \App\Models\Day::create(['id' => \Carbon\Carbon::TUESDAY, 'name' => 'Tuesday']);
        \App\Models\Day::create(['id' => \Carbon\Carbon::WEDNESDAY, 'name' => 'Wednesday']);
        \App\Models\Day::create(['id' => \Carbon\Carbon::THURSDAY, 'name' => 'Thursday']);
        \App\Models\Day::create(['id' => \Carbon\Carbon::FRIDAY, 'name' => 'Friday']);
        \App\Models\Day::create(['id' => \Carbon\Carbon::SATURDAY, 'name' => 'Saturday', 'show_on_pre_order' => true]);
        \App\Models\Day::create(['id' => \Carbon\Carbon::SUNDAY, 'name' => 'Sunday', 'show_on_pre_order' => true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_lines');
        Schema::dropIfExists('days');
    }
}

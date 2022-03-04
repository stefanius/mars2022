<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->integer('edition');

            $table->integer('minimum_group')->default(8);

            $table->date('pre_order_starts_at');
            $table->date('pre_order_ends_at');

            $table->date('saturday_date');
            $table->date('sunday_date');

            $table->integer('year');

            $table->timestamp('read_only_since')->nullable()->default(null);

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

<?php

use App\Models\Distance;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distances', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('check_in_window_starts_at')->nullable();
            $table->string('check_in_window_ends_at')->nullable();

            $table->boolean('weekend')->nullable();

            $table->timestamps();
        });

        Schema::create('distance_season', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('distance_id');
            $table->foreign('distance_id')->references('id')->on('distances');

            $table->unsignedBigInteger('season_id');
            $table->foreign('season_id')->references('id')->on('seasons');
        });

        $this->createDistance(5, "09:00", "15:00", false);
        $this->createDistance(10, "09:00", "14:00", false);
        $this->createDistance(15, "09:00", "14:00", false);
        $this->createDistance(25, "08:30", "11:00", false);
        $this->createDistance(40, "08:00", "10:00", false);
        $this->createDistance(70, "08:00", "10:00", true);
    }

    protected function createDistance($name, $checkInWindowStartsAt, $checkInWindowEndsAt, $weekend)
    {
        Distance::create([
            'name' => $name,
            'check_in_window_starts_at' => $checkInWindowStartsAt,
            'check_in_window_ends_at' => $checkInWindowEndsAt,
            'weekend' => $weekend,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distances');
    }
}

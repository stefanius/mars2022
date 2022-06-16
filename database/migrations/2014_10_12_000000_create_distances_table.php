<?php

use App\Models\Distance;
use App\Models\DistanceType;
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

            $table->unsignedBigInteger('distance_type_id');
            $table->foreign('distance_type_id')->references('id')->on('distance_types');

            $table->timestamps();
        });

        Schema::create('distance_season', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('distance_id');
            $table->foreign('distance_id')->references('id')->on('distances');

            $table->unsignedBigInteger('season_id');
            $table->foreign('season_id')->references('id')->on('seasons');
        });

        $this->createDistance(5, DistanceType::SHORT);
        $this->createDistance(10, DistanceType::SHORT);
        $this->createDistance(15, DistanceType::SHORT);
        $this->createDistance(25, DistanceType::LONG);
        $this->createDistance(40, DistanceType::LONG);
        $this->createDistance(70, DistanceType::WEEKEND);
    }

    protected function createDistance($name, $distanceTypeId)
    {
        Distance::create([
            'name' => $name,
            'distance_type_id' => $distanceTypeId,
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

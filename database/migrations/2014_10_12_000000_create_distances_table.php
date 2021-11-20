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
            $table->boolean('long_distance');

            $table->timestamps();
        });

        $this->createDistance(5);
        $this->createDistance(10);
        $this->createDistance(15);
        $this->createDistance(25, true);
        $this->createDistance(40, true);
    }

    protected function createDistance($name, $longDistance = false)
    {
        Distance::create([
            'name' => $name,
            'long_distance' => $longDistance,
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

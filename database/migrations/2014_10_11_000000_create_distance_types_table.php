<?php

use App\Models\DistanceType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistanceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distance_types', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->timestamps();
        });

        DistanceType::create(['name' => 'Short']);
        DistanceType::create(['name' => 'Long']);
        DistanceType::create(['name' => 'Weekend']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distance_types');
    }
}

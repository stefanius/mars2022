<?php

use App\Models\AddressType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('street_address');
            $table->string('postal_code');
            $table->string('city');
            $table->boolean('send_poster')->default(true);
            $table->boolean('send_email')->default(true);

            $table->bigInteger('address_type_id')->nullable();

            $table->timestamps();
        });

        Schema::create('address_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->timestamps();
        });

        $this->createAddressType('Scouting');
        $this->createAddressType('School');
        $this->createAddressType('Huisarts');
        $this->createAddressType('Fysiotherapeut');
        $this->createAddressType('Anders');
    }

    protected function createAddressType($name)
    {
        AddressType::create([
            'name' => $name,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('address_types');
    }
}

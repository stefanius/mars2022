<?php

use App\Models\TicketType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('order');
            $table->integer('amount_pre_order');
            $table->integer('amount_order');
            $table->boolean('allow_pre_order');
            $table->boolean('allow_order');

            $table->timestamps();
        });

        $this->createTicketType('None', 'None', 1000, 300, 400, true, true);

        // Create 65 regular ticket types.
        for ($i = 1; $i <= 65; $i++) {
            $this->createTicketType($i, $i, 1000 + (10 * $i), 400, 500, true, true);
        }

        $this->createTicketType('Donation', 'Donation', 5000, 250, 250, true, true);
    }

    protected function createTicketType(string $name, string $description, int $order, int $amountPreOrder, int $amountOrder, bool $allowPreOrder, bool $allowOrder)
    {
        TicketType::create([
            'name' => $name,
            'description' => $description,
            'order' => $order,
            'amount_pre_order' => $amountPreOrder,
            'amount_order' => $amountOrder,
            'allow_pre_order' => $allowPreOrder,
            'allow_order' => $allowOrder,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_types');
    }
}

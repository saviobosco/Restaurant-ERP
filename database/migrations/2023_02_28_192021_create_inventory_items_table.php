<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
//use App\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Blueprint;

class CreateInventoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("code");
            $table->string("name");
            $table->unsignedBigInteger("type_id")->nullable();
            $table->string("unit_measurement")->nullable();
            $table->unsignedInteger("order_unit")->nullable();
            $table->string("portion_unit_measurement")->comment("portion integer unit for measurement");
            $table->decimal("portion_unit_cost", 16, 2)->default(0);
            $table->decimal("unit_cost", 16, 2)->default(0);
            $table->integer("quantity")->nullable();
            $table->timestamps();
            $table->foreign("type_id")->references("id")
                ->on("inventory_item_types")->onUpdate("cascade")->onDelete("restrict");
            //$table->creator();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_items');
    }
}

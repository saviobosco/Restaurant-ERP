<?php

use Illuminate\Database\Migrations\Migration;
//use App\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateInventoryItemTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_item_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            //$table->creator();
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
        Schema::dropIfExists('inventory_item_types');
    }
}

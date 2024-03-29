<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("receipt_id")->nullable();
            $table->unsignedBigInteger("product_id")->nullable();
            $table->unsignedInteger("quantity")->nullable();
            $table->decimal("total",16, 2)->nullable();
            $table->string("order_note")->nullable();
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
        Schema::dropIfExists('receipt_items');
    }
}

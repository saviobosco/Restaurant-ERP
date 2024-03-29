<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("serial_number")->nullable();
            $table->boolean("is_fullFilled")->default(\App\Enums\FullFilmentStatus::UNFULLFILLED);
            $table->string("status")->default(\App\Enums\ReceiptStatus::PENDING);
            $table->string("order_note")->nullable();
            $table->string("booking_note")->nullable();
            $table->string("sale_type")->nullable();
            $table->dateTime("booking_time")->nullable();
            $table->decimal("booking_advance", 2)->nullable();
            $table->decimal("total",16, 2)->nullable();
            $table->unsignedBigInteger("customer_id")->nullable();
            $table->boolean("is_door_delivery")->nullable();
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
        Schema::dropIfExists('receipts');
    }
}

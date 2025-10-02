<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('item_id')->nullable();
            $table->string("code")->nullable();
            $table->string('name', 1000);
            $table->decimal('price', 10, 2)->nullable();
            $table->unsignedInteger("category_id")->nullable();
            $table->text('note')->nullable();
            $table->unsignedInteger("sort_order")->nullable();
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
        Schema::dropIfExists('PRODUCTS');
    }
}

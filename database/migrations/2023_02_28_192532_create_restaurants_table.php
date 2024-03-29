<?php

use Illuminate\Database\Migrations\Migration;
//use App\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->string('address')->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->unsignedInteger("country_id")->nullable();
            $table->string("zip_code")->nullable();
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
        Schema::dropIfExists('restaurants');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pro_id');
            $table->integer('pro_quant');
            $table->integer('sup_id');
            $table->string('product_garage')->nullable();
            $table->string('product_route')->nullable();
            $table->string('buy_date')->nullabel();
            $table->string('expire_date')->nullable();
            $table->string('buying_price')->nullable();
            $table->string('selling_price')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->index('product_id');

            $table->unsignedBigInteger('cart_item_id')->nullable();
            $table->index('cart_item_id')->nullable();

            $table->unsignedBigInteger('order_item_id')->nullable();
            $table->index('order_item_id')->nullable();

            $table->unsignedBigInteger('favourit_id')->nullable();
            $table->index('favourit_id')->nullable();
            
            $table->string('size');
            $table->string('sexe');
            $table->string('color');
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
        Schema::dropIfExists('product_details');
    }
}

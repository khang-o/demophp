<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
    $table->unsignedBigInteger('product_id');
    $table->decimal('price', 10, 2);
    $table->integer('quantity');
    $table->unsignedBigInteger('order_id');
    $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
    $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
    $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}

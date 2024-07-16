<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
    $table->string('user_fullname');
    $table->string('user_email');
    $table->string('user_phone');
    $table->string('user_address');
    $table->string('payment_method')->nullable();
    $table->date('buy_date')->nullable();
    $table->integer('total_money')->default(0);
    $table->integer('total_quantity')->default(0);
    $table->string('status')->default('pending');
    $table->unsignedBigInteger('user_id')->nullable();
    $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
    $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('archived_products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('sale', 10, 2)->nullable();
            $table->integer('instock')->nullable();
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->float('rating')->default(0);
            $table->string('status')->default('available');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('archived_products');
    }
};

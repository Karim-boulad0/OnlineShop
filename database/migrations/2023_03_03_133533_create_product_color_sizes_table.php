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
        Schema::create('product_color_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('product_size_id')->unsigned();
            $table->integer('product_color_id')->unsigned();
            $table->foreign('product_size_id')->references('id')->on('product_sizes');
            $table->foreign('product_color_id')->references('id')->on('product_colors');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('quantity');
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('descr')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->integer('status')->default(1);
            // $table->unique(['product_size_id', 'product_color_id', 'product_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_color_sizes');
    }
};

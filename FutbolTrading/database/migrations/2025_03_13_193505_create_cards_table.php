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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->text('image');
            $table->float('price');
            $table->integer('quantity');
            $table->unsignedBigInteger('item')->nullable()->default(null);
            $table->unsignedBigInteger('wishlist')->nullable()->default(null);
            $table->foreign('item')->references('id')->on('items');
            $table->foreign('wishlist')->references('id')->on('wishlists');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};

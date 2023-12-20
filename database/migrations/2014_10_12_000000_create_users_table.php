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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table ->String('email');
            $table ->integer('phone');
            $table ->String('password');
            $table ->boolean('admin');

            $table->unsignedBigInteger('cart_id')->unique();
            $table->foreign('cart_id')->references('id')->on('carts');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

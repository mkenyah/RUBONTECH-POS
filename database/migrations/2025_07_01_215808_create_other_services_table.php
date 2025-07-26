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
        Schema::create('other_services', function (Blueprint $table) {
     $table->id();
    $table->string('description');
    $table->decimal('cost', 10, 2);
    $table->string('status')->default('unpaid');
    $table->string('payment_method')->default('cash');
    $table->unsignedBigInteger('user_id');
    $table->string('transaction_id');
     $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_services');
    }
};

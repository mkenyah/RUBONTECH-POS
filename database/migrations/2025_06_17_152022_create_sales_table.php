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
    Schema::create('sales', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('product_id');
        $table->integer('quantity');
        $table->decimal('price_per_unit', 10, 2);
        $table->decimal('total_price', 10, 2);
        $table->string('status')->default('unpaid');
        $table->string('payment_method');
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('transaction_id');

        $table->timestamps();

        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('set null');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};

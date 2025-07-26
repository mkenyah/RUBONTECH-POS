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
    Schema::create('repairs', function (Blueprint $table) {
        $table->id();
        $table->string('service_type');
        $table->decimal('cost', 10, 2);
        $table->string('status')->default('unpaid');
        $table->string('payment_method');

        $table->unsignedBigInteger('user_id');
    
        $table->unsignedBigInteger('transaction_id')->nullable(); // needed for setNull

        $table->timestamps();

        // Foreign key constraints
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('set null');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};

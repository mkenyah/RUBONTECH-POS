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
        //
        Schema::table('sales', function (Blueprint $table) {
            // Drop columns if they exist and need changing
            $table->dropColumn(['created_at', 'updated_at']);

            // Modify columns to match new types
            $table->bigInteger('product_id')->change();
            $table->integer('quantity')->change();
            $table->decimal('price_per_unit', 10, 2)->change();
            $table->decimal('total_price', 10, 2)->change();
            $table->string('payment_method')->change();
            $table->string('status')->change();
            $table->integer('user_id')->change(); // Changing from bigint to int
            $table->string('transaction_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
         Schema::table('sales', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->change();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            // Optional: revert other types if needed
        });
    }
};

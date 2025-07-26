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
        Schema::table('products', function (Blueprint $table) {
            //
             $table->decimal('stock_price', 10, 2)->after('selling_price');
        $table->decimal('totals_expected', 10, 2)->after('stock_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
             $table->dropColumn('stock_price');
        $table->dropColumn('totals_expected');
        });
    }
};

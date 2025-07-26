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
        Schema::table('photocopies', function (Blueprint $table) {
            //
             // Change transaction_id to nullable VARCHAR(255)
            $table->string('transaction_id', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photocopies', function (Blueprint $table) {
            //
             $table->unsignedBigInteger('transaction_id')->nullable()->change();
        });
    }
};
